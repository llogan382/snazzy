<?php
/**
 * Theme backwards compatibility functionality
 *
 * Prevents @@pkg.name from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

/**
 * Prevent switching to @@pkg.name on old versions of WordPress.
 *
 * Switches to the default theme.
 */
function themebeans_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'themebeans_upgrade_notice' );
}
add_action( 'after_switch_theme', 'themebeans_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * this theme on WordPress versions prior to 4.7.
 */
function themebeans_upgrade_notice() {
	$message = sprintf( esc_html__( '@@pkg.name requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', '@@textdomain' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', esc_html( $message ) );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.7.
 */
function themebeans_customize() {
	wp_die(
		sprintf( esc_html__( '@@pkg.name requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', '@@textdomain' ), esc_html( $GLOBALS['wp_version'] ) ), '', array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'themebeans_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.7.
 */
function themebeans_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( '@@pkg.name requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', '@@textdomain' ), esc_html( $GLOBALS['wp_version'] ) ) );
	}
}
add_action( 'template_redirect', 'themebeans_preview' );
