<?php
/*function eshopper_google_fonts_scripts(){
	$google_font_array = ot_get_option('google_fonts', array());
	if(empty($google_font_array)) 
		$google_font_array = array(
            array(
                'title' => 'Lato',
                'google_fonts_url' => '//fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext'
                )
        );

	foreach ($google_font_array as $key => $value) {
		wp_enqueue_style( 'google-fonts-'.sanitize_text_field($value['title']), esc_url_raw( $value['google_fonts_url'] ), array(), null );
	}
}*/

//add_action( 'wp_enqueue_scripts', 'eshopper_google_fonts_scripts' );
//add_action( 'admin_enqueue_scripts', 'eshopper_google_fonts_scripts' );
/**
 * Enqueue scripts and styles for front-end.
 *
 * @since eshopper 1.0
 */
function eshopper_scripts_styles() {
	global $wp_styles;	

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	wp_enqueue_script( 'jquery' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'eshopper-visible', THEMEURI . '/js/jquery.visible.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'eshopper-bootstrap', THEMEURI . '/js/bootstrap.min.js', array( 'jquery' ), '4.2.0', true );
	wp_enqueue_script( 'eshopper-classie', THEMEURI . '/js/classie.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'selectize', THEMEURI . '/js/selectize.min.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'eshopper-owl-carousel', THEMEURI . '/js/owl.carousel.min.js', array( 'jquery' ), '1.3.3', true );
	wp_enqueue_script( 'eshopper-magnific-popup', THEMEURI . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '0.9.9', true );
	wp_enqueue_script( 'eshopper-isotope', THEMEURI . '/js/isotope.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
	wp_enqueue_script( 'eshopper-waypoints', THEMEURI . '/js/waypoints.min.js', array( 'jquery' ), '1.6.2', true );
	wp_enqueue_script( 'eshopper-counterup', THEMEURI . '/js/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'eshopper-cookie', THEMEURI . '/js/jquery.cookie.js', array( 'jquery' ), '3.1.5', true );
	wp_enqueue_script( 'eshopper-justifiedGallery', THEMEURI . '/js/jquery.justifiedGallery.min.js', array( 'jquery' ), '1.0', true );
	wp_register_script( 'eshopper-freewall', THEMEURI . '/js/freewall.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'eshopper-freewall' );
	wp_enqueue_script( 'eshopper-mason', THEMEURI . '/js/mason.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'eshopper-sidebarEffects', THEMEURI . '/js/sidebarEffects.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'eshopper-imagefit', THEMEURI . '/js/imgLiquid.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'eshopper-fakeLoader', THEMEURI . '/js/fakeLoader.js', array( 'jquery' ), '1.0', true );
	// main scripts for eshopper
	wp_enqueue_script( 'eshopper-scripts', THEMEURI . '/js/js.js', array( 'jquery' ), THEMEVER, true );

	$localize_arr = array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ), 
				'product_column' => ot_get_option( 'product_column', 4 ),
				'catalog_image_width' => ot_get_option('catalog_image_width', 400),
				'catalog_image_height' => ot_get_option('catalog_image_height', 400),
				'product_spacing' => ot_get_option( 'product_column_spacing', 15 )
				);
	wp_localize_script( 'eshopper-scripts', 'eshopper', $localize_arr);
	
	


	// Add Lato font, used in the main stylesheet.
	$font_url = eshopper_get_font_url();
	if ( ! empty( $font_url ) )
	wp_enqueue_style( 'eshopper-fonts', esc_url_raw( $font_url ), array(), null );
	wp_enqueue_style( 'eshopper-bootstrap', THEMEURI . '/css/bootstrap.css', false, '3.0.1' );
	wp_enqueue_style( 'linearicons', THEMEURI . '/fonts/linearicons/style.css', array(), '1.0' );
	wp_enqueue_style( 'genericons', THEMEURI . '/fonts/genericons/genericons.css', array(), '3.2' );
	wp_enqueue_style( 'ionicons', THEMEURI . '/fonts/ionicons-2.0.1/css/ionicons.min.css', array(), '3.2' );
	wp_enqueue_style( 'font-awesome', THEMEURI . '/fonts/font-awesome/css/font-awesome.min.css', array('ionicons'), '3.2' );

	wp_enqueue_style( 'eshopper-menu', THEMEURI . '/css/menu.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-owl-carousel', THEMEURI . '/css/owl.carousel.css', false, '1.3.3' );
	wp_enqueue_style( 'selectize', THEMEURI . '/css/selectize.bootstrap3.css', array(), '3.3.4' );
	wp_enqueue_style( 'eshopper-animation', THEMEURI . '/css/animation.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-owl-transitions', THEMEURI . '/css/owl.transitions.css', false, '1.3.3' );
	wp_enqueue_style( 'eshopper-magnific-popup', THEMEURI . '/css/magnific-popup.css', false, '0.9.9' );
	wp_enqueue_style( 'eshopper-isotope', THEMEURI . '/css/isotope.css', false, '2.0.0' );
	wp_enqueue_style( 'eshopper-timeline', THEMEURI . '/css/timeline.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-simpletextrotator', THEMEURI . '/css/simpletextrotator.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-woocommerce', THEMEURI . '/css/woocommerce.css', false, THEMEVER );
	wp_enqueue_style( 'eshopper-item-hover', THEMEURI . '/css/item-hover.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-justifiedGallery', THEMEURI . '/css/justifiedGallery.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-sidebarEffects', THEMEURI . '/css/sidebarEffects.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-fakeLoader', THEMEURI . '/css/fakeLoader.css', false, '1.0.0' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'eshopper-style', get_stylesheet_uri() );
	wp_enqueue_style( 'eshopper-unit-styles', THEMEURI . '/css/unit-styles.css', false, '1.0.0' );
	wp_enqueue_style( 'eshopper-responsive', THEMEURI . '/css/responsive.css', false, '1.0.0' );		

	wp_dequeue_style( 'ot-dynamic-dynamic-css' );
    wp_enqueue_style( 'ot-dynamic-dynamic-css' );	
	
	wp_enqueue_script( 'eshopper-modernizr', THEMEURI . '/js/modernizr.js', array( 'jquery' ), '1.0', false );
	
}
add_action( 'wp_enqueue_scripts', 'eshopper_scripts_styles' );




function eshopper_dynamic_style_load_to_header(){	
	if( function_exists('ot_get_option') ){
		load_template( THEMEDIR . '/inc/style.php' );
		echo '<style>'.ot_get_option('custom_css').'</style>';
	}	

	
}
add_action( 'wp_head', 'eshopper_dynamic_style_load_to_header' );

function eshopper_dynamic_style_load_to_footer(){	
	if( function_exists('ot_get_option') ){
		echo ot_get_option( 'footer_scripts' );
	}	

	//wp_enqueue_script( 'eshopper-retina', THEMEURI . '/js/retina.min.js', array( 'jquery' ), '3.1.5', true );
	
}
add_action( 'wp_footer', 'eshopper_dynamic_style_load_to_footer' );

add_action( 'wp_print_scripts', 'eshopper_inline_js' );
function eshopper_inline_js(){
		global $wpdb;
		if( function_exists( 'ot_get_option' ) ):
			$top_fixed_menu = ot_get_option('sticky_header');
			if( $top_fixed_menu == 'on') $top_fixed = 1; else $top_fixed = 0;
		else:
			$top_fixed = 0;
		endif;	
		echo "<script type='text/javascript'>\n";
		echo "var top_fixed_menu = ".$top_fixed."; \n";
		echo "</script>";
		
}

function eshopper_add_editor_styles() {
    add_editor_style( 'css/bootstrap.css' );
    add_editor_style( 'fonts/Lato/stylesheet.css' );
    add_editor_style( 'fonts/font-awesome-4.2.0/css/font-awesome.min.css' );
    add_editor_style( 'fonts/genericons/genericons.css' );
}
add_action( 'after_setup_theme', 'eshopper_add_editor_styles' );
?>