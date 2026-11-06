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
function wp_enqueue_style($handle) {}
// Minimal filter bus: callbacks receive every argument, like add_filter(..., 3).
function add_filter($hook, $cb) { $GLOBALS['wp_filters'][$hook][] = $cb; }
function apply_filters($hook, $value, ...$args) {
    $GLOBALS['fired'][$hook][] = $args;
    foreach ($GLOBALS['wp_filters'][$hook] ?? [] as $cb) { $value = $cb($value, ...$args); }
    return $value;
}

require SWIFT_DIR . 'src/Contract/HasHooks.php';
require SWIFT_DIR . 'src/Service/SwiftService.php';

$service = (new ReflectionClass(Swift\Service\SwiftService::class))->newInstanceWithoutConstructor();
$render  = new ReflectionMethod($service, 'renderTemplate');

$vars = static fn (string $context): array => [
    'product'     => 'product-13',
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

// Extension points: PRO per-product Hide and Label rules hang on these.
foreach (['swift_buy_now_should_render', 'swift_buy_now_button_label'] as $hook) {
    if (($GLOBALS['fired'][$hook][0] ?? null) !== ['product-13', 'single']) {
        $failures[] = $hook . ': not fired with (product, context)';
    }
}

add_filter('swift_buy_now_button_label', static fn ($label, $product, $context) => 'Grab it ' . $context);
ob_start();
$render->invoke($service, 'buy-now-button', $vars('loop'));
$labelled = (string) ob_get_clean();
if (! str_contains($labelled, '>Grab it loop<')) {
    $failures[] = 'swift_buy_now_button_label: the filtered label is not rendered';
}

add_filter('swift_buy_now_should_render', static fn ($show, $product, $context) => $context !== 'shortcode');
ob_start();
$render->invoke($service, 'buy-now-button', $vars('shortcode'));
$hidden = (string) ob_get_clean();
if (trim($hidden) !== '') {
    $failures[] = 'swift_buy_now_should_render: returning false still renders the button';
}

if ($failures !== []) {
    fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
    exit(1);
}

echo "OK: single Buy Now rides the cart form, loop keeps its own form, render and label filters fire\n";
