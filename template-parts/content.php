<?php
/**
 * The template part for displaying content
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php snazzy_post_thumbnail(); ?>

	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<div class="entry-content">
		<?php
			the_content();

		?>
	</div><!-- .entry-content -->


</article>
