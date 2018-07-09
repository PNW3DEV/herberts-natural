<?php

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since eshopper 1.0
 */
function eshopper_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', THEMENAME ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except Page templates, which has its own widgets', THEMENAME ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '<span class="fa fa-plus"></span></h3><div class="widget-content">',
	) );


	register_sidebar( array(
		'name' => __( 'Page Widget Area', THEMENAME ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears only on page.', THEMENAME ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '<span class="fa fa-plus"></span></h3><div class="widget-content">',
	) );

	if( function_exists('is_woocommerce') ){
		register_sidebar( array(
			'name' => __( 'Woocommerce Widget Area', THEMENAME ),
			'id' => 'sidebar-3',
			'description' => __( 'Appears only on page.', THEMENAME ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '<span class="fa fa-plus"></span></h3><div class="widget-content">',
		) );
	}

	if( function_exists( 'ot_get_option' ) ):
	$header_canvas_sidebar = ot_get_option( 'header_canvas_sidebar' );
	if( $header_canvas_sidebar == 'on' ){
	register_sidebar( array(
		'name' => __( 'Off canvas Widget Area', THEMENAME ),
		'id' => 'sidebar-4',
		'description' => __( 'Off canvas widget.', THEMENAME ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-content">',
	) );
	}
	endif;

	if( function_exists( 'ot_get_option' ) ):
		$sidebarArr = ot_get_option( 'create_sidebar', array() );
		if( !empty( $sidebarArr ) ){
			$i = 5;
			foreach ($sidebarArr as $sidebar) {

				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => 'sidebar-'.$i,
					'description' => $sidebar['desc'],
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				) );

				$i++;
			}
		}
	endif;	//if( function_exists( 'ot_get_option' ) ):

	if( function_exists( 'ot_get_option' ) ):
		$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
		if( $footer_widget_area == 'on' ):
			$i = ot_get_option( 'footer_widget_box', 4 );
			for( $i = 1; $i <= 4; $i++ ):
				register_sidebar( array(
					'name' => __( 'Footer Widget Area '.$i, THEMENAME ),
					'id' => 'footer-'.$i,
					'description' => __( 'Appears in Footer column '.$i, THEMENAME ),
					'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="title">',
					'after_title' => '</h3>',
				) );
			endfor; 
		endif;
	endif;	//if( function_exists( 'ot_get_option' ) ):
}
add_action( 'widgets_init', 'eshopper_widgets_init' );
?>