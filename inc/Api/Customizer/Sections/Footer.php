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

			'rt_footer_display' => [
				'type'        => 'switch',
				'label'       => __( 'Footer Display', 'quixa' ),
				'description' => __( 'Show footer display', 'quixa' ),
				'default' => 1,
			],

			'rt_footer_style' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'quixa' ),
				'default' => '1',
				'choices' => Fns::image_placeholder( 'footer', 5 )
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

			'rt_shape_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Shape', 'quixa' ),
				'description' => __( 'Show footer at the shape display', 'quixa' ),
				'default' => 1,
			],

			'rt_social_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Social Icon', 'quixa' ),
				'description' => __( 'Show footer at the social icon, This options available for only Footer layout 1, 2, 4.', 'quixa' ),
				'default' => 1,
			],

			'rt_contact_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Get Started Button', 'quixa' ),
				'description' => __( 'Show footer at Get Started Button. This options available for only Footer layout 3, 4.', 'quixa' ),
				'default' => 1,
			],
			'rt_contact_button_url' => [
				'type'    => 'text',
				'label'   => __( 'Contact Link', 'quixa' ),
				'condition' => [ 'rt_contact_footer' ]
			],

			'rt_footer_copyright' => [
				'type'        => 'tinymce',
				'label'       => __( 'Footer Copyright Text', 'quixa' ),
				'default'     => __( 'Copyright© [y] Quixa by <a href="https://radiustheme.com/">RadiusTheme</a>', 'quixa' ),
				'description' => __( 'Add [y] flag anywhere for dynamic year.', 'quixa' ),
			],

			'rt_footer_heading1' => [
				'type'  => 'heading',
				'label' => __( 'Footer Logo', 'quixa' ),
			],
			'rt_footer_logo_display' => [
				'type'        => 'switch',
				'label'       => __( 'Logo Display', 'quixa' ),
				'description' => __( 'Show footer Logo Display, This options available for only Footer layout 3, 4.', 'quixa' ),
				'default' => 1,
			],
			'rt_footer_logo' => [
				'type'         => 'image',
				'label'        => __( 'Footer Logo', 'quixa' ),
				'description'  => __( 'Upload footer logo. This options available for only Footer layout 3, 4.', 'quixa' ),
				'button_label' => __( 'Footer Logo', 'quixa' ),
			],


		] );

	}


}
