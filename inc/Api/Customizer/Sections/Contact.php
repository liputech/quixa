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
class Contact extends Customizer {
	protected string $section_contact = 'quixa_contact_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_contact,
			'panel'       => 'rt_contact_social_panel',
			'title'       => __( 'Contact Information', 'quixa' ),
			'description' => __( 'Quixa Contact Address Section', 'quixa' ),
			'priority'    => 1
		] );
		Customize::add_controls( $this->section_contact, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_contact_controls', [

			'rt_phone' => [
				'type'  => 'text',
				'label' => __( 'Phone', 'quixa' ),
			],

			'rt_email' => [
				'type'  => 'text',
				'label' => __( 'Email', 'quixa' ),
			],

			'rt_website' => [
				'type'  => 'text',
				'label' => __( 'Website', 'quixa' ),
			],

			'rt_contact_address' => [
				'type'        => 'textarea',
				'label'       => __( 'Address', 'quixa' ),
				'description' => __( 'Enter company address here.', 'quixa' ),
			],

		] );
	}
}
