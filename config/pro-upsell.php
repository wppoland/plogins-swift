<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-swift-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Swift Pro',
    'url'        => 'https://plogins.com/plogins-swift-pro/pricing/',
    'sellable'   => true,
    'price_from' => 29,
    'currency'   => 'EUR',
    'price_pln'  => 129,
    'lead'       => [
        'en' => 'The features below ship in the current PRO release.',
        'pl' => 'Poniższe funkcje są dostępne w bieżącym wydaniu PRO.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Buy Now for variations', 'desc' => 'A Buy Now form on variable product pages, variation selection wired to WooCommerce events, and a dedicated PRO checkout handler.'],
            'pl' => ['title' => 'Kup teraz dla wariantów', 'desc' => 'Formularz Kup teraz na karcie produktu wariantowego, wybór wariacji i własny handler PRO, przycisk aktywny dopiero po wyborze opcji.'],
        ],
        [
            'en' => ['title' => 'Sticky Buy Now bar', 'desc' => 'A bar fixed to the bottom of the viewport on single product pages for quick access while scrolling.'],
            'pl' => ['title' => 'Sticky Buy Now bar', 'desc' => 'Pasek przyklejony u dołu ekranu na karcie produktu, szybki dostęp do Kup teraz podczas przewijania opisu.'],
        ],
        [
            'en' => ['title' => 'Per-product rules', 'desc' => 'Hide Buy Now, set a custom label, or send checkout vs cart per product from the product editor.'],
            'pl' => ['title' => 'Reguły per produkt', 'desc' => 'Ukryj przycisk, ustaw własną etykietę lub wybierz przekierowanie do koszyka albo kasy dla konkretnego produktu.'],
        ],
        [
            'en' => ['title' => 'Express checkout', 'desc' => 'Apple Pay / Google Pay grouped beside Buy Now on single product pages (WooCommerce Payments or Stripe).'],
            'pl' => ['title' => 'Express checkout', 'desc' => 'Apple Pay / Google Pay obok Kup teraz na karcie produktu (WooCommerce Payments lub Stripe).'],
        ],
        [
            'en' => ['title' => 'Loop variable Buy Now', 'desc' => 'Compact attribute dropdowns and a Buy Now button on shop/category archives for variable products (requires free Swift loop placement).'],
            'pl' => ['title' => 'Kup teraz w pętlach sklepu', 'desc' => 'Dropdowny wariantów i przycisk Kup teraz na listach kategorii dla produktów wariantowych (wymaga włączenia pętli w Swift FREE).'],
        ],
        [
            'en' => ['title' => 'Buy Now analytics', 'desc' => 'Track clicks, direct-checkout conversions, conversion rate and attributed revenue per product, WooCommerce → Buy Now Analytics.'],
            'pl' => ['title' => 'Analityka Kup teraz', 'desc' => 'Kliknięcia, konwersje direct checkout, współczynnik konwersji i przychód per produkt, panel WooCommerce → Buy Now Analytics.'],
        ],
    ],
];
