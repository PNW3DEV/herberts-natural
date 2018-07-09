<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
global $product, $woocommerce_loop, $wp_query;
$columns = ( $woocommerce_loop['columns'] == '' )? ot_get_option( 'product_column', 4 ) : $woocommerce_loop['columns'];

$color = ot_get_option( 'product_hover_color_options', 'dark' );

?>
<div class="dclass column<?php echo absint($columns); ?>"><div class="masonary-container products product-hover-<?php echo $color; ?>" data-column="<?php echo absint($columns); ?>">