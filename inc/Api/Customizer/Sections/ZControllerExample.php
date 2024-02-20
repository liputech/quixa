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
class ZControllerExample extends Customizer {

	protected string $section_test = 'rt_test_test_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_test,
			'title'       => __( 'Test Controls', 'quixa' ),
			'description' => __( 'Customize the Test', 'quixa' ),
			'priority'    => 9999
		] );
		Customize::add_controls( $this->section_test, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_test_test_controls', [

			//Reset button
			'rt_reset_customize' => [
				'type'  => 'heading',
				'reset' => '1',
			],
			//Reset button

			'rt_test_heading1' => [
				'type'        => 'heading',
				'label'       => __( 'All controls', 'quixa' ),
				'description' => __( 'All controls are here', 'quixa' ),
			],

			'rt_test_switch' => [
				'type'  => 'switch',
				'label' => __( 'Choose switch', 'quixa' ),
			],

			'rt_test_text' => [
				'type'      => 'text',
				'label'     => __( 'Text Default', 'quixa' ),
				'default'   => __( 'Text Default', 'quixa' ),
				'transport' => '',
				'condition' => [ 'rt_test_switch' ]
			],


			'rt_test_switch2' => [
				'type'  => 'switch',
				'label' => __( 'Choose switch2', 'quixa' ),
			],
			'rt_test_url'     => [
				'type'      => 'url',
				'label'     => __( 'url', 'quixa' ),
				'default'   => __( 'url Default', 'quixa' ),
				'transport' => '',
				'condition' => [ 'rt_test_switch2', '!==', 1 ]
			],

			'rt_test_select'   => [
				'type'        => 'select',
				'label'       => __( 'Select a Val', 'quixa' ),
				'description' => __( 'Select Discription', 'quixa' ),
				'default'     => 'menu-left',
				'choices'     => [
					'menu-left'   => __( 'Left Alignment', 'quixa' ),
					'menu-center' => __( 'Center Alignment', 'quixa' ),
					'menu-right'  => __( 'Right Alignment', 'quixa' ),
				]
			],
			'rt_test_textarea' => [
				'type'      => 'textarea',
				'label'     => __( 'Textarea', 'quixa' ),
				'default'   => __( 'Textarea Default', 'quixa' ),
				'transport' => '',
			],

			'rt_test_select5' => [
				'type'        => 'select',
				'label'       => __( 'Select a Val2', 'quixa' ),
				'description' => __( 'Select Discription', 'quixa' ),
				'default'     => 'menu-center',
				'choices'     => [
					'menu-left'   => __( 'Left Alignment', 'quixa' ),
					'menu-center' => __( 'Center Alignment', 'quixa' ),
					'menu-right'  => __( 'Right Alignment', 'quixa' ),
				]
			],

			'rt_test_textarea2' => [
				'type'      => 'textarea',
				'label'     => __( 'Textarea2', 'quixa' ),
				'default'   => __( 'Textarea Default', 'quixa' ),
				'transport' => '',
			],


			'rt_test_checkbox' => [
				'type'  => 'checkbox',
				'label' => __( 'Choose checkbox', 'quixa' ),
			],

			'rt_test_textarea22' => [
				'type'      => 'textarea',
				'label'     => __( 'Checkbox Textarea2', 'quixa' ),
				'transport' => '',
				'condition' => [ 'rt_test_checkbox', '==', '1' ]
			],


			'rt_test_radio' => [
				'type'    => 'radio',
				'label'   => __( 'Choose radio', 'quixa' ),
				'choices' => [
					'menu-left'   => __( 'Left Alignment', 'quixa' ),
					'menu-center' => __( 'Center Alignment', 'quixa' ),
					'menu-right'  => __( 'Right Alignment', 'quixa' ),
				]
			],

			'rt_test_textarea222' => [
				'type'      => 'textarea',
				'label'     => __( 'rt_test_radio Textarea2 - menu-center', 'quixa' ),
				'transport' => '',
			],

			'rt_test_image_choose' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'quixa' ),
				'default' => '1',
				'choices' => $this->get_header_presets()
			],

			'rt_test_image' => [
				'type'         => 'image',
				'label'        => __( 'Choose Image', 'quixa' ),
				'button_label' => __( 'Logo', 'quixa' ),
			],

			'rt_test_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'auto',
					]
				)
			],

			'rt_test_number' => [
				'type'        => 'number',
				'label'       => __( 'Select a Number', 'quixa' ),
				'description' => __( 'Select Number', 'quixa' ),
				'default'     => '5',
			],

			'rt_test_pages' => [
				'type'  => 'pages',
				'label' => __( 'Choose page', 'quixa' ),
			],


			'rt_test_color'      => [
				'type'  => 'color',
				'label' => __( 'Choose color', 'quixa' ),
			],
			'rt_test_alfa_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Choose alfa_color', 'quixa' ),
			],
			'rt_test_datetime'   => [
				'type'  => 'datetime',
				'label' => __( 'Choose datetime', 'quixa' ),
			],


			'rt_test_select2' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'quixa' ),
				'placeholder' => __( 'Choose Meta', 'quixa' ),
				'multiselect' => true,
				'choices'     => [
					'author'   => __( 'Author', 'skyrocket' ),
					'date'     => __( 'Date', 'skyrocket' ),
					'category' => __( 'Category', 'skyrocket' ),
					'tag'      => __( 'Tag', 'skyrocket' ),
					'comment'  => __( 'Comment', 'skyrocket' ),
				],
			],

			'rt_test_repeater' => [
				'type'  => 'repeater',
				'label' => __( 'Choose repeater', 'quixa' ),
			],

			'rt_test_blog_meta_order1' => [
				'type'    => 'repeater',
				'label'   => __( 'Meta Order', 'quixa' ),
				'default' => 'one, two, three, four',
				'use_as'  => 'sort', //'sort','repeater'
			],

			'rt_test_blog_meta_order2' => [
				'type'    => 'repeater',
				'label'   => __( 'Meta Order', 'quixa' ),
				'default' => 'one, two, three, four',
//				'use_as'  => 'repeater', //'sort','repeater'
			],

			'rt_test_typography2' => [
				'type'    => 'typography',
				'label'   => __( 'Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => 'Open Sans',
						'regularweight' => 'normal',
						'size'          => '16',
						'lineheight'    => '26',
					]
				)
			],

			'rt_test_typography3' => [
				'type'    => 'typography',
				'label'   => __( 'Typography', 'quixa' ),
				'default' => json_encode(
					[
						'font'          => 'Open Sans',
						'regularweight' => 'normal',
						'size'          => '16',
						'lineheight'    => '26',
					]
				)
			],
		] );
	}

	/**
	 * Get Header Presets
	 * @return array[]
	 */
	public function get_header_presets() {
		if ( ! defined( 'RT_FRAMEWORK_DIR_URL' ) ) {
			return [];
		}

		return [
			'1' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 1', 'quixa' ),
			],
			'2' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 2', 'quixa' ),
			],
			'3' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 3', 'quixa' ),
			],
		];
	}

}
