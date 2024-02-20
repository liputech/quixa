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
class ColorBanner extends Customizer {

	protected string $section_banner_color = 'quixa_banner_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_banner_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Banner / Breadcrumb Colors', 'quixa' ),
			'description' => __( 'Quixa Banner Color Section', 'quixa' ),
			'priority'    => 6
		] );

		Customize::add_controls( $this->section_banner_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_site_color_controls', [

			'rt_banner_bg' => [
				'type'    => 'color',
				'label'   => __( 'Banner Background', 'quixa' ),
			],

			'rt_breadcrumb_color' => [
				'type'    => 'color',
				'label'   => __( 'Link Color', 'quixa' ),
			],

			'rt_breadcrumb_active' => [
				'type'    => 'color',
				'label'   => __( 'Link Active Color', 'quixa' ),
			],

			'rt_breadcrumb_title_color' => [
				'type'    => 'color',
				'label'   => __( 'Title Color', 'quixa' ),
			],


		] );


	}

}
