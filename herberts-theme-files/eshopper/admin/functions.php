<?php
/**
 * Meta Boxes
 */
require( THEMEDIR . '/admin/scripts.php' );
require( THEMEDIR . '/admin/meta-boxes.php' );

require THEMEDIR. '/admin/widgets.php';
require THEMEDIR.'/admin/mr-image-resize.php';


function eshopper_user_social_links( $fields = array() ){
	$fields =  array('Twitter url' => 'twitter', 'Facebook url' => 'facebook', 'Linkedin' => 'linkedin', 'Dribbble url' => 'dribbble', 'Google url' => 'google' );
	return apply_filters( 'eshopper_user_social_links', $fields );
}

/**
 * Get the attachment ID from the image guid.
 *
 * @param     string    $guid - Image guid
 * @return    mixed     The attachment ID or false
 *
 * @access    public
 * @since     1.0
 */
if ( ! function_exists( 'eshopper_get_attachment_id_from_guid' ) ) {

  function eshopper_get_attachment_id_from_guid( $guid ) {

    global $wpdb;

    // Missing $guid return false
    if ( ! $guid )
      return false;

    // Get the ID
    $id = $wpdb->get_var( $wpdb->prepare("
      SELECT 
        p.ID 
      FROM
        $wpdb->posts p
      WHERE
        p.guid = %s 
        AND p.post_type = %s",
      $guid,
      'attachment'
    ) );

    // ID not found, try getting it the expensive WordPress way
    if ( $id == 0 )
      $id = url_to_postid( $guid );

    return $id;

  }

}

function eshopper_login_logo() { 
	$logo = (function_exists('ot_get_option'))? ot_get_option('admin_logo', THEMEURI.'/images/logo.png') : THEMEURI.'/images/logo.png';
	?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo esc_url($logo); ?>);
            background-position: bottom center; 
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'eshopper_login_logo' );


// Add Toolbar Menus
function eshopper_themeperch_toolbar() {
	global $wp_admin_bar;

	$args = array(
		'id'     => 'themeperch',
		'parent' => '',
		'title'  => __( 'eShopper '.THEMEVER, THEMENAME ),
		'href'   => 'http://themeforest.net/item/eshopper-woocommerce-wordpress-theme/10852415?ref=themeperch',
	);
	$wp_admin_bar->add_menu( $args );

	$args = array(
		'id'     => 'forum',
		'parent' => 'themeperch',
		'title'  => __( 'Forum support', THEMENAME ),
		'href'   => 'http://www.themeperch.net/forum',
		'target' => '_blank'
	);
	$wp_admin_bar->add_menu( $args );

	$args = array(
		'id'     => 'portfolio',
		'parent' => 'themeperch',
		'title'  => __( 'Envato Portfolio', THEMENAME ),
		'href'   => 'http://themeforest.net/user/themeperch/portfolio?ref=themeperch',
		'target' => '_blank'
	);
	$wp_admin_bar->add_menu( $args );

}

// Hook into the 'wp_before_admin_bar_render' action
add_action( 'wp_before_admin_bar_render', 'eshopper_themeperch_toolbar', 999 );


function eshopper_panels_row_styles($styles) {
	$styles['wide-grey'] = __('Wide Grey', THEMENAME);
	return $styles;
}
add_filter('siteorigin_panels_row_styles', 'eshopper_panels_row_styles');

function eshopper_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   $rgb_color = implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
   return $rgb_color;
}

function eshopper_options_filter($var){
    $var = (is_array($var) && ($var['type'] == 'background') || ($var['type'] == 'measurement') || ($var['type'] == 'typography')|| ($var['type'] == 'colorpicker'));

     return $var;
}

function eshopper_dynamic_css(){
    if(is_admin()){
      return false;
    }
    $settings = eshopper_theme_options();
    $options = array_filter($settings, "eshopper_options_filter");
    foreach ($options as $option) :
        if(isset($option['action'])){
            if( $option['type'] == 'background' ):
                $background = ot_get_option( $option['id'] );
                $background = (empty($background)) ? $option['std'] : $background;
                if( !empty($background) ):
                    foreach ($option['action'] as $value) {
                        if($value['selector'] != ''){
                            echo balanceTags($value['selector']). '{ ';
                            foreach( $background as $key => $value ){
                                if($key == 'background-image') echo ($value != '')? $key. ': url('.esc_url($value).'); ' : '';
                                else echo ($value != '')? $key. ': '.$value.'; ' : '';
                            }
                            echo '}';
                        }
                         ?>

<?php
                    }
                endif;
            elseif( $option['type'] == 'typography' ):
                $typography = ot_get_option( $option['id'], array() );        
                $typography = empty($typography) ? $option['std'] : $typography;
                if(!empty($typography)) :
                    foreach ($option['action'] as $value) {  
                        if($value['selector'] != ''){
                            echo balanceTags($value['selector']). '{ ';
                            foreach ($typography as $key => $value) {
                                if( $key == 'font-color' ) echo 'color: '.$value.'; ';
                                else echo ( $value != '' )? $key. ': '.$value.'; ' : '';
                            }
                            echo ' }';
                        }
                    }
                    ?>

<?php           
                endif;
            elseif( $option[ 'type' ] == 'colorpicker' ):   
                $colorpicker = ot_get_option( $option['id'] );  

                $colorpicker = ($colorpicker == '') ? $option['std'] : $colorpicker;

                $rgb = eshopper_hex2rgb($colorpicker);

                if( $colorpicker != '' ):
                    foreach ($option['action'] as $value) {
                        $colorpicker = isset($value['opacity'])? 'rgba('.$rgb.', '.$value['opacity'].')' : $colorpicker;
                        echo ($value['selector'] != '')?$value['selector']. '{ '.$value['property'].': '.$colorpicker .'; } ' : '';
                    }           
                    ?>

<?php           
                 endif;
            elseif( $option[ 'type' ] == 'measurement' ):  
                $measurement =  ot_get_option( $option['id'], array() ); 
                $measurement = empty($measurement) ? $option['std'] : $measurement; 
                if( !empty( $measurement ) ) :
                    foreach ($option['action'] as $value) {  
                        if($value['selector'] != ''){
                            echo balanceTags($value['selector']). '{ ';
                            echo esc_attr($value['property']).': '.intval($measurement[0]).$measurement[1] .';';
                            echo ' }';
                        }
                    }
                    ?>

<?php           
                endif;
            endif;
        }//if(isset($option['action'])):
    endforeach;
}

add_filter('siteorigin_panels_row_style_fields', 'eshopper_panels_layout_style_groups');
function eshopper_panels_layout_style_groups($groups){
  $groups['row_stretch'] = array(
            'name' => 'Row Layout',
            'type' => 'select',
            'group' => 'layout',
            'options' => array(
                    '' => 'Standard',
                    'alt' => 'Standard Alt',
                    'full' => 'Full Width',
                    'parallax' => 'Full Width Parrallax',
                    'full-stretched' => 'Full Width Stretched',  

                ),

            'priority' => 10
        );
  return $groups;
}

add_filter('siteorigin_panels_row_style_attributes', 'eshopper_row_style_attributrs', 10, 2);

function eshopper_row_style_attributrs($attributes, $args){
  
  //custom  
if(isset($args['row_stretch'])) :
  $attributes['class'][] = $args['row_stretch'];
 $attributes['class'][0] = ($args['row_stretch']== 'alt')? 'alt' : $attributes['class'][0];
  $args['row_stretch'] = ( $args['row_stretch'] == 'alt')? '' : $args['row_stretch'];
  $attributes['data-stretch-type'] = ($args['row_stretch']== 'alt')? '' : $args['row_stretch'];
else:
$args['row_stretch'] = '';
endif;
  //end


  
  if( $args['row_stretch'] != '' ) {
      $attributes['class'][] = 'siteorigin-panels-stretch';
      $attributes['data-stretch-type'] = $args['row_stretch'];
      wp_enqueue_script('siteorigin-panels-front-styles');
    }

    if( !empty( $args['class'] ) ) {
      $attributes['class'] = array_merge( $attributes['class'], explode(' ', $args['class']) );
    }

    if( !empty($args['row_css']) ){
      preg_match_all('/^(.+?):(.+?);?$/m', $args['row_css'], $matches);

      if(!empty($matches[0])){
        for($i = 0; $i < count($matches[0]); $i++) {
          $attributes['style'] .= $matches[1][$i] . ':' . $matches[2][$i] . ';';
        }
      }
    }

    if( !empty( $args['padding'] ) ) {
      $attributes['style'] .= 'padding: ' . esc_attr($args['padding']) . ';';
    }

    if( !empty( $args['background'] ) ) {
      $attributes['style'] .= 'background-color:' . $args['background']. ';';
    }

    if( !empty( $args['background_image_attachment'] ) ) {
      $url = wp_get_attachment_image_src( $args['background_image_attachment'], 'full' );

      if( !empty($url) ) {
        $attributes['style'] .= 'background-image: url(' . $url[0] . ');';
      }

      switch( $args['background_display'] ) {
        case 'tile':
          $attributes['style'] .= 'background-repeat: repeat;';
          break;
        case 'cover':
          $attributes['style'] .= 'background-size: cover;';
          break;
        case 'center':
          $attributes['style'] .= 'background-position: center center; background-repeat: no-repeat;';
          break;
      }
    }

    if( !empty( $args['border_color'] ) ) {
      $attributes['style'] .= 'border: 1px solid ' . $args['border_color']. ';';
    }

    return $attributes;
}

add_filter('siteorigin_panels_settings', 'eshopper_panels_settings');
function eshopper_panels_settings( $settings){
 

      $settings['post-types'] = get_option('siteorigin_panels_post_types', array('page')); // Post types that can be edited using panels.
      $settings['responsive'] = !isset( $display_settings['responsive'] ) ? true : $display_settings['responsive'];// Should we use a responsive layout
      $settings['tablet-layout'] = !isset( $display_settings['tablet-layout'] ) ? true : $display_settings['tablet-layout']; // Should we use a responsive layout
      $settings['tablet-width'] = !isset( $display_settings['tablet-width'] ) ? 780 : $display_settings['tablet-width']; // What is considered a mobile width?
      $settings['mobile-width'] = !isset( $display_settings['mobile-width'] ) ? 780 : $display_settings['mobile-width']; // What is considered a mobile width?
      $settings['margin-bottom'] = !isset( $display_settings['margin-bottom'] ) ? 60 : $display_settings['margin-bottom']; // Bottom margin of a cell
      $settings['margin-sides'] = !isset( $display_settings['margin-sides'] ) ? 30 : $display_settings['margin-sides']; // Spacing between 2 cells
      $settings['affiliate-id'] = false; // Set your affiliate ID
      $settings['copy-content'] = !isset( $display_settings['copy-content'] ) ? true : $display_settings['copy-content']; // Should we copy across content
      $settings['animations'] = !isset( $display_settings['animations'] ) ? true : $display_settings['animations'];// Should we copy across content

     
    
 
  return $settings;
}

function eshopper_preloader(){
  global $wpdb;
  $preloader_image = '';
  if( ot_get_option('preloader') == 'none' ) return false;

  if( ot_get_option('preloader') == 'custom' ) {
    $preloader_image = ot_get_option('preloader_image');
  }

  echo '<div id="fakeloader" data-spin="'.ot_get_option('preloader', 'spinner7').'" data-image="'.esc_url($preloader_image).'"></div>';
}


add_filter('siteorigin_panels_widget_dialog_tabs', 'eshopper_add_widgets_dialog_tabs');
function eshopper_add_widgets_dialog_tabs($tabs){
  $tabs[] = array(
    'title' => __('Eshopper Widgets', THEMENAME ),
    'filter' => array(
      'groups' => array('eshopper')
    )
  );
  return $tabs;
}

/**
 * Add some default recommended widgets.
 *
 * @param $widgets
 *
 * @return array
 */
function eshopper_siteorigin_panels_add_widgets($widgets){

 
    $widgets['Tp_Widget']['groups'] = array('eshopper');
    $widgets['Tp_Widget']['icon'] = 'dashicons dashicons-edit';    

    $widgets['NewsletterWidget']['groups'] = array('eshopper');
    $widgets['NewsletterWidget']['icon'] = 'dashicons dashicons-email';

    $widgets['WC_Widget_Cart']['groups'] = array('eshopper');
    $widgets['WC_Widget_Cart']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Price_Filter']['groups'] = array('eshopper');
    $widgets['WC_Widget_Price_Filter']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Product_Categories']['groups'] = array('eshopper');
    $widgets['WC_Widget_Product_Categories']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Products']['groups'] = array('eshopper');
    $widgets['WC_Widget_Products']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Product_Search']['groups'] = array('eshopper');
    $widgets['WC_Widget_Product_Search']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Product_Tag_Cloud']['groups'] = array('eshopper');
    $widgets['WC_Widget_Product_Tag_Cloud']['icon'] = 'dashicons dashicons-admin-post';

     $widgets['WC_Widget_Recently_Viewed']['groups'] = array('eshopper');
    $widgets['WC_Widget_Recently_Viewed']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Recent_Reviews']['groups'] = array('eshopper');
    $widgets['WC_Widget_Recent_Reviews']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Top_Rated_Products']['groups'] = array('eshopper');
    $widgets['WC_Widget_Top_Rated_Products']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Layered_Nav']['groups'] = array('eshopper');
    $widgets['WC_Widget_Layered_Nav']['icon'] = 'dashicons dashicons-admin-post';

    $widgets['WC_Widget_Layered_Nav_Filters']['groups'] = array('eshopper');
    $widgets['WC_Widget_Layered_Nav_Filters']['icon'] = 'dashicons dashicons-admin-post';

 
  return $widgets;

}
add_filter('siteorigin_panels_widgets', 'eshopper_siteorigin_panels_add_widgets');

add_filter( 'siteorigin_panels_widget_classes', 'eshopper_panels_widget_classes');
function eshopper_panels_widget_classes($classes){
  $classes = array_diff($classes, array("widget"));
  return $classes;
}

add_filter('siteorigin_panels_widget_args', 'eshopper_ppanels_widget_args');
function eshopper_ppanels_widget_args($args){
  $args['before_title'] = '<h3 class="widget-title"><span>';
   $args['after_title'] = '</span></h3>';

   return $args;
}

function eshopper_megamenu_themes($styles){
  $styles['default'] = array(
    "title" => "eShopper main menu", "container_background_from" => "rgb(0, 0, 0)", "container_background_to" => "rgb(0, 0, 0)", "container_padding_left" => "0px","container_padding_right" => "0px","container_padding_top" => "0px","container_padding_bottom" => "0px","container_border_radius_top_left" => "0px","container_border_radius_top_right" => "0px","container_border_radius_bottom_left" => "0px","container_border_radius_bottom_right" => "0px","arrow_up" => "dash-f343","arrow_down" => "dash-f347","arrow_left" => "dash-f341","arrow_right" => "dash-f345","font_size" => "14px","font_color" => "#666","font_family" => "inherit","menu_item_align" => "center","menu_item_background_from" => "rgba(0,0,0,0)","menu_item_background_to" => "rgba(0,0,0,0)","menu_item_background_hover_from" => "rgb(0, 0, 0)","menu_item_background_hover_to" => "rgb(0, 0, 0)","menu_item_spacing" => "15px","menu_item_link_font" => "inherit","menu_item_link_font_size" => "14px","menu_item_link_height" => "50px","menu_item_link_color" => "#ffffff","menu_item_link_weight" => "inherit","menu_item_link_text_transform" => "uppercase","menu_item_link_text_decoration" => "none","menu_item_link_color_hover" => "rgb(242, 242, 242)","menu_item_link_weight_hover" => "inherit","menu_item_link_text_decoration_hover" => "none","menu_item_link_padding_left" => "10px","menu_item_link_padding_right" => "10px","menu_item_link_padding_top" => "0px","menu_item_link_padding_bottom" => "0px","menu_item_link_border_radius_top_left" => "0px","menu_item_link_border_radius_top_right" => "0px","menu_item_link_border_radius_bottom_left" => "0px","menu_item_link_border_radius_bottom_right" => "0px","menu_item_border_color" => "#fff","menu_item_border_left" => "0px","menu_item_border_right" => "0px","menu_item_border_top" => "0px","menu_item_border_bottom" => "0px","menu_item_border_color_hover" => "#fff","menu_item_highlight_current" => "on","menu_item_divider" => "off","menu_item_divider_color" => "rgba(255, 255, 255, 0.1)","menu_item_divider_glow_opacity" => "0.1","panel_background_from" => "rgb(0, 0, 0)","panel_background_to" => "rgb(0, 0, 0)","panel_width" => "100%","panel_border_color" => "#fff","panel_border_left" => "0px","panel_border_right" => "0px","panel_border_top" => "0px","panel_border_bottom" => "0px","panel_border_radius_top_left" => "0px","panel_border_radius_top_right" => "0px","panel_border_radius_bottom_left" => "0px","panel_border_radius_bottom_right" => "0px","panel_header_color" => "#555","panel_header_text_transform" => "uppercase","panel_header_font" => "inherit","panel_header_font_size" => "16px","panel_header_font_weight" => "bold","panel_header_text_decoration" => "none","panel_header_padding_top" => "0px","panel_header_padding_right" => "0px","panel_header_padding_bottom" => "5px","panel_header_padding_left" => "0px","panel_header_margin_top" => "0px","panel_header_margin_right" => "0px","panel_header_margin_bottom" => "0px","panel_header_margin_left" => "0px","panel_header_border_color" => "#555","panel_header_border_left" => "0px","panel_header_border_right" => "0px","panel_header_border_top" => "0px","panel_header_border_bottom" => "0px","panel_padding_left" => "0px","panel_padding_right" => "0px","panel_padding_top" => "0px","panel_padding_bottom" => "0px","panel_widget_padding_left" => "15px","panel_widget_padding_right" => "15px","panel_widget_padding_top" => "15px","panel_widget_padding_bottom" => "15px","panel_font_size" => "14px","panel_font_color" => "#666","panel_font_family" => "inherit","panel_second_level_font_color" => "#555","panel_second_level_font_color_hover" => "#555","panel_second_level_text_transform" => "uppercase","panel_second_level_font" => "inherit","panel_second_level_font_size" => "16px","panel_second_level_font_weight" => "bold","panel_second_level_font_weight_hover" => "bold","panel_second_level_text_decoration" => "none","panel_second_level_text_decoration_hover" => "none","panel_second_level_background_hover_from" => "rgba(0,0,0,0)","panel_second_level_background_hover_to" => "rgba(0,0,0,0)","panel_second_level_padding_left" => "0px","panel_second_level_padding_right" => "0px","panel_second_level_padding_top" => "0px","panel_second_level_padding_bottom" => "0px","panel_second_level_margin_left" => "0px","panel_second_level_margin_right" => "0px","panel_second_level_margin_top" => "0px","panel_second_level_margin_bottom" => "0px","panel_second_level_border_color" => "#555","panel_second_level_border_left" => "0px","panel_second_level_border_right" => "0px","panel_second_level_border_top" => "0px","panel_second_level_border_bottom" => "0px","panel_third_level_font_color" => "#666","panel_third_level_font_color_hover" => "#666","panel_third_level_text_transform" => "none","panel_third_level_font" => "inherit","panel_third_level_font_size" => "14px","panel_third_level_font_weight" => "normal","panel_third_level_font_weight_hover" => "normal","panel_third_level_text_decoration" => "none","panel_third_level_text_decoration_hover" => "none","panel_third_level_background_hover_from" => "rgba(0,0,0,0)","panel_third_level_background_hover_to" => "rgba(0,0,0,0)","panel_third_level_padding_left" => "0px","panel_third_level_padding_right" => "0px","panel_third_level_padding_top" => "0px","panel_third_level_padding_bottom" => "0px","flyout_width" => "200px","flyout_menu_background_from" => "rgb(0, 0, 0)","flyout_menu_background_to" => "rgb(0, 0, 0)","flyout_border_color" => "#ffffff","flyout_border_left" => "0px","flyout_border_right" => "0px","flyout_border_top" => "0px","flyout_border_bottom" => "0px","flyout_border_radius_top_left" => "0px","flyout_border_radius_top_right" => "0px","flyout_border_radius_bottom_left" => "0px","flyout_border_radius_bottom_right" => "0px","flyout_menu_item_divider" => "off","flyout_menu_item_divider_color" => "rgba(255, 255, 255, 0.1)","flyout_padding_top" => "0px","flyout_padding_right" => "0px","flyout_padding_bottom" => "0px","flyout_padding_left" => "0px","flyout_link_padding_left" => "10px","flyout_link_padding_right" => "10px","flyout_link_padding_top" => "10px","flyout_link_padding_bottom" => "10px","flyout_link_weight" => "normal","flyout_link_weight_hover" => "inherit","flyout_link_height" => "18px","flyout_link_text_decoration" => "none","flyout_link_text_decoration_hover" => "none","flyout_background_from" => "rgb(0, 0, 0)","flyout_background_to" => "rgb(0, 0, 0)","flyout_background_hover_from" => "rgb(0, 0, 0)","flyout_background_hover_to" => "rgb(0, 0, 0)","flyout_link_size" => "14px","flyout_link_color" => "rgb(255, 255, 255)","flyout_link_color_hover" => "rgb(242, 242, 242)","flyout_link_family" => "inherit","flyout_link_text_transform" => "none","responsive_breakpoint" => "600px","responsive_text" => "MENU","line_height" => "2","z_index" => "999","shadow" => "off","shadow_horizontal" => "0px","shadow_vertical" => "0px","shadow_blur" => "5px","shadow_spread" => "0px","shadow_color" => "rgba(0, 0, 0, 0.1)","transitions" => "off","resets" => "on",
    "custom_css" => ''
  );
  return $styles;
}
add_filter( 'megamenu_themes', 'eshopper_megamenu_themes' );

add_option('yith_wcwl_button_position', 'shortcode', false);


