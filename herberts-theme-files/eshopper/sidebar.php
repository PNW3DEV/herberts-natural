<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */
global $wp_query;

$layout = $wp_query->eshopper['layout'];
if( $layout != 'full' ):
	$sidebar = $wp_query->eshopper['sidebar'];
?>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sidebar">
		<?php if ( is_active_sidebar( $sidebar ) ) : ?>
			<div class="widget-area" role="complementary">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div><!-- #secondary -->
            <?php else: ?>
			<?php $args = 'before_widget = <div class="widget">&after_widget=</div></div>&before_title=<h3 class="widget-title">&after_title=<span class="fa fa-plus"></span></h3><div class="widget-content">'; ?>
			<?php the_widget( 'WP_Widget_Archives', '', $args ); ?> 
			<?php the_widget( 'WP_Widget_Pages', '', $args ); ?> 
		<?php endif; ?>
	</div>
<?php endif; ?>