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
class Error extends Customizer {
	protected string $section_labels = 'quixa_test_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Error Page', 'quixa' ),
			'description' => __( 'Quixa error section.', 'quixa' ),
			'priority'    => 39
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_labels_controls', [

			'rt_error_image' => [
				'type'         => 'image',
				'label'        => __( 'Error Image', 'quixa' ),
				'description'  => __( 'Upload error image for your site.', 'quixa' ),
				'button_label' => __( 'Error image', 'quixa' ),
			],

			'rt_error_heading' => [
				'type'        => 'text',
				'label'       => __( 'Error Heading', 'quixa' ),
				'default'     => __( 'Oops, something went wrong.', 'quixa' ),
			],

			'rt_error_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Text', 'quixa' ),
				'default'     => __( 'Sorry! This Page Is Not Available!', 'quixa' ),
			],

			'rt_error_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Button Text', 'quixa' ),
				'default'     => __( 'Back To Home Page', 'quixa' ),
			],

		] );
	}


}
