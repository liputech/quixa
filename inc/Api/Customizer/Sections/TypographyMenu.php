<?php
/**
 * Theme Customizer - Menu Typography
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class TypographyMenu extends Customizer {

	protected string $section_id = 'quixa_menu_typo_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_id,
			'title'       => __( 'Menu Typography', 'quixa' ),
			'description' => __( 'Quixa Menu Typography Section', 'quixa' ),
			'panel'       => 'rt_typography_panel',
			'priority'    => 3
		] );

		Customize::add_controls( $this->section_id, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_menu_typo_section', [

			'rt_menu_typo' => [
				'type'    => 'typography',
				'label'   => __( 'Menu Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => 'Urbanist',
						'regularweight' => '600',
						'size'          => '16',
						'lineheight'    => '22',
					]
				)
			],

		] );

	}

}
