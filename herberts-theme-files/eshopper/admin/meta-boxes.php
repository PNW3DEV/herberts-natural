<?php
/**
 * Initialize the meta boxes. 
 */

add_action( 'admin_init', 'eshopper_meta_boxes' );


function eshopper_meta_boxes() {
  $my_meta_box = array(
    'id'        => 'eshopper_meta_box',
    'title'     => __('eshopper page settings', THEMENAME ),
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      array(
        'id'          => 'header_tab',
        'label'       => __('Header settings', THEMENAME ),        
        'type'        => 'tab',        
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_type',
        'label'       => __( 'Header Type', THEMENAME ),
        'desc'        => '',
        'std'         => 'none',
        'type'        => 'select',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
            array(
            'value'       => 'none',
            'label'       => __( 'Default', THEMENAME ),
          ),
          array(
            'value'       => 'image',
            'label'       => __( 'Banner Image', THEMENAME ),
          ),
          array(
            'value'       => 'slider',
            'label'       => __( 'Slider', THEMENAME ),
          )
        )
      ),
      array(
        'id'          => 'slider_shortcode',
        'label'       => __( 'Slider shortcode', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array(),
        'condition'   => 'header_type:is(slider)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_image',
        'label'       => __( 'Header image', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'class'       => '',
        'choices'     => array(),
        'condition'   => 'header_type:is(image)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'title_display',
        'label'       => __( 'Title display', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'class'       => '',
        'choices'     => array(),
        'condition'	  => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'title',
        'label'       => __( 'Title', THEMENAME ),
        'desc'        => __('Leave it blank to show original page title', THEMENAME),
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'	  => 'title_display:is(on)'
      ),
      array(
        'id'          => 'subtitle',
        'label'       => __( 'Subtitle', THEMENAME ),
        'type'        => 'text',
        'operator'    => 'and',
        'condition'	  => 'title_display:is(on)'
      ),
      array(
        'id'          => 'content_tab',
        'label'       => __( 'Layout settings', THEMENAME ),      
        'type'        => 'tab',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'page_layout',
        'label'       => __( 'Default layout', THEMENAME ),
        'desc'        => '',
        'std'         => 'rs',
        'type'        => 'radio-image',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'full',
            'label'       => __( 'Full width', THEMENAME ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => __( 'Left sidebar', THEMENAME ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => __( 'Right sidebar', THEMENAME ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          ),
        )
      ),
      array(
        'id'          => 'sidebar',
        'label'       => __( 'Select sidebar', THEMENAME ),
        'desc'        => '',
        'std'         => 'sidebar-2',
        'type'        => 'sidebar-select',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'   => 'page_layout:not(full)'
      ),   
      
    )
  );
  
  ot_register_meta_box( $my_meta_box );

}

/**
 * Filter for OT Video Meta-box 
 */
function eshopper_video_ot_meta_box_post_format_video() {

    return array(
        'id'        => 'ot-post-format-video',
        'title'     => __('Video Post', THEMENAME ),
        'desc'      => __('Embed video from services like Youtube, Vimeo, or Hulu. You can find a list of supported oEmbed sites in the <a target="_blank" href="http://codex.wordpress.org/Embeds">Wordpress Codex</a>', THEMENAME ),
        'pages'     => array( 'post' ),
        'context'   => 'side',
        'priority'  => 'low',
        'fields'    => array(
            array(
                'id'          => 'eshopper_oembed_videos',
                'label'       => '',
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'settings'    => ''
            )
        )
    );
}
add_filter( 'ot_meta_box_post_format_video', 'eshopper_video_ot_meta_box_post_format_video' );

/**
 * Filter for OT Video Meta-box 
 */
function eshopper_video_ot_meta_box_post_format_audio() {

    return array(
        'id'        => 'ot-post-format-audio',
        'title'     => __('Audio Post', THEMENAME ),
        'desc'      => __('Embed audio from services like Rdio, Soundcloud, or Spotify. You can find a list of supported oEmbed sites in the <a target="_blank" href="http://codex.wordpress.org/Embeds">Wordpress Codex</a>', THEMENAME ),
        'pages'     => array( 'post' ),
        'context'   => 'side',
        'priority'  => 'low',
        'fields'    => array(
            array(
                'id'          => 'eshopper_oembed_audio',
                'label'       => '',
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'class'       => '',
                'settings'    => ''
            )
        )
    );
}
add_filter( 'ot_meta_box_post_format_audio', 'eshopper_video_ot_meta_box_post_format_audio' );


?>