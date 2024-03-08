<?php
/**
 * Template part for displaying banner content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

use RT\Quixa\Options\Opt;
use RT\Quixa\Helpers\Fns;


if ( ! Opt::$has_banner ) {
	return;
}

$banner_image_css = '';


	$image_url = wp_get_attachment_image_src( Opt::$banner_image, 'full' );

	$banner_image_css .= isset( $image_url[0] ) ? "background-image:url({$image_url[0]});" : '';

	if ( ! empty( Opt::$banner_height ) ) {
		$banner_image_css .= "min-height:" . rtrim( Opt::$banner_height, 'px' ) . "px;";
	}

	if ( ! empty( quixa_option( 'rt_banner_image_attr' ) ) ) {
		$bg_attr = json_decode( quixa_option( 'rt_banner_image_attr' ), ARRAY_A );

		if ( ! empty( $bg_attr['position'] ) ) {
			$banner_image_css .= "background-position: {$bg_attr['position']};";
		}
		if ( ! empty( $bg_attr['attachment'] ) ) {
			$banner_image_css .= "background-attachment: {$bg_attr['attachment']};";
		}
		if ( ! empty( $bg_attr['repeat'] ) ) {
			$banner_image_css .= "background-repeat: {$bg_attr['repeat']};";
		}
		if ( ! empty( $bg_attr['size'] ) ) {
			$banner_image_css .= "background-size: {$bg_attr['size']};";
		}
	}

$has_image = isset( $image_url[0] );
if ( in_array( Opt::$single_style, [ '3', '4' ] ) ) {
	$has_image        = false;
	$banner_image_css = '';
}

$classes = Fns::class_list( [
	'quixa-breadcrumb-wrapper',
	$has_image ? 'has-bg' : 'no-bg'
] );

/*banner title*/
if ( is_404() ) {
	$quixa_title = "Error Page";
}
elseif ( is_search() ) {
	$quixa_title = esc_html__( 'Search Results for : ', 'quixa' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$quixa_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$quixa_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'quixa' ) );
	}
}
elseif (is_post_type_archive('rt-team')) {
	$quixa_title  = esc_html__( 'Our Teams', 'quixa' );

} elseif (is_tax('rt-team-department')) {
	$quixa_title  = single_term_title( '', false );

} elseif ( is_category() ) {
	$quixa_title = single_term_title( '', false );

} elseif ( is_archive() ) {
	$quixa_title = esc_html__( 'Our Recent Posts', 'quixa' );

} elseif (is_singular('rt-team')) {
	$quixa_title  = esc_html__( 'Team Details', 'quixa' );
} elseif ( is_single() ) {
	$quixa_title = esc_html__( 'Post Details', 'quixa' );

} else {
	$quixa_title = get_the_title();
}

$breadcrumb_classes = quixa_option( 'rt_breadcrumb_alignment' );
?>

<div class="<?php echo esc_attr( $classes ) ?>" style="<?php echo esc_attr( $banner_image_css ) ?>">
	<div class="container d-flex row-gap-15 flex-column <?php echo esc_attr( $breadcrumb_classes ) ?>">
		<?php if ( Opt::$breadcrumb_title ) { ?>
			<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses( $quixa_title , 'allowed_html' );?></h1>
			<?php } else if ( is_page() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses( $quixa_title , 'allowed_html' );?></h1>
			<?php } else { ?>
				<h1 class="entry-title"><?php echo wp_kses( $quixa_title , 'allowed_html' );?></h1>
			<?php } ?>
		<?php } ?>
		<?php if ( Opt::$has_breadcrumb ) { ?>
			<?php //quixa_breadcrumb();
			get_template_part( 'views/content', 'breadcrumb' );
			?>
		<?php } ?>
	</div>
</div>
