<?php $header_canvas_sidebar = ot_get_option('header_canvas_sidebar'); ?>
<?php if($header_canvas_sidebar == 'on'){ ?>
<div class="st-sidebar st-effect-2 sidebar" id="st-sidebar">
    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	<?php else: ?>
		<?php $args = 'before_widget = <div class="widget">&after_widget=</div></div>&before_title=<h3 class="widget-title">&after_title=</h3><div class="widget-content">'; ?>
		<?php the_widget( 'WP_Widget_Archives', '', $args ); ?> 
		<?php the_widget( 'WP_Widget_Pages', '', $args ); ?> 
	<?php endif; ?>
</div>
<?php } ?>