<?php
/**
 * Theme Customizer - Heading Typography
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class TypographyHeading extends Customizer {

	protected string $section_id = 'quixa_heading_typo_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_id,
			'title'       => __( 'Heading Typography', 'quixa' ),
			'description' => __( 'Quixa Heading Typography Section', 'quixa' ),
			'panel'       => 'rt_typography_panel',
			'priority'    => 2
		] );

		Customize::add_controls( $this->section_id, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_heading_typo_section', [

			'rt_all_heading_typo' => [
				'type'    => 'typography',
				'label'   => __( 'All Headings Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => 'Urbanist',
						'regularweight' => '700',
						'size'          => '44',
						'lineheight'    => '54',
					]
				)
			],

			'rt_heading_h1_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H1 Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h2_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H2 Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h3_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H3 Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h4_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H4 Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h5_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H5 Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h6_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H6 Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

		] );

	}

}
