<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newsfit
 */

use RT\Newsfit\Helpers\Fns;

get_header(); ?>

	<div class="container">

		<div class="row">

			<div class="<?php echo Fns::content_columns() ?>">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'views/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile;

						?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div><!-- .col- -->

			<?php get_sidebar(); ?>

		</div><!-- .row -->

	</div><!-- .container -->

<?php
get_footer();
