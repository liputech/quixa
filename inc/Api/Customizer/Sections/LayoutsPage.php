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
class LayoutsPage extends Customizer {

	use LayoutControlsTraits;

	protected string $section_page_layout = 'quixa_page_layout_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_page_layout,
			'title' => __( 'Page Layout', 'quixa' ),
			'panel' => 'rt_layouts_panel',
		] );

		Customize::add_controls( $this->section_page_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'page' );
	}

}
