<?php
/**
 * Template Name: RT Icons
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package quixa
 */

get_header(); ?>
	<div class="container">
		<div class="row pt-50 pb-50 d-flex gap-15">
			<?php
			echo quixa_get_svg( 'search' );
			echo quixa_get_svg( 'facebook' );
			echo quixa_get_svg( 'twitter' );
			echo quixa_get_svg( 'linkedin' );
			echo quixa_get_svg( 'instagram' );
			echo quixa_get_svg( 'pinterest' );
			echo quixa_get_svg( 'tiktok' );
			echo quixa_get_svg( 'youtube' );
			echo quixa_get_svg( 'snapchat' );
			echo quixa_get_svg( 'whatsapp' );
			echo quixa_get_svg( 'reddit' );
			?>
		</div>
	</div>
<?php
get_footer();
