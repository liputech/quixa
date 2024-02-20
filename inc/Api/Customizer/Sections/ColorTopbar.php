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
class ColorTopbar extends Customizer {
	protected string $section_topbar_color = 'quixa_topbar_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_topbar_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Topbar Colors', 'quixa' ),
			'description' => __( 'Quixa Topbar Color Section', 'quixa' ),
			'priority'    => 3
		] );

		Customize::add_controls( $this->section_topbar_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_header_color_controls', [


			'rt_topbar_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Topbar Color', 'quixa' ),
			],

			'rt_topbar_active_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Hover Color', 'quixa' ),
			],

			'rt_topbar_bg_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Topbar Background', 'quixa' ),
			],


		] );


	}

}
