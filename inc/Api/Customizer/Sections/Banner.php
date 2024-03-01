<?php
/**
 * Theme Customizer - Header
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RT\Quixa\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Banner extends Customizer {

	protected string $section_breadcrumb = 'quixa_breadcrumb_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_breadcrumb,
			'title'       => __( 'Banner - Breadcrumb', 'quixa' ),
			'description' => __( 'Quixa Banner Section', 'quixa' ),
			'priority'    => 23
		] );

		Customize::add_controls( $this->section_breadcrumb, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_topbar_controls', [

			'rt_banner' => [
				'type'    => 'switch',
				'label'   => __( 'Banner Visibility', 'quixa' ),
				'default' => 0
			],

			'rt_banner_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Breadcrumb Style', 'quixa' ),
				'default'   => '1',
				'choices'   => Fns::image_placeholder( 'banner', 2 ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Breadcrumb Alignment', 'quixa' ),
				'default' => 'align-items-center',
				'choices' => [
					''                       => __( 'Breadcrumb Default', 'quixa' ),
					'align-items-center'  => __( 'Alignment Center', 'quixa' ),
					'align-items-end'  => __( 'Alignment right', 'quixa' ),
				]
			],

			'rt_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Image', 'quixa' ),
				'description'  => __( 'Upload Banner Image', 'quixa' ),
				'button_label' => __( 'Banner', 'quixa' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'cover',
					]
				)
			],

			'rt_banner_height' => [
				'type'        => 'number',
				'label'       => __( 'Banner Height (px)', 'quixa' ),
				'description' => __( 'Height can be differ for transparent header.', 'quixa' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner1' => [
				'type'      => 'heading',
				'label'     => __( 'Breadcrumb Settings', 'quixa' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_title' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Title', 'quixa' ),
				'default'   => 1,
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Breadcrumb', 'quixa' ),
				'default'   => 1,
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_border' => [
				'type'      => 'switch',
				'label'     => __( 'Breadcrumb Border', 'quixa' ),
				'default'   => 1,
				'condition' => [ 'rt_banner' ]
			],

		] );

	}

}
