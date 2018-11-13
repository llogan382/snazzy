<?php
/**
 * The sidebar containing the main widget area for pages.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>

<div id="sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
