<?php
function eshopper_footer_options( $options = array() ){
	$choice= array( 
          array(
            'value'       => 'fa-facebook',
            'label'       => __( 'Facebook', THEMENAME ),
            'src'         => ''
          ),
          array(
            'value'       => 'fa-twitter',
            'label'       => __( 'Twitter', THEMENAME ),
            'src'         => ''
          ),
          array(
            'value'       => 'fa-pinterest',
            'label'       => __( 'Pinterest', THEMENAME ),
            'src'         => ''
          ),
          array(
            'value'       => 'fa-google-plus',
            'label'       => __( 'Google+', THEMENAME ),
            'src'         => ''
          ),
          array(
            'value'       => 'fa-instagram',
            'label'       => __( 'Instagram', THEMENAME ),
            'src'         => ''
          ),
          array(
            'value'       => 'fa-linkedin',
            'label'       => __( 'LinkdIn', THEMENAME ),
            'src'         => ''
          ),
        );

	$options = array(
		array(
        'id'          => 'footer_widget_area',
        'label'       => __( 'Footer widget area', THEMENAME ),
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_widget_box',
        'label'       => __( 'Footer widget box', THEMENAME ),
        'desc'        => '',
        'std'         => '4',
        'type'        => 'numeric-slider',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '1,4,1',
        'class'       => '',
        'condition'   => 'footer_widget_area:not(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_widget_background',
        'label'       => __( 'Footer Widget Area background', THEMENAME ),
        'desc'        => '',
        'std'         => array(
            'background-image' => '',
            'background-color' => '#f9f9f9'
            ),
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_widget_area:not(off)',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.footer-widget-wrap',
                    'property'   => 'background'
                    )
            )
      ),
	  array(
        'id'          => 'footer_background',
        'label'       => __( 'Footer background', THEMENAME ),
        'desc'        => '',
        'std'         => array(
            'background-image' => '',
            'background-color' => '#f9f9f9'
            ),
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.footer',
                    'property'   => 'background'
                    )
            )
      ),
	  array(
        'id'          => 'social_icon_display',
        'label'       => __( 'Footer Social Icon Display', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
		'section'     => 'footer_options',
        'class'       => '',
        'choices'     => array(),
        'condition'	  => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_social_icons',
        'label'       => __( 'Footer Social Icons', THEMENAME ),
        'desc'        => '',
        'std'         => array(
                            array(
                              'title' => __( 'Facebook', THEMENAME ),
                              'link'  => '#',
                              'icon'  => 'fa-facebook'
                              ),
                            array(
                              'title' => __( 'Twitter', THEMENAME ),
                              'link'  => '#',
                              'icon'  => 'fa-twitter'
                              ),
                            array(
                              'title' => __( 'Pinterest', THEMENAME ),
                              'link'  => '#',
                              'icon'  => 'fa-pinterest'
                              ),
                            array(
                              'title' => __( 'Google+', THEMENAME ),
                              'link'  => '#',
                              'icon'  => 'fa-google-plus'
                              ),
                            array(
                              'title' => __( 'Instragram', THEMENAME ),
                              'link'  => '#',
                              'icon'  => 'fa-instagram'
                              ),
                            array(
                              'title' => __( 'Linkdin', THEMENAME ),
                              'link'  => '#',
                              'icon'  => 'fa-linkedin'
                              ),
                            ),
        'type'        => 'list-item',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'social_icon_display:is(on)',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'link',
            'label'       => __( 'Link', THEMENAME ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'icon',
            'label'       => __( 'Icon', THEMENAME ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => $choice
          )
        )
      ),
      array(
        'id'          => 'footer_copyright_bar',
        'label'       => __( 'Footer copyright bar', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'copyright_text',
        'label'       => __( 'Copyright Text', THEMENAME ),
        'desc'        => '',
        'std'         => '&copy; Copyright themeperch.com',
        'type'        => 'textarea',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_copyright_bar:not(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_copyright_color',
        'label'       => __( 'Footer copyright text color', THEMENAME ),
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_copyright_bar:is(on)',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.copyright-bar, .copyright-bar p',
                'property'   => 'color'
                ),
            )
      ),
	  array(
        'id'          => 'footer_copyright_background',
        'label'       => __( 'Footer copyright background', THEMENAME ),
        'desc'        => '',
        'std'         => array(
            'background-image' => '',
            'background-color' => '#000'
            ),
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_copyright_bar:is(on)',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.copyright-bar',
                    'property'   => 'background'
                    )
            )
      ),
      array(
        'id'          => 'footer_scripts',
        'label'       => __( 'Footer scripts', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_options',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'eshopper_footer_options', $options );
}  
?>