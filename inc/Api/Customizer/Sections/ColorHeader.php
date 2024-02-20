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
class ColorHeader extends Customizer {
	protected string $section_header_color = 'quixa_header_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {

		Customize::add_section( [
			'id'          => $this->section_header_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Header Colors', 'quixa' ),
			'description' => __( 'Quixa Header Color Section', 'quixa' ),
			'priority'    => 4
		] );

		Customize::add_controls( $this->section_header_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_header_color_controls', [

			'rt_menu_heading1' => [
				'type'  => 'heading',
				'label' => __( 'Default Menu', 'quixa' ),
			],

			'rt_menu_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Color', 'quixa' ),
			],

			'rt_menu_active_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Hover & Active Color', 'quixa' ),
			],

			'rt_menu_bg_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Background Color', 'quixa' ),
			],

			'rt_menu_heading2' => [
				'type'  => 'heading',
				'label' => __( 'Transparent Menu', 'quixa' ),
			],

			'rt_tr_menu_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'TR Menu Color', 'quixa' ),
			],

			'rt_tr_menu_active_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'TR Menu Hover & Active Color', 'quixa' ),
			],

			'rt_menu_heading4' => [
				'type'  => 'heading',
				'label' => __( 'Others Style', 'quixa' ),
			],

			'rt_menu_border_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Border Color', 'quixa' ),
			],


		] );


	}

}
