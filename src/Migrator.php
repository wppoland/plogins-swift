<?php

declare(strict_types=1);

namespace Swift;

defined('ABSPATH') || exit;

/**
 * Idempotent schema/version migrations, run on every boot. Compares a stored
 * option against VERSION and applies forward steps as needed.
 */
final class Migrator
{
    private const OPTION = 'swift_db_version';

    private const SETTINGS = 'swift_settings';

    /**
     * The English strings that shipped as packaged defaults up to 1.0.15 and
     * could be written into the option by any save of the settings screen.
     *
     * @var array<string, string>
     */
    private const LEGACY_TEXTS = [
        'button_text'     => 'Buy now',
        'add_failed_text' => 'Sorry, this product could not be added to your cart.',
    ];

    public function maybeMigrate(): void
    {
        $current = (string) get_option(self::OPTION, '0');

        if (version_compare($current, VERSION, '>=')) {
            return;
        }

        $this->clearUntranslatableTexts();
        $this->keepQuantityOffOnUpgrade($current);

        update_option(self::OPTION, VERSION, false);
    }

    /**
     * 1.1.0 turned "Respect quantity" on for new installs. A shop that ran an
     * older version and never saved that setting got it off from the old
     * default, so it is written down as off here and its behaviour does not
     * change under it. A setting the merchant saved is left alone.
     *
     * A fresh install has no version marker and no settings, and gets the new
     * default. An install older than 1.0.16 (no marker yet) that never saved
     * its settings cannot be told apart from a fresh one.
     */
    private function keepQuantityOffOnUpgrade(string $from): void
    {
        if (version_compare($from, '1.1.0', '>=')) {
            return;
        }

        $stored = get_option(self::SETTINGS, null);

        if (! is_array($stored)) {
            if ($from === '0') {
                return;
            }

            $stored = [];
        }

        if (array_key_exists('respect_quantity', $stored)) {
            return;
        }

        $stored['respect_quantity'] = false;
        update_option(self::SETTINGS, $stored, null);
    }

    /**
     * Clear a stored string that is byte for byte the old English default.
     *
     * Those values could never be translated: they came from a config array,
     * not a gettext call, so a shop running in Polish printed English however
     * complete the language pack was. Empty means "use the translated default",
     * which is what the settings screen already promised.
     *
     * Only an exact match is cleared, so a merchant's own wording, including a
     * hand translation of the English one, survives untouched.
     */
    private function clearUntranslatableTexts(): void
    {
        $stored = get_option(self::SETTINGS, null);

        if (! is_array($stored)) {
            return;
        }

        $changed = false;

        foreach (self::LEGACY_TEXTS as $key => $legacy) {
            if (isset($stored[$key]) && is_string($stored[$key]) && $stored[$key] === $legacy) {
                $stored[$key] = '';
                $changed      = true;
            }
        }

        if ($changed) {
            // null keeps the option's existing autoload flag. Passing false here
            // would quietly move the settings out of the autoloaded set on every
            // shop that took this update, which is not a change a text sweep gets
            // to make.
            update_option(self::SETTINGS, $stored, null);
        }
    }
}
