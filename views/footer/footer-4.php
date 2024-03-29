<?php
/**
 * Template part for displaying footer
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

$footer_width     = 'container' . quixa_option( 'rt_footer_width' );
$copyright_center = quixa_option( 'rt_social_footer' ) ? 'justify-content-between' : 'justify-content-center';
?>

<?php if ( is_active_sidebar( 'rt-footer-sidebar' ) ) : ?>
	<div class="footer-widgets-wrapper">
		<?php if( quixa_option('rt_shape_footer') ) { ?>
		<div class="footer-blur-shape">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<div class="rt-footer-shape"><?php quixa_get_img( 'footer-shape.svg', true, 'width="90" height="113"' ) . "' alt='"; ?></div>
		<?php } ?>

		<div class="footer-container <?php echo esc_attr( $footer_width ) ?>">
			<?php if( quixa_option('rt_contact_footer') || quixa_option('rt_footer_logo_display') ) { ?>
			<div class="rt-top-wrap">
				<div class="rt-footer-star-shape"><?php quixa_get_img( 'footer-star.svg', true, 'width="47" height="47"' ) . "' alt='"; ?></div>
				<div class="rt-footer-top d-flex column-gap-20 align-items-center justify-content-between">
					<?php if( quixa_option('rt_footer_logo_display') ) { ?>
					<div class="footer-logo">
						<?php
						if ( ! empty( quixa_option( 'rt_footer_logo' ) ) ) {
							echo wp_get_attachment_image( quixa_option( 'rt_footer_logo' ), 'full', true );
						} else {
							quixa_get_img( 'logo-light.svg', true, 'width="101" height="28"' ) . "' alt='";
						}
						?>
					</div>
					<?php } ?>

					<?php if ( quixa_option( 'rt_contact_footer' ) ) { ?>
					<div class="rt-footer-cta d-flex column-gap-20 align-items-center">
						<div class="rt-cta-title"><?php echo wp_kses( quixa_option( 'rt_ready_label' ), 'allowed_html' ); ?></div>
						<div class="quixa-button">
							<a href="<?php echo esc_url( quixa_option( 'rt_contact_button_url' ) ) ?>"
							   class="btn button-2">
								<span class="btn-wrap">
									<span
										class="btn-text1"><?php echo wp_kses( quixa_option( 'rt_contact_button_text' ), 'allowed_html' ); ?><i
											class="icon-rt-arrow-right-1"></i> </span>
									<span
										class="btn-text2"><?php echo wp_kses( quixa_option( 'rt_contact_button_text' ), 'allowed_html' ); ?><i
											class="icon-rt-arrow-right-1"></i> </span>
								</span>
							</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>

			<div class="footer-widgets row">
				<?php dynamic_sidebar( 'rt-footer-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .site-info -->
<?php endif; ?>

<?php if ( ! empty( quixa_option( 'rt_footer_copyright' ) ) ) : ?>
	<div class="footer-copyright-wrapper">
		<div class="footer-container <?php echo esc_attr( $footer_width ) ?>">
			<div class="copyright-text-wrap d-flex align-items-center <?php echo esc_attr( $copyright_center ); ?>">
				<div class="copyright-text">
					<?php echo quixa_html( str_replace( '[y]', date( 'Y' ), quixa_option( 'rt_footer_copyright' ) ) ); ?>
				</div>
				<?php if ( quixa_option( 'rt_social_footer' ) ) { ?>
					<div class="social-icon d-flex gap-20 align-items-center">
						<div class="social-icon d-flex column-gap-10">
							<?php if ( quixa_option( 'rt_follow_us_label' ) ) { ?>
								<label><?php echo quixa_option( 'rt_follow_us_label' ) ?></label><?php } ?>
							<?php quixa_get_social_html( '#555' ); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>
<?php endif; ?>
<?php quixa_scroll_top(); ?>
