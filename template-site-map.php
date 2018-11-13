<?php
/**
 * Template Name: Site Map
 * The template for displaying the site map.
 *
 * This template simply defaults to the standard page layout,
 * for which specialized content is loaded based on a is_page_template
 *
 * Reference page.php and template-parts/content-page.php.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main site-main--wrapper" role="main">

		<?php
		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile;
		?>

	</main>
</div>

<?php
get_footer();
