<?php
/**
 * Updater Config
 *
 * @package     Snazzy
 * @link        https://themebeans.com/themes/snazzy
 * @author      Rich Tabor of ThemeBeans <hello@themebeans.com>
 * @copyright   Copyright (c) 2018, ThemeBeans of Inventionn LLC
 * @license     GPL-3.0
 */

$updater = new ThemeBeans_License(

	$config = array(
		'remote_api_url' => 'https://themebeans.com',
		'item_name'      => esc_attr( themebeans_get_theme( false ) ),
		'theme_slug'     => esc_attr( themebeans_get_theme( true ) ),
		'version'        => esc_attr( wp_get_theme( get_template() )->get( 'Version' ) ),
		'author'         => 'ThemeBeans',
		'download_id'    => '21177',
		'renew_url'      => '',
		'beta'           => false,
	)
);
