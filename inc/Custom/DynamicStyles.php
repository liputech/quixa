<?php

namespace RT\Quixa\Custom;

use RT\Quixa\Helpers\Fns;
use RT\Quixa\Options\Opt;
use RT\Quixa\Traits\SingletonTraits;

class DynamicStyles {

	use SingletonTraits;

	protected $meta_data;

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 20 );
	}

	public function enqueue_scripts() {
		$this->meta_data = get_post_meta( get_the_ID(), "rt_layout_meta_data", true );
		$dynamic_css     = $this->inline_style();
		wp_register_style( 'quixa-dynamic', false, 'quixa-main' );
		wp_enqueue_style( 'quixa-dynamic' );
		wp_add_inline_style( 'quixa-dynamic', $this->minify_css( $dynamic_css ) );
	}

	function minify_css( $css ) {
		$css = preg_replace( '/\/\*[^*]*\*+([^\/][^*]*\*+)*\//', '', $css ); // Remove comments
		$css = preg_replace( '/\s+/', ' ', $css ); // Remove multiple spaces
		$css = preg_replace( '/\s*([\{\};])\s*/', '$1', $css ); // Remove spaces around { } ; : ,

		return $css;
	}

	private function inline_style() {

		$primary_color   = quixa_option( 'rt_primary_color', '#004BFF' );
		$secondary_color = quixa_option( 'rt_secondary_color', '#013bc5' );
		$body_color      = quixa_option( 'rt_body_color', '#343C4D' );
		$body_bg_color   = quixa_option( 'rt_body_bg_color', '#ffffff' );
		$title_color     = quixa_option( 'rt_title_color', '#00030C' );
		$rating_color    = quixa_option( 'rt_rating_color', '#F9BA19' );
		$meta_color      = quixa_option( 'rt_meta_color', '#7F838C' );
		$meta_light      = quixa_option( 'rt_meta_light', '#d3d9e1' );
		$gray10          = quixa_option( 'rt_gray10_color', '#f8f8f8' );
		$gray20          = quixa_option( 'rt_gray20_color', '#696969' );

		ob_start(); ?>

		:root {
		--rt-primary-color: <?php echo esc_html( $primary_color ); ?>;
		--rt-secondary-color: <?php echo esc_html( $secondary_color ); ?>;
		--rt-body-color: <?php echo esc_html( $body_color ); ?>;
		--rt-body-bg-color: <?php echo esc_html( $body_bg_color ); ?>;
		--rt-title-color: <?php echo esc_html( $title_color ); ?>;
		--rt-rating-color: <?php echo esc_html( $rating_color ); ?>;
		--rt-meta-color: <?php echo esc_html( $meta_color ); ?>;
		--rt-meta-light: <?php echo esc_html( $meta_light ); ?>;
		--rt-gray10: <?php echo esc_html( $gray10 ); ?>;
		--rt-gray20: <?php echo esc_html( $gray20 ); ?>;
		--rt-body-rgb: <?php echo esc_html( Fns::hex2rgb( $body_color ) ); ?>;
		--rt-title-rgb: <?php echo esc_html( Fns::hex2rgb( $title_color ) ); ?>;
		--rt-primary-rgb: <?php echo esc_html( Fns::hex2rgb( $primary_color ) ); ?>;
		--rt-secondary-rgb: <?php echo esc_html( Fns::hex2rgb( $secondary_color ) ); ?>;

		--rt-container-width: <?php echo quixa_option( 'container_width' ); ?>px;
		}

		body {
		color: <?php echo esc_html( $body_color ); ?>;
		}

		<?php
		$this->site_fonts();
		$this->topbar_css();
		$this->header_css();
		$this->breadcrumb_css();
		$this->content_padding_css();
		$this->footer_css();
		$this->site_background();

		return ob_get_clean();
	}

	/**
	 * Topbar Settings
	 * @return void
	 */
	protected function topbar_css() {
		$_topbar_active_color = quixa_option( 'rt_topbar_active_color' );
		echo self::css( 'body .site-header .quixa-topbar .topbar-container *:not(.dropdown-menu *)', 'color', 'rt_topbar_color' );
		echo self::css( 'body .site-header .quixa-topbar .topbar-container svg:not(.dropdown-menu svg)', 'fill', 'rt_topbar_color', ' !important' );

		if ( ! empty( $_topbar_active_color ) ) : ?>
			body .site-header .quixa-topbar .topbar-container a:hover:not(.dropdown-menu a:hover),
			body .quixa-topbar #topbar-menu ul ul li.current_page_item > a,
			body .quixa-topbar #topbar-menu ul ul li.current-menu-ancestor > a,
			body .quixa-topbar #topbar-menu ul.quixa-topbar-menu > li.current-menu-item > a,
			body .quixa-topbar #topbar-menu ul.quixa-topbar-menu > li.current-menu-ancestor > a {
			color: <?php echo esc_attr( $_topbar_active_color ); ?> !important;
			}

			body .site-header .quixa-topbar .topbar-container a:hover:not(.dropdown-menu a:hover svg) svg,
			body .quixa-topbar #topbar-menu ul ul li.current-menu-ancestor > a svg,
			body .quixa-topbar #topbar-menu ul.quixa-topbar-menu > li.current-menu-item > a svg,
			body .quixa-topbar #topbar-menu ul.quixa-topbar-menu > li.current-menu-ancestor > a svg {
			fill: <?php echo esc_attr( $_topbar_active_color ); ?> !important;
			}
		<?php endif; ?>

		<?php
		echo self::css( 'body .quixa-topbar', 'background-color', 'rt_topbar_bg_color' );

	}


	/**
	 * Menu Color Settings
	 * @return void
	 */
	protected function header_css() {
		//Logo CSS
		$logo_width = '';

		$logo_dimension     = quixa_option( 'rt_logo_width_height' );
		$menu_border_bottom = quixa_option( 'rt_menu_border_color' );

		if ( strpos( $logo_dimension, ',' ) ) {
			$logo_width = explode( ',', $logo_dimension );
		}

		//Default Menu
		$_menu_color        = quixa_option( 'rt_menu_color' );
		$_menu_active_color = quixa_option( 'rt_menu_active_color' );
		$_menu_bg_color     = quixa_option( 'rt_menu_bg_color' );

		//Transparent Menu
		$_tr_menu_color        = quixa_option( 'rt_tr_menu_color' );
		$_tr_menu_active_color = quixa_option( 'rt_tr_menu_active_color' );

		$_header_border     = quixa_option( 'rt_header_border' );
		$_breadcrumb_border = quixa_option( 'rt_breadcrumb_border' );
		?>

		<?php //Header Logo CSS ?>
		<?php if ( Opt::$header_width == 'full' ) :
			$h_width = '100%';
			if ( ( $header_width = quixa_option( 'rt_header_max_width' ) ) > 768 ) {
				$h_width = $header_width . 'px';
			}
			?>
			.header-container, .topbar-container {width: <?php echo $h_width; ?>;max-width: 100%;}
		<?php endif; ?>

		<?php if ( ! empty( $logo_width ) ) : ?>
			.site-header .site-branding img {
			max-width: <?php echo esc_attr( $logo_width[0] ?? '100%' ) ?>;
			max-height: <?php echo esc_attr( $logo_width[1] ?? 'auto' ) ?>;
			object-fit: contain;
			}
		<?php endif; ?>

		<?php //Default Header ?>
		<?php if ( ! empty( $_menu_color ) ) : ?>
			body .main-header-section .quixa-navigation ul li a {color: <?php echo esc_attr( $_menu_color ) ?>;}
			body .main-header-section svg {fill: <?php echo esc_attr( $_menu_color ) ?>;}
			body .main-header-section .menu-icon-wrapper .menu-bar span,
			body .menu-icon-wrapper .has-separator li:not(:last-child):after {background-color: <?php echo esc_attr( $_menu_color ) ?>;}
		<?php endif; ?>

		<?php if ( ! empty( $_menu_active_color ) ) : ?>
			body .main-header-section .quixa-navigation ul li a:hover,
			body .main-header-section .quixa-navigation ul li.current-menu-item > a,
			body .main-header-section .quixa-navigation ul li.current-menu-ancestor > a {color: <?php echo esc_attr( $_menu_active_color ) ?>;}
			body .main-header-section .quixa-navigation ul li.current-menu-item > a svg,body .main-header-section .quixa-navigation ul li.current-menu-ancestor > a svg {fill: <?php echo esc_attr( $_menu_active_color ) ?>;}
			body .main-header-section .menu-icon-wrapper .menu-bar:hover span {background-color: <?php echo esc_attr( $_menu_active_color ) ?>;}
			body .main-header-section a:hover [class*=rticon] svg {fill: <?php echo esc_attr( $_menu_active_color ) ?>;}
		<?php endif; ?>

		<?php if ( ! empty( $_menu_bg_color ) ) : ?>
			body .main-header-section {background-color: <?php echo esc_attr( $_menu_bg_color ) ?>;}
		<?php endif; ?>

		<?php //Transparent Header ?>
		<?php if ( ! empty( $_tr_menu_color ) ) : ?>
			body.has-trheader .site-header .site-branding h1 a,
			body.has-trheader .site-header .quixa-navigation *,
			body.has-trheader .site-header .quixa-navigation ul li a {
			color: <?php echo esc_attr( $_tr_menu_color ); ?>;
			}
			body.has-trheader .site-header .menu-bar span,
			body.has-trheader .menu-icon-wrapper .has-separator li:not(:last-child):after {
			background-color: <?php echo esc_attr( $_tr_menu_color ); ?> !important;
			}

			body.has-trheader .site-header .menu-icon-wrapper svg,
			body.has-trheader .site-header .quixa-topbar .caret svg,
			body.has-trheader .site-header .main-header-section .caret svg {
			fill: <?php echo esc_attr( $_tr_menu_color ); ?>
			}
		<?php endif; ?>

		<?php if ( ! empty( $_tr_menu_active_color ) ) : ?>
			body.has-trheader .site-header .quixa-navigation ul li a:hover,
			body.has-trheader .site-header .quixa-navigation ul li.current-menu-item > a,
			body.has-trheader .site-header .quixa-navigation ul li.current-menu-ancestor > a {
			color: <?php echo esc_attr( $_tr_menu_active_color ); ?>
			}
			body.has-trheader .main-header-section .menu-icon-wrapper .menu-bar:hover span {
			background-color: <?php echo esc_attr( $_tr_menu_active_color ); ?> !important;
			}
			body.has-trheader .main-header-section a:hover [class*=rticon] svg,
			body.has-trheader .site-header .quixa-navigation ul li.current-menu-ancestor > a svg,
			body.has-trheader .site-header .quixa-navigation ul li.current-menu-item > a svg {
			fill: <?php echo esc_attr( $_tr_menu_active_color ); ?>
			}
		<?php endif; ?>
		<?php if ( ! empty( $menu_border_bottom ) ) : ?>
			body .quixa-topbar,
			body .main-header-section,
			body .quixa-breadcrumb-wrapper {
			border-bottom-color: <?php echo esc_attr( $menu_border_bottom ); ?>;
			}
		<?php endif; ?>

		<?php if ( ! $_header_border ) : ?>
			body .main-header-section {border-bottom: none;}
		<?php endif; ?>
		<?php if ( ! $_breadcrumb_border ) : ?>
			body .quixa-breadcrumb-wrapper {border-bottom: none;}
		<?php endif; ?>

		<?php
	}

	/**
	 * Breadcrumb Settings
	 * @return void
	 */
	protected function breadcrumb_css() {
		$banner_bg                 = quixa_option( 'rt_banner_bg' );
		$breadcrumb_color          = quixa_option( 'rt_breadcrumb_color' );
		$breadcrumb_active         = quixa_option( 'rt_breadcrumb_active' );
		$rt_breadcrumb_title_color = quixa_option( 'rt_breadcrumb_title_color' );
		if ( ! empty( $rt_breadcrumb_title_color ) ) : ?>
			.quixa-breadcrumb-wrapper .entry-title {color: <?php echo esc_attr( $rt_breadcrumb_title_color ) ?> !important;}
		<?php endif; ?>
		<?php if ( ! empty( $banner_bg ) ) : ?>
			body .quixa-breadcrumb-wrapper,
			.quixa-banner-2 .quixa-breadcrumb-wrapper {background-color: <?php echo esc_attr( $banner_bg ) ?>;}
		<?php endif; ?>
		<?php if ( ! empty( $breadcrumb_color ) ) : ?>
			body .quixa-breadcrumb-wrapper .breadcrumb a,
			.has-trheader .quixa-breadcrumb-wrapper .breadcrumb a {color: <?php echo esc_attr( $breadcrumb_color ) ?>;}
			body .quixa-breadcrumb-wrapper .breadcrumb li::after {border-color: <?php echo esc_attr( $breadcrumb_color ) ?>;}
		<?php endif; ?>
		<?php if ( ! empty( $breadcrumb_active ) ) : ?>
			body .quixa-breadcrumb-wrapper .breadcrumb li.active .title,
			body .quixa-breadcrumb-wrapper .breadcrumb a:hover,
			.has-trheader .quixa-breadcrumb-wrapper .breadcrumb li.active .title,
			.has-trheader .quixa-breadcrumb-wrapper .breadcrumb a:hover {color: <?php echo esc_attr( $breadcrumb_active ) ?>;}
		<?php endif;
	}

	/**
	 * Content Padding
	 * @return void
	 */
	protected function content_padding_css() {

		if ( ! empty( Opt::$padding_top ) && 'default' !== Opt::$padding_top) { ?>
			.content-area {padding-top: <?php echo esc_attr( Opt::$padding_top ); ?>px;}
		<?php }

		if ( ! empty( Opt::$padding_bottom ) && 'default' !== Opt::$padding_bottom) { ?>
			.content-area {padding-bottom: <?php echo esc_attr( Opt::$padding_bottom ); ?>px;}
		<?php }

	}

		/**
		 * Footer CSS
		 * @return void
		 */
		protected
		function footer_css() {
			if ( quixa_option( 'rt_footer_width' ) && quixa_option( 'rt_footer_max_width' ) > 1400 ) {
				echo self::css( '.site-footer .footer-container', 'width', 'rt_footer_max_width', 'px;max-width: 100%' );
			}

			echo self::css( 'body .site-footer *:not(a)', 'color', 'rt_footer_text_color' );
			echo self::css( 'body .site-footer a, .quixa-footer-2 .site-footer .widget a', 'color', 'rt_footer_link_color' );
			echo self::css( 'body .site-footer a:hover, .quixa-footer-2 .footer-sidebar a:hover', 'color', 'rt_footer_link_hover_color' );
			echo self::css( 'body .site-footer, .quixa-footer-2 .site-footer, body .site-footer select option', 'background-color', 'rt_footer_bg' );
			echo self::css( '.site-footer .widget :is(td, th, select, .search-box)', 'border-color', 'rt_footer_input_border_color' );
			echo self::css( 'body .site-footer .widget-title, .quixa-footer-2 .footer-widgets .widget-title', 'color', 'rt_footer_widget_title_color' );
			echo self::css( 'body .footer-copyright-wrapper .copyright-text', 'color', 'rt_copyright_text_color' );
			echo self::css( 'body .site-footer .footer-copyright-wrapper a', 'color', 'rt_copyright_link_color' );
			echo self::css( 'body .site-footer .footer-copyright-wrapper a:hover', 'color', 'rt_copyright_link_hover_color' );
			echo self::css( 'body .site-footer .footer-copyright-wrapper', 'background-color', 'rt_copyright_bg' );
		}


		/**
		 * Load site fonts
		 * @return void
		 */
		protected
		function site_fonts() {

			$typo_body           = json_decode( quixa_option( 'rt_body_typo' ), true );
			$typo_menu           = json_decode( quixa_option( 'rt_menu_typo' ), true );
			$typo_heading        = json_decode( quixa_option( 'rt_all_heading_typo' ), true );
			$body_font_family    = $typo_body['font'] ?? 'Urbanist';
			$heading_font_family = $typo_heading['font'] ?? $body_font_family;
			?>
			:root{
			--rt-body-font: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif;;
			--rt-heading-font: '<?php echo esc_html( $heading_font_family ); ?>', sans-serif;
			--rt-menu-font: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif;
			}

			<?php
			echo self::font_css( 'body', $typo_body );
			echo self::font_css( '.site-header', [ 'font' => $typo_menu['font'] ] );
			echo self::font_css( '.quixa-navigation ul li a', [
				'size'          => $typo_menu['size'],
				'regularweight' => $typo_menu['regularweight'],
				'lineheight'    => $typo_menu['lineheight']
			] );
			echo self::font_css( '.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6', [
				'font'          => $typo_heading['font'],
				'regularweight' => $typo_heading['regularweight']
			] );

			$heading_fonts = [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ];
			foreach ( $heading_fonts as $heading ) {
				$font = json_decode( quixa_option( "rt_heading_{$heading}_typo" ), true );
				if ( ! empty( $font['font'] ) ) {
					$selector = "$heading, .$heading";
					echo self::font_css( $selector, $font );
				}
			}
		}


		/**
		 * Generate CSS
		 *
		 * @param $selector
		 * @param $property
		 * @param $theme_mod
		 *
		 * @return string|void
		 */
		public
		static function css( $selector, $property, $theme_mod, $after_css = '' ) {
			$theme_mod = quixa_option( $theme_mod );

			if ( ! empty( $theme_mod ) ) {
				return sprintf( '%s { %s:%s%s; }', $selector, $property, $theme_mod, $after_css );
			}
		}

		/**
		 * Font CSS
		 *
		 * @param $selector
		 * @param $property
		 * @param $theme_mod
		 * @param $after_css
		 *
		 * @return string
		 */
		public
		static function font_css( $selector, $font ) {
			$css = '';
			$css .= $selector . '{'; //Start CSS
			$css .= ! empty( $font['font'] ) ? "font-family: '" . $font['font'] . "', sans-serif;" : '';
			$css .= ! empty( $font['size'] ) ? "font-size: {$font['size']}px;" : '';
			$css .= ! empty( $font['lineheight'] ) ? "line-height: {$font['lineheight']}px;" : '';
			$css .= ! empty( $font['regularweight'] ) ? "font-weight: {$font['regularweight']};" : '';
			$css .= '}'; //End CSS

			return $css;
		}

		/**
		 * Site background
		 *
		 * @return string
		 */

		function site_background() {
			if ( ! empty( Opt::$pagebgimg ) ) {
				$bg = wp_get_attachment_image_src( Opt::$pagebgimg, 'full' );
				if ( ! empty( $bg[0] ) ) { ?>
					body {
					background-image: url(<?php echo esc_url( $bg[0] ) ?>);
					background-repeat: repeat;
					background-position: center center;
					background-size: cover;
					}
					<?php
				}
			}
		}

	}
