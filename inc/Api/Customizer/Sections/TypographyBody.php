<?php
/**
 * Theme Customizer - Body Typography
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class TypographyBody extends Customizer {

	protected string $section_id = 'quixa_body_typo_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_id,
			'title'       => __( 'Body Typography', 'quixa' ),
			'description' => __( 'Quixa Body Typography Section', 'quixa' ),
			'panel'       => 'rt_typography_panel',
			'priority'    => 1
		] );

		Customize::add_controls( $this->section_id, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_body_typo_section', [

			'rt_body_typo' => [
				'type'    => 'typography',
				'label'   => __( 'Body Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => 'Urbanist',
						'regularweight' => '500',
						'size'          => '17',
						'lineheight'    => '26',
					]
				)
			],

		] );

	}

}
