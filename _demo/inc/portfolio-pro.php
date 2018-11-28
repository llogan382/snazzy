<?php
/**
 * Custom functionality if Portfolio Pro is activated.
 *
 * @package     Snazzy
 * @link        https://themebeans.com/themes/snazzy
 * @author      Rich Tabor of ThemeBeans <hello@themebeans.com>
 * @copyright   Copyright (c) 2018, ThemeBeans of Inventionn LLC
 * @license     GPL-3.0
 */

/**
 * Use this filter to modify the post types that the builder works with.
 *
 * @param array $post_types Array of post types to enable.
 * @link http://kb.wpbeaverbuilder.com/article/117-plugin-filter-reference
 */
function snazzy_bb_enable_post_types( $post_types ) {
	$post_types[] = apply_filters( 'snazzy_beaver_builder_post_types', 'portfolio' );
	return $post_types;
}
add_filter( 'fl_builder_post_types', 'snazzy_bb_enable_post_types' );

/**
 * Modifies the portfolio args to output in a sorted order.
 *
 * @param  array $args Default arguments for the portfolio post type.
 * @return array of arguments for the portfolio post query.
 */
function snazzy_portfolio_professional_args( $args ) {

	if ( class_exists( 'Portfolio_Professional' ) ) {

		$sorting = array(
			'order'   => 'ASC',
			'orderby' => 'menu_order',

		);

		// Combine the two arrays.
		$args = array_merge( $args, $sorting );

	}

	return $args;
}
add_filter( 'snazzy_portfolio_args', 'snazzy_portfolio_professional_args' );

/**
 * Filter the portfolio loop to not include featured posts, as they are featured above it.
 *
 * @param  array $args Default arguments for the portfolio post type.
 */
function snazzy_portfolio_professional_exclude_featured_args( $args ) {

	if ( class_exists( 'Portfolio_Professional' ) ) {

		$meta = array(
			'meta_query' => array(
				'relation' => 'OR',
				// All posts not featured.
				array(
					'key'   => '_portfolio_pro_featured',
					'value' => 'off',
				),
				// All posts without the option checked on or off.
				array(
					'key'     => '_portfolio_pro_featured',
					'compare' => 'NOT EXISTS',
				),
			),
		);

		// Combine the two arrays.
		$args = array_merge( $args, $meta );

	}

	return $args;
}
add_filter( 'snazzy_portfolio_args', 'snazzy_portfolio_professional_exclude_featured_args' );

/**
 * Output the featured posts above the standard loop.
 */
function snazzy_portfolio_featured_loop() {

	if ( class_exists( 'Portfolio_Professional' ) ) {

		// Pull pagination count setting from the Customizer.
		$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count', -1 );

		// Pull pagination from the WordPress reading settings.
		$paged = 1;

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		}

		if ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		}

		$args = array(
			'post_type'      => 'portfolio',
			'paged'          => $paged,
			'posts_per_page' => $portfolio_posts_count,
			'meta_query'     => array(
				array(
					'key'   => '_portfolio_pro_featured',
					'value' => 'on',
				),
			),
		);

		$wp_query = new WP_Query( $args );

		if ( $wp_query->have_posts() ) :

			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();

				get_template_part( 'template-parts/portfolio-loop' );

			endwhile;

		endif;

	}
}
add_action( 'snazzy_before_portfolio', 'snazzy_portfolio_featured_loop' );
