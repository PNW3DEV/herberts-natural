<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
$carttext = (eshopper_product_in_cart())?  'add_to_cart_button added' : 'add_to_cart_button';
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a title="'.__('Add to cart', THEMENAME).'" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? $carttext : '',
		esc_attr( $product->product_type ),
		//esc_html( $product->add_to_cart_text() )
		eshopper_cart_icon()
	),
$product );


if( function_exists( 'YITH_WCWL' ) ){
	$default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;

	if( ! empty( $default_wishlists ) ){
	    $default_wishlist = $default_wishlists[0]['ID'];
	}
	else{
	    $default_wishlist = false;
	}

	if(YITH_WCWL()->is_product_in_wishlist( $product->id, $default_wishlist )) {
		$wishlist_url = YITH_WCWL()->get_wishlist_url();
		echo '<a href="'.esc_url( $wishlist_url ).'"  
		class="wishlist-btn pull-right text-right">
		<i class="fa fa-heart color-text"></i></a>';

	}else{
		echo '<a href="'.esc_url( add_query_arg( 'add_to_wishlist', $product->id ) ).'"  
		data-product-id="'.$product->id.'" 
		data-product-type="'.$product->product_type.'" 
		class="wishlist-btn archive_add_wishlist add_to_wishlist pull-right text-right">
		<i class="fa fa-heart-o"></i></a>';
	}
}

