<?php

namespace RT\Quixa\Custom;

use RT\Quixa\Traits\SingletonTraits;
use RT\Quixa\Options\Opt;

/**
 * Extras.
 */
class Extras {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		add_filter( 'body_class', [ $this, 'body_class' ] );
		add_action( 'wp_nav_menu_item_custom_fields', [ $this, 'menu_customize' ], 10, 2 );
		add_action( 'wp_update_nav_menu_item', [ $this, 'menu_update' ], 10, 2 );
		add_filter( 'wp_get_nav_menu_items', [ $this, 'menu_modify' ], 11, 3 );
		add_action( 'after_switch_theme', [ $this, 'rewrite_flush' ] );
		add_action( 'pre_get_posts', [ $this, 'quixa_custom_pagesize' ],1 );
	}

	/*
	 * Body Class added
	 */
	public function body_class( $classes ) {

		// Adds a class of group-blog to blogs with more than 1 published author.

		$classes[] = 'quixa-header-' . Opt::$header_style;
		$classes[] = 'quixa-footer-' . Opt::$footer_style;
		$classes[] = 'quixa-banner-' . Opt::$banner_style;

		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		if ( Opt::$has_tr_header ) {
			$classes[] = 'has-trheader';
		} else {
			$classes[] = 'no-trheader';
		}

		if ( quixa_option( 'rt_tr_header_shadow' ) ) {
			$classes[] = 'has-menu-shadow';
		}

		if ( Opt::$has_banner ) {
			$classes[] = 'has-banner';
		} else {
			$classes[] = 'no-banner';
		}

		if ( Opt::$layout ) {
			$classes[] = 'layout-' . Opt::$layout;
		}

		if ( quixa_option( 'rt_sticy_header' ) ) {
			$classes[] = 'has-sticky-header';
		}

		if ( is_single() && Opt::$single_style ) {
			$classes[] = 'quixa-single-' . Opt::$single_style;
		}

		return $classes;
	}


	/*custom team archive */
	function quixa_custom_pagesize( $query ) {

		if( is_admin() || ! $query->is_main_query() ){
			return;
		}

		if ( is_post_type_archive( 'rt-team' ) || is_tax( "rt-team-department" ) ) {
			$team_post_number = quixa_option( 'rt_team_item_number' );
			$query->set( 'posts_per_page', $team_post_number );
			return;
		}

		if ( is_post_type_archive( 'rt-service' ) || is_tax( "rt-service-category" ) ) {
			$service_post_number = quixa_option( 'rt_service_item_number' );
			$query->set( 'posts_per_page', $service_post_number );
			return;
		}

	}

	/*
	 * Menu Customize
	 */
	function menu_customize( $item_id, $item ) {
		// Mega menu
		$_mega_menu = get_post_meta( $item_id, 'quixa_mega_menu', true );
		// Query string
		$menu_query_string = get_post_meta( $item_id, 'quixa_menu_qs', true );
		?>

		<?php if ( $item->menu_item_parent < 1 ) : ?>
			<p class="description mega-menu-wrapper widefat">
				<label for="quixa_mega_menu-<?php echo $item_id; ?>" class="widefat">
					<?php _e( 'Make as Mega Menu', 'quixa' ); ?><br>
					<select class="widefat" id="quixa_mega_menu-<?php echo $item_id; ?>" name="quixa_mega_menu[<?php echo $item_id; ?>]">
						<option value=""><?php _e( 'Choose Mega Menu', 'quixa' ); ?></option>
						<?php
						for ( $item = 2; $item < 12; $item++ ) {
							$menu_item  = $item;
							$class_hide = null;
							$label_hide = '';
							if ( $item > 6 ) {
								$menu_item -= 5;
								$class_hide = ' hide-header';
								$label_hide = ' — Hide Col Title';
							}
							$class    = "mega-menu mega-menu-col-{$menu_item}" . $class_hide ?? '';
							$selected = ( $_mega_menu == $class ) ? ' selected="selected" ' : null;
							?>
							<option <?php echo esc_attr( $selected ); ?> value="<?php echo esc_attr( $class ); ?>">
								<?php printf( __( 'Mega menu - %1$s Col %2$s', 'quixa' ), $menu_item, $label_hide ); ?>
							</option>
							<?php
						}
						?>
					</select>
				</label>
			</p>
		<?php endif; ?>

		<p class="description widefat">
			<label class="widefat" for="quixa-menu-qs-<?php echo $item_id; ?>">
				<?php echo esc_html__( 'Query String', 'quixa' ); ?><br>
				<input type="text"
					   class="widefat"
					   id="quixa-menu-qs-<?php echo $item_id; ?>"
					   name="quixa-menu-qs[<?php echo $item_id; ?>]"
					   value="<?php echo esc_html( $menu_query_string ); ?>"
				/>
			</label>
		</p>


		<?php
	}

	/**
	 * Menu Update
	 *
	 * @param $menu_id
	 * @param $menu_item_db_id
	 *
	 * @return void
	 */
	function menu_update( $menu_id, $menu_item_db_id ) {
		$_mega_menu         = $_POST['quixa_mega_menu'][ $menu_item_db_id ] ?? '';
		$query_string_value = $_POST['quixa-menu-qs'][ $menu_item_db_id ] ?? '';

		update_post_meta( $menu_item_db_id, 'quixa_mega_menu', $_mega_menu );
		update_post_meta( $menu_item_db_id, 'quixa_menu_qs', $query_string_value );
	}

	/**
	 * Modify Menu item
	 *
	 * @param $items
	 * @param $menu
	 * @param $args
	 *
	 * @return mixed
	 */
	function menu_modify( $items, $menu, $args ) {
		foreach ( $items as $item ) {
			$menu_query_string = get_post_meta( $item->ID, 'quixa_menu_qs', true );
			if ( $menu_query_string ) {
				$item->url = add_query_arg( $menu_query_string, '', $item->url );
			}
		}

		return $items;
	}

	/**
	 * Search form modify
	 *
	 * @return string
	 */
	public function search_form() {
		$output = '
		<form method="get" class="quixa-search-form" action="' . esc_url( home_url( '/' ) ) . '">
            <div class="search-box">
				<input type="text" class="form-control" placeholder="' . esc_attr__( 'Search here...', 'quixa' ) . '" value="' . get_search_query() . '" name="s" />
				<button class="item-btn" type="submit">
					' . quixa_get_svg( 'search', false ) . '
					<span class="btn-label">' . esc_html__( 'Search', 'quixa' ) . '</span>
				</button>
            </div>
		</form>
		';

		return $output;
	}

	/**
	 * Flush Rewrite on CPT activation
	 *
	 * @return empty
	 */
	public function rewrite_flush() {
		// Flush the rewrite rules only on theme activation
		flush_rewrite_rules();
	}
}
