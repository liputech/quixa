<?php
/**
 * Theme Customizer - Header
 *
 * @package quixa
 */

namespace RT\Quixa\Api\Customizer\Sections;

use RT\Quixa\Api\Customizer;
use RTFramework\Customize;
use RT\Quixa\Traits\LayoutControlsTraits;

/**
 * Customizer class
 */
class LayoutsWooSingle extends Customizer {

	use LayoutControlsTraits;

	protected string $section_woocommerce_single_layout = 'quixa_woocommerce_single_layout_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {

		Customize::add_section( [
			'id'    => $this->section_woocommerce_single_layout,
			'title' => __( 'Woocommerce Single', 'quixa' ),
			'panel' => 'rt_layouts_panel',
		] );
		Customize::add_controls( $this->section_woocommerce_single_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'woo_single' );
	}

}
