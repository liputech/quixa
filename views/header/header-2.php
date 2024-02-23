<?php
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

use RT\Quixa\Options\Opt;

$logo_h1 = ! is_singular( [ 'post' ] );
$menu_classes = quixa_option( 'rt_menu_alignment' );
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

	<div class="main-header-section">
		<div class="header-container rt-container<?php echo esc_attr($_fullwidth) ?>">

			<div class="row align-middle m-0">

				<div class="site-branding">
					<?php echo quixa_site_logo( $logo_h1 ); ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="quixa-navigation pl-15 pr-15 <?php echo esc_attr( $menu_classes ) ?>" role="navigation">
					<?php
					wp_nav_menu( [
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'quixa-navbar',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb'    => 'quixa_custom_menu_cb',
						'walker'         => has_nav_menu( 'primary' ) ? new RT\Quixa\Core\WalkerNav() : '',
					] );
					?>
				</nav><!-- .quixa-navigation -->

				<?php quixa_menu_icons_group(); ?>

			</div><!-- .row -->

		</div><!-- .container -->
	</div>
<?php

