=== Plogins Swift - Buy Now Button for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, buy now, direct checkout, skip cart, quick buy
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
Wymaga wtyczek: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Dodaj przycisk Kup teraz / szybkiego zakupu, który przeniesie kupujących bezpośrednio do kasy, pomijając koszyk.

== Description ==

Swift dodaje przycisk szybkiego zakupu „Kup teraz” do Twoich produktów WooCommerce. Jedno kliknięcie dodaje produkt do koszyka i odsyła kupującego bezpośrednio do kasy, pomijając stronę koszyka, dzięki czemu zakup wymaga jednego kliknięcia zamiast trzech.

Przycisk może pojawić się na stronach pojedynczych produktów, w pętlach sklepu i archiwum lub na obu. Ty wybierasz etykietę, dokąd przekierowuje (do kasy lub koszyk) i czy koszyk ma zostać opróżniony jako pierwszy, tak aby kupujący finalizował zakup tylko z produktem, który kliknął.

Swift jest bezstanowy: nie przechowuje danych dotyczących poszczególnych produktów i nie tworzy tabel w bazie danych. Obsługuje zaczepy na przyciski, weryfikację nonce, obsługę koszyka i przekierowania i nic więcej.

Swift jest rozwijany na otwartej przestrzeni. Kod źródłowy, raporty o błędach i prośby o nowe funkcje są dostępne na https://github.com/wppoland/plogins-swift.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-swift/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-swift/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-swift
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-swift/issues


= What it does =

* Dodaje przycisk „Kup teraz”, który dodaje do koszyka i przekierowuje jednym kliknięciem.
* Działa na stronach pojedynczych produktów i/lub w pętlach sklepu i archiwum.
* Umieść przycisk <strong>przed lub po</strong> natywnym przycisku „dodaj do koszyka” na stronach pojedynczych produktów.
* Upuść przycisk w dowolnym miejscu za pomocą krótkiego kodu `[swift_buy_now]` (opcjonalnie kierowanie na produkt według identyfikatora).
* Przekierowuje do <strong>kasy</strong> (pomiń koszyk) lub do <strong>koszyka</strong>, w zależności od preferencji.
* Opcjonalnie najpierw opróżnia koszyk, więc w kasie widoczny jest tylko wybrany produkt.
* Opcjonalnie <strong>uwzględnia ilość</strong> wybraną na stronie produktu (proste produkty).
* Wybierz przycisk <strong>styl</strong>, motyw domyślny, jednolity lub kontur z opcjonalnym kolorem akcentu.
* Honoruje zapasy i możliwość zakupu, przycisk jest ukryty w przypadku produktów niedostępnych lub niemożliwych do zakupu i nie jest wyświetlany w przypadku produktów zmiennych w pętlach.

= Settings =

Prosta strona ustawień WooCommerce (WooCommerce → Swift Quick Buy) umożliwia:

* Włącz lub wyłącz przycisk Kup teraz.
* Ustaw etykietę przycisku.
* Wybierz, gdzie pojawi się przycisk (pojedynczy produkt, pętle sklepu lub oba).
* Wybierz, czy ma się znajdować przed, czy po przycisku „Dodaj do koszyka” w przypadku pojedynczych produktów.
* Wybierz, dokąd przekierowuje (do kasy lub koszyka).
* Wybierz, czy opróżnić koszyk przed dodaniem.
* Wybierz, czy chcesz przestrzegać ilości wybranej na stronie produktu.
* Wybierz styl przycisku (motyw, jednolity, kontur) i opcjonalny kolor akcentu.

= Shortcode =

Użyj `[swift_buy_now]`, aby wyświetlić przycisk Kup teraz w dowolnym miejscu, na stronie, w poście lub w bloku. Domyślnie celuje w bieżący produkt; dodaj identyfikator, aby kierować reklamy na konkretny prosty produkt:

`[swift_buy_now id="123"]`

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/plogins-swift` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być aktywny.
3. Odwiedź <strong>WooCommerce → Swift Quick Buy</strong>, aby skonfigurować etykietę przycisku, miejsce docelowe i miejsce docelowe przekierowania.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. Swift wymaga aktywnej instalacji WooCommerce.

= Where does the Buy Now button appear? =

Na stronach pojedynczych produktów i/lub w pętlach produktów w sklepie i archiwum; wybierasz które w ustawieniach. Na pętlach jest pokazywany tylko dla prostych produktów dostępnych w magazynie i możliwych do kupienia.

= Does it skip the cart? =

Tak, jeśli ustawisz cel przekierowania na „Do kasy”. Produkt zostaje dodany do koszyka, a kupujący zostaje przeniesiony bezpośrednio na stronę kasy. Zamiast tego możesz także wybrać przekierowanie do koszyka.

= Can the Buy Now button empty the cart first? =

Tak. Swift może wyczyścić koszyk przed dodaniem wybranego produktu, więc bezpośrednie zamówienie zawiera tylko ten przedmiot, który kliknął kupujący.

= Does it respect the selected quantity? =

Tak dla prostych produktów na stronach pojedynczych produktów, gdy włączone jest ustawienie „przestrzegaj ilości”.

= Does it create database tables? =

Nie. Swift jest bezstanowy, przechowuje tylko swoje ustawienia (jedna opcja) i nie tworzy niestandardowych tabel ani meta produktów.

= Does it work with variable products? =

Wersja darmowa jest przeznaczona dla prostych produktów. W pętlach sklepowych przycisk jest wyświetlany tylko dla prostych produktów, ponieważ najpierw należy wybrać odmianę. W Swift Pro planowana jest pełna obsługa opcji Kup teraz dla produktów zmiennych (z wbudowanym selektorem odmian).

= Can I place the button with a shortcode? =

Tak. Użyj `[swift_buy_now]` dla bieżącego produktu lub `[swift_buy_now id="123"]` dla konkretnego prostego produktu.

== Screenshots ==

1. Przycisk Kup teraz na stronie pojedynczego produktu.
2. Ekran ustawień Swift Quick Buy.

== External Services ==

Swift nie łączy się, nie wysyła danych ani nie ładuje niczego z żadnej usługi zewnętrznej. Nie ma pakietu SDK, żadnego klienta API, żadnej zdalnej czcionki, CDN ani punktu końcowego analitycznego, ani kontroli telefonicznej ani licencji. CSS i JavaScript są dołączone do wtyczki i kolejkowane z Twojej własnej witryny.

Cała praca Swifta odbywa się na Twoim serwerze. Odczytuje i zapisuje pojedynczą opcję ustawień („swift_settings”) oraz znacznik wersji schematu („swift_db_version”) i nie tworzy niestandardowych tabel bazy danych ani meta produktu. Przycisk Kup teraz dodaje wybrany produkt do koszyka WooCommerce odwiedzającego i przekierowuje go w Twojej witrynie do kasy lub strony koszyka; nic o produkcie, koszyku czy kupującym nie opuszcza Twojej instalacji.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.2.1 =
* Zmieniono nazwę na Plogins Swift dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.2.0 =
* Nowość: krótki kod `[swift_buy_now]` umożliwiający umieszczenie przycisku Kup teraz w dowolnym miejscu (opcjonalnie kierowanie na produkt według identyfikatora).
* Nowość: wybierz, czy przycisk ma znajdować się przed, czy po przycisku „dodaj do koszyka” na stronach pojedynczych produktów.
* Nowość: opcjonalnie przestrzegaj ilości wybranej na stronie produktu (produkty proste).
* Nowość: opcje stylu przycisków, motyw domyślny, jednolity lub kontur, z opcjonalnym kolorem akcentującym.
* Nowość: link „Ustawienia” w wierszu listy wtyczek.
* Nowość: czyszczenie po odinstalowaniu usuwa opcje wtyczki (obsługuje wiele witryn).
* Ulepszono: przeprojektowana strona ustawień z pogrupowanymi kartami, podgląd przycisku na żywo, wskaźnik stanu Na żywo/Wył. i dostępne „?” podpowiedzi dotyczące każdej opcji.
* Ulepszono: nowoczesne, tematyczne style przycisków w witrynie sklepowej (niestandardowe właściwości CSS, obsługa trybu ciemnego, przejścia bezpieczne przy ograniczonym ruchu) bez zmiany układu.
* Ulepszono: dostępność, podpowiedzi obsługiwane za pomocą klawiatury, widoczne style fokusu i role ARIA w całym panelu administratora.
* Ulepszono: solidność, przycisk nigdy nie jest uszkodzony w przypadku produktów, których nie można kupić, a kolor akcentu jest ograniczony do własnych przycisków Swifta.

= 0.1.0 =
* Pierwsza wersja: przycisk Kup teraz dla WooCommerce, który dodaje do koszyka i przekierowuje bezpośrednio do kasy (lub koszyka), ze stroną ustawień etykiety, miejsca docelowego i miejsca docelowego przekierowania.
