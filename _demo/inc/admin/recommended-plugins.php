<?php
/**
 * Recommended Plugins.
 *
 * @package     Snazzy
 * @link        https://themebeans.com/themes/snazzy
 * @author      Rich Tabor of ThemeBeans <hello@themebeans.com>
 * @copyright   Copyright (c) 2018, ThemeBeans of Inventionn LLC
 * @license     GPL-3.0
 */

/**
 * Add plugins to the theme's suggested plugins.
 *
 * @param  array $args Default arguments for the portfolio post type.
 * @return array of arguments for the portfolio post query.
 */
function themebeans_add_recommended_plugins( $args ) {

	$plugins = array(
		array(
			'name'     => esc_html__( 'Login Designer', 'snazzy' ),
			'slug'     => 'login-designer',
			'required' => false,
		),
	);

	// Combine the two arrays.
	$args = array_merge( $args, $plugins );

	// Let's check if Gutenberg is activated.
	if ( function_exists( 'register_block_type' ) ) {

		$gutenberg_plugins = array(
			array(
				'name'     => esc_html__( 'CoBlocks', 'snazzy' ),
				'slug'     => 'coblocks',
				'required' => false,
			),
		);

		// Combine the two arrays.
		$args = array_merge( $args, $gutenberg_plugins );
	}

	return $args;
}
add_filter( 'themebeans_recommended_plugins', 'themebeans_add_recommended_plugins' );
