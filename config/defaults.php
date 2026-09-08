<?php
/**
 * Default settings, merged under the option key `swift_settings`.
 *
 * The feature ships enabled. The merchant tunes the button label, where it
 * appears (single product and/or shop loop), where it sits relative to the
 * native add-to-cart button, where it redirects (checkout or cart), its visual
 * style and whether the on-page quantity is carried into the purchase.
 *
 * @package Swift
 *
 * @return array<string, mixed>
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

return [
    'enabled' => true,

    // Button label. Empty on purpose: an English sentence here is not a gettext
    // call, so it never reaches the .pot and no language pack can translate it,
    // yet it was merged under the stored option and printed to the shopper.
    // Empty means "use Swift\Service\Texts", which is translated; anything the
    // merchant types still wins and is stored exactly as typed.
    'button_text' => '',

    // Where the button appears. Simple products only in both places: a variable
    // product needs a chosen variation, which this plugin never asks for.
    'show_on_single' => true,
    'show_on_loop'   => false,

    // Single-product placement relative to the native add-to-cart button:
    // `after` (default) or `before`.
    'single_position' => 'after',

    // Where the buyer lands: `checkout` or `cart`.
    'redirect_target' => 'checkout',

    // Empty the cart before adding (single-item buy-now) so checkout shows only
    // the chosen product.
    'clear_cart' => true,

    // Carry the on-page quantity selector value into the Buy Now purchase on
    // single product pages (simple products). Off keeps a quantity of 1.
    'respect_quantity' => false,

    // Visual style for the button: `theme` (inherit), `solid` or `outline`.
    'button_style' => 'theme',

    // Optional accent colour (hex) applied to the `solid`/`outline` styles.
    // Empty string means "use the theme colour".
    'accent_color' => '',

    // Front-end notice shown when add-to-cart fails. Empty for the same reason
    // as `button_text` above: see Swift\Service\Texts for the translated value.
    'add_failed_text' => '',
];
