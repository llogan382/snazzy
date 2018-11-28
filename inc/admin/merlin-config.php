<?php
/**
 * Merlin WP Configuration file.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config  = array(
		'directory'            => 'inc/admin/merlin',
		'merlin_url'           => 'merlin',
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes',
		'dev_mode'             => false,
		'license_step'         => true,
		'license_required'     => false,
		'license_help_url'     => 'https://kb.themebeans.com/article/14-license-activation-guide',
		'edd_remote_api_url'   => 'https://themebeans.com',
		'edd_item_name'        => esc_attr( themebeans_get_theme( false ) ),
		'edd_theme_slug'       => esc_attr( themebeans_get_theme( true ) ),
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', '@@textdomain' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', '@@textdomain' ),
		'return-to-dashboard'      => esc_html__( 'Return to the Dashboard', '@@textdomain' ),
		'ignore'                   => esc_html__( 'Disable Wizard', '@@textdomain' ),

		'btn-skip'                 => esc_html__( 'Skip', '@@textdomain' ),
		'btn-next'                 => esc_html__( 'Next', '@@textdomain' ),
		'btn-start'                => esc_html__( 'Start', '@@textdomain' ),
		'btn-no'                   => esc_html__( 'Cancel', '@@textdomain' ),
		'btn-plugins-install'      => esc_html__( 'Install', '@@textdomain' ),
		'btn-child-install'        => esc_html__( 'Install', '@@textdomain' ),
		'btn-content-install'      => esc_html__( 'Install', '@@textdomain' ),
		'btn-import'               => esc_html__( 'Import', '@@textdomain' ),
		'btn-license-activate'     => esc_html__( 'Activate', '@@textdomain' ),
		'btn-license-skip'         => esc_html__( 'Later', '@@textdomain' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', '@@textdomain' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', '@@textdomain' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', '@@textdomain' ),
		'license-label'            => esc_html__( 'License key', '@@textdomain' ),
		/* translators: Theme Name */
		'license-success%s'        => esc_html__( '%s is already registered and activated. Please proceed to the next step.', '@@textdomain' ),
		'license-tooltip'          => esc_html__( 'Need help?', '@@textdomain' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', '@@textdomain' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', '@@textdomain' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', '@@textdomain' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', '@@textdomain' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', '@@textdomain' ),

		'child-header'             => esc_html__( 'Install Child Theme', '@@textdomain' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', '@@textdomain' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', '@@textdomain' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', '@@textdomain' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', '@@textdomain' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', '@@textdomain' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', '@@textdomain' ),

		'plugins-header'           => esc_html__( 'Install Plugins', '@@textdomain' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', '@@textdomain' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', '@@textdomain' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', '@@textdomain' ),
		'plugins-action-link'      => esc_html__( 'Advanced', '@@textdomain' ),

		'import-header'            => esc_html__( 'Import Content', '@@textdomain' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', '@@textdomain' ),
		'import-action-link'       => esc_html__( 'Advanced', '@@textdomain' ),

		'ready-header'             => esc_html__( 'All done. Have fun!', '@@textdomain' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', '@@textdomain' ),
		'ready-action-link'        => esc_html__( 'Extras', '@@textdomain' ),
		'ready-big-button'         => esc_html__( 'View your website', '@@textdomain' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', '@@textdomain' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themebeans.com/contact/', esc_html__( 'Get Theme Support', '@@textdomain' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', '@@textdomain' ) ),
	)
);

/**
 * Filter demo content.
 */
function themebeans_merlin_import_files() {

	return array(
		array(
			'import_file_name'             => esc_html__( 'Demo Content', '@@textdomain' ),
			'local_import_file'            => get_parent_theme_file_path( '/inc/demo/content.xml' ),
			'local_import_widget_file'     => get_parent_theme_file_path( '/inc/demo/widgets.wie' ),
			'local_import_customizer_file' => get_parent_theme_file_path( '/inc/demo/customizer.dat' ),
		),
	);
}
add_filter( 'merlin_import_files', 'themebeans_merlin_import_files' );

/**
 * Filter the license registration check.
 *
 * @return boolean
 */
function themebeans_merlin_is_theme_registered() {

	// If for some reason the licensing class is not found, return.
	if ( ! class_exists( 'ThemeBeans_License' ) ) {
		return;
	}

	$license       = new ThemeBeans_License();
	$status        = $license->status();
	$is_registered = ( 'valid' === $status ) ? true : false;

	return $is_registered;
}
add_filter( 'merlin_is_theme_registered', 'themebeans_merlin_is_theme_registered' );

/**
 * Filter the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug Parent theme slug.
 */
function themebeans_merlin_child_functions_php( $output, $slug ) {

	// Get the parent theme.
	$theme = themebeans_get_theme( false );

	$output = "
		<?php
		/**
		 * {$theme} Child Theme functions and definitions.
		 * This child theme was generated by Merlin WP.
		 *
		 * @package {$theme}
		 * @author  ThemeBeans + Merlin WP <hello@themebeans.com>
		 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
		 *
		 * @link https://developer.wordpress.org/themes/basics/theme-functions/
		 *
		 * When using a child theme you can override certain functions (those wrapped
		 * in a function_exists() call) by defining them first in your child theme's
		 * functions.php file. The child theme's functions.php file is included before
		 * the parent theme's file, so the child theme functions would be used.
		 *
		 * @link https://codex.wordpress.org/Child_Themes
		 */\n\n
	";

	// Let's remove the tabs so that it displays nicely.
	$output = trim( preg_replace( '/\t+/', '', $output ) );

	// Filterable return.
	return $output;
}
add_filter( 'merlin_generate_child_functions_php', 'themebeans_merlin_child_functions_php', 10, 2 );

/**
 * Unset default widgets from specific Widget Areas.
 * If your theme's first widget area is "sidebar-1", you don't need this.
 *
 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation
 *
 * @param  array $widget_areas Arguments for the sidebars_widgets widget areas.
 * @return array of arguments to update the sidebars_widgets option.
 */
function themebeans_merlin_unset_default_widgets_args( $widget_areas ) {

	// Get the parent theme.
	$theme = themebeans_get_theme( true );

	if ( 'tabor' === $theme ) {
		$widget_areas = array(
			'sidebar-2' => array(),
			'sidebar-3' => array(),
		);
	}

	if ( 'ava' === $theme ) {
		$widget_areas = array(
			'sidebar-1'    => array(),
			'footer-col-1' => array(),
			'footer-col-2' => array(),
			'footer-col-3' => array(),
			'footer-col-4' => array(),
			'footer-col-5' => array(),
			'flyout'       => array(),
			'shop-sidebar' => array(),
		);
	}

	if ( 'stash' === $theme ) {
		$widget_areas = array(
			'sidebar-6' => array(),
		);
	}

	if ( 'snazzy' === $theme ) {
		$widget_areas = array(
			'sidebar-1' => array(),
		);
	}

	if ( 'york-pro' === $theme ) {
		$widget_areas = array(
			'footer'    => array(),
			'sidebar-1' => array(),
		);
	}

	if ( 'designer' === $theme ) {
		$widget_areas = array(
			'theme-sidebar' => array(),
		);
	}

	if ( 'plate' === $theme ) {
		$widget_areas = array(
			'sidebar-1' => array(),
			'sidebar-2' => array(),
			'sidebar-3' => array(),
			'sidebar-4' => array(),
			'sidebar-5' => array(),
			'sidebar-6' => array(),
			'sidebar-7' => array(),
		);
	}

	if ( 'emma' === $theme ) {
		$widget_areas = array(
			'internal-sidebar' => array(),
		);
	}

	return $widget_areas;
}
add_filter( 'merlin_unset_default_widgets_args', 'themebeans_merlin_unset_default_widgets_args' );

/**
 * Assign menus after the import has finished.
 */
function themebeans_merlin_after_import() {

	// Get the parent theme.
	$theme = themebeans_get_theme( true );

	// Theme menus.
	$menus = '';

	if ( 'tabor' === $theme ) {

		$main_menu   = get_term_by( 'name', 'Primary', 'nav_menu' );
		$social_menu = get_term_by( 'name', 'Social', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );

		$menus = array(
			'primary' => $main_menu->term_id,
			'social'  => $social_menu->term_id,
			'footer'  => $footer_menu->term_id,
		);
	}

	if ( 'designer' === $theme ) {

		$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

		$menus = array(
			'primary-menu' => $main_menu->term_id,
		);
	}

	if ( 'snazzy' === $theme ) {

		$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

		$menus = array(
			'primary' => $main_menu->term_id,
		);
	}

	if ( 'charmed-pro' === $theme ) {

		$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		$social_menu = get_term_by( 'name', 'Social', 'nav_menu' );

		$menus = array(
			'primary' => $main_menu->term_id,
			'social'  => $social_menu->term_id,
		);
	}

	if ( 'york-pro' === $theme ) {

		$main_menu   = get_term_by( 'name', 'Primary', 'nav_menu' );
		$social_menu = get_term_by( 'name', 'Social', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );

		$menus = array(
			'primary' => $main_menu->term_id,
			'social'  => $social_menu->term_id,
			'footer'  => $footer_menu->term_id,
		);
	}

	set_theme_mod( 'nav_menu_locations', $menus );
}
add_action( 'merlin_after_all_import', 'themebeans_merlin_after_import' );
