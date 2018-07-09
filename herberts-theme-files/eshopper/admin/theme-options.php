<?php
//include all available options
include 'options/general_options.php';
include 'options/background_options.php';
include 'options/header_options.php';
include 'options/sidebar_options.php';
include 'options/footer_options.php';
include 'options/page_options.php';
include 'options/blog_options.php';
include 'options/woo_options.php';
include 'options/typography_options.php';
include 'options/styling_options.php';
include 'options/theme_text.php';
include 'options/custom_css.php';
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'eshopper_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function eshopper_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
 $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  //available option functions - return type array()
  $general_options = eshopper_general_options();
  $background_options = eshopper_background_options();
  $header_options = eshopper_header_options();
  $sidebar_options = eshopper_sidebar_options();
  $footer_options = eshopper_footer_options();
  //$page_options = eshopper_page_options();
  $blog_options = eshopper_blog_options();
  $woo_options = eshopper_woo_options();
  $typography_options = eshopper_typography_options();
  $styling_options = eshopper_styling_options();
  //$theme_text = eshopper_theme_text();
  $custom_css = eshopper_custom_css();


  //merge all available options
  $settings = array_merge( $general_options, $background_options, $header_options, $sidebar_options, $footer_options,  $blog_options, $woo_options, $typography_options, $styling_options,  $custom_css );

 

  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_options',
        'title'       => __( 'General options', THEMENAME )
      ),
      array(
        'id'          => 'background_options',
        'title'       => __( 'Background Options', THEMENAME )
      ),
     array(
        'id'          => 'header_options',
        'title'       => __( 'Header options', THEMENAME )
      ),
      array(
        'id'          => 'footer_options',
        'title'       => __( 'Footer options', THEMENAME )
      ),
      array(
        'id'          => 'sidebar_option',
        'title'       => __( 'Sidebar options', THEMENAME )
      ),
     /* array(
        'id'          => 'page_options',
        'title'       => __( 'Page options', THEMENAME )
      ),*/
      array(
        'id'          => 'blog_options',
        'title'       => __( 'Blog options', THEMENAME )
      ),
      array(
        'id'          => 'woo_options',
        'title'       => __( 'Woocommerce options', THEMENAME )
      ),
      array(
        'id'          => 'fonts',
        'title'       => __( 'Typography options', THEMENAME )
      ),
      array(
        'id'          => 'styling_options',
        'title'       => __( 'Styling options', THEMENAME )
      ),
      /*array(
        'id'          => 'theme_text',
        'title'       => __( 'Theme text options', THEMENAME )
      ),*/
      array(
        'id'          => 'custom_css',
        'title'       => __( 'Custom css', THEMENAME )
      )
    ),
    'settings'        => $settings
  );

  
  /* allow settings to be filtered before saving */
  //$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( ($saved_settings !== $custom_settings) ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

  return $custom_settings[ 'settings' ];
  
}