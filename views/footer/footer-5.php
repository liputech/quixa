<?php
/**
 * Template part for displaying footer
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

$footer_width = 'container' . quixa_option( 'rt_footer_width' );
?>

<?php if ( is_active_sidebar( 'rt-footer-sidebar' ) ) : ?>
	<div class="footer-widgets-wrapper">
		<?php if ( quixa_option( 'rt_shape_footer' ) ) { ?>
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
			<div class="footer-widgets row">
				<?php dynamic_sidebar( 'rt-footer-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .site-info -->
<?php endif; ?>

<?php if ( ! empty( quixa_option( 'rt_footer_copyright' ) ) ) : ?>
	<div class="footer-copyright-wrapper">
		<div class="footer-container <?php echo esc_attr( $footer_width ) ?>">
			<div class="copyright-text-wrap d-flex align-items-center justify-content-center">
				<ul class="rt-footer-star-shape">
					<li><?php quixa_get_img( 'footer-star.svg', true, 'width="47" height="47"' ) . "' alt='"; ?></li>
					<li><?php quixa_get_img( 'footer-star.svg', true, 'width="47" height="47"' ) . "' alt='"; ?></li>
				</ul>
				<div class="copyright-text">
					<?php echo quixa_html( str_replace( '[y]', date( 'Y' ), quixa_option( 'rt_footer_copyright' ) ) ); ?>
				</div>
			</div>
		</div>

	</div>
<?php endif; ?>
<?php quixa_scroll_top(); ?>
