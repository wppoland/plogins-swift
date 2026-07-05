<?php
/**
 * Elementor integration service.
 *
 * Registers the Swift Elementor widget(s). The `elementor/widgets/register`
 * action only fires when Elementor is active, so this service is self-guarding:
 * nothing loads unless Elementor is present. Works on Elementor 3.x and 4.0.
 *
 * @package Swift
 */

declare(strict_types=1);

namespace Swift\Service;

use Swift\Contract\HasHooks;
use Swift\Elementor\BuyNowWidget;

defined('ABSPATH') || exit;

/**
 * Wires the Swift widgets into the Elementor editor.
 */
final class ElementorWidgets implements HasHooks
{
    public function registerHooks(): void
    {
        add_action('elementor/widgets/register', [$this, 'register']);
    }

    /**
     * Register widget instances with Elementor's widgets manager.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register($widgets_manager): void
    {
        // Loaded here (not autoloaded) so \Elementor\Widget_Base always exists.
        require_once __DIR__ . '/../Elementor/BuyNowWidget.php';
        $widgets_manager->register(new BuyNowWidget());
    }
}
