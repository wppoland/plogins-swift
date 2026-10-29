<?php

/**
 * The loop Buy Now button must reach block product grids, once.
 *
 * A Product Collection that does not inherit the archive query never fires
 * woocommerce_after_shop_loop_item, so the opt-in loop button was missing on
 * homepage grids. It is now appended after the product-button block, using
 * the block's postId context. Inherited grids on shop templates get the
 * classic hook from WooCommerce itself (blocks marked isInherited), so the
 * filter must leave those alone.
 *
 * Run: php tests/buy-now-block-grid-check.php
 */

declare(strict_types=1);

// phpcs:disable
function add_action(...$a) {}
function add_filter(...$a) { $GLOBALS['filters'][] = $a; }
function absint($v) { return abs((int) $v); }
function wp_create_nonce($a) { return 'n'; }
function add_query_arg($args, $url) { return $url . '?' . http_build_query($args); }

class WC_Product {
    public function __construct(public int $id, public string $type = 'simple') {}
    public function get_id() { return $this->id; }
    public function is_purchasable() { return true; }
    public function is_in_stock() { return true; }
    public function is_type($t) { return $this->type === $t; }
    public function get_permalink() { return 'https://shop.test/p/' . $this->id . '/'; }
}
class WP_Block {
    public function __construct(public array $context) {}
}
function wc_get_product($id) { return $id === 7 ? new WC_Product(7, 'variable') : new WC_Product((int) $id); }

require dirname(__DIR__) . '/lib/storefront-kit/Checkout/DirectCheckoutEngine.php';

$GLOBALS['loop'] = true;
$engine = new Swift\Vendor\StorefrontKit\Checkout\DirectCheckoutEngine(
    'swift_buy_now',
    'swift_buy_now',
    'buy-now-button',
    ['button' => 'Buy now'],
    fn (): bool => true,
    fn (): array => ['show_on_loop' => $GLOBALS['loop']],
    function (string $t, array $v): void { echo '[BUY:' . $v['context'] . ':' . $v['product']->get_id() . ']'; },
);
$engine->registerHooks();

$failures = [];
$btn      = '<div class="wc-block-components-product-button">Add</div>';
$block    = ['blockName' => 'woocommerce/product-button', 'attrs' => []];

if (! in_array(['render_block_woocommerce/product-button', [$engine, 'appendLoopButtonToBlock'], 10, 3], $GLOBALS['filters'], true)) {
    $failures[] = 'the product-button render filter is not registered';
}

if ($engine->appendLoopButtonToBlock($btn, $block, new WP_Block(['postId' => 5])) !== $btn . '[BUY:loop:5]') {
    $failures[] = 'non-inherited grid: button not appended after the product-button block';
}

$inherited = ['blockName' => 'woocommerce/product-button', 'attrs' => ['isInherited' => 1]];
if ($engine->appendLoopButtonToBlock($btn, $inherited, new WP_Block(['postId' => 5])) !== $btn) {
    $failures[] = 'inherited grid: button would render twice next to the classic hook';
}

if ($engine->appendLoopButtonToBlock($btn, $block, new WP_Block(['postId' => 7])) !== $btn) {
    $failures[] = 'variable product got a loop button';
}

if ($engine->appendLoopButtonToBlock($btn, $block, new WP_Block([])) !== $btn) {
    $failures[] = 'block without postId context got a button';
}

$GLOBALS['loop'] = false;
if ($engine->appendLoopButtonToBlock($btn, $block, new WP_Block(['postId' => 5])) !== $btn) {
    $failures[] = 'show_on_loop off but the block grid still got a button';
}

if ($failures !== []) {
    fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
    exit(1);
}

echo "OK: block grids get the loop Buy Now once, inherited grids keep the classic hook\n";
