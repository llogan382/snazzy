<?php
/**
 * The template for displaying the singular portfolio post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

get_header();

snazzy_set_post_views( get_the_ID() ); ?>


<div id="primary" class="content-area">
<?php 
$ftc_link = esc_html( get_theme_mod( 'snazzy_custom_ftc_link' ) );
if (is_singular() ) {
	printf(
		'<p class="snazzy-custom-ftc">%s</p>', esc_html( get_theme_mod( 'snazzy_custom_ftc', 'Test' ) )
	);
	echo( '<a  target="_blank" class="snazzy-custom-ftc snazzy-custom-ftc-link" href="//' .
		$ftc_link . '">Learn More</a>'
		);
}
?>

	<main id="main" class="site-main" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


			<?php
			while ( have_posts() ) :

				the_post();

				snazzy_gallery( $post->ID, 'port-full' );


				echo '<div class="project-description">';



				the_title( '<h1 class="entry-title">', '</h1>' );

				get_template_part( 'template-parts/portfolio-content' );

				echo '<div class="entry-content">';
					the_content();
				echo '</div>';

				// Output the post meta.
				get_template_part( 'template-parts/portfolio-meta' );


				echo '</div">';

			endwhile;

			if ( true === get_theme_mod( 'portfolio_lightbox' ) ) {
				get_template_part( 'template-parts/photoswipe' );
			}
			?>

		</article>

	</main>

	<?php
	if ( true === get_theme_mod( 'portfolio_loop' ) ) {
		get_template_part( 'template-parts/portfolio-more' );
	}
	?>

</div>

<?php
get_footer();
