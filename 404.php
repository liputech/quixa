<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package quixa
 */

use RT\Quixa\Helpers\Fns;

get_header();


?>

	<div class="container">

		<div class="row">

			<div class="col-sm-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main error-404" role="main">

						<?php
						if ( ! empty( quixa_option( 'rt_error_image' ) ) ) {
							echo wp_get_attachment_image( quixa_option( 'rt_error_image' ), 'full', true );
						} else {
							quixa_get_img( '404.svg', true, 'width="1007" height="530"' ) . "' alt='";
						}
						?>

						<div class="error-info">
							<h2 class="error-title"><?php echo wp_kses( quixa_option( 'rt_error_heading' ), 'allowed_html' ); ?></h2>
							<p><?php echo wp_kses( quixa_option( 'rt_error_text' ), 'allowed_html' ); ?></p>
							<a class="btn btn-primary"
							   href="<?php echo esc_url( home_url() ) ?>"><?php echo wp_kses( quixa_option( 'rt_error_button_text' ), 'allowed_html' ); ?></a>
						</div>
					</main><!-- #main -->
				</div><!-- #primary -->

			</div><!-- .col- -->

		</div><!-- .row -->

	</div><!-- .container -->

<?php
get_footer();
