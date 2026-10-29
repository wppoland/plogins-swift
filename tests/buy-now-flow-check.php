<?php

/**
 * Buy Now failure paths, redirect target and the respect_quantity upgrade.
 *
 * 1. A stale nonce (cached page) used to return silently: the click did
 *    nothing. It must leave an error notice.
 * 2. The cart was emptied before the add, so a failed add lost the shopper's
 *    cart. It must be put back, coupons included.
 * 3. A custom redirect is same-site only and falls back to the checkout.
 * 4. respect_quantity defaults on for new installs only: an upgraded shop that
 *    never saved the setting keeps it off, a saved value is left alone.
 *
 * Tests the shipped engine in lib/ (the local vendor/ copy is dev-only).
 *
 * Run: php tests/buy-now-flow-check.php
 */

declare(strict_types=1);

// phpcs:disable
namespace Swift {
    const VERSION = '1.1.0';
}

namespace {
    define('ABSPATH', __DIR__ . '/');

    $GLOBALS['notices'] = [];
    $GLOBALS['options'] = [];
    $GLOBALS['nonce_ok'] = true;
    $GLOBALS['add_ok'] = false;

    function sanitize_text_field($v) { return (string) $v; }
    function wp_unslash($v) { return $v; }
    function absint($v) { return abs((int) $v); }
    function wp_verify_nonce($n, $a) { return $GLOBALS['nonce_ok']; }
    function wc_add_notice($m, $t) { $GLOBALS['notices'][] = [$t, $m]; }
    function wc_get_checkout_url() { return 'https://shop.test/checkout/'; }
    function wc_get_cart_url() { return 'https://shop.test/cart/'; }
    function wp_validate_redirect($url, $fallback = '') {
        $host = parse_url($url, PHP_URL_HOST);
        return ($host === null && str_starts_with($url, '/')) || $host === 'shop.test' ? $url : $fallback;
    }
    function get_option($k, $d = false) { return $GLOBALS['options'][$k] ?? $d; }
    function update_option($k, $v, $a = null) { $GLOBALS['options'][$k] = $v; return true; }

    class WC_Product {
        public function is_purchasable() { return true; }
        public function is_in_stock() { return true; }
        public function is_type($t) { return false; }
    }
    function wc_get_product($id) { return new WC_Product(); }

    class WC_Cart {
        public array $contents = ['k1' => ['product_id' => 5, 'quantity' => 2]];
        public array $coupons = ['SAVE10'];
        public function get_cart_contents() { return $this->contents; }
        public function get_applied_coupons() { return $this->coupons; }
        public function set_cart_contents($c) { $this->contents = $c; }
        public function set_applied_coupons($c) { $this->coupons = $c; }
        public function empty_cart() { $this->contents = []; $this->coupons = []; }
        public function add_to_cart($id, $qty) { return $GLOBALS['add_ok'] ? 'key' : false; }
        public function calculate_totals() {}
    }
    $GLOBALS['cart'] = new WC_Cart();
    function WC() { return (object) ['cart' => $GLOBALS['cart']]; }

    $dir = dirname(__DIR__) . '/';
    require $dir . 'lib/storefront-kit/Checkout/DirectCheckoutEngine.php';
    require $dir . 'src/Migrator.php';

    $settings = ['clear_cart' => true, 'redirect_target' => 'checkout', 'redirect_url' => ''];
    $engine = new Swift\Vendor\StorefrontKit\Checkout\DirectCheckoutEngine(
        requestKey: 'swift_buy_now',
        nonceAction: 'swift_buy_now',
        buttonTemplate: 'buy-now-button',
        labels: ['button' => 'Buy now', 'add_failed' => 'Add failed', 'nonce_failed' => 'Page too old'],
        isEnabled: static fn (): bool => true,
        settings: static function () use (&$settings): array { return $settings; },
        renderTemplate: static function (string $t, array $c): void {},
    );

    $failures = [];
    $check = static function (bool $ok, string $msg) use (&$failures): void {
        if (! $ok) {
            $failures[] = $msg;
        }
    };

    // 1. Stale nonce.
    $_REQUEST = ['swift_buy_now' => '13', '_wpnonce' => 'stale'];
    $GLOBALS['nonce_ok'] = false;
    $engine->handleBuyNow();
    $check($GLOBALS['notices'] === [['error', 'Page too old']], 'stale nonce: expected one error notice');
    $check(count($GLOBALS['cart']->contents) === 1, 'stale nonce: the cart must not be touched');

    // 2. Failed add puts the cart back.
    $GLOBALS['notices'] = [];
    $GLOBALS['nonce_ok'] = true;
    $engine->handleBuyNow();
    $check($GLOBALS['cart']->contents === ['k1' => ['product_id' => 5, 'quantity' => 2]], 'failed add: the previous cart must be restored');
    $check($GLOBALS['cart']->coupons === ['SAVE10'], 'failed add: coupons must be restored');
    $check($GLOBALS['notices'] === [['error', 'Add failed']], 'failed add: expected the add_failed notice');

    // 3. Redirect targets.
    $check($engine->getRedirectUrl() === 'https://shop.test/checkout/', 'checkout target');
    $settings['redirect_target'] = 'cart';
    $check($engine->getRedirectUrl() === 'https://shop.test/cart/', 'cart target');
    $settings['redirect_target'] = 'custom';
    $settings['redirect_url'] = 'https://shop.test/thank-you/';
    $check($engine->getRedirectUrl() === 'https://shop.test/thank-you/', 'custom same-site URL');
    $settings['redirect_url'] = 'https://evil.test/';
    $check($engine->getRedirectUrl() === 'https://shop.test/checkout/', 'custom off-site URL must fall back to checkout');
    $settings['redirect_url'] = '';
    $check($engine->getRedirectUrl() === 'https://shop.test/checkout/', 'custom with no URL must fall back to checkout');

    // 4. Migrator: fresh, upgraded never-saved, upgraded without settings, saved.
    $migrate = static function (array $options): array {
        $GLOBALS['options'] = $options;
        (new Swift\Migrator())->maybeMigrate();
        return $GLOBALS['options'];
    };

    $fresh = $migrate([]);
    $check(! isset($fresh['swift_settings']), 'fresh install: settings must stay unset so the new default (on) applies');

    $old = $migrate(['swift_db_version' => '1.0.21', 'swift_settings' => ['enabled' => true]]);
    $check(($old['swift_settings']['respect_quantity'] ?? null) === false, 'upgrade without the key: respect_quantity must be stored off');

    $bare = $migrate(['swift_db_version' => '1.0.21']);
    $check(($bare['swift_settings']['respect_quantity'] ?? null) === false, 'upgrade without settings: respect_quantity must be stored off');

    $saved = $migrate(['swift_db_version' => '1.0.21', 'swift_settings' => ['respect_quantity' => true]]);
    $check($saved['swift_settings']['respect_quantity'] === true, 'a saved respect_quantity must be left alone');

    if ($failures) {
        fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
        exit(1);
    }

    echo "OK: Buy Now failure paths, redirect target, respect_quantity upgrade\n";
}
