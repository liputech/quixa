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
class SiteIdentity extends Customizer {

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_controls( 'title_tagline', $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_title_tagline_controls', [

			'rt_logo' => [
				'type'         => 'image',
				'label'        => __( 'Main Logo', 'quixa' ),
				'description'  => __( 'Upload main logo for your site.', 'quixa' ),
				'button_label' => __( 'Logo', 'quixa' ),
			],

			'rt_logo_light' => [
				'type'         => 'image',
				'label'        => __( 'Light Logo', 'quixa' ),
				'description'  => __( 'Upload light logo for transparent header. It should a white logo', 'quixa' ),
				'button_label' => __( 'Light Logo', 'quixa' ),
			],

			'rt_logo_mobile' => [
				'type'         => 'image',
				'label'        => __( 'Mobile Logo', 'quixa' ),
				'description'  => __( 'Upload, if you need a different logo for mobile device..', 'quixa' ),
				'button_label' => __( 'Mobile Logo', 'quixa' ),
			],

			'rt_logo_width_height' => [
				'type'      => 'text',
				'label'     => __( 'Logo Dimension', 'quixa' ),
				'description'     => __( 'Enter the width and height value separate by comma (,). Eg. 180px,45px', 'quixa' ),
				'transport' => '',
			],

		] );

	}

}
