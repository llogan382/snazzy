<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

get_header(); ?>

<div id="primary" class="content-area">

<?php if (is_singular() ) {
	echo '“The Giftler is supported by wonderful readers like you. When you buy through links on our site, we may earn a commission.”
	';}
?>
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
