<?php
/**
 * Various helper functions.
 *
 * @package    WP German Formal
 * @subpackage Functions
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/wp-german-formal/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.0.0
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
 * User message on "update-core.php" admin screen about updates when using a
 *    localized version of WordPress.
 *
 * Hooked into: 'core_upgrade_preamble' / priority: 11
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