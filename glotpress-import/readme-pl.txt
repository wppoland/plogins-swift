=== Plogins Swift - Buy Now Button for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, buy now, direct checkout, skip cart, quick buy
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
Requires Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Dodaj przycisk Kup teraz / szybkiego zakupu, który przenosi kupujących prosto do kasy, pomijając koszyk.

== Description ==

Swift dodaje przycisk szybkiego zakupu „Kup teraz” do Twoich produktów WooCommerce. Jedno kliknięcie dodaje produkt do koszyka i odsyła kupującego prosto do kasy, pomijając stronę koszyka, dzięki czemu zakup wymaga jednego kliknięcia zamiast trzech.

Przycisk może pojawiać się na stronach pojedynczych produktów, w pętlach sklepu i archiwum albo w obu miejscach. Ty wybierasz etykietę, cel przekierowania (kasa lub koszyk) oraz to, czy koszyk ma być najpierw opróżniany, aby kupujący finalizował zakup tylko z produktem, który kliknął.

Swift jest bezstanowy: nie przechowuje danych dla poszczególnych produktów i nie tworzy tabel w bazie danych. Obsługuje hooki przycisku, weryfikację nonce, obsługę koszyka i przekierowanie, i nic więcej.

Swift jest rozwijany otwarcie (open source). Kod źródłowy, zgłoszenia błędów i propozycje funkcji znajdziesz na https://github.com/wppoland/plogins-swift.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-swift/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-swift/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-swift
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-swift/issues


= What it does =

* Dodaje przycisk „Kup teraz”, który jednym kliknięciem dodaje do koszyka i przekierowuje.
* Działa na stronach pojedynczych produktów i/lub w pętlach sklepu i archiwum.
* Umieść przycisk <strong>przed lub po</strong> natywnym przycisku „dodaj do koszyka” na stronach pojedynczych produktów.
* Umieść przycisk w dowolnym miejscu za pomocą shortcode’u `[swift_buy_now]` (opcjonalnie wskazując produkt po identyfikatorze).
* Przekierowuje do <strong>kasy</strong> (z pominięciem koszyka) lub do <strong>koszyka</strong>, w zależności od preferencji.
* Opcjonalnie najpierw opróżnia koszyk, więc w kasie widoczny jest tylko wybrany produkt.
* Opcjonalnie <strong>uwzględnia ilość</strong> wybraną na stronie produktu (produkty proste).
* Wybierz <strong>styl</strong> przycisku, domyślny motywu, jednolity lub obrysowany, z opcjonalnym kolorem akcentu.
* Respektuje stan magazynowy i możliwość zakupu; przycisk jest ukryty dla produktów niedostępnych lub niemożliwych do kupienia i nie pojawia się dla produktów zmiennych w pętlach.

= Settings =

Prosta strona ustawień WooCommerce (WooCommerce → Swift Quick Buy) pozwala:

* Włączyć lub wyłączyć przycisk Kup teraz.
* Ustawić etykietę przycisku.
* Wybrać, gdzie pojawia się przycisk (pojedynczy produkt, pętle sklepu lub oba miejsca).
* Wybrać, czy znajduje się przed czy po przycisku „dodaj do koszyka” na stronach pojedynczych produktów.
* Wybrać, dokąd przekierowuje (do kasy lub koszyka).
* Wybrać, czy opróżniać koszyk przed dodaniem.
* Wybrać, czy uwzględniać ilość wybraną na stronie produktu.
* Wybrać styl przycisku (motyw, jednolity, obrysowany) i opcjonalny kolor akcentu.

= Shortcode =

Użyj `[swift_buy_now]`, aby wyświetlić przycisk Kup teraz w dowolnym miejscu, na stronie, we wpisie lub w bloku. Domyślnie wskazuje bieżący produkt; dodaj identyfikator, aby wskazać konkretny produkt prosty:

`[swift_buy_now id="123"]`

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/plogins-swift` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być aktywne.
3. Wejdź w <strong>WooCommerce → Swift Quick Buy</strong>, aby skonfigurować etykietę, położenie i cel przekierowania przycisku.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. Swift wymaga aktywnej instalacji WooCommerce.

= Where does the Buy Now button appear? =

Na stronach pojedynczych produktów i/lub w pętlach produktów w sklepie i archiwum; wybierasz, które, w ustawieniach. W pętlach pojawia się tylko dla produktów prostych, dostępnych w magazynie i możliwych do kupienia.

= Does it skip the cart? =

Tak, jeśli ustawisz cel przekierowania na „Do kasy”. Produkt zostaje dodany do koszyka, a kupujący trafia prosto na stronę kasy. Zamiast tego możesz też wybrać przekierowanie do koszyka.

= Can the Buy Now button empty the cart first? =

Tak. Swift może wyczyścić koszyk przed dodaniem wybranego produktu, aby w bezpośredniej kasie znalazł się tylko produkt kliknięty przez kupującego.

= Does it respect the selected quantity? =

Tak, dla produktów prostych na stronach pojedynczych produktów, gdy włączone jest ustawienie „uwzględniaj ilość”.

= Does it create database tables? =

Nie. Swift jest bezstanowy, przechowuje tylko swoje ustawienia (jedna opcja) i nie tworzy niestandardowych tabel ani meta produktu.

= Does it work with variable products? =

Wersja darmowa jest przeznaczona dla produktów prostych. W pętlach sklepu przycisk pojawia się tylko dla produktów prostych, ponieważ najpierw trzeba wybrać odmianę. Pełna obsługa Kup teraz dla produktów zmiennych (z wbudowanym wyborem odmiany) jest planowana w Swift Pro.

= Can I place the button with a shortcode? =

Tak. Użyj `[swift_buy_now]` dla bieżącego produktu lub `[swift_buy_now id="123"]` dla konkretnego produktu prostego.

== Screenshots ==

1. Przycisk Kup teraz na stronie pojedynczego produktu.
2. Ekran ustawień Swift Quick Buy.

== External Services ==

Swift nie łączy się, nie wysyła danych ani niczego nie ładuje z żadnej usługi zewnętrznej. Nie ma pakietu SDK, klienta API, zdalnej czcionki, CDN ani punktu końcowego analityki, nie ma też połączeń zwrotnych (phone-home) ani sprawdzania licencji, jego CSS i JavaScript są dołączone do wtyczki i ładowane z Twojej własnej witryny.

Cała praca Swifta odbywa się na Twoim serwerze. Odczytuje i zapisuje jedną opcję ustawień (`swift_settings`) oraz znacznik wersji schematu (`swift_db_version`) i nie tworzy niestandardowych tabel bazy danych ani meta produktu. Przycisk Kup teraz dodaje wybrany produkt do koszyka WooCommerce odwiedzającego i przekierowuje go w obrębie Twojej witryny do strony kasy lub koszyka; żadne dane o produkcie, koszyku ani kupującym nie opuszczają Twojej instalacji.

== Translations ==

Plogins Swift zawiera polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki. Domena tekstowa to `plogins-swift`, więc pakiety językowe z WordPress.org mogą też nadpisywać lub rozszerzać te dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.2.1 =
* Zmieniono nazwę na Plogins Swift dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.2.0 =
* Nowość: shortcode `[swift_buy_now]` umożliwiający umieszczenie przycisku Kup teraz w dowolnym miejscu (opcjonalnie wskazanie produktu po identyfikatorze).
* Nowość: wybór, czy przycisk znajduje się przed czy po przycisku „dodaj do koszyka” na stronach pojedynczych produktów.
* Nowość: opcjonalne uwzględnianie ilości wybranej na stronie produktu (produkty proste).
* Nowość: opcje stylu przycisku, domyślny motywu, jednolity lub obrysowany, z opcjonalnym kolorem akcentu.
* Nowość: link „Ustawienia” w wierszu listy wtyczek.
* Nowość: czyszczenie przy odinstalowaniu usuwa opcje wtyczki (z obsługą multisite).
* Ulepszono: przeprojektowana strona ustawień z pogrupowanymi kartami, podglądem przycisku na żywo, wskaźnikiem stanu Na żywo/Wył. oraz dostępnymi podpowiedziami „?” przy każdej opcji.
* Ulepszono: nowoczesne style przycisków dopasowane do motywu w sklepie (niestandardowe właściwości CSS, obsługa trybu ciemnego, przejścia bezpieczne przy ograniczonym ruchu) bez przeskoków układu.
* Ulepszono: dostępność, podpowiedzi obsługiwane z klawiatury, widoczne style fokusu i role ARIA w całym panelu administracyjnym.
* Ulepszono: niezawodność, przycisk nigdy nie renderuje się w błędnym stanie dla produktów niemożliwych do kupienia, a kolor akcentu jest ograniczony do własnych przycisków Swifta.

= 0.1.0 =
* Pierwsza wersja: przycisk Kup teraz dla WooCommerce, który dodaje do koszyka i przekierowuje bezpośrednio do kasy (lub koszyka), ze stroną ustawień etykiety, położenia i celu przekierowania.
