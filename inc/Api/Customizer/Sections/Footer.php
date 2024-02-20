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
class Footer extends Customizer {
	protected string $section_footer = 'quixa_footer_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer,
			'title'       => __( 'Footer', 'quixa' ),
			'description' => __( 'Quixa Footer Section', 'quixa' ),
			'priority'    => 38
		] );

		Customize::add_controls( $this->section_footer, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_footer_controls', [

			'rt_footer_style' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'quixa' ),
				'default' => '1',
				'choices' => Fns::image_placeholder( 'footer', 2 )
			],

			'rt_footer_width' => [
				'type'    => 'select',
				'label'   => __( 'Footer Width', 'quixa' ),
				'default' => '',
				'choices' => [
					''       => __( 'Box Width', 'quixa' ),
					'-fluid' => __( 'Full Width', 'quixa' ),
				]
			],

			'rt_footer_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Footer Max Width (PX)', 'quixa' ),
				'description' => __( 'Enter a number greater than 992.', 'quixa' ),
				'condition'   => [ 'rt_footer_width', '==', '-fluid' ]
			],

			'rt_sticy_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Footer', 'quixa' ),
				'description' => __( 'Show footer at the top when scrolling down', 'quixa' ),
			],

			'rt_footer_copyright' => [
				'type'        => 'tinymce',
				'label'       => __( 'Footer Copyright Text', 'quixa' ),
				'default'     => __( 'Copyright© [y] Quixa by <a href="https://radiustheme.com/">RadiusTheme</a>', 'quixa' ),
				'description' => __( 'Add [y] flag anywhere for dynamic year.', 'quixa' ),
			],

			'rt_footer_heading1' => [
				'type'  => 'heading',
				'label' => __( 'Footer Menu Section', 'quixa' ),
			],

			'rt_footer_menu_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Footer Menu Alignment', 'quixa' ),
				'default' => 'align-default',
				'choices' => [
					'align-default'          => __( 'Default from style', 'quixa' ),
					'justify-content-start'  => __( 'Left', 'quixa' ),
					'justify-content-center' => __( 'Center', 'quixa' ),
					'justify-content-end'    => __( 'Right', 'quixa' ),
				]
			],

		] );

	}


}
