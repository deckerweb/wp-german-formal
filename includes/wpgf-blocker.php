<?php
/**
 * Helper functions for for setting blockers to language pack updating.
 *
 * @package    WP German Formal
 * @subpackage Language Packs
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/wp-german-formal/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.0.8
 */

/**
 * Exit if accessed directly
 *
 * @since 1.0.8
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/** Deactivate Language Pack Updates - for de_DE locale: */
if ( 'de_DE' == get_locale() ) {

	add_filter( 'auto_update_translation', '__return_false' );

}  // end if

/** WordPress Core updates: always use default locale */
add_filter( 'core_version_check_locale', '__return_empty_string' );


add_action( 'core_upgrade_preamble', 'ddw_wpgf_blocker_info', 11 );
/**
 * User message on "update-core.php" admin screen about updates when using a
 *    localized version of WordPress.
 *
 * Hooked into: 'core_upgrade_preamble' / priority: 11
 *
 * @since 1.0.8
 */
function ddw_wpgf_blocker_info() {

	$update_info_message = sprintf(
		'<br /><h3>%s</h3><p>%s</p><p>%s</p>',
		'&rarr; ' . esc_attr__( 'Important info for "WP German Formal" plugin:', 'wp-german-formal' ),
		esc_attr__( 'You are currently have enabled the "WP German Formal" plugin to let load your translations for WordPress Core (global, admin, network admin). That is, generally speaking, perfectly fine. :) So thank you, first!', 'wp-german-formal' ),
		sprintf(
			esc_attr__( 'You have currently defined our helper constant %s in your %s file. Therefore updates for language packs are deactivated for the German locale %s. Also, your WordPress Core install will download/ update no WordPress Core language packs (for WordPress itself), so it will always use the default version (that is locale %s). To change that behavior, just remove or uncomment the helper constant.', 'wp-german-formal' ),
			'<code>WPGF_BLOCK_DE_LANGUAGE_PACKS</code>',
			'<code>wp-config.php</code>',
			'<code>de_DE</code>',
			'<code>en_US</code>'
		)
	);

	?>

		<div id="wpgf-update-info" class="description"><?php echo $update_info_message; ?></div>

	<?php

}  // end of function ddw_wpgf_blocker_info