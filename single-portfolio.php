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

	<main id="main" class="site-main" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			while ( have_posts() ) :

				the_post();

				snazzy_gallery( $post->ID, 'port-full' );

				get_template_part( 'template-parts/portfolio-content' );

				echo '<div class="project-description">';

				the_title( '<h1 class="entry-title">', '</h1>' );

				echo '<div class="entry-content">';
					the_content();
				echo '</div>';

				// Output the post meta.
				get_template_part( 'template-parts/portfolio-meta' );

				// Include the post-to-post navigational arrows if selected via the Customizer.
				if ( true === get_theme_mod( 'portfolio_navigation' ) ) {
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Next Post', '@@textdomain' ) . '</span><span class="post-title">&rarr;</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Previous Post', '@@textdomain' ) . '</span><span class="post-title">&larr;</span>',
						)
					);
				}

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
