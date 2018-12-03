<?php
/**
 * Theme Customizer functionality
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function snazzy_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'settings'        => array( 'blogname' ),
			'render_callback' => 'snazzy_customize_partial_blogname',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'snazzy_customize_partial_blogdescription',
		)
	);

	/**
	 * Add custom controls.
	 */
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . 'class-themebeans-range-control.php' );

	/**
	 * Top-Level Customizer sections and panels.
	 */
	$wp_customize->add_panel(
		'snazzy_theme_options', array(
			'title'       => esc_html__( 'Theme Options', '@@textdomain' ),
			'description' => esc_html__( 'Customize various options throughout the theme with the settings within this panel.', '@@textdomain' ),
			'priority'    => 40,
		)
	);

	/**
	 * Add the site logo max-width options to the Site Identity section.
	 */
	$wp_customize->add_setting(
		'custom_logo_max_width', array(
			'default'           => 40,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'custom_logo_max_width', array(
				'default'     => 40,
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Max Width', '@@textdomain' ),
				'description' => 'px',
				'section'     => 'title_tagline',
				'priority'    => 8,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 300,
					'step' => 2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'custom_logo_mobile_max_width', array(
			'default'           => 40,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'custom_logo_mobile_max_width', array(
				'default'     => 40,
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Mobile Max Width', '@@textdomain' ),
				'description' => 'px',
				'section'     => 'title_tagline',
				'priority'    => 9,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 200,
					'step' => 2,
				),
			)
		)
	);

	/**
	 * Theme Customizer Sections.
	 * For more information on Theme Customizer settings and default sections:
	 *
	 * @see https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
	 */

	$wp_customize->add_section(
		'custom_options', array(
			'title' => esc_html__( 'Custom Options', '@@textdomain' ),
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'custom_blog_title', array(
			'default'  => 'Title',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_html',
			)
	);

	$wp_customize->add_control(
		'custom_blog_title', array(
			'type'        => 'text',
			'label'       => esc_html__( 'Blog Title', '@@textdomain' ),
			'description' => esc_html__( 'Enter the text of the contact form button.', '@@textdomain' ),
			'section'     => 'custom_options',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'custom_blog_title', array(
			'selector'        => '#custom_title',
			'render_callback' => 'snazzy_customize_partial_blogdescription',
		)
	);

	$wp_customize->add_setting(
		'snazzy_custom_ftc', array(
			'default'  => 'The Giftler is supported by wonderful readers like you. When you buy through links on our site, we may earn a commission.',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_html',
			)
	);

	$wp_customize->add_control(
		'snazzy_custom_ftc', array(
			'type'        => 'text',
			'label'       => esc_html__( 'FTC Warning', '@@textdomain' ),
			'description' => esc_html__( 'Enter the text to appear in the FTC warning in the header.', '@@textdomain' ),
			'section'     => 'custom_options',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'snazzy_custom_ftc', array(
			'selector'        => '#snazzy-custom-ftc',
			'render_callback' => 'snazzy_customize_partial_blogdescription',
		)
	);

	$wp_customize->add_setting(
		'snazzy_custom_ftc_link', array(
			'default'  => 'thegiftler.com',
			'transport' => 'postMessage',
			)
	);

	$wp_customize->add_control(
		'snazzy_custom_ftc_link', array(
			'type'        => 'url',
			'label'       => esc_html__( 'FTC Warning Links', '@@textdomain' ),
			'description' => esc_html__( 'Enter any links for FTC warnings.', '@@textdomain' ),
			'section'     => 'custom_options',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'snazzy_custom_ftc_link', array(
			'selector'        => '#snazzy-custom-ftc-link',
			'render_callback' => 'snazzy_customize_partial_blogdescription',
		)
	);


	// Add the portfolio loop selector setting and control.
	$wp_customize->add_setting(
		'portfolio_loop', array(
			'default'           => false,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);
	$wp_customize->add_section(
		'snazzy_portfolio', array(
			'title' => esc_html__( 'Portfolio', '@@textdomain' ),
			'panel' => 'snazzy_theme_options',
		)
	);
	$wp_customize->add_control(
		'portfolio_loop', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Single Portfolio Loop', '@@textdomain' ),
			'description' => esc_html__( 'Activate the portfolio loop on all portfolio posts, which contains a masonry grid of all posts.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	// Add the portfolio sorting selector setting and control.
	$wp_customize->add_setting(
		'portfolio_sorting', array(
			'default'           => true,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'portfolio_sorting', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Portfolio Sorting', '@@textdomain' ),
			'description' => esc_html__( 'Optional "Random", "Popularity" and "Date" sorting toggles on the portfolio template.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	// Add the portfolio sorting selector setting and control.
	$wp_customize->add_setting(
		'portfolio_filter', array(
			'default'           => true,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'portfolio_filter', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Portfolio Filter', '@@textdomain' ),
			'description' => esc_html__( 'Optional filter links on the portfolio template.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	// Add the portfolio lazy-loading selector setting and control.
	$wp_customize->add_setting(
		'portfolio_lazyload', array(
			'default'           => false,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'portfolio_lazyload', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Gallery Lazy Loading', '@@textdomain' ),
			'description' => esc_html__( 'Boosts performance by delaying the loading of images outside of the visible viewport.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	// Add the portfolio lightbox selector setting and control.
	$wp_customize->add_setting(
		'portfolio_lightbox', array(
			'default'           => true,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'portfolio_lightbox', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Photoswipe Lightbox', '@@textdomain' ),
			'description' => esc_html__( 'Add a JavaScript image gallery to single views for mobile and desktop viewports, with touch gestures, zooming and optimized asset delivery.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	// Add the portfolio sorting selector setting and control.
	$wp_customize->add_setting(
		'portfolio_navigation', array(
			'default'           => true,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'portfolio_navigation', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Portfolio Navigation', '@@textdomain' ),
			'description' => esc_html__( 'Enable the post-to-post navigation arrows on single portfolio posts.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	// Add the portfolio post count selector setting and control.
	$wp_customize->add_setting(
		'portfolio_posts_count', array(
			'default'           => '',
			'sanitize_callback' => 'bean_sanitize_number_intval',
		)
	);

	$wp_customize->add_control(
		'portfolio_posts_count', array(
			'type'        => 'number',
			'label'       => esc_html__( 'Portfolio Count', '@@textdomain' ),
			'description' => esc_html__( 'Set the number of posts to display on the portfolio template. Use "-1" to load them all.', '@@textdomain' ),
			'section'     => 'snazzy_portfolio',
		)
	);

	/**
	 * Add the contact section.
	 */
	$wp_customize->add_section(
		'snazzy_theme_options_contact', array(
			'title' => esc_html__( 'Contact', '@@textdomain' ),
			'panel' => 'snazzy_theme_options',
		)
	);

	// Add the contact email address selector setting and control.
	$wp_customize->add_setting(
		'contact_email', array(
			'default'           => '',
			'sanitize_callback' => 'is_email',
		)
	);

	$wp_customize->add_control(
		'contact_email', array(
			'type'        => 'email',
			'label'       => esc_html__( 'Email Address', '@@textdomain' ),
			'description' => esc_html__( 'Enter the email address you would like the contact form to send to.', '@@textdomain' ),
			'section'     => 'snazzy_theme_options_contact',
		)
	);

	// Add the contact email address selector setting and control.
	$wp_customize->add_setting(
		'contact_button', array(
			'default'           => '',
			'sanitize_callback' => 'bean_sanitize_nohtml',
		)
	);

	$wp_customize->add_control(
		'contact_button', array(
			'type'        => 'text',
			'label'       => esc_html__( 'Contact Button', '@@textdomain' ),
			'description' => esc_html__( 'Enter the text of the contact form button.', '@@textdomain' ),
			'section'     => 'snazzy_theme_options_contact',
		)
	);

	/**
	 * Add the footer section.
	 */
	$wp_customize->add_section(
		'snazzy_theme_options_footer', array(
			'title' => esc_html__( 'Footer', '@@textdomain' ),
			'panel' => 'snazzy_theme_options',
		)
	);

	// Add the powered by Snazzy setting and control.
	$wp_customize->add_setting(
		'powered_by_snazzy', array(
			'default'           => true,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'powered_by_snazzy', array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Powered by Snazzy', '@@textdomain' ),
			'section' => 'snazzy_theme_options_footer',
		)
	);

	// Add the powered by WordPress setting and control.
	$wp_customize->add_setting(
		'powered_by_wordpress', array(
			'default'           => false,
			'sanitize_callback' => 'bean_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'powered_by_wordpress', array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'A WordPress run site. Nice.', '@@textdomain' ),
			'section' => 'snazzy_theme_options_footer',
		)
	);

	/**
	 * Add colors.
	 */
	$wp_customize->add_setting(
		'body_text_color', array(
			'default'           => '#1c1c1c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_text_color', array(
				'label'   => esc_html__( 'Body Text', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'theme_accent_color', array(
			'default'           => '#2eba9e',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'theme_accent_color', array(
				'label'   => esc_html__( 'Accent Color', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'header_bg_color', array(
			'default'           => '#1c1c1c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_bg_color', array(
				'label'   => esc_html__( 'Header Background', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'header_title_color', array(
			'default'           => '#fff',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_title_color', array(
				'label'   => esc_html__( 'Header Title', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'header_text_color', array(
			'default'           => '#b7b8b8',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_text_color', array(
				'label'   => esc_html__( 'Header Text', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'overlay_bg_color', array(
			'default'           => '#1c1c1c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'overlay_bg_color', array(
				'label'   => esc_html__( 'Overlay Background', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'overlay_title_color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'overlay_title_color', array(
				'label'   => esc_html__( 'Overlay Title', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'overlay_text_color', array(
			'default'           => '#b7b8b8',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'overlay_text_color', array(
				'label'   => esc_html__( 'Overlay Text', '@@textdomain' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->get_setting( 'contact_button' )->transport       = 'postMessage';
	$wp_customize->get_setting( 'portfolio_sorting' )->transport    = 'postMessage';
	$wp_customize->get_setting( 'header_bg_color' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'header_text_color' )->transport    = 'postMessage';
	$wp_customize->get_setting( 'overlay_bg_color' )->transport     = 'postMessage';
	$wp_customize->get_setting( 'overlay_text_color' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'overlay_title_color' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'portfolio_filter' )->transport     = 'postMessage';
	$wp_customize->get_setting( 'contact_email' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'powered_by_snazzy' )->transport    = 'postMessage';
	$wp_customize->get_setting( 'powered_by_wordpress' )->transport = 'postMessage';
	$wp_customize->get_setting( 'custom_blog_title' )->transport    = 'postMessage';

}

add_action( 'customize_register', 'snazzy_customize_register', 11 );

/**
 * Load dynamic logic for the customizer controls area.
 */
function snazzy_customize_controls_js() {
	wp_enqueue_script( 'snazzy-customize-controls', get_theme_file_uri( '/assets/js/admin/customize-controls' . __PREFIX_ASSET_SUFFIX . '.js' ), array( 'customize-controls' ), '@@pkg.version', true );
}
add_action( 'customize_controls_enqueue_scripts', 'snazzy_customize_controls_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function snazzy_customize_preview_js() {
	wp_enqueue_script( 'snazzy-customize-preview', get_theme_file_uri( 'assets/js/admin/customize-preview' . __PREFIX_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'snazzy_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @see snazzy_customize_register()
 *
 * @return void
 */
function snazzy_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see snazzy_customize_register()
 *
 * @return void
 */
function snazzy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
