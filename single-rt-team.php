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

?>
	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main" role="main">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'views/content', 'single-team' );
					endwhile;
				else :
					get_template_part( 'views/content', 'none' );
				endif;
				?>
			</main><!-- #main -->
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_footer();
