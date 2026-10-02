<?php

/**
 * The single-product Buy Now button must not be a form of its own.
 *
 * It renders on woocommerce_after_add_to_cart_button, which sits inside
 * WooCommerce's cart form. A nested <form> is dropped by the HTML parser, so
 * its hidden fields joined the cart form: the native Add to cart button then
 * also posted the Buy Now key, emptied the cart and redirected to checkout.
 *
 * It also must actually receive context 'single'. renderTemplate() used to
 * take its variables as `$context`, so extract(EXTR_SKIP) kept the array and
 * the template never saw the context at all.
 *
 * Run: php tests/buy-now-single-button-check.php
 */

declare(strict_types=1);

// phpcs:disable
define('ABSPATH', __DIR__ . '/');
define('SWIFT_DIR', dirname(__DIR__) . '/');

function __($text, $domain = null) { return $text; }
function esc_attr($text) { return htmlspecialchars((string) $text, ENT_QUOTES); }
function esc_html($text) { return htmlspecialchars((string) $text, ENT_QUOTES); }
function esc_url($url) { return htmlspecialchars((string) $url, ENT_QUOTES); }

require SWIFT_DIR . 'src/Contract/HasHooks.php';
require SWIFT_DIR . 'src/Service/SwiftService.php';

$service = (new ReflectionClass(Swift\Service\SwiftService::class))->newInstanceWithoutConstructor();
$render  = new ReflectionMethod($service, 'renderTemplate');

$vars = static fn (string $context): array => [
    'product'     => null,
    'context'     => $context,
    'settings'    => ['button_style' => 'theme'],
    'button'      => ['product_id' => 13, 'action_url' => 'https://shop.test/p/?swift_buy_now=13&_wpnonce=abc', 'nonce_field' => 'abc', 'label' => 'Buy now'],
    'request_key' => 'swift_buy_now',
];

$failures = [];

ob_start();
$render->invoke($service, 'buy-now-button', $vars('single'));
$single = (string) ob_get_clean();

if (str_contains($single, '<form')) {
    $failures[] = 'single: the button opens its own <form> inside the cart form';
}
if (! str_contains($single, 'name="swift_buy_now" value="13"')) {
    $failures[] = 'single: the submit button does not carry the Buy Now key';
}
if (! str_contains($single, 'formaction="https://shop.test/p/?swift_buy_now=13&amp;_wpnonce=abc"')) {
    $failures[] = 'single: no formaction with the nonce';
}
if (str_contains($single, 'type="hidden"')) {
    $failures[] = 'single: hidden fields would ride along with the native Add to cart button';
}

ob_start();
$render->invoke($service, 'buy-now-button', $vars('loop'));
$loop = (string) ob_get_clean();

if (! str_contains($loop, 'swift-buy-now--loop') || ! str_contains($loop, '<form')) {
    $failures[] = 'loop: expected a standalone form marked swift-buy-now--loop';
}

if ($failures !== []) {
    fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
    exit(1);
}

echo "OK: single Buy Now rides the cart form, loop keeps its own form\n";
