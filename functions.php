<?php

/***** Load Stylesheets *****/

function authentic_child_styles() {
	$version = "20210001";
    wp_enqueue_style('authentic-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('authentic-child-style', get_stylesheet_directory_uri() . '/style.css', array('authentic-parent-style'), $version);
}
add_action('wp_enqueue_scripts', 'authentic_child_styles');

/***** Add extra buttons on WooCommerce product page *****/

function my_extra_button_on_product_page() {
  global $product;
  $slug = $product->get_slug();
  $title = esc_attr( $product->get_title() );
  echo '<a href="mailto:shop@glendacinquegrana.com?Subject=' . $title . '" class="single_add_to_cart_button button alt">contact&nbsp;us</a>&nbsp;';
  echo '<a href="https://www.artsy.net/artwork/'. $slug . '" target="_blank" class="single_add_to_cart_button button alt">Buy Now on Artsy</a>';
}

add_action( 'woocommerce_single_product_summary', 'my_extra_button_on_product_page', 30 );

/*** end ***/
