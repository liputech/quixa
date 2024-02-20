<?php
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

use RT\Quixa\Options\Opt;

if(! Opt::$has_top_bar) {
	return;
}
$topinfo = ( quixa_option( 'rt_topbar_address' ) || quixa_option( 'rt_topbar_phone' ) || quixa_option( 'rt_topbar_email' )) ? true : false;
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

<div class="quixa-topbar">
	<div class="topbar-container rt-container<?php echo esc_attr($_fullwidth) ?>">
		<div class="topbar-row d-flex align-items-center justify-content-between">
			<?php if( $topinfo ) { ?>
			<ul class="topbar-left d-flex gap-20 align-items-center">
				<?php if( quixa_option( 'rt_topbar_address' ) ) { ?>
				<li> <?php echo quixa_get_svg( 'map-pin' ); ?><?php echo wp_kses( quixa_option( 'rt_contact_address' ) , '$allowed_html' );?> </li>
				<?php } if( quixa_option( 'rt_topbar_phone' ) ) { ?>
				<li> <?php echo quixa_get_svg( 'phone' ); ?><a href="tel:<?php echo esc_attr( quixa_option( 'rt_phone' ) );?>"><?php echo wp_kses( quixa_option( 'rt_phone' ) , '$allowed_html' );?></a> </li>
				<?php } if( quixa_option( 'rt_topbar_email' ) ) { ?>
				<li> <?php echo quixa_get_svg( 'email' ); ?><a href="mailto:<?php echo esc_attr( quixa_option( 'rt_email' ) );?>"><?php echo wp_kses( quixa_option( 'rt_email' ) , '$allowed_html' );?></a> </li>
				<?php } ?>
			</ul>
			<?php } ?>
			<ul class="topbar-right d-flex gap-20 align-items-center">
				<li class="social-icon">
					<?php if( quixa_option( 'rt_follow_us_label' ) ) { ?><label><?php echo quixa_option( 'rt_follow_us_label' ) ?></label><?php } ?>
					<?php quixa_get_social_html( '#555' ); ?>
				</li>
			</ul>
		</div>
	</div>
</div>
