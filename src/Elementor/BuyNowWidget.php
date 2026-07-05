<?php
/**
 * Elementor widget: Buy Now Button.
 *
 * A thin wrapper around the [swift_buy_now] shortcode so the Buy Now button can
 * be placed with the Elementor editor. Kept deliberately minimal (renders the
 * shortcode) so a future migration to Elementor v4 atomic widgets is localized
 * to this class. Loaded only from the `elementor/widgets/register` hook, so the
 * `\Elementor\Widget_Base` base class is guaranteed to exist here. Works on
 * Elementor 3.x and 4.0.
 *
 * @package Swift
 */

declare(strict_types=1);

namespace Swift\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

defined('ABSPATH') || exit;

/**
 * Buy Now Button Elementor widget.
 */
final class BuyNowWidget extends Widget_Base
{
    /**
     * Widget machine name (matches the shortcode).
     */
    public function get_name(): string
    {
        return 'swift_buy_now';
    }

    /**
     * Widget label shown in the editor.
     */
    public function get_title(): string
    {
        return esc_html__('Buy Now Button', 'plogins-swift');
    }

    /**
     * Editor panel icon.
     */
    public function get_icon(): string
    {
        return 'eicon-cart-medium';
    }

    /**
     * Editor panel categories.
     *
     * @return string[]
     */
    public function get_categories(): array
    {
        return ['woocommerce-elements', 'general'];
    }

    /**
     * Search keywords in the editor.
     *
     * @return string[]
     */
    public function get_keywords(): array
    {
        return ['swift', 'buy now', 'checkout', 'quick buy', 'add to cart', 'woocommerce'];
    }

    /**
     * Register the editor controls.
     */
    protected function register_controls(): void
    {
        $this->start_controls_section(
            'content',
            ['label' => esc_html__('Buy Now button', 'plogins-swift')]
        );

        $this->add_control(
            'product_id',
            [
                'label'       => esc_html__('Product ID', 'plogins-swift'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 0,
                'min'         => 0,
                'description' => esc_html__('Leave 0 to use the current product on a product page.', 'plogins-swift'),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget on the front end and in the editor preview.
     */
    protected function render(): void
    {
        $settings   = $this->get_settings_for_display();
        $product_id = isset($settings['product_id']) ? absint($settings['product_id']) : 0;

        echo do_shortcode(sprintf('[swift_buy_now id="%d"]', $product_id));
    }
}
