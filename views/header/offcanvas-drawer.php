<?php
/**
 * Template part for displaying header offcanvas
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */
use RT\Quixa\Options\Opt;

$topinfo = ( quixa_option( 'rt_topbar_address' ) || quixa_option( 'rt_topbar_phone' ) || quixa_option( 'rt_topbar_email' )) ? true : false;
?>


<div class="quixa-offcanvas-drawer">
	<nav id="site-navigation" class="offcanvas-navigation" role="navigation">
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'walker'         => new RT\Quixa\Core\WalkerNav(),
				)
			);
		endif;
		?>
	</nav><!-- .quixa-navigation -->

	<div class="offcanvas-address">
		<?php if( $topinfo ) { ?>
			<ul class="offcanvas-info">
				<?php if( quixa_option( 'rt_topbar_address' ) ) { ?>
					<li><i class="icon-rt-location-4"></i><?php echo wp_kses( quixa_option( 'rt_contact_address' ) , 'allowed_html' );?> </li>
				<?php } if( quixa_option( 'rt_topbar_phone' ) ) { ?>
					<li><i class="icon-rt-phone-2"></i><a href="tel:<?php echo esc_attr( quixa_option( 'rt_phone' ) );?>"><?php echo wp_kses( quixa_option( 'rt_phone' ) , 'allowed_html' );?></a> </li>
				<?php } if( quixa_option( 'rt_topbar_email' ) ) { ?>
					<li><i class="icon-rt-email"></i><a href="mailto:<?php echo esc_attr( quixa_option( 'rt_email' ) );?>"><?php echo wp_kses( quixa_option( 'rt_email' ) , 'allowed_html' );?></a> </li>
				<?php } ?>
			</ul>
		<?php } ?>
		<ul class="offcan-social-icon">
			<li class="d-flex gap-10">
				<?php if( quixa_option( 'rt_follow_us_label' ) ) { ?><label><?php echo quixa_option( 'rt_follow_us_label' ) ?></label><?php } ?>
				<?php quixa_get_social_html( '#555' ); ?>
			</li>
		</ul>
	</div>

</div><!-- .container -->

<div class="quixa-body-overlay"></div>
