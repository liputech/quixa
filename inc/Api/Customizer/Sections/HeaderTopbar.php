<?php
/**
 * Theme Customizer - Header
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RT\Quixa\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class HeaderTopbar extends Customizer {
	protected string $section_topbar = 'quixa_topbar_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_topbar,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Topbar', 'quixa' ),
			'description' => __( 'Quixa Topbar Section', 'quixa' ),
			'priority'    => 1
		] );

		Customize::add_controls( $this->section_topbar, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_topbar_controls', [

			'rt_top_bar' => [
				'type'      => 'switch',
				'label'     => __( 'Topbar Visibility', 'quixa' ),
				'default'   => 1,
				'edit-link' => '.topbar-row',
			],
			'rt_topbar_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Topbar Style', 'quixa' ),
				'default'   => '1',
				'choices'   => Fns::image_placeholder( 'topbar', 1 ),
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_address' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Address ?', 'quixa' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_phone' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Phone ?', 'quixa' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_email' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Email ?', 'quixa' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],

		] );

	}

}
