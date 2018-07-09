<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Increase loop count
$woocommerce_loop['loop']++;



$cat_image_size = eshopper_product_cat_image_size();
if (array_key_exists($category->term_id,$cat_image_size)){
	$classes = ' item size'.$cat_image_size[$category->term_id][0].$cat_image_size[$category->term_id][1];
	$r = $cat_image_size[$category->term_id][1];
	$c = $cat_image_size[$category->term_id][0];
}else{
	$classes = ' item size11';
	$r = $c = 1;	
}

?>
<div class="product-category<?php echo esc_attr($classes); ?>" data-rowoff="<?php echo absint($r); ?>" data-columnoff="<?php echo absint($c); ?>">

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

		<figure class="effect-sadie">
		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>
		<figcaption>
			<div class="overlay"></div>
			<h2>
				<?php
					echo esc_attr($category->name);

					if ( $category->count > 0 )
						echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
				?>
			</h2>
			<?php echo ($category->description != '')? '<p>'. wp_trim_words($category->description, 25). '</p>' : ''; ?>
			<?php
				/**
				 * woocommerce_after_subcategory_title hook
				 */
				do_action( 'woocommerce_after_subcategory_title', $category );
			?>
			
		</figcaption>
		</figure>


	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</div>