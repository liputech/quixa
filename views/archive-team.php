<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use RT\Quixa\Helpers\Fns;
use RT\Quixa\Options\Opt;
use RT\Quixa\Modules\Pagination;

$post_classes = "";
if ( Opt::$layout == 'right-sidebar' || Opt::$layout == 'left-sidebar' ) {
	$post_classes = 'col-sm-6 col-lg-4';
} else {
	$post_classes = 'col-sm-6 col-xl-3 col-lg-4';
}

if ( quixa_option( 'rt_team_style' ) == 'default' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-1";
} elseif ( quixa_option( 'rt_team_style' ) == '2' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-2";
} elseif ( quixa_option( 'rt_team_style' ) == '3' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-3";
} elseif ( quixa_option( 'rt_team_style' ) == '4' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-4";
} else {
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-1";
}
$content_columns = Fns::content_columns();

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $team_archive_layout );?> <?php echo esc_attr( $content_columns ); ?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
						<div class="row item-parent">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="<?php echo esc_attr( $post_classes );?> item">
									<?php get_template_part( 'views/content-team', quixa_option( 'rt_team_style' ) ); ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php else:?>
						<?php get_template_part( 'views/content', 'none' );?>
					<?php endif;?>
					<?php Pagination::pagination(); ?>
				</main>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
