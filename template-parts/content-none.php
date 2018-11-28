<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */
?>

<section class="no-results not-found">

    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', '@@textdomain' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php get_search_form(); ?>
    </div><!-- .page-content -->

</section><!-- .no-results -->
