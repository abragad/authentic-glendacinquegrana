<?php
/**
 * Include Theme Functions
 *
 * @package Authentic Child Theme
 * @subpackage Functions
 * @version 1.0.0
 */

/**
 * Setup Child Theme
 */
function csco_setup_child_theme() {
	// Add Child Theme Text Domain.
	load_child_theme_textdomain( 'authentic', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'csco_setup_child_theme', 99 );

/**
 * Enqueue Child Theme Assets
 */
function csco_child_assets() {
	if ( ! is_admin() ) {
		$version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'csco_child_css', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(), $version, 'all' );
	}
}

add_action( 'wp_enqueue_scripts', 'csco_child_assets', 99 );

/**
 * Add your custom code below this comment.
 */

/***** Add extra buttons on WooCommerce product page *****/

function my_extra_button_on_product_page() {
  global $product;
  $slug = $product->get_slug();
  $title = esc_attr( $product->get_title() );
  echo '<a href="mailto:shop@glendacinquegrana.com?Subject=' . $title . '" class="single_add_to_cart_button button alt">contact&nbsp;us</a>&nbsp;';
  if ( get_field( 'show_artsy_button' ) == 1 ) {
        if ( empty ( get_field( 'artsy_url' ) ) ) {
    echo '<a href="https://www.artsy.net/artwork/'. $slug . '" target="_blank" class="single_add_to_cart_button button alt">Buy Now on Artsy</a>';
} else {
    echo '<a href="'. get_field( 'artsy_url' ) . '" target="_blank" class="single_add_to_cart_button button alt">Buy Now on Artsy</a>';
}
  }
}

add_action( 'woocommerce_single_product_summary', 'my_extra_button_on_product_page', 30 );

/** end **/
