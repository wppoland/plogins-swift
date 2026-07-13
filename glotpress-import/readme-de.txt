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

Füge einen „Jetzt kaufen“-/Schnellkauf-Button hinzu, der Käufer direkt zur Kasse führt und den Warenkorb überspringt.

== Description ==

Swift fügt deinen WooCommerce-Produkten einen Schnellkauf-Button „Jetzt kaufen“ hinzu. Ein Klick genügt, um das Produkt in den Warenkorb zu legen und den Käufer direkt zur Kasse zu schicken. Dabei wird die Warenkorbseite übersprungen, sodass für den Kauf ein Klick statt drei erforderlich ist.

Der Button kann auf einzelnen Produktseiten, in Shop- und Archivschleifen oder auf beidem erscheinen. Du wählst die Bezeichnung, wohin weitergeleitet wird (zur Kasse oder in den Warenkorb) und ob der Warenkorb zuerst geleert wird, sodass der Käufer nur mit dem Produkt auscheckt, auf das er geklickt hat.

Swift ist zustandslos: Es speichert keine Produktdaten und erstellt keine Datenbanktabellen. Es kümmert sich um die Button-Hooks, die Nonce-Verifizierung, die Warenkorb-Behandlung und die Weiterleitung – und sonst nichts.

Swift wird quelloffen entwickelt. Quellcode, Fehlerberichte und Funktionswünsche findest du unter https://github.com/wppoland/plogins-swift.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-swift/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-swift/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-swift
* <strong>Fehlerberichte und Funktionswünsche</strong> – https://github.com/wppoland/plogins-swift/issues


= What it does =

* Fügt einen Button „Jetzt kaufen“ hinzu, der mit einem Klick in den Warenkorb legt und weiterleitet.
* Funktioniert auf einzelnen Produktseiten und/oder in Shop- und Archivschleifen.
* Platziere den Button <strong>vor oder nach</strong> dem nativen Button „In den Warenkorb“ auf einzelnen Produktseiten.
* Platziere den Button an einer beliebigen Stelle mit dem Shortcode `[swift_buy_now]` (optional mit Ausrichtung auf ein Produkt per ID).
* Leitet zur <strong>Kasse</strong> (Warenkorb überspringen) oder zum <strong>Warenkorb</strong> weiter, je nachdem, was du bevorzugst.
* Leert optional zuerst den Warenkorb, sodass an der Kasse nur das ausgewählte Produkt angezeigt wird.
* Berücksichtigt optional die auf der Produktseite <strong>ausgewählte Menge</strong> (einfache Produkte).
* Wähle einen <strong>Stil</strong> für den Button – Theme-Standard, Vollfläche oder Umriss – optional mit einer Akzentfarbe.
* Berücksichtigt Lagerbestand und Kaufbarkeit: Der Button ist für nicht vorrätige oder nicht käufliche Produkte ausgeblendet und wird für variable Produkte in Schleifen nicht angezeigt.

= Settings =

Eine einfache WooCommerce-Einstellungsseite (WooCommerce → Swift Quick Buy) ermöglicht dir:

* Den Button „Jetzt kaufen“ aktivieren oder deaktivieren.
* Die Button-Beschriftung festlegen.
* Wählen, wo der Button erscheint (einzelnes Produkt, Shop-Loops oder beides).
* Wählen, ob er bei einzelnen Produkten vor oder nach dem Button „In den Warenkorb“ sitzt.
* Wählen, wohin weitergeleitet wird (zur Kasse oder zum Warenkorb).
* Wählen, ob der Warenkorb vor dem Hinzufügen geleert wird.
* Wählen, ob die auf der Produktseite gewählte Menge berücksichtigt wird.
* Einen Button-Stil wählen (Theme, Vollfläche, Umriss) und optional eine Akzentfarbe.

= Shortcode =

Verwende `[swift_buy_now]`, um den Button „Jetzt kaufen“ an einer beliebigen Stelle darzustellen – innerhalb einer Seite, eines Beitrags oder eines Blocks. Standardmäßig zielt er auf das aktuelle Produkt; füge eine ID hinzu, um ein bestimmtes einfaches Produkt anzusprechen:

`[swift_buy_now id="123"]`

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/plogins-swift` hoch oder installiere es über Plugins → Installieren.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Öffne <strong>WooCommerce → Swift Quick Buy</strong>, um Beschriftung, Platzierung und Weiterleitungsziel des Buttons zu konfigurieren.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. Swift erfordert eine aktive WooCommerce-Installation.

= Where does the Buy Now button appear? =

Auf einzelnen Produktseiten und/oder in Shop- und Archivschleifen; du wählst in den Einstellungen, welche. In Schleifen wird er nur für einfache, vorrätige und käufliche Produkte angezeigt.

= Does it skip the cart? =

Ja, wenn du das Weiterleitungsziel auf „Zur Kasse“ setzt. Das Produkt wird in den Warenkorb gelegt und der Käufer direkt zur Kassenseite weitergeleitet. Du kannst stattdessen auch eine Weiterleitung zum Warenkorb wählen.

= Can the Buy Now button empty the cart first? =

Ja. Swift kann den Warenkorb leeren, bevor das ausgewählte Produkt hinzugefügt wird, sodass die direkte Kasse nur den Artikel enthält, auf den der Käufer geklickt hat.

= Does it respect the selected quantity? =

Ja, für einfache Produkte auf einzelnen Produktseiten, wenn die Einstellung „Menge berücksichtigen“ aktiviert ist.

= Does it create database tables? =

Nein. Swift ist zustandslos, es speichert nur seine Einstellungen (eine Option) und erstellt keine benutzerdefinierten Tabellen oder Produkt-Meta.

= Does it work with variable products? =

Die kostenlose Version ist für einfache Produkte gedacht. In Shop-Loops wird der Button nur für einfache Produkte angezeigt, da zuerst eine Variante gewählt werden muss. Volle „Jetzt kaufen“-Unterstützung für variable Produkte (mit einer Inline-Variantenauswahl) ist für Swift Pro geplant.

= Can I place the button with a shortcode? =

Ja. Verwende `[swift_buy_now]` für das aktuelle Produkt oder `[swift_buy_now id="123"]` für ein bestimmtes einfaches Produkt.

== Screenshots ==

1. Der Button „Jetzt kaufen“ auf einer einzelnen Produktseite.
2. Der Swift-Quick-Buy-Einstellungsbildschirm.

== External Services ==

Swift stellt keine Verbindung zu externen Diensten her, sendet keine Daten an sie und lädt nichts von ihnen. Es gibt kein SDK, keinen API-Client, keine externe Schriftart, kein CDN und keinen Analyse-Endpunkt und keine Phone-Home- oder Lizenzprüfung – sein CSS und JavaScript sind im Plugin gebündelt und werden von deiner eigenen Website geladen.

Die gesamte Arbeit von Swift findet auf deinem Server statt. Es liest und schreibt eine einzige Einstellungs-Option (`swift_settings`) und eine Schema-Versionsmarkierung (`swift_db_version`) und erstellt keine benutzerdefinierten Datenbanktabellen und keine Produkt-Meta. Der Button „Jetzt kaufen“ legt das ausgewählte Produkt in den eigenen WooCommerce-Warenkorb der besuchenden Person und leitet sie innerhalb deiner Website zu deiner Kassen- oder Warenkorbseite weiter; nichts über das Produkt, den Warenkorb oder die Käuferschaft verlässt deine Installation.

== Translations ==

Plogins Swift enthält deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche. Die Textdomain ist `plogins-swift`, sodass Sprachpakete von WordPress.org diese mitgelieferten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche mitgeliefert.

= 1.0.1 =
* Erste stabile Version.

= 0.2.1 =
* Für einen eindeutigeren Plugin-Namen in Plogins Swift für WooCommerce umbenannt.

= 0.2.0 =
* Neu: Shortcode `[swift_buy_now]`, um den Button „Jetzt kaufen“ an beliebiger Stelle zu platzieren (optional mit Ausrichtung auf ein Produkt per ID).
* Neu: Wähle, ob der Button auf einzelnen Produktseiten vor oder nach dem Button „In den Warenkorb“ sitzt.
* Neu: optional die auf der Produktseite gewählte Menge berücksichtigen (einfache Produkte).
* Neu: Button-Stil-Optionen – Theme-Standard, Vollfläche oder Umriss – mit optionaler Akzentfarbe.
* Neu: Link „Einstellungen“ in der Plugin-Listenzeile.
* Neu: Die Deinstallations-Bereinigung entfernt die Optionen des Plugins (Multisite-fähig).
* Verbessert: neu gestaltete Einstellungsseite mit gruppierten Karten, einer Live-Vorschau des Buttons, einer Live/Aus-Statusanzeige und barrierefreien „?“-Hilfe-Tooltips zu jeder Option.
* Verbessert: moderne, an das Theme anpassbare Button-Stile im Shop (benutzerdefinierte CSS-Eigenschaften, Dark-Mode-Unterstützung, auf reduzierte Bewegung Rücksicht nehmende Übergänge) ohne Layout-Verschiebung.
* Verbessert: Barrierefreiheit – per Tastatur bedienbare Hilfe-Tooltips, sichtbare Fokus-Stile und ARIA-Rollen im gesamten Adminbereich.
* Verbessert: Robustheit – der Button wird bei nicht käuflichen Produkten nie in einem defekten Zustand dargestellt und die Akzentfarbe ist auf Swifts eigene Buttons beschränkt.

= 0.1.0 =
* Erstveröffentlichung: ein Button „Jetzt kaufen“ für WooCommerce, der zum Warenkorb hinzufügt und direkt zur Kasse (oder zum Warenkorb) weiterleitet, mit einer Einstellungsseite für Label, Platzierung und Weiterleitungsziel.
