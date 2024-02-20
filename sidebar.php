<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quixa
 */


if ( is_singular() && is_active_sidebar( 'rt-single-sidebar' ) ) {
	quixa_sidebar( 'rt-single-sidebar' );
} else {
	quixa_sidebar( 'rt-sidebar' );
}
