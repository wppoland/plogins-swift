=== Swift - Buy Now Button for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, buy now, direct checkout, skip cart, quick buy
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 8.1
Stable tag: 1.1.3
Requires Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add a Buy Now / quick buy button that takes shoppers straight to checkout, skipping the cart.

== Description ==

Swift adds a "Buy Now" quick buy button to your WooCommerce products. One click adds the product to the cart and sends the shopper straight to checkout, skipping the cart page so a purchase takes one click instead of three.

The button can appear on single product pages, on shop and archive loops, or both. You choose the label, where it redirects (checkout, cart or another page on your site), and whether the cart is emptied first so the buyer checks out with only the product they clicked.

Swift is stateless: it stores no per-product data and creates no database tables. It handles the button hooks, nonce verification, cart handling and redirect, and nothing else.

Swift is developed in the open. Source code, bug reports and feature requests live at [github.com/wppoland/plogins-swift](https://github.com/wppoland/plogins-swift).

= Documentation and links =

* **Documentation**: [plogins.com/plogins-swift/docs/](https://plogins.com/plogins-swift/docs/)
* **Plugin page**: [plogins.com/plogins-swift/](https://plogins.com/plogins-swift/)
* **Source code**: [github.com/wppoland/plogins-swift](https://github.com/wppoland/plogins-swift)
* **Bug reports and feature requests**: [github.com/wppoland/plogins-swift/issues](https://github.com/wppoland/plogins-swift/issues)
* **Swift Pro**: [plogins.com/plogins-swift-pro/](https://plogins.com/plogins-swift-pro/)


= What it does =

* Adds a "Buy Now" button that adds-to-cart and redirects in one click.
* Works on single product pages and/or shop and archive loops.
* Place the button **before or after** the native add-to-cart button on single product pages.
* Drop the button anywhere with the `[swift_buy_now]` shortcode or the Elementor "Buy Now Button" widget (optionally targeting a product by id).
* Redirects to the **checkout** (skip the cart), the **cart**, or a **custom page** on your own site.
* Optionally empties the cart first so checkout shows only the chosen product.
* Optionally **respects the quantity** chosen on the product page (simple products).
* Pick a button **style**, theme default, solid, or outline, with an optional accent colour.
* Honours stock and purchasability, the button is hidden for out-of-stock or non-purchasable products, and is not shown for variable products.

= Settings =

A simple WooCommerce settings page (WooCommerce > Buy Now Button) lets you:

* Enable or disable the Buy Now button.
* Set the button label.
* Choose where the button appears (single product, shop loops, or both).
* Choose whether it sits before or after the add-to-cart button on single products.
* Choose where it redirects (checkout, cart, or a custom page on your own site).
* Choose whether to empty the cart before adding.
* Choose whether to respect the quantity selected on the product page.
* Pick a button style (theme, solid, outline) and an optional accent colour.

= Shortcode and Elementor =

Use `[swift_buy_now]` to render the Buy Now button anywhere, inside a page, post or block. It targets the current product by default; add an id to target a specific simple product:

`[swift_buy_now id="123"]`

If Elementor is active, the same button is available as a "Buy Now Button" widget. The Product ID control is the shortcode's `id` argument: leave it at 0 on a product page.

== Swift Pro ==

Swift Pro is a separate paid plugin that extends Swift:

| Feature | Free | Pro |
|:--- |:---:|:---:|
| Buy Now button | Yes | Yes |
| Cart skipping | Yes | Yes |
| Cart clearing | Yes | Yes |
| Configurable label | Yes | Yes |
| Redirect target | Yes | Yes |
| Buy Now for variations | - | Yes |
| Sticky Buy Now bar | - | Yes |
| Per-product rules | - | Yes |
| Express checkout | - | Yes |
| Loop variable Buy Now | - | Yes |
| Buy Now analytics | - | Yes |

The free edition is not a trial and its features stay available without a time limit.

* **Swift Pro** - [plogins.com/plogins-swift-pro/](https://plogins.com/plogins-swift-pro/)
* **Compare editions and pricing** - [plogins.com/plogins-swift-pro/pricing/](https://plogins.com/plogins-swift-pro/pricing/)
* **PRO documentation** - [plogins.com/plogins-swift-pro/docs/](https://plogins.com/plogins-swift-pro/docs/)

== Installation ==

1. Upload the plugin to `/wp-content/plugins/plogins-swift`, or install via Plugins > Add New.
2. Activate it. WooCommerce must be active.
3. Visit **WooCommerce > Buy Now Button** to configure the button label, placement and redirect target.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Yes. Swift requires an active WooCommerce installation.

= Where does the Buy Now button appear? =

On single product pages and/or shop and archive product loops; you choose which in the settings. Everywhere it shows, it is shown only for simple, in-stock, purchasable products.

= Does it skip the cart? =

Yes, if you set the redirect target to "Checkout". The product is added to the cart and the shopper is taken straight to the checkout page. You can also choose to redirect to the cart, or to a custom page on your own site, instead.

= Can the Buy Now button empty the cart first? =

Yes. Swift can clear the cart before adding the selected product, so direct checkout contains only the item the shopper clicked.

= Does it respect the selected quantity? =

Yes for simple products on single product pages, when the "respect quantity" setting is enabled. It is on by default for new installs; shops that ran an older version keep the setting they had.

= Does it create database tables? =

No. Swift is stateless, it stores only its settings (one option) and creates no custom tables or product meta.

= Does it work with variable products? =

The free version is designed for simple products. The button is shown for simple products only, on single product pages as well as on loops, since a variation must be chosen first. Buy Now for variable products, with an inline variation picker on the product page and in shop loops, ships in Swift PRO.

= Can I place the button with a shortcode or Elementor? =

Yes. Use `[swift_buy_now]` for the current product or `[swift_buy_now id="123"]` for a specific simple product. The same control is the Elementor "Buy Now Button" widget when Elementor is active.

== Screenshots ==

1. The Buy Now button on a single product page.
2. The Buy Now Button settings screen.

== External Services ==

Swift does not connect to, send data to, or load anything from any external service. There is no SDK, no API client, no remote font, CDN or analytics endpoint, and no phone-home or licensing check, its CSS and JavaScript are bundled with the plugin and enqueued from your own site.

All of Swift's work happens on your server. It reads and writes a single settings option (`swift_settings`) and a schema-version marker (`swift_db_version`), and creates no custom database tables and no product meta. The Buy Now button adds the chosen product to the visitor's own WooCommerce cart and redirects them within your site to your checkout, your cart or a page on your site you chose; nothing about the product, the cart or the shopper leaves your installation.

== Translations ==

Swift is fully translatable and ships the `plogins-swift.pot` template. Translations are delivered by WordPress.org language packs built from translate.wordpress.org, and none has been published for Swift yet, so the interface is currently English in every locale. The package itself carries no compiled translation files.

== Changelog ==

= 1.1.3 =
* Readme only: a PRO section with links to the paid edition.

= 1.1.2 =
* Fix: with "Shop & archive loops" on, the Buy Now button now also appears in block product grids that do not follow the shop query, such as a Product Collection on the homepage. It sits after the grid's Add to cart button and never shows twice on shop and category pages.

= 1.1.1 =
* Fix: saving the settings page now shows the "Settings saved." confirmation. Before, a successful save gave no feedback at all.

= 1.1.0 =
* New: a third redirect target, a custom page on your own site. Addresses on other sites are refused when saving, and anything that fails the same check at checkout time sends the shopper to the checkout.
* Changed: "Respect quantity" is on by default for new installs. Existing shops keep the value they had.
* Fixed: a Buy Now click from a cached page with an expired security token did nothing. It now shows a notice and the page it lands on works on the next click.
* Fixed: with "Empty the cart first" on, a Buy Now that could not add the product (out of stock, validation) still emptied the shopper's cart. The cart and its coupons are now put back.

= 1.0.21 =
* Fixed: on a product page the native Add to cart button acted as Buy Now. The Buy Now button was a form nested inside WooCommerce's cart form, which browsers flatten, so its fields went out with every Add to cart click: the cart was emptied, the quantity reset to 1 and the shopper was sent to checkout.
* Fixed: with the button placed before Add to cart, the nested form closed the cart form early and Add to cart did nothing.
* Fixed: "Respect quantity" never applied. The template never received its context, so the quantity script had no form to attach to. The button now submits the cart form itself, so the quantity box is read directly and the script is gone.

= 1.0.20 =
* The upgrade notice's "Coming soon" and "Get notified" labels are English source strings for every language; Polish sites used to get their own Polish source text, which translators in other languages then saw untranslated.

= 1.0.19 =
* Fixed: the PRO upgrade promo kept selling to people who had already bought the paid edition. Only the banner could be dismissed, so the sidebar promo and the locked feature cards followed a paying customer around for good. The promo now checks whether the paid edition is active and steps aside when it is.
* Fixed: arrow glyphs in the admin menu paths, and in the strings handed to translators. An arrow inside a translatable string makes the glyph every translator's problem and changes the layout in any locale that drops it.

= 1.0.18 =
* Changed: the PRO feature cards printed an arrow glyph in menu paths where the rest of the plugin and the documentation use a plain ">". Same navigation, one character that renders everywhere.

= 1.0.17 =
* Fixed: deleting the plugin left the per-user "dismiss" flag from the PRO notice in the database. Uninstall now removes it for every user, not just the one who dismissed it.

= 1.0.16 =
* Fixed: the "Buy now" button label and the "Sorry, this product could not be added to your cart." notice were plain English text in a config file, not translatable strings. They were never in the translation template, so no language pack could reach them: a shop running in Polish, German, Spanish, French or Italian showed those two strings in English, and saving the settings screen once wrote the English into the database permanently. Both are translatable now and follow the site language as soon as a translation exists, and a stored value that is still exactly the old English default is cleared on update so a translation can take over. Translations come from WordPress.org language packs rather than in this download, so both stay English until a pack is published. A label you typed yourself, including your own translation of it, is left exactly as you typed it.
* Settings: the button label field now shows the translated default as its placeholder, so it is clear what an empty field will render.

= 1.0.15 =
* Translations: added complete French and Italian, and refreshed Polish, German and Spanish for the current plugin interface and readme. Fixed three carry-over mistakes in the existing Polish, German and Spanish files: the plugin name was mistranslated as a description sentence instead of kept as-is, the plugin page URL pointed at the pre-rename slug, and "WPPoland.com" was shortened to "WPPoland".
* Fixed: the "WooCommerce is required" admin notice and the uninstall cleanup comment still named the plugin "Swift, Quick Buy" from before the rename; the settings menu label under WooCommerce still read "Swift Quick Buy" instead of "Buy Now Button".

= 1.0.14 =
* Fixed: the plugin reported an older version number internally than the one it was released under. That number versions the stylesheets and scripts the admin screen loads, so a browser holding the previous files kept them after an update instead of fetching the corrected ones.

= 1.0.13 =
* Declared compatibility with WooCommerce 11.0.

= 1.0.12 =
* Fixed the PRO promo on the settings screen quoting a price in PLN. PRO is priced and charged in EUR, so an admin on a Polish site was shown a zloty amount and then billed in euro, and the zloty figure was a fixed conversion that drifted from the real charge as the rate moved. The promo now shows the euro price that is actually taken.

= 1.0.11 =
* New: Elementor "Buy Now Button" widget. Same output as the `[swift_buy_now]` shortcode, loaded only when Elementor is active.

= 1.0.10 =
* Clearing the button label now works. The field says leaving it empty restores the default "Buy now", but the old label was quietly kept and your storefront went on showing it. Empty means "Buy now" again.
* The Buy Now button no longer appears on variable product pages, where it could not work. Clicking it gave the shopper an error notice instead of a checkout, because a variation has to be chosen first. The placement setting and the FAQ now say plainly that Swift covers simple products.

= 1.0.9 =
* Removed variation handling that this plugin had no way to reach. The bundled checkout engine accepted a `variation_id` on the request while nothing here could choose a variation, and the code said the capability belonged to the paid edition. Swift is a Buy Now button for simple products and the package now contains only that.
* The accent colour is re-validated when it is written into the stylesheet, instead of being trusted from storage. The settings screen already sanitised it on save, but an option can also be set by a migration, WP-CLI or another plugin.

= 1.0.8 =
* Corrected the Translations section. It said the package bundles Polish, German and Spanish files; it does not, and must not: .distignore strips every .po and .mo because WordPress.org serves translations from translate.wordpress.org. The .pot template ships as before.
* The build now names the package folder from the plugin's Text Domain instead of the local checkout directory, so the artifact is plogins-swift rather than swift.

= 1.0.4 =
* Translations: completed Polish, German and Spanish for the PRO upgrade panel.

= 1.0.3 =
* Fixed low-contrast admin headings under an OS dark-mode preference.

= 1.0.2 =
* Added bundled Polish, German and Spanish translations for the plugin interface.

= 1.0.1 =
* First stable release.

= 0.2.1 =
* Renamed to Plogins Swift for WooCommerce for a more distinctive plugin name.

= 0.2.0 =
* New: `[swift_buy_now]` shortcode to place the Buy Now button anywhere (optionally targeting a product by id).
* New: choose whether the button sits before or after the add-to-cart button on single product pages.
* New: optionally respect the quantity chosen on the product page (simple products).
* New: button style options, theme default, solid, or outline, with an optional accent colour.
* New: "Settings" link in the plugins list row.
* New: uninstall cleanup removes the plugin's options (multisite-aware).
* Improved: redesigned settings page with grouped cards, a live button preview, a Live/Off status indicator, and accessible "?" help tooltips on every option.
* Improved: modern, themeable storefront button styles (CSS custom properties, dark-mode support, reduced-motion-safe transitions) with no layout shift.
* Improved: accessibility, keyboard-operable help tooltips, visible focus styles, and ARIA roles throughout the admin.
* Improved: robustness, the button never renders in a broken state for unpurchasable products, and the accent colour is scoped to Swift's own buttons.

= 0.1.0 =
* Initial release: a Buy Now button for WooCommerce that adds to cart and redirects straight to checkout (or cart), with a settings page for the label, placement and redirect target.
