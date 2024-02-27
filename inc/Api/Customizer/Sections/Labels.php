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
class Labels extends Customizer {
	protected string $section_labels = 'quixa_labels_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Modify Static Text', 'quixa' ),
			'description' => __( 'You can change all static text of the theme.', 'quixa' ),
			'priority'    => 999
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'quixa_labels_controls', [

			'rt_header_labels' => [
				'type'  => 'heading',
				'label' => __( 'Header Labels', 'quixa' ),
			],

			'rt_get_login_label' => [
				'type'        => 'text',
				'label'       => __( 'Sign In', 'quixa' ),
				'default'     => __( 'Sign In', 'quixa' ),
				'description' => __( 'Context: SignIn Button', 'quixa' ),
			],

			'rt_get_started_label' => [
				'type'        => 'text',
				'label'       => __( 'Get Started', 'quixa' ),
				'default'     => __( 'Get Started', 'quixa' ),
				'description' => __( 'Context: Menu Button', 'quixa' ),
			],

			'rt_follow_us_label' => [
				'type'        => 'text',
				'label'       => __( 'Follow Us On:', 'quixa' ),
				'default'     => __( 'Follow Us On:', 'quixa' ),
				'description' => __( 'Context: Topbar icon label', 'quixa' ),
			],

			'rt_footer_labels' => [
				'type'  => 'heading',
				'label' => __( 'Footer Labels', 'quixa' ),
			],

			'rt_ready_label' => [
				'type'        => 'text',
				'label'       => __( 'Are You Ready', 'quixa' ),
				'default'     => __( 'ARE YOU READY TO GET STARTED?', 'quixa' ),
				'description' => __( 'Context: Footer Are You Ready', 'quixa' ),
			],

			'rt_contact_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Contact Us', 'quixa' ),
				'default'     => __( 'Contact Us', 'quixa' ),
				'description' => __( 'Context: Footer contact button', 'quixa' ),
			],

			'rt_blog_labels'          => [
				'type'  => 'heading',
				'label' => __( 'Blog Labels', 'quixa' ),
			],
			'rt_author_prefix' => [
				'type'        => 'text',
				'label'       => __( 'By', 'quixa' ),
				'default'     => 'by',
				'description' => __( 'Context: Meta Author Prefix', 'quixa' ),
			],
			'rt_tags'                 => [
				'type'        => 'text',
				'label'       => __( 'Tags:', 'quixa' ),
				'default'     => __( 'Tags:', 'quixa' ),
				'description' => __( 'Context: Single blog footer tags label', 'quixa' ),
			],

		] );
	}


}
