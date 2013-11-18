# Plugin: WP German Formal

Load (custom) formal German translations for WordPress Core - Global, Admin and Network Admin.

## Description

Instead of the packaged language files that come with WordPress - DE Edition - this plugin loads custom language packs translated, maintained and provided via David Decker of DECKERWEB. This includes the following sections: Global/Core, Admin and Network Admin.

* de_DE.mo = the global area, these are the strings that could appear anywhere, frontend, backend, Multisite
* admin-de_DE.mo = strings that only appear in the admin area
* network-admin-de_DE.mo = strings that only appear in the Network admin area in Multisite

Those new language packs are based on the "official language packs" from the DE Edition in the formal version. However, the new language files were heavily modified and a lot of important strings and principals changed.

## Screenshots

- Currently none. (Not relevant at the moment.) -

## Requirements
 * WordPress 3.7 or higher
 * Your WordPress install is already configured as German ('WPLANG' set to 'de_DE' in wp-config.php)

## Installation

### Upload

1. Download the latest tagged archive (choose the "zip" option).
2. Go to the __Plugins -> Add New__ screen and click the __Upload__ tab.
3. Upload the zipped archive directly.
4. Go to the Plugins screen and click __Activate__.

### Manual

1. Download the latest tagged archive (choose the "zip" option).
2. Unzip the archive.
3. Copy the folder to your `/wp-content/plugins/` directory.
4. Go to the Plugins screen and click __Activate__.

Check out the Codex for more information about [installing plugins manually](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

### Git

Using git, browse to your `/wp-content/plugins/` directory and clone this repository:

`git clone git@github.com:deckerweb/wp-germa-formal.git`

Then go to your Plugins screen and click __Activate__.

## Updates of the Language Packs plus the Plugin

New versions of these language packs will be provided via new versions of the plugin!

This plugin supports the [GitHub Updater](https://github.com/afragen/github-updater) plugin, so if you install that first, this plugin becomes automatically updateable direct from GitHub.

## Usage

This plugin has no settings at all because it currently doesn't need them! Just activate it and it will serve you up proper translations! ;-)

Maybe in future versions some admin sub page will be added with useful information and/or a few settings.

## Credits

Developed and released by [David Decker - DECKERWEB](http://deckerweb.de/twitter)  
Copyright (c) 2013 [David Decker - DECKERWEB](http://deckerweb.de/)
