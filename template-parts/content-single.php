<?php
/**
 * The template part for displaying single posts
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php if ( has_excerpt() ) { ?>
        <div class="entry-intro">
            <?php the_excerpt(); ?>
        </div><!-- .entry-intro -->
    <?php } ?>

    <?php snazzy_post_thumbnail(); ?>

    <?php

    if ( is_sticky() && is_home() && ! is_paged() ) {
        // printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', '@@textdomain' ) );
    } ?>

    <div class="entry-content">
        <?php
            /* translators: %s: Name of current post */
            the_content( sprintf(
                wp_kses( __( 'Continue reading %s', '@@textdomain' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        snazzy_entry_meta();
        ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->