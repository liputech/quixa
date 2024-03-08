<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

use RT\Quixa\Helpers\Fns;
use RT\Quixa\Modules\Pagination;
use RT\Quixa\Options\Opt;

get_header();
$content_columns = Fns::content_columns();

$post_classes = "";
if ( Opt::$layout == 'right-sidebar' || Opt::$layout == 'left-sidebar' ) {
	$post_classes = 'col-sm-6 col-lg-4';
} else {
	$post_classes = 'col-sm-6 col-xl-3 col-lg-4';
}

?>
	<div id="primary" class="content-area">
		<div class="container">
			<div class="row align-stretch">
				<div class="<?php echo esc_attr( $content_columns ); ?>">
					<main id="main" class="site-main" role="main">
						<div class="row">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post(); ?>
									<div class="<?php echo esc_attr( $post_classes ); ?>">
										<?php get_template_part( 'views/content', 'team-1' ); ?>
									</div>
								<?php endwhile;
							else :
								get_template_part( 'views/content', 'none' );
							endif;
							?>
						</div>
						<?php Pagination::pagination(); ?>
					</main><!-- #main -->
				</div><!-- .col- -->
				<?php get_sidebar(); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_footer();
