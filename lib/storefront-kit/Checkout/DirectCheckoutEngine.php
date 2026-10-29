<?php

declare(strict_types=1);

namespace Swift\Vendor\StorefrontKit\Checkout;

/**
 * Namespace-neutral "Buy Now" / direct-checkout engine (powers the Swift, 
 * Quick Buy for WooCommerce plugin).
 *
 * Adds a "Buy Now" button on the single-product page and/or shop loop that adds
 * the product to the cart and redirects straight to the checkout (or cart). The
 * engine is stateless, no DB, no product meta, and every text-domain string,
 * option key, asset handle/URL and template name is constructor-injected via
 * plain values and closures, exactly like
 * {@see \Swift\Vendor\StorefrontKit\Waitlist\WaitlistEngine} and
 * {@see \Swift\Vendor\StorefrontKit\Compare\CompareEngine}. Do NOT hard-code
 * text-domains, option keys or asset handles here.
 *
 * Flow: the button is a plain submit that posts the product id under
 * `$requestKey`; on `template_redirect` the engine intercepts the request,
 * empties the cart (single-item buy-now), re-adds the product and redirects to
 * the configured target. The button markup ships in the consuming plugin via
 * the injected `renderTemplate` closure.
 */
final class DirectCheckoutEngine
{
    /**
     * @param \Closure(): bool $isEnabled
     * @param \Closure(): array<string, mixed> $settings Resolved settings:
     *        `button_text`, `show_on_single`, `show_on_loop`,
     *        `redirect_target` (`checkout`|`cart`|`custom`), `redirect_url`
     *        (same-site URL for `custom`), `clear_cart`.
     * @param \Closure(string, array<string, mixed>): void $renderTemplate
     *        Echoes the button template.
     * @param array<string, string> $labels Fallback strings keyed by
     *        `button`, `add_failed`, `nonce_failed`.
     */
    public function __construct(
        private readonly string $requestKey,
        private readonly string $nonceAction,
        private readonly string $buttonTemplate,
        private readonly array $labels,
        private readonly \Closure $isEnabled,
        private readonly \Closure $settings,
        private readonly \Closure $renderTemplate,
    ) {
    }

    public function registerHooks(): void
    {
        add_action('woocommerce_after_add_to_cart_button', [$this, 'renderSingleButton'], 15);
        add_action('woocommerce_after_shop_loop_item', [$this, 'renderLoopButton'], 15);
        add_filter('render_block_woocommerce/product-button', [$this, 'appendLoopButtonToBlock'], 10, 3);
        add_action('template_redirect', [$this, 'handleBuyNow'], 5);
    }

    public function renderSingleButton(): void
    {
        global $product;

        if (! $product instanceof \WC_Product || ! $this->isEnabled() || ! ($this->getSettings()['show_on_single'] ?? true)) {
            return;
        }

        // Simple products only, the same rule the loop button and the shortcode
        // already apply. This hook also fires inside WooCommerce's variation
        // add-to-cart template, so a variable product used to show a Buy Now
        // button next to its variation picker, and clicking it posted the
        // parent id to a handler that cannot choose a variation: the shopper
        // got a failure notice instead of a checkout.
        if (! $product->is_purchasable() || ! $product->is_in_stock() || $product->is_type('variable')) {
            return;
        }

        $this->renderButton($product, 'single');
    }

    public function renderLoopButton(): void
    {
        global $product;

        if (! $this->showsLoopButton($product)) {
            return;
        }

        $this->renderButton($product, 'loop');
    }

    /**
     * Product grids built from blocks (a Product Collection on the homepage or
     * any page) never fire `woocommerce_after_shop_loop_item`, so the loop
     * button sits after each grid's Add to cart block instead. On a shop or
     * category template WooCommerce marks an inherited grid's blocks with
     * `isInherited` and fires the classic hook itself; those are skipped so the
     * button never shows twice.
     *
     * @param array<string, mixed> $block
     */
    public function appendLoopButtonToBlock(string $content, array $block, mixed $instance = null): string
    {
        if (! empty($block['attrs']['isInherited']) || ! $instance instanceof \WP_Block) {
            return $content;
        }

        $productId = absint($instance->context['postId'] ?? 0);
        $product   = $productId > 0 ? wc_get_product($productId) : null;

        if (! $this->showsLoopButton($product)) {
            return $content;
        }

        ob_start();
        $this->renderButton($product, 'loop');

        return $content . (string) ob_get_clean();
    }

    /**
     * @phpstan-assert-if-true \WC_Product $product
     */
    private function showsLoopButton(mixed $product): bool
    {
        if (! $product instanceof \WC_Product || ! $this->isEnabled() || ! ($this->getSettings()['show_on_loop'] ?? false)) {
            return false;
        }

        return $product->is_purchasable() && $product->is_in_stock() && ! $product->is_type('variable');
    }

    public function handleBuyNow(): void
    {
        if (! $this->isEnabled() || ! isset($_REQUEST[$this->requestKey])) {
            return;
        }

        $nonce = isset($_REQUEST['_wpnonce']) ? sanitize_text_field((string) wp_unslash($_REQUEST['_wpnonce'])) : '';

        // A cached page can serve a nonce that has since expired. Say so and
        // let the page render: it carries a fresh nonce, so the next click works.
        if (! wp_verify_nonce($nonce, $this->nonceAction)) {
            if (($this->labels['nonce_failed'] ?? '') !== '') {
                wc_add_notice($this->labels['nonce_failed'], 'error');
            }

            return;
        }

        $productId = absint(wp_unslash($_REQUEST[$this->requestKey]));
        $product = wc_get_product($productId);

        if (! $product instanceof \WC_Product || ! $product->is_purchasable() || ! $product->is_in_stock()) {
            return;
        }

        // A bookmarked or hand-built link can still carry a variable parent id.
        // Adding it would put an unbuyable parent in the cart, so refuse here
        // as well and let the shopper stay on the product page and pick their
        // options the normal way.
        if ($product->is_type('variable')) {
            return;
        }

        // On a product page the button submits WooCommerce's own cart form, so
        // `quantity` is the shopper's quantity box. It counts only when the
        // merchant asked for it; otherwise Buy Now buys exactly one.
        $quantity = 1;

        if (! empty($this->getSettings()['respect_quantity']) && isset($_REQUEST['quantity'])) {
            $quantity = max(1, absint(wp_unslash($_REQUEST['quantity'])));
        }

        if (! WC()->cart instanceof \WC_Cart) {
            return;
        }

        $cart    = WC()->cart;
        $cleared = (bool) ($this->getSettings()['clear_cart'] ?? true);
        $before  = $cart->get_cart_contents();
        $coupons = $cart->get_applied_coupons();

        if ($cleared) {
            $cart->empty_cart();
        }

        // Simple products only. This plugin has no way to choose a variation, so
        // it does not accept one: carrying variation handling it could not reach
        // is what WordPress.org reads as a locked feature.
        $added = $cart->add_to_cart($productId, $quantity);

        if ($added === false) {
            // The add failed (stock, validation), so the shopper's cart must not
            // be lost to it. Totals are recalculated so the session stores it.
            if ($cleared) {
                $cart->set_cart_contents($before);
                $cart->set_applied_coupons($coupons);
                $cart->calculate_totals();
            }

            wc_add_notice($this->message('add_failed_text', 'add_failed'), 'error');

            return;
        }

        $redirectUrl = $this->getRedirectUrl();
        $redirectUrl = (string) apply_filters('wppoland_direct_checkout_redirect_url', $redirectUrl, $product, $this->requestKey);
        wp_safe_redirect(wp_validate_redirect($redirectUrl, wc_get_checkout_url()));
        exit;
    }

    public function getRedirectUrl(): string
    {
        $settings = $this->getSettings();
        $target   = (string) ($settings['redirect_target'] ?? 'checkout');

        if ($target === 'cart') {
            return wc_get_cart_url();
        }

        if ($target === 'custom') {
            // Same site only: anything wp_validate_redirect() refuses, or an
            // empty URL, falls back to the checkout.
            $url = trim((string) ($settings['redirect_url'] ?? ''));

            return $url !== '' ? wp_validate_redirect($url, wc_get_checkout_url()) : wc_get_checkout_url();
        }

        return wc_get_checkout_url();
    }

    /**
     * @return array{product_id: int, action_url: string, nonce_field: string, label: string}
     */
    public function getButtonData(\WC_Product $product): array
    {
        return [
            'product_id' => $product->get_id(),
            'action_url' => $this->getActionUrl($product),
            'nonce_field' => wp_create_nonce($this->nonceAction),
            'label' => $this->message('button_text', 'button'),
        ];
    }

    private function renderButton(\WC_Product $product, string $context): void
    {
        ($this->renderTemplate)($this->buttonTemplate, [
            'product' => $product,
            'context' => $context,
            'settings' => $this->getSettings(),
            'button' => $this->getButtonData($product),
            'request_key' => $this->requestKey,
        ]);
    }

    private function getActionUrl(\WC_Product $product): string
    {
        return add_query_arg(
            [
                $this->requestKey => $product->get_id(),
                '_wpnonce' => wp_create_nonce($this->nonceAction),
            ],
            $product->get_permalink(),
        );
    }

    private function isEnabled(): bool
    {
        return (bool) ($this->isEnabled)();
    }

    /**
     * @return array<string, mixed>
     */
    private function getSettings(): array
    {
        $settings = ($this->settings)();

        return is_array($settings) ? $settings : [];
    }

    /**
     * Resolve a string: prefer the settings value at `$settingsKey`, fall back
     * to the injected label at `$labelKey`.
     */
    private function message(string $settingsKey, string $labelKey): string
    {
        $value = $this->getSettings()[$settingsKey] ?? null;

        if (is_string($value) && $value !== '') {
            return $value;
        }

        return $this->labels[$labelKey] ?? '';
    }
}
