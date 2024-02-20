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
class Blog extends Customizer {

	protected string $section_blog = 'quixa_blog_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog,
			'title'       => __( 'Blog Archive', 'quixa' ),
			'description' => __( 'Quixa Blog Section', 'quixa' ),
			'priority'    => 25
		] );

		Customize::add_controls( $this->section_blog, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'quixa_blog_controls', [

			'rt_blog_style' => [
				'type'        => 'select',
				'label'       => __( 'Blog Style', 'quixa' ),
				'description' => __( 'This option works only for large device', 'quixa' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'quixa' ),
					'list'    => __( 'List', 'quixa' ),
				]
			],

			'rt_blog_column' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column', 'quixa' ),
				'description' => __( 'This option works only for large device', 'quixa' ),
				'default'     => 'default',
				'choices'     => [
					'default'   => __( 'Default From Theme', 'quixa' ),
					'col-lg-12' => __( '1 Column', 'quixa' ),
					'col-lg-6'  => __( '2 Column', 'quixa' ),
					'col-lg-4'  => __( '3 Column', 'quixa' ),
					'col-lg-3'  => __( '4 Column', 'quixa' ),
				]
			],


			'rt_excerpt_limit' => [
				'type'    => 'text',
				'label'   => __( 'Content Limit', 'quixa' ),
				'default' => '30',
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'quixa' ),
			],

			'rt_blog_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'quixa' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_above_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Title Above Meta Style', 'quixa' ),
				'default' => 'meta-style-dash',
				'choices' => Fns::meta_style( [ 'meta-style-dash-bg', 'meta-style-pipe' ] )
			],

			'rt_blog_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'quixa' ),
				'description' => __( 'You can sort meta by drag and drop', 'quixa' ),
				'placeholder' => __( 'Choose Meta', 'quixa' ),
				'multiselect' => true,
				'default'     => 'author,date,category,tag,comment',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_visibility' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'quixa' ),
			],

			'rt_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'quixa' ),
				'default' => 1
			],

			'rt_blog_above_cat_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Title Above Category Visibility', 'quixa' ),
			],

			'rt_blog_content_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Content Visibility', 'quixa' ),
				'default' => 1
			],

			'rt_blog_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'quixa' ),
				'default' => 1
			],

		] );
	}


}
