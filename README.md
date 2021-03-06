# Plugin: WP German Formal - WP Deutsch formelle Anrede

(Eigene) Formelle deutsche Übersetzungen für WordPress Core laden und anzeigen lassen - für die Bereiche Global, Admin und Netzwerkverwaltung.

## Beschreibung

Lädt anstelle der "offiziellen deutschen Sprachdateien" (die mit der WordPress DE-Edition kommen) eigene deutsche Übersetzungen für WordPress - übersetzt, geplegt und herausgegeben von David Decker von DECKERWEB. Dies betrifft die folgenden Bereiche bzw. Sprachdateien: Global, Adminbereich sowie die Netzwerkverwaltung in Multisite.

* de_DE.mo = der globale Bereich, d.h. Strings, die überall vorkommen können, im Frontend, wie im Adminbereich
* admin-de_DE.mo = Strings, die nur im Adminbereich vorkommen
* network-admin-de_DE.mo = Strings, die nur in der Netzwerkverwaltung vorkommen (Network Admin in Multisite)

Diese neuen Sprachdateien basieren auf den "offiziellen Sprachdateien" aus der DE-Edition, in der Sie-Anrede. Sie wurden jedoch (nahezu) komplett überarbeitet und teilweise stark verändert.

**Grundlegendes**

 1. [Übersetzungsprinzipien](https://github.com/deckerweb/wp-german-formal/wiki/%C3%9Cbersetzungsprinzipien)
 2. [Begriffstabelle/ -Vergleich - extern, via Google Docs](https://docs.google.com/spreadsheet/ccc?key=0AsdlEocpfc1CdFRjNzVQRkpYZ2lVRnozbmJXcEpQcmc&usp=sharing)
 3. [WordPress Glossar - extern, via Google Docs](https://docs.google.com/spreadsheet/ccc?key=0AsdlEocpfc1CdHdTaEYxdDBTZU4tWEFtOTN0bnZKUlE&usp=sharing)

## Screenshots

Derzeit keine. (Im Moment nicht relevant.)

## Anfoderungen
* WordPress Version 3.7 oder höher (damit auch PHP 5.2.4 oder höher!)
* Ihre WordPress-Installation ist bereits auf deutsch eingestellt ('WPLANG' auf 'de_DE' in der wp-config.php)

## Installation

### Hochladen

1. Die neueste Version hier von [den GitHub.com Releases](https://github.com/deckerweb/wp-german-formal/releases) herunterladen (die "zip"-Option wählen).
2. Zur Admin-Seite __Plugins -> Installieren__ gehen und dort den Tab __Hochladen__ wählen.
3. Das ZIP-Paket direkt hochladen.
4. Nach dem Hochladeprozess auf __Aktivieren__ klicken.

### Manuell

1. Die neueste Version hier von [den GitHub.com Releases](https://github.com/deckerweb/wp-german-formal/releases) herunterladen (die "zip"-Option wählen).
2. Das heruntergeladene Archiv entpacken (extrahieren).
3. Kopieren Sie den entpackten Ordner in Ihr `/wp-content/plugins/` Verzeichnis (in der Regel via FTP).
4. Gehen Sie auf die Admin-Seite "Plugins", wählen Sie das entsprechende plugin und klicken __Aktivieren__.

### Git

Via git können Sie zu Ihrem Verzeichnis `/wp-content/plugins/` gehen und dieses Repositorium klonen:

`git clone git@github.com:deckerweb/wp-german-formal.git`

Gehen Sie auf die Admin-Seite "Plugins", wählen Sie das entsprechende plugin und klicken __Aktivieren__.

## Sprachdatei- und Plugin-Aktualisierungen (Updates)

Neue Versionen der Sprachdateien, z.B. bei einer neuen WordPress-Version, werden über eine neue Version des Plugins veröffentlicht.

Dieses Plugin unterstützt das Updater-Plugin für GitHub: [GitHub Updater](https://github.com/afragen/github-updater). Wenn Sie dieses also zuerst installieren, wird "WP German Formal" genauso aktualisierbar, wie jedes andere Plugin.

## Verwendung des Plugins

Das Plugin hat keine Einstellungen. Es wird einfach aktiviert und verrichtet lautlos seinen Dienst. :)

Für die Zukunft ist eventuell eine Unterseite im Adminbereich mit Informationen bzw. einigen Einstellungen geplant. Wann das geschehen wird, ist derzeit völlig offen.

Für Multisite-Installationen wird eine Netzwerk-weite Aktivierung empfohlen.

Derzeit werden bis zu 3 (drei!) verschiedene Hauptpersionen von WordPress unterstützt: 3.8 (aktuell), davor 3.7 sowie zukünftig 3.9. Mehr wie drei solcher Versionen werden nicht unterstützt! Diese Funktionalität ist sehr komfortabel zum Testen sowie bei Aktualisierungen von Installationen! :-)

**Zusatzfunktion:**
Blocker-Konstante, um Aktualisierung von Übersetzungen (Sprachpakete - Language Packs) zu unterbinden, auch für WordPress Core. Betrifft nur die Lokale 'de_DE'. Rein optional über Hinzufügen der folgenden Konstante in der `wp-config.php` aktivierbar:
```php
/** Plugin: WP German Formal */
define( 'WPGF_BLOCK_DE_LANGUAGE_PACKS', TRUE );
```

## Lizenz

GPL-2.0+
siehe: [LICENSE Datei](https://github.com/deckerweb/wp-german-formal/blob/master/LICENSE)

## Credits

Entwickelt und herausgegeben von [David Decker - DECKERWEB](http://deckerweb.de/twitter)  
Copyright (c) 2013 [David Decker - DECKERWEB](http://deckerweb.de/)