<?php

declare(strict_types=1);

namespace Swift\Service;

defined('ABSPATH') || exit;

/**
 * The customer-facing strings a merchant may override, in the language of the
 * site.
 *
 * They used to be English sentences in config/defaults.php. A string in a config
 * array is never wrapped in a gettext call, so it never reaches the .pot and no
 * translator can translate it. Worse, the defaults were merged UNDER the stored
 * option and handed straight to the storefront, so the packaged English won even
 * on a shop with a complete language pack, and the moment the merchant saved the
 * settings screen that English was written into `swift_settings` for good.
 *
 * The packaged default is now empty, meaning "use the string below". A merchant
 * who types their own still wins, and what they typed is stored as typed.
 */
final class Texts
{
    /**
     * Setting key => the translated default.
     *
     * @return array<string, string>
     */
    public static function defaults(): array
    {
        return [
            'button_text'     => __('Buy now', 'plogins-swift'),
            'add_failed_text' => __('Sorry, this product could not be added to your cart.', 'plogins-swift'),
        ];
    }

    /**
     * Fill every empty text key with its translated default.
     *
     * Applied on the way OUT, where the string is about to be shown, and never
     * on the way in: writing the resolved text back to the option would freeze
     * one language into the database, which is the bug this class exists to fix.
     *
     * @param array<string, mixed> $settings
     * @return array<string, mixed>
     */
    public static function apply(array $settings): array
    {
        foreach (self::defaults() as $key => $text) {
            if (trim((string) ($settings[$key] ?? '')) === '') {
                $settings[$key] = $text;
            }
        }

        return $settings;
    }
}
