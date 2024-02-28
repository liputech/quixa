<?php
/**
 * LayoutControls
 */

namespace RT\Quixa\Traits;

// Do not allow directly accessing this file.
use RT\Quixa\Helpers\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

trait LayoutControlsTraits {
	public function get_layout_controls( $prefix = '' ) {

		$_left_text  = __( 'Left Sidebar', 'quixa' );
		$_right_text = __( 'Right Sidebar', 'quixa' );
		$left_text   = $_left_text;
		$right_text  = $_right_text;
		$image_left  = 'sidebar-left.png';
		$image_right = 'sidebar-right.png';

		if ( is_rtl() ) {
			$left_text   = $_right_text;
			$right_text  = $_left_text;
			$image_left  = 'sidebar-right.png';
			$image_right = 'sidebar-left.png';
		}

		return apply_filters( "quixa_{$prefix}_layout_controls", [

			$prefix . '_layout' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'quixa' ),
				'default' => 'right-sidebar',
				'choices' => [
					'left-sidebar'  => [
						'image' => quixa_get_img( $image_left ),
						'name'  => $left_text,
					],
					'full-width'    => [
						'image' => quixa_get_img( 'sidebar-full.png' ),
						'name'  => __( 'Full Width', 'quixa' ),
					],
					'right-sidebar' => [
						'image' => quixa_get_img( $image_right ),
						'name'  => $right_text,
					],
				]
			],

			$prefix . '_sidebar' => [
				'type'    => 'select',
				'label'   => __( 'Choose a Sidebar', 'quixa' ),
				'default' => 'default',
				'choices' => Fns::sidebar_lists()
			],

			$prefix . '_page_bg_image' => [
				'type'         => 'image',
				'label'        => __( 'Page Background Image', 'quixa' ),
				'description'  => __( 'Upload Background Image', 'quixa' ),
				'button_label' => __( 'Background Image', 'quixa' ),
			],

			$prefix . '_header_heading' => [
				'type'  => 'heading',
				'label' => __( 'Header Settings', 'quixa' ),
			],

			$prefix . '_header_style' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Header Layout', 'quixa' ),
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'1'       => __( 'Layout 1', 'quixa' ),
					'2'       => __( 'Layout 2', 'quixa' ),
				],
			],

			$prefix . '_top_bar' => [
				'type'    => 'select',
				'label'   => __( 'Top Bar', 'quixa' ),
				'default' => 'default',
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'on'      => __( 'On', 'quixa' ),
					'off'     => __( 'Off', 'quixa' ),
				]
			],

			$prefix . '_banner_heading' => [
				'type'  => 'heading',
				'label' => __( 'Banner Settings', 'quixa' ),
			],

			$prefix . '_banner' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Visibility', 'quixa' ),
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'on'      => __( 'On', 'quixa' ),
					'off'     => __( 'Off', 'quixa' ),
				],
			],

			$prefix . '_banner_style' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Layout', 'quixa' ),
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'1'       => __( 'Layout 1', 'quixa' ),
					'2'       => __( 'Layout 2', 'quixa' ),
				],
			],

			$prefix . '_breadcrumb_title' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Title', 'quixa' ),
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'on'      => __( 'On', 'quixa' ),
					'off'     => __( 'Off', 'quixa' ),
				],
			],

			$prefix . '_breadcrumb' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Breadcrumb', 'quixa' ),
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'on'      => __( 'On', 'quixa' ),
					'off'     => __( 'Off', 'quixa' ),
				],
			],

			$prefix . '_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Image', 'quixa' ),
				'description'  => __( 'Upload Banner Image', 'quixa' ),
				'button_label' => __( 'Banner Image', 'quixa' ),
			],

			$prefix . '_footer_heading' => [
				'type'  => 'heading',
				'label' => __( 'Footer Settings', 'quixa' ),
			],

			$prefix . '_footer_style'  => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Footer Layout', 'quixa' ),
				'choices' => [
					'default' => __( '--Default--', 'quixa' ),
					'1'       => __( 'Layout 1', 'quixa' ),
					'2'       => __( 'Layout 2', 'quixa' ),
					'3'       => __( 'Layout 3', 'quixa' ),
					'4'       => __( 'Layout 4', 'quixa' ),
					'5'       => __( 'Layout 5', 'quixa' ),
				],
			],

		] );


	}


}
