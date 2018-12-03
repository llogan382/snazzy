<?php
/**
 * The template part for displaying single pages.
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php
    if ( has_post_thumbnail() ) :
        echo '<div class="post-thumbnail">';
            the_post_thumbnail('page-feat');
        echo '</div>';
    endif;
    ?>

    <div class="entry-content">
        <?php
        the_content();

        /*
         * Check to see if the page is using specialized page templates.
         * If so, load the functions below to get the specialized content.
         * If you want to override this in a child theme, then include the
         * functions below (located in the template-tags.php file) and
         * place them in your child theme's functions.php file.
         */

        if ( is_page_template('template-site-map.php') ) {
            snazzy_site_map();
        }

        if ( is_page_template('template-archive.php') ) {
            snazzy_site_archive();
        }

        if ( is_page_template('template-contact.php') ) {
            get_template_part( 'template-parts/contact', 'form' );
        }
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->