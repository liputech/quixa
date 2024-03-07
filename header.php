<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quixa
 */
use RT\Quixa\Options\Opt;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Preloader
if ( quixa_option( 'rt_preloader' ) ) {
	if( !empty( quixa_option( 'rt_preloader_logo' ) ) ) { ?>
		<div id="preloader"><?php echo wp_get_attachment_image( quixa_option( 'rt_preloader_logo' ), 'full', true );?></div>
	<?php } else { ?>
		<div id="preloader" class="loader">
			<div class="cssload-loader">
				<div class="cssload-inner cssload-one"></div>
				<div class="cssload-inner cssload-two"></div>
				<div class="cssload-inner cssload-three"></div>
			</div>
		</div>
	<?php }
}
?>

<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'views/header/topbar', Opt::$topbar_style ); ?>
		<?php get_template_part( 'views/header/header', Opt::$header_style ); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php get_template_part( 'views/content-banner', Opt::$banner_style ); ?>
