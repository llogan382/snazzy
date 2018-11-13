<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package     @@pkg.name
 * @link        @@pkg.theme_uri
 * @author      @@pkg.author
 * @copyright   @@pkg.copyright
 * @license     @@pkg.license
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="page-header">
					<?php snazzy_site_logo(); ?>
					<p><?php esc_html_e( 'Sorry, this page does not exist.', '@@textdomain' ); ?></p>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'View the homepage', '@@textdomain' ); ?></a></p>
				</div><!-- .page-content -->

			</section><!-- .error-404 -->

		</main><!-- .site-main -->

	</div><!-- .content-area -->

<?php
get_footer();
