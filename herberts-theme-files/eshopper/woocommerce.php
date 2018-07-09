<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of woocommerce pages
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */

get_header(); ?>


<?php  woocommerce_breadcrumb(); ?>
		
	<?php get_template_part( 'content/before', '' ); ?>
		<?php woocommerce_content(); ?>
	<?php get_template_part( 'content/after', '' ); ?>
	
<?php get_footer(); ?>