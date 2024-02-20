<?php
/**
 * Build Gutenberg Blocks
 *
 * @package quixa
 */

namespace RT\Quixa\Api;

use RT\Quixa\Traits\SingletonTraits;

/**
 * Customizer class
 */
class Gutenberg {
	use SingletonTraits;

	/**
	 * Register default hooks and actions for WordPress
	 *
	 * @return WordPress add_action()
	 */
	public function __construct() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'init', [ $this, 'gutenberg_init' ] );

	}

	/**
	 * Custom Gutenberg settings
	 * @return
	 */
	public function gutenberg_init() {
		add_theme_support( 'gutenberg', [
			// Theme supports responsive video embeds
			'responsive-embeds' => true,
			// Theme supports wide images, galleries and videos.
			'wide-images'       => true,
		] );

		add_theme_support( 'editor-color-palette', [
			[
				'name'  => __( 'White', 'quixa' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			],
			[
				'name'  => __( 'Black', 'quixa' ),
				'slug'  => 'black',
				'color' => '#333333',
			],
			[
				'name'  => __( 'Gold', 'quixa' ),
				'slug'  => 'gold',
				'color' => '#FCBB6D',
			],
			[
				'name'  => __( 'Pink', 'quixa' ),
				'slug'  => 'pink',
				'color' => '#FF4444',
			],
			[
				'name'  => __( 'Grey', 'quixa' ),
				'slug'  => 'grey',
				'color' => '#b8c2cc',
			],
		] );
	}
}
