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
class ColorSite extends Customizer {
	protected string $section_site_color = 'quixa_site_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_site_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Site Colors', 'quixa' ),
			'description' => __( 'Quixa Site Color Section', 'quixa' ),
			'priority'    => 2
		] );
		Customize::add_controls( $this->section_site_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_site_color_controls', [

			'rt_site_color1'   => [
				'type'  => 'heading',
				'label' => __( 'Site Ascent Color', 'quixa' ),
			],
			'rt_primary_color' => [
				'type'    => 'color',
				'label'   => __( 'Primary Color', 'quixa' ),
			],
			'rt_color_separator2' => [
				'type' => 'separator',
			],

			'rt_secondary_color' => [
				'type'    => 'color',
				'label'   => __( 'Secondary Color', 'quixa' ),
			],

			'rt_site_color2' => [
				'type'  => 'heading',
				'label' => __( 'Others Color', 'quixa' ),
			],

			'rt_body_color' => [
				'type'    => 'color',
				'label'   => __( 'Body Color', 'quixa' ),
			],

			'rt_body_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Body BG Color', 'quixa' ),
			],

			'rt_title_color' => [
				'type'    => 'color',
				'label'   => __( 'Title Color', 'quixa' ),
			],

			'rt_meta_color' => [
				'type'    => 'color',
				'label'   => __( 'Meta Color', 'quixa' ),
			],

			'rt_meta_light' => [
				'type'    => 'color',
				'label'   => __( 'Meta Light', 'quixa' ),
			],

			'rt_gray10_color' => [
				'type'    => 'color',
				'label'   => __( 'Gray # 1', 'quixa' ),
			],

			'rt_gray20_color' => [
				'type'    => 'color',
				'label'   => __( 'Gray # 2', 'quixa' ),
			],

		] );


	}

}
