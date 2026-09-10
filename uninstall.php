<?php
/**
 * Uninstall cleanup for Swift - Buy Now Button for WooCommerce.
 *
 * Runs when the plugin is deleted from the WordPress admin. Swift is stateless
 * (no custom tables, no product meta); it stores its settings option, a
 * schema-version marker and the per-user dismissal of the PRO banner. All
 * three are removed here so an uninstall leaves nothing behind. Multisite-aware:
 * the options go on every site in the network, the user meta once, because user
 * meta is global.
 *
 * @package Swift
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

/**
 * Delete the plugin's options on a single site.
 */
function swift_uninstall_cleanup(): void
{
    delete_option('swift_settings');
    delete_option('swift_db_version');
}

if (is_multisite()) {
    $swift_site_ids = get_sites(['fields' => 'ids', 'number' => 0]);

    foreach ($swift_site_ids as $swift_site_id) {
        switch_to_blog((int) $swift_site_id);
        swift_uninstall_cleanup();
        restore_current_blog();
    }

    unset($swift_site_ids, $swift_site_id);
} else {
    swift_uninstall_cleanup();
}

// The PRO banner's dismissal is stored per user, so it belongs to the plugin
// rather than to the site content. User meta is global rather than per-site,
// which is why this sits outside the loop above and uses delete_metadata's
// $delete_all instead.
delete_metadata('user', 0, 'swift_pro_banner_dismissed', '', true);
