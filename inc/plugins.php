<?php
/**
 * TGMPA Required Plugins.
 *
 * Register the required plugins for this theme.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function snazzy_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$args = array(

		array(
			'name'     => esc_html__( 'Portfolio Post Type', '@@textdomain' ),
			'slug'     => 'portfolio-post-type',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Simple Post Ordering', '@@textdomain' ),
			'slug'     => 'simple-custom-post-order',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Contact Form 7', '@@textdomain' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
	);

	$plugins = apply_filters( 'themebeans_recommended_plugins', $args );

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => '@@textdomain',          // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be at the top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'snazzy_register_required_plugins' );
