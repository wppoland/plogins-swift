=== Plogins Swift - Buy Now Button for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, buy now, direct checkout, skip cart, quick buy
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
Erfordert Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Füge einen „Jetzt kaufen“-/Schnellkauf-Button hinzu, der Käufer direkt zur Kasse führt und den Warenkorb überspringt.

== Description ==

Swift fügt deinen WooCommerce-Produkten einen Schnellkauf-Button „Jetzt kaufen“ hinzu. Ein Klick genügt, um das Produkt in den Warenkorb zu legen und den Käufer direkt zur Kasse zu schicken. Dabei wird die Warenkorbseite übersprungen, sodass für den Kauf ein Klick statt drei erforderlich ist.

Die Schaltfläche kann auf einzelnen Produktseiten, in Shop- und Archivschleifen oder auf beiden erscheinen. Sie wählen die Bezeichnung, wohin weitergeleitet wird (zur Kasse oder in den Warenkorb) und ob der Warenkorb zuerst geleert wird, sodass der Käufer nur mit dem Produkt auscheckt, auf das er geklickt hat.

Swift ist zustandslos: Es speichert keine Produktdaten und erstellt keine Datenbanktabellen. Es kümmert sich um die Button-Hooks, die Nonce-Verifizierung, die Handhabung des Warenkorbs und die Weiterleitung und sonst nichts.

Swift wird im Freien entwickelt. Quellcode, Fehlerberichte und Funktionsanfragen live unter https://github.com/wppoland/plogins-swift.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-swift/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-swift/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-swift
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-swift/issues


= What it does =

* Fügt eine Schaltfläche „Jetzt kaufen“ hinzu, die mit einem Klick in den Warenkorb gelegt und weitergeleitet wird.
* Funktioniert auf einzelnen Produktseiten und/oder Shop- und Archivschleifen.
* Platziere die Schaltfläche <strong>vor oder nach</strong> der nativen Schaltfläche „Zum Warenkorb hinzufügen“ auf einzelnen Produktseiten.
* Platziere die Schaltfläche an einer beliebigen Stelle mit dem Shortcode „[swift_buy_now]“ (optional mit Ausrichtung auf ein Produkt anhand der ID).
* Leitet zur <strong>Kasse</strong> (Warenkorb überspringen) oder zum <strong>Warenkorb</strong> weiter, je nachdem, was du bevorzugen.
* Optional wird zuerst der Warenkorb geleert, sodass an der Kasse nur das ausgewählte Produkt angezeigt wird.
* Optional <strong>berücksichtigt die auf der Produktseite ausgewählte Menge</strong> (einfache Produkte).
* Wähle einen <strong>Stil</strong> für die Schaltfläche, Designstandard, Vollton oder Umriss, optional mit einer Akzentfarbe.
* Berücksichtigt den Lagerbestand und die Kauffähigkeit. Die Schaltfläche ist für nicht vorrätige oder nicht käufliche Produkte ausgeblendet und wird für variable Produkte in Schleifen nicht angezeigt.

= Settings =

Eine einfache WooCommerce-Einstellungsseite (WooCommerce → Swift Quick Buy) ermöglicht dir:

* Aktivieren oder deaktiviere die Schaltfläche „Jetzt kaufen“.
* Lege die Schaltflächenbeschriftung fest.
* Wähle, wo die Schaltfläche angezeigt wird (einzelnes Produkt, Shop-Loops oder beides).
* Wähle, ob es bei einzelnen Produkten vor oder nach der Schaltfläche „In den Warenkorb“ angezeigt wird.
* Wähle aus, wohin die Weiterleitung erfolgt (zur Kasse oder zum Warenkorb).
* Wähle aus, ob der Warenkorb vor dem Hinzufügen geleert werden soll.
* Wähle, ob die auf der Produktseite ausgewählte Menge berücksichtigt werden soll.
* Wähle einen Schaltflächenstil (Thema, einfarbig, Umriss) und optional eine Akzentfarbe.

= Shortcode =

Verwende „[swift_buy_now]“, um die Schaltfläche „Jetzt kaufen“ an einer beliebigen Stelle innerhalb einer Seite, eines Beitrags oder eines Blocks darzustellen. Es zielt standardmäßig auf das aktuelle Produkt ab; Füge eine ID hinzu, um auf ein bestimmtes einfaches Produkt abzuzielen:

`[swift_buy_now id="123"]`

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/plogins-swift“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Besuche <strong>WooCommerce → Swift Quick Buy</strong>, um die Beschriftung, Platzierung und das Weiterleitungsziel der Schaltfläche zu konfigurieren.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. Swift erfordert eine aktive WooCommerce-Installation.

= Where does the Buy Now button appear? =

Auf einzelnen Produktseiten und/oder Shop- und Archivproduktschleifen; du wählen welche in den Einstellungen aus. Auf Schleifen wird es nur für einfache, vorrätige, käufliche Produkte angezeigt.

= Does it skip the cart? =

Ja, wenn du das Weiterleitungsziel auf „Zur Kasse“ setzen. Das Produkt wird in den Warenkorb gelegt und der Käufer wird direkt zur Checkout-Seite weitergeleitet. Du kannst stattdessen auch eine Weiterleitung zum Warenkorb wählen.

= Can the Buy Now button empty the cart first? =

Ja. Swift kann den Warenkorb leeren, bevor das ausgewählte Produkt hinzugefügt wird, sodass der direkte Checkout nur den Artikel enthält, auf den der Käufer geklickt hat.

= Does it respect the selected quantity? =

Ja für einfache Produkte auf einzelnen Produktseiten, wenn die Einstellung „Menge berücksichtigen“ aktiviert ist.

= Does it create database tables? =

Nein. Swift ist zustandslos, es speichert nur seine Einstellungen (eine Option) und erstellt keine benutzerdefinierten Tabellen oder Produkt-Meta.

= Does it work with variable products? =

Die kostenlose Version ist für einfache Produkte konzipiert. Auf Shop-Loops wird der Button nur für einfache Produkte angezeigt, da zunächst eine Variante ausgewählt werden muss. Für Swift Pro ist eine vollständige „Jetzt kaufen“-Unterstützung für variable Produkte (mit einer Inline-Variantenauswahl) geplant.

= Can I place the button with a shortcode? =

Ja. Verwende „[swift_buy_now]“ für das aktuelle Produkt oder „[swift_buy_now id="123"]“ für ein bestimmtes einfaches Produkt.

== Screenshots ==

1. Die Schaltfläche „Jetzt kaufen“ auf einer einzelnen Produktseite.
2. Der Swift Quick Buy-Einstellungsbildschirm.

== External Services ==

Swift stellt keine Verbindung zu externen Diensten her, sendet keine Daten an diese und lädt auch nichts von ihnen. Es gibt kein SDK, keinen API-Client, keine Remote-Schriftart, kein CDN oder keinen Analyseendpunkt und keine Phone-Home- oder Lizenzprüfung. CSS und JavaScript werden mit dem Plugin gebündelt und von deiner eigenen Website in die Warteschlange gestellt.

Die gesamte Arbeit von Swift findet auf deinem Server statt. Es liest und schreibt eine einzelne Einstellungsoption („swift_settings“) und eine Schemaversionsmarkierung („swift_db_version“) und erstellt keine benutzerdefinierten Datenbanktabellen und keine Produktmeta. Mit der Schaltfläche „Jetzt kaufen“ wird das ausgewählte Produkt dem eigenen WooCommerce-Warenkorb des Besuchers hinzugefügt und dieser innerhalb deiner Website zu deiner Checkout- oder Warenkorbseite weitergeleitet. Nichts über das Produkt, den Warenkorb oder den Käufer verlässt deine Installation.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.2.1 =
* Für einen eindeutigeren Plugin-Namen in Plogins Swift für WooCommerce umbenannt.

= 0.2.0 =
* Neu: Shortcode „[swift_buy_now]“, um die Schaltfläche „Jetzt kaufen“ an einer beliebigen Stelle zu platzieren (optional mit Ausrichtung auf ein Produkt anhand der ID).
* Neu: Wähle, ob die Schaltfläche auf einzelnen Produktseiten vor oder nach der Schaltfläche „Zum Warenkorb hinzufügen“ angezeigt wird.
* Neu: optional die auf der Produktseite gewählte Menge berücksichtigen (einfache Produkte).
* Neu: Schaltflächenstiloptionen, Designstandard, einfarbig oder Umriss, mit optionaler Akzentfarbe.
* Neu: Link „Einstellungen“ in der Plugin-Listenzeile.
* Neu: Die Deinstallationsbereinigung entfernt die Optionen des Plugins (Multisite-fähig).
* Verbessert: neu gestaltete Einstellungsseite mit gruppierten Karten, einer Live-Schaltflächenvorschau, einer Live/Off-Statusanzeige und einem zugänglichen „?“ Hilfe-Tooltips zu jeder Option.
* Verbessert: moderne, thematisch anpassbare Storefront-Schaltflächenstile (benutzerdefinierte CSS-Eigenschaften, Unterstützung des Dunkelmodus, sichere Übergänge mit reduzierter Bewegungsfreiheit) ohne Layoutverschiebung.
* Verbessert: Barrierefreiheit, per Tastatur bedienbare Hilfe-Tooltips, sichtbare Fokusstile und ARIA-Rollen im gesamten Adminbereich.
* Verbessert: Robustheit, die Schaltfläche wird bei nicht käuflichen Produkten nie in einem defekten Zustand dargestellt und die Akzentfarbe ist auf Swifts eigene Schaltflächen beschränkt.

= 0.1.0 =
* Erstveröffentlichung: eine „Jetzt kaufen“-Schaltfläche für WooCommerce, die zum Warenkorb hinzugefügt und direkt zur Kasse (oder zum Warenkorb) weitergeleitet wird, mit einer Einstellungsseite für Label, Platzierung und Weiterleitungsziel.
