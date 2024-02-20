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
class ColorFooter extends Customizer {
	protected string $section_footer_color = 'quixa_footer_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Footer Colors', 'quixa' ),
			'description' => __( 'Quixa Footer Color Section', 'quixa' ),
			'priority'    => 8
		] );

		Customize::add_controls( $this->section_footer_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_footer_color_controls', [
			'rt_footer_color1'           => [
				'type'  => 'heading',
				'label' => __( 'Main Footer', 'quixa' ),
			],
			'rt_footer_bg'               => [
				'type'  => 'color',
				'label' => __( 'Footer Background', 'quixa' ),
			],
			'rt_footer_text_color'             => [
				'type'  => 'color',
				'label' => __( 'Footer Text', 'quixa' ),
			],
			'rt_footer_link_color'             => [
				'type'  => 'color',
				'label' => __( 'Footer Link', 'quixa' ),
			],
			'rt_footer_link_hover_color'       => [
				'type'  => 'color',
				'label' => __( 'Footer Link - Hover', 'quixa' ),
			],
			'rt_footer_widget_title_color'     => [
				'type'  => 'color',
				'label' => __( 'Widget Title', 'quixa' ),
			],
			'rt_footer_input_border_color'     => [
				'type'  => 'color',
				'label' => __( 'Input/List/Table Border Color', 'quixa' ),
			],
			'rt_footer_copyright_color1' => [
				'type'  => 'heading',
				'label' => __( 'Copyright Area', 'quixa' ),
			],
			'rt_copyright_bg'            => [
				'type'  => 'color',
				'label' => __( 'Copyright Background', 'quixa' ),
			],
			'rt_copyright_text_color'          => [
				'type'  => 'color',
				'label' => __( 'Copyright Text', 'quixa' ),
			],
			'rt_copyright_link_color'          => [
				'type'  => 'color',
				'label' => __( 'Copyright Link', 'quixa' ),
			],
			'rt_copyright_link_hover_color'    => [
				'type'  => 'color',
				'label' => __( 'Copyright Link - Hover', 'quixa' ),
			],
		] );


	}

}
