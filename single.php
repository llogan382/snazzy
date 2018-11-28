<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main site-main--wrapper site-main--index" role="main">

		<?php
		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'single' );

			if ( ! is_singular( 'attachment' ) ) {

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}

			the_post_navigation(
				array(
					'next_text' => '<span class="meta-nav" aria-hidden="true"></span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next Post', '@@textdomain' ) . '</span> ' .
						'<span class="post-title">&rarr;</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true"></span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous Post', '@@textdomain' ) . '</span> ' .
						'<span class="post-title">&larr;</span>',
				)
			);

		endwhile;
		?>

	</main>

</div>

<?php
get_footer();
