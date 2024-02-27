<?php
/**
 * Theme Customizer - Header
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class General extends Customizer {
	protected string $section_general = 'quixa_general_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_general,
			'title'       => __( 'General', 'quixa' ),
			'description' => __( 'Quixa General Section', 'quixa' ),
			'priority'    => 20
		] );
		Customize::add_controls( $this->section_general, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_test_controls', [

			'rt_svg_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable SVG Upload', 'quixa' ),
			],

			'rt_preloader' => [
				'type'  => 'switch',
				'label' => __( 'Preloader', 'quixa' ),
			],

			'rt_back_to_top' => [
				'type'  => 'switch',
				'label' => __( 'Back to Top', 'quixa' ),
			],

			'rt_remove_admin_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Remove Admin Bar', 'quixa' ),
				'description' => __( 'This option not work for administrator role.', 'quixa' ),
			],

			'rt_social_icon_style' => [
				'type'    => 'select',
				'label'   => __( 'Social Icon Style', 'quixa' ),
				'default' => '',
				'choices' => [
					''        => __( 'Default Icon', 'quixa' ),
					'-square' => __( 'Square Icon', 'quixa' ),
				]
			],
			'container_width' => [
				'type'    => 'select',
				'label'   => __( 'Container Width', 'quixa' ),
				'default' => '1240',
				'choices' => [
					'1554' => esc_html__( '1554px', 'quixa' ),
					'1340' => esc_html__( '1340px', 'quixa' ),
					'1240' => esc_html__( '1240px', 'quixa' ),
					'1200' => esc_html__( '1200px', 'quixa' ),
					'1140' => esc_html__( '1140px', 'quixa' ),
				]
			],

		] );

	}

}
