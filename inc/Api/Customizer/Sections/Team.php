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
class Team extends Customizer {

	protected string $section_team = 'quixa_team_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_team,
			'title'       => __( 'Team Archive', 'quixa' ),
			'description' => __( 'Quixa Team Section', 'quixa' ),
			'priority'    => 35
		] );

		Customize::add_controls( $this->section_team, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'quixa_team_controls', [

			'rt_team_style' => [
				'type'        => 'select',
				'label'       => __( 'Team Style', 'quixa' ),
				'description' => __( 'This option works only for large device', 'quixa' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'quixa' ),
					'2'    => __( 'Team 02', 'quixa' ),
				]
			],

			'rt_team_item_number' => [
				'type'    => 'text',
				'label'   => __( 'Team Archive Item Limit', 'quixa' ),
				'default' => '8',
			],

			'rt_team_excerpt_limit' => [
				'type'    => 'text',
				'label'   => __( 'Content Limit', 'quixa' ),
				'default' => '15',
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'quixa' ),
			],

			'rt_team_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'quixa' ),
				'default' => 1
			],

		] );
	}


}
