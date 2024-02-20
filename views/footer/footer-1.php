<?php
/**
 * Template part for displaying footer
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

$footer_width = 'container'.quixa_option('rt_footer_width');
?>

<?php if ( is_active_sidebar( 'rt-footer-sidebar' ) ) : ?>
	<div class="footer-widgets-wrapper">
		<div class="footer-container <?php echo esc_attr($footer_width) ?>">
			<div class="footer-widgets row">
				<?php dynamic_sidebar( 'rt-footer-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .site-info -->
<?php endif; ?>

<?php if ( has_nav_menu( 'footer' ) ) : ?>
	<div class="footer-menu-wrapper">
		<div class="footer-container <?php echo esc_attr($footer_width) ?>">
			<div class="row <?php echo quixa_option('rt_footer_menu_alignment') ?>">
				<div class="row ml-0 mr-0">
					<nav id="footer-menu" class="quixa-navigation pr-10" role="navigation">
						<?php
						wp_nav_menu( [
							'theme_location' => 'footer',
							'menu_class'     => 'quixa-navbar',
							'items_wrap'     => '<ul id="%1$s" class="%2$s quixa-footer-menu">%3$s</ul>',
							'fallback_cb'    => 'quixa_custom_menu_cb',
							'walker'         => has_nav_menu( 'footer' ) ? new RT\Quixa\Core\WalkerNav() : '',
						] );
						?>
					</nav><!-- .footer-navigation -->
				</div>
			</div>
		</div>
	</div><!-- .footer-fop -->
<?php endif; ?>

<?php if ( ! empty( quixa_option( 'rt_footer_copyright' ) ) ) : ?>
	<div class="footer-copyright-wrapper text-center">
		<div class="copyright-text">
			<?php echo quixa_html( str_replace( '[y]', date( 'Y' ), quixa_option( 'rt_footer_copyright' ) ) ); ?>
		</div>
	</div>
<?php endif; ?>

<?php quixa_scroll_top(); ?>
