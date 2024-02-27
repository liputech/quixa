<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quixa
 */


use RT\Quixa\Helpers\Fns;

if ( is_singular() && is_active_sidebar( Fns::default_sidebar('single') ) ) {
	quixa_sidebar( Fns::default_sidebar('single')  );
} else {
	quixa_sidebar( Fns::default_sidebar('main') );
}
