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
class Service extends Customizer {

	protected string $section_service = 'quixa_service_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_service,
			'title'       => __( 'Service Archive', 'quixa' ),
			'description' => __( 'Quixa Service Section', 'quixa' ),
			'priority'    => 36
		] );

		Customize::add_controls( $this->section_service, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'quixa_service_controls', [

			'rt_service_style' => [
				'type'        => 'select',
				'label'       => __( 'Team Style', 'quixa' ),
				'description' => __( 'This option works only for large device', 'quixa' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'quixa' ),
					'2'    => __( 'Team 02', 'quixa' ),
				]
			],

			'rt_service_item_number' => [
				'type'    => 'text',
				'label'   => __( 'Team Archive Item Limit', 'quixa' ),
				'default' => '8',
			],

			'rt_service_ar_designation' => [
				'type'    => 'switch',
				'label'   => __( 'Designation Visibility', 'quixa' ),
				'default' => 1
			],

			'rt_service_ar_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'quixa' ),
				'default' => 1
			],

			'rt_service_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'quixa' ),
				'default' => 0
			],

			'rt_service_excerpt_limit' => [
				'type'    => 'text',
				'label'   => __( 'Content Limit', 'quixa' ),
				'default' => '12',
				'condition' => [ 'rt_service_ar_excerpt' ]
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'quixa' ),
			],

			'rt_service_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'quixa' ),
				'default' => 1
			],

		] );
	}


}
