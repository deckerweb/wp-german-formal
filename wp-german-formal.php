<?php
/**
 * Main plugin file.
 * Load (custom) formal German translations for WordPress Core - Global, Admin
 *    and Network Admin, plus default themes.
 *
 * @package           WP German Formal
 * @author            David Decker
 * @copyright         Copyright (c) 2013, David Decker - DECKERWEB
 * @license           GPL-2.0+
 * @link              http://deckerweb.de/twitter
 *
 * @wordpress-plugin
 * Plugin Name:       WP German Formal
 * Plugin URI:        http://genesisthemes.de/en/wp-plugins/wp-german-formal/
 * Description:       Load (custom) formal German translations for WordPress Core - Global, Admin and Network Admin, plus default themes.
 * Version:           1.0.6
 * Author:            David Decker - DECKERWEB
 * Author URI:        http://deckerweb.de/
 * License:           GPL-2.0+
 * License URI:       http://www.opensource.org/licenses/gpl-license.php
 * Text Domain:       wp-german-formal
 * Domain Path:       /wpgf-languages/
 * GitHub Plugin URI: https://github.com/deckerweb/wp-german-formal
 * GitHub Branch:     master
 *
 * Copyright (c) 2013 David Decker - DECKERWEB
 *
 *     This file is part of WP German Formal,
 *     a plugin for WordPress.
 *
 *     WP German Formal is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     WP German Formal is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Exit if accessed directly
 *
 * @since 1.0.0
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants.
 *
 * @since 1.0.0
 */
/** Set constant for the plugin directory */
define( 'WPGF_PLUGIN_DIR', trailingslashit( dirname( __FILE__ ) ) );

/** Set constant path to the Plugin basename (folder) */
define( 'WPGF_PLUGIN_BASEDIR', trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

/** Set constant path to the Plugin URI */
define( 'WPGF_PLUGIN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Helper constant for next major WordPress Version AFTER the current one.
 * CURRENT: 3.7
 * FUTURE: 3.8
 *
 * @since 1.0.3
 */
define( 'WPGF_WPJUMP_VERSION', '3.7.9999' );


add_action( 'init', 'ddw_wpgf_init', 1 );
/**
 * Load the text domain for translation of the plugin itself.
 * 
 * @since 1.0.0
 *
 * @uses  load_textdomain() Loads translations for given plugin textdomain.
 * @uses  load_plugin_textdomain() Loads translations for given plugin textdomain.
 * @uses  is_admin() Check if we are within admin.
 */
function ddw_wpgf_init() {

	/** If 'wp-admin' include translations plus admin helper functions */
	if ( is_admin() ) {

		/** Set unique textdomain string */
		$wpgf_textdomain = 'wp-german-formal';

		/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
		$plugin_locale = apply_filters( 'plugin_locale', get_locale(), $wpgf_textdomain );

		/** Set filter for WordPress languages directory */
		$wpgf_wp_lang_dir = apply_filters(
			'wpgf_filter_wp_lang_dir',
			trailingslashit( WP_LANG_DIR ) . 'wpgf-languages/' . $wpgf_textdomain . '-' . $plugin_locale . '.mo'
		);

		/** Set filter for plugin languages directory */
		$wpgf_lang_dir = apply_filters( 'wpgf_filter_lang_dir', WPGF_PLUGIN_BASEDIR . 'wpgf-languages' );

		/** Translations: First, look in WordPress' "languages" folder = custom & update-secure! */
		load_textdomain( $wpgf_textdomain, $wpgf_wp_lang_dir );

		/** Translations: Secondly, look in plugin's "languages" folder = default */
		load_plugin_textdomain( $wpgf_textdomain, FALSE, $wpgf_lang_dir );

	}  // end if is_admin() check

}  // end of function ddw_wpgf_init


/**
 * Helper function for loading our custom translations for WordPress.
 *    It checks first in a subfolder of WP_LANG_DIR, then it falls back to our
 *    plugin subfolder to load the plugin's packaged translations.
 *
 * @since  1.0.0
 *
 * @uses   get_locale()
 * @uses   load_textdomain()
 *
 * @param  string $domain
 * @param  string $key
 *
 * @global string $GLOBALS[ 'wp_version' ]
 */
function ddw_wpgf_load_textdomain( $domain, $key ) {

	/** Get locale setting */
	$locale = get_locale();

	/** Making base slug filterable */
	$custom_slug = 'ddw';  // 'wp-custom';
	$custom_slug = apply_filters( 'wpgf_filter_wplangdir_custom_slug', $custom_slug );

	/** Enable version jumping - for updates, testing and such... :) */
	$wpjump_slug = ( version_compare( $GLOBALS[ 'wp_version' ], WPGF_WPJUMP_VERSION, '>=' ) ) ? 'future' : '/';

	/**
	 * First, look with subfolder of WP_LANG_DIR
	 * Example: wp-content/languages/ddw/{future}/admin-de_DE.mo
	 */
	$mofile_wp_lang_dir = trailingslashit( WP_LANG_DIR ) . trailingslashit( esc_attr( $custom_slug ) ) . trailingslashit( $wpjump_slug ) . esc_attr( $key ) . $locale . '.mo';

	/**
	 * Second, fallback to plugin's /pomo/ folder
	 * Pattern: wp-content/plugins/wp-german-formal/wp-pomo/{future}/admin-de_DE.mo
	 */
	$plugindir_slug = apply_filters(
		'wpgf_filter_plugindir_slug',
		trailingslashit( dirname( plugin_basename( __FILE__ ) ) )
	);

	$mofile_plugin_dir = trailingslashit( WP_PLUGIN_DIR ) . $plugindir_slug . 'wp-pomo/' . trailingslashit( $wpjump_slug ) . esc_attr( $key ) . $locale . '.mo';

	/** Loading logic, file check */
	if ( is_readable( $mofile_wp_lang_dir ) ) {

		load_textdomain( esc_attr( $domain ), $mofile_wp_lang_dir );

	} elseif ( is_readable( $mofile_plugin_dir ) ) {

		load_textdomain( esc_attr( $domain ), $mofile_plugin_dir );

	}  // end if

}  // end of function ddw_wpgf_load_textdomain


add_action( 'plugins_loaded', 'ddw_wpgf_load_default_textdomain' );
/**
 * Re-load the 'default' textdomain, use our own, packaged translation files.
 *    All that happens after unloading the original default/ packaged
 *    translations (that come from translate.wordpress.org).
 *
 * NOTE: I am using the approach with unloading and re-loading because the
 *       filters 'load_textdomain_mofile' and 'override_load_textdomain' only
 *       work with one loaded instance of a textdomain, not more (we need
 *       3 times loading of the same textdomain, in global area, admin, plus
 *       network admin).
 *
 * @since 1.0.0
 *
 * @uses  unload_textdomain()
 * @uses  ddw_wpgf_load_textdomain()
 * @uses  is_admin()
 * @uses  is_network_admin()
 */
function ddw_wpgf_load_default_textdomain() {

	/** Unload default files first */
	unload_textdomain( 'default' );

	/** Global: loading */
	ddw_wpgf_load_textdomain( 'default', '' );

	/** Admin */
	if ( is_admin()
		|| ( defined( 'WP_REPAIRING' ) && WP_REPAIRING )
	) {

		ddw_wpgf_load_textdomain( 'default', 'admin-' );

	}  // end if

	/** Network Admin */
	if ( is_network_admin()
		|| ( defined( 'WP_INSTALLING_NETWORK' ) && WP_INSTALLING_NETWORK )
	) {

		ddw_wpgf_load_textdomain( 'default', 'admin-network-' );

	}  // end if

}  // end of function ddw_wp_load_default_textdomain


add_action( 'after_setup_theme', 'ddw_wpgf_load_default_themes_textdomain' );
/**
 * Re-load the textdomain for a default theme, use our own, packaged translation
 *    files. All that happens after unloading the original default/ packaged
 *    translations (that come from translate.wordpress.org).
 *
 * NOTE: See above remarks for ddw_wpgf_load_default_textdomain().
 *
 * @since 1.0.6
 *
 * @uses  wp_get_theme()
 * @uses  unload_textdomain()
 * @uses  ddw_wpgf_load_textdomain()
 */
function ddw_wpgf_load_default_themes_textdomain() {

	$theme = wp_get_theme();

	$theme_domain = esc_attr( $theme->display( 'TextDomain' ) );

	/** 2014 Twenty Fourteen */
	if ( $theme_domain == 'twentyfourteen' || $theme->display( 'Name' ) == 'Twenty Fourteen' ) {

		unload_textdomain( 'twentyfourteen' );

		ddw_wpgf_load_textdomain( 'twentyfourteen', 'twentyfourteen-' );

	}  // end if

	/** 2010-2013 Twenty Ten, Twenty Eleven, Twenty Twelve, Twenty Thirteen */
	if ( in_array( $theme_domain, array( 'twentythirteen', 'twentytwelve', 'twentyeleven', 'twentyten' ) ) ) {

		unload_textdomain( $theme_domain );

		ddw_wpgf_load_textdomain( $theme_domain, $theme_domain . '-' );

	}  // end if

}  // end of function


add_action( 'core_upgrade_preamble', 'ddw_wpgf_update_info', 11 );
/**
 * User message on "update-core.php" admin screen about updates when using a
 *    localized version of WordPress.
 *
 * @since 1.0.0
 */
function ddw_wpgf_update_info() {

	$update_info_message = sprintf(
		'<br /><h3>%s</h3><p>%s</p><p>%s</p>',
		'&rarr; ' . esc_attr__( 'Important info for "WP German Formal" plugin:', 'wp-german-formal' ),
		esc_attr__( 'You are currently have enabled the "WP German Formal" plugin to let load your translations for WordPress Core (global, admin, network admin). That is, generally speaking, perfectly fine. :) So thank you, first!', 'wp-german-formal' ),
		esc_attr__( 'However, if you were/ are originally using a localized version of WordPress, let\'s say with German language pack, you can update your WordPress install like normal. It will also update the default (a.k.a. packaged) language packs. Since you have the above mentioned plugin active, the language packs from that plugin will be loaded and displayed. To have the default translations displayed you must deactivate the mentioned plugin.', 'wp-german-formal' )
	);

	?>

		<div id="wpgf-update-info" class="description"><?php echo $update_info_message; ?></div>

	<?php

}  // end of function ddw_wpgf_update_info