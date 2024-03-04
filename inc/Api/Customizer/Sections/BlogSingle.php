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
class BlogSingle extends Customizer {
	protected string $section_blog_single = 'quixa_blog_single_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog_single,
			'title'       => __( 'Single Blog', 'quixa' ),
			'description' => __( 'Quixa Blog Single Section', 'quixa' ),
			'priority'    => 26
		] );

		Customize::add_controls( $this->section_blog_single, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'quixa_single_controls', [

			'rt_single_post_style' => [
				'type'    => 'select',
				'label'   => __( 'Post View Style', 'quixa' ),
				'default' => 'single-default',
				'choices' => Fns::single_post_style()
			],

			'rt_single_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Single Meta', 'quixa' ),
				'description' => __( 'You can sort meta by drag and drop', 'quixa' ),
				'placeholder' => __( 'Choose Meta', 'quixa' ),
				'multiselect' => true,
				'default'     => 'author,date,category,comment',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_single_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'quixa' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_visibility_heading' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'quixa' ),
			],

			'rt_single_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'quixa' ),
				'default' => 1
			],

			'rt_single_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Above Meta Visibility', 'quixa' ),
			],
			'rt_single_tag_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Tag Visibility', 'quixa' ),
			],
			'rt_single_share_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Share Visibility', 'quixa' ),
			],
			'rt_post_share' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Share Media', 'quixa' ),
				'description' => __( 'You can sort meta by drag and drop', 'quixa' ),
				'placeholder' => __( 'Choose Media', 'quixa' ),
				'multiselect' => true,
				'default'     => 'facebook,twitter,linkedin',
				'choices'     => Fns::post_share_list(),
				'condition' => [ 'rt_single_share_visibility' ]
			],

		] );
	}


}
