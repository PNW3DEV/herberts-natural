<?php
function eshopper_typography_options( $options = array() ){
	
    $body = array(
        'font-color' => '#000', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => '','font-weight' => '', 'letter-spacing' => '0.05em', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '',
        );
    $body_a = array( 
        'font-color' => '', 'font-family' => '', 'font-size' => '14px','font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '',
        );
    $menu_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none',  'text-transform' => 'uppercase',
        );
    $submenu_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase',
        );
    $heading_span = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '', 'font-style' => '',
        'font-variant' => '', 'font-weight' => '400', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => '', 'text-transform' => '', 
        );
    $h1 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '32px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '400', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h1_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '32px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '400', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h2 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '28px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '400', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h2_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '28px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h3 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '20px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '400', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $h3_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '20px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h4 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '18px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $h4_a = array(
        'font-color' => '#525252', 'font-family' => '', 'font-size' => '18px', 'font-style' => '',
        'font-variant' => '', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $h5 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $h5_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h6 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $h6_a = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );	 
	$header_menu_font = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '400', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $sidebar_title = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '18px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '300', 'letter-spacing' => '0.1em', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $sidebar_p = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $sidebar_link = array(
       'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $footer_title = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '18px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '300', 'letter-spacing' => '0.1em', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => 'uppercase', 
        );
    $footer_p = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $footer_link = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    $h6 = array(
        'font-color' => '', 'font-family' => '', 'font-size' => '14px', 'font-style' => '',
        'font-variant' => 'normal', 'font-weight' => '', 'letter-spacing' => '', 'line-height' => '46px',
        'text-decoration' => 'none', 'text-transform' => '', 
        );
    
    $options = array(  
        array( // Google Font API
            'id'          => 'google_fonts',
            'label'       => __('Google fonts.', THEMENAME),
            'desc'        => __('', THEMENAME),
            'std'         => array( 
			  array(
				'family'    => 'Lato',
				'variants'  => array( '300', '400italic', '700' ),
				'subsets'   => array( 'latin' )
			  )
			),
            'type'        => 'google-fonts',
            'section'     => 'fonts',
            'class'       => ''
        ),      
		array(
        'id'          => 'body',
        'label'       => __( 'Body &amp; Content p', THEMENAME ),
        'desc'        => __( 'It is a global Font setting for whole pages.', THEMENAME ),
        'std'         => $body,
        'selector'    => 'body, p', 
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => 'body',
                'property'   => ''
                ),
            ) 
         
      ),
      array(
        'id'          => 'heading_span',
        'label'       => __( 'Heading span', THEMENAME ),
        'desc'        => '',
        'std'         => $heading_span,
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h2 span, h3 span',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h1',
        'label'       => __( 'H1', THEMENAME ),
        'desc'        => '',
        'std'         => $h1,
        'selector'    => 'h1',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h1',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h1_a',
        'label'       => __( 'H1 a', THEMENAME ),
        'desc'        => '',
        'std'         => $h1_a,
        'selector'    => 'h1 a',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h1 a',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h2',
        'label'       => __( 'H2', THEMENAME ),
        'desc'        => '',
        'std'         => $h2,
        'selector'    => 'h2',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h2',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h2_a',
        'label'       => __( 'H2 a', THEMENAME ),
        'desc'        => '',
        'std'         => $h2_a,
        'selector'    => 'h2 a',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h2 a',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h3',
        'label'       => __( 'H3', THEMENAME ),
        'desc'        => '',
        'std'         => $h3,
        'selector'    => 'h3',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h3',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h3_a',
        'label'       => __( 'H3 a', THEMENAME ),
        'desc'        => '',
        'std'         => $h3_a,
        'selector'    => 'h3 a',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h3 a',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h4',
        'label'       => __( 'H4', THEMENAME ),
        'desc'        => '',
        'std'         => $h4,
        'selector'    => 'h4',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h4',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h4_a',
        'label'       => __( 'H4 a', THEMENAME ),
        'desc'        => '',
        'std'         => $h4_a,
        'selector'    => 'h4 a',
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h4 a, .postinfo h4 a',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'h5',
        'label'       => __( 'H5', THEMENAME ),
        'desc'        => '',
        'std'         => $h5,
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                    'selector'    => 'h5',
                    'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'h5_a',
        'label'       => __( 'H5 a', THEMENAME ),
        'desc'        => '',
        'std'         => $h5_a,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h5 a',
                'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'h6',
        'label'       => __( 'H6', THEMENAME ),
        'desc'        => '',
        'std'         => $h6,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h6',
                'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'h6_a',
        'label'       => __( 'H6 a', THEMENAME ),
        'desc'        => '',
        'std'         => $h6_a,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => 'h6 a',
                'property'   => ''
                ),
            ),
      ),
	  array(
        'id'          => 'header_menu_fonts',
        'label'       => __( 'Header Menu Font', THEMENAME ),
        'desc'        => __( 'Only Applied on header menu', THEMENAME ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => '.sidebar',
                'property'   => ''
                ),
            ),
      ),
	  array(
        'id'          => 'header_menu_fonts',
        'label'       => __( 'Header Menu Fonts', THEMENAME ),
        'desc'        => '',
        'std'         => $header_menu_font,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => '.primary-menu li a',
                'property'   => ''
                ),
            ),
      ),
	  array(
        'id'          => 'header_sub_menu_fonts',
        'label'       => __( 'Header Sub-menu Fonts', THEMENAME ),
        'desc'        => '',
        'std'         => $header_menu_font,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => '.primary-menu li ul a',
                'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'sidebar_fonts',
        'label'       => __( 'Sidebar typography options', THEMENAME ),
        'desc'        => __( 'Only Applied on sidebar widget area', THEMENAME ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => '.sidebar',
                'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'sidebar_title',
        'label'       => __( 'Sidebar Title', THEMENAME ),
        'desc'        => '',
        'std'         => $sidebar_title,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => '.sidebar .widget-title',
                'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'sidebar_p',
        'label'       => __( 'Sidebar p', THEMENAME ),
        'desc'        => '',
        'std'         => $sidebar_p,
        'action'      => array(
                array(
                'selector'    => '.sidebar .widget, .sidebar p',
                'property'   => ''
                ),
            ),        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_link',
        'label'       => __( 'Sidebar Link', THEMENAME ),
        'desc'        => '',
        'std'         => $sidebar_link,
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector'    => '.sidebar a',
                'property'   => ''
                ),
            ) 
      ),
      array(
        'id'          => 'footer_typography_option',
        'label'       => __( 'Footer Typography option', THEMENAME ),
        'desc'        => __( 'Only applied on footer.', THEMENAME ),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_title',
        'label'       => __( 'Footer Title', THEMENAME ),
        'desc'        => '',
        'std'         => $footer_title,        
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                    'selector'    => '.footer .widget-title',
                    'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'footer_p',
        'label'       => __( 'Footer p', THEMENAME ),
        'desc'        => '',
        'std'         => $footer_p,
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                    'selector'    => '.footer, .footer p',
                    'property'   => ''
                ),
            ),
      ),
      array(
        'id'          => 'footer_link',
        'label'       => __( 'Footer Link', THEMENAME ),
        'desc'        => '',
        'std'         => $footer_link,
        'type'        => 'typography',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                    'selector'    => '.footer a',
                    'property'   => ''
                ),
            ),
      ),
    );

	return apply_filters( 'eshopper_typography_options', $options );
}   
?>