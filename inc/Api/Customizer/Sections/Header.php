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
class Header extends Customizer {
	protected string $section_header = 'quixa_header_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_header,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Menu', 'quixa' ),
			'description' => __( 'Quixa Header Section', 'quixa' ),
			'priority'    => 2,
			'edit-point'  => ''
		] );
		Customize::add_controls( $this->section_header, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_header_controls', [

			'rt_header_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Choose Layout', 'quixa' ),
				'default'   => '1',
				'edit-link' => '.site-branding',
				'choices'   => Fns::image_placeholder( 'header', 2 )
			],

			'rt_menu_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Menu Alignment', 'quixa' ),
				'default' => 'justify-content-center',
				'choices' => [
					''                       => __( 'Menu Alignment', 'quixa' ),
					'justify-content-start'  => __( 'Left Alignment', 'quixa' ),
					'justify-content-center' => __( 'Center Alignment', 'quixa' ),
					'justify-content-end'    => __( 'Right Alignment', 'quixa' ),
				]
			],

			'rt_header_width' => [
				'type'    => 'select',
				'label'   => __( 'Header Width', 'quixa' ),
				'default' => '',
				'choices' => [
					'box'       => __( 'Box Width', 'quixa' ),
					'full' => __( 'Full Width', 'quixa' ),
				]
			],

			'rt_header_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Header Max Width (PX)', 'quixa' ),
				'description' => __( 'Enter a number greater than 1440. Remove value for 100%', 'quixa' ),
				'condition'   => [ 'rt_header_width', '==', 'full' ]
			],

			'rt_sticy_header' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Header', 'quixa' ),
				'description' => __( 'Show header at the top when scrolling down', 'quixa' ),
			],

			'rt_tr_header' => [
				'type'  => 'switch',
				'label' => __( 'Transparent Header', 'quixa' ),
			],

			'rt_tr_header_shadow' => [
				'type'  => 'switch',
				'label' => __( 'Header Dark Shadow', 'quixa' ),
			],

			'rt_header_border' => [
				'type'    => 'switch',
				'label'   => __( 'Header Border', 'quixa' ),
				'default' => 1
			],
			'rt_header_sep1'   => [
				'type' => 'separator',
				'edit-link' => '.menu-icon-wrapper',
			],

			'rt_header_login_link' => [
				'type'    => 'switch',
				'label'   => __( 'User Login ?', 'quixa' ),
				'default' => 1,
			],

			'rt_header_search' => [
				'type'    => 'switch',
				'label'   => __( 'Search Icon ?', 'quixa' ),
				'default' => 1,
			],

			'rt_header_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Hamburger Menu', 'quixa' ),
				'description' => __( 'It will be hide only for desktop.', 'quixa' ),
				'default'     => 1,
			],

			'rt_header_separator' => [
				'type'    => 'switch',
				'label'   => __( 'Icon Separator', 'quixa' ),
				'default' => 1,
			],

			'rt_header_sep2' => [
				'type' => 'separator',
			],

			'rt_get_started_button' => [
				'type'    => 'switch',
				'label'   => __( 'Get Started Button ?', 'quixa' ),
				'default' => 1
			],

			'rt_get_started_button_url' => [
				'type'    => 'text',
				'label'   => __( 'Button Link', 'quixa' ),
			],


		] );

	}


}
