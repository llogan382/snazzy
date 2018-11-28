<?php
/**
 * The sidebar containing the main widget area for pages.
 *
 * @package     Snazzy
 * @link        https://themebeans.com/themes/snazzy
 * @author      Rich Tabor of ThemeBeans <hello@themebeans.com>
 * @copyright   Copyright (c) 2018, ThemeBeans of Inventionn LLC
 * @license     GPL-3.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>

<div id="sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
