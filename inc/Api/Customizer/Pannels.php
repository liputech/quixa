<?php
/**
 * Theme Customizer Pannels
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer;

use RT\Quixa\Traits\SingletonTraits;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Pannels {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		$this->add_panels();
	}

	/**
	 * Add Panels
	 * @return void
	 */
	public function add_panels() {
		Customize::add_panels(
			[
				[
					'id'          => 'rt_header_panel',
					'title'       => esc_html__( 'Header - Topbar - Menu', 'quixa' ),
					'description' => esc_html__( 'Quixa Header', 'quixa' ),
					'priority'    => 22,
				],
				[
					'id'          => 'rt_typography_panel',
					'title'       => esc_html__( 'Typography', 'quixa' ),
					'description' => esc_html__( 'Quixa Typography', 'quixa' ),
					'priority'    => 24,
				],
				[
					'id'          => 'rt_color_panel',
					'title'       => esc_html__( 'Colors', 'quixa' ),
					'description' => esc_html__( 'Quixa Color Settings', 'quixa' ),
					'priority'    => 28,
				],
				[
					'id'          => 'rt_layouts_panel',
					'title'       => esc_html__( 'Layout Settings', 'quixa' ),
					'description' => esc_html__( 'Quixa Layout Settings', 'quixa' ),
					'priority'    => 34,
				],
				[
					'id'          => 'rt_contact_social_panel',
					'title'       => esc_html__( 'Contact & Socials', 'quixa' ),
					'description' => esc_html__( 'Quixa Contact & Socials', 'quixa' ),
					'priority'    => 24,
				],

			]
		);
	}

}
