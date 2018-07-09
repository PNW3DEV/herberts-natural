<?php
function eshopper_header_options( $options = array() ){
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
        'id'          => 'header_style',
        'label'       => __( 'Header Style', THEMENAME ),
        'desc'        => __('', THEMENAME ),
        'std'         => 'style1',
        'type'        => 'radio-image',
        'section'     => 'header_options',
        'condition'   => '',
        'operator'    => 'and',
        'choices'      => array(
                array(
                    'label' => 'Style1',
                    'value' => 'style1',
                    'src' => THEMEURI.'/admin/assets/images/header-style1.png'
                ),
                array(
                    'label' => 'Style2',
                    'value' => 'style2',
                    'src' => THEMEURI.'/admin/assets/images/header-style2.png'
                ),
                
            )
      ),
      array(
        'id'          => 'logo_spacing',
        'label'       => __( 'Logo spacing', THEMENAME ),
        'desc'        => __('', THEMENAME ),
        'std'         => array(
                            'top'   =>  36,
                            'left'  =>  0,
                            'right' =>  0,
                            'bottom'=>  0,
                            'unit'  =>  'px'
                        ),
        'type'        => 'spacing',
        'section'     => 'header_options',
        'operator'    => 'and'
      ), 
        array(
        'id'          => 'topbar_display',
        'label'       => __( 'Topbar Display', THEMENAME ),
        'desc'        => __('', THEMENAME ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'header_style:not(style1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'topbar_left_text',
        'label'       => __( 'Topbar left text', THEMENAME ),
        'desc'        => __('Leave blank to avoid this field', THEMENAME ),
        'std'         => '+880123456, info@themeperch.net',
        'type'        => 'text',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'header_style:not(style1),topbar_display:is(on)',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'header_social_icons',
        'label'       => __( 'Topbar Social Icons', THEMENAME ),
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
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'header_style:not(style1),topbar_display:is(on)',
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
        'id'          => 'right_side_option',
        'label'       => __( 'Logo area right side option', THEMENAME ),
        'desc'        => __('', THEMENAME ),
        'std'         => 'search',
        'type'        => 'select',
        'section'     => 'header_options',
        'condition'   => 'header_style:is(style3)',
        'operator'    => 'and',
        'choices'      => array(
                array(
                    'label' => 'Serch bar',
                    'value' => 'search',
                ),
                array(
                    'label' => 'Banner',
                    'value' => 'banner',
                ),
            )
      ),
      array(
        'id'          => 'header_right_banner',
        'label'       => __( 'Banner Image', THEMENAME ),
        'desc'        => __('Leave blank to avoid Banner', THEMENAME ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_options',
        'condition'   => 'header_style:is(style3),right_side_option:is(banner)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_right_banner_link',
        'label'       => __( 'Banner link', THEMENAME ),
        'desc'        => __('', THEMENAME ),
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'header_options',
        'condition'   => 'header_style:is(style3),right_side_option:is(banner)',
        'operator'    => 'and'
      ),	   
	  array(
        'id'          => 'header_shopping_cart',
        'label'       => __( 'Header Shopping Cart', THEMENAME ),
        'desc'        => __('hide or show shopping cart', THEMENAME ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_cart_icon',
        'label'       => __( 'Header Cart icon', THEMENAME ),
        'desc'        => __('', THEMENAME ),
        'std'         => 'fa fa-shopping-cart',
        'type'        => 'radio-image',
        'section'     => 'header_options',
        'condition'   => 'header_shopping_cart:is(on)',
        'operator'    => 'and',
        'choices'      => array(
                array(
                    'label' => 'Style1',
                    'value' => 'fa fa-shopping-cart',
                    'src' => THEMEURI.'/admin/assets/images/fcart.jpg'
                ),
                 array(
                    'label' => 'ion-ios-cart',
                    'value' => 'ion-ios-cart',
                    'src' => THEMEURI.'/admin/assets/images/icart1.jpg'
                ),
                  array(
                    'label' => 'ion-ios-cart-outline',
                    'value' => 'ion-ios-cart-outline',
                    'src' => THEMEURI.'/admin/assets/images/icart2.jpg'
                ),
                   array(
                    'label' => 'ion-android-cart',
                    'value' => 'ion-android-cart',
                    'src' => THEMEURI.'/admin/assets/images/icart3.jpg'
                ),
                array(
                    'label' => 'ion-bag',
                    'value' => 'ion-bag',
                    'src' => THEMEURI.'/admin/assets/images/icart4.jpg'
                ),
                
            )
      ),
	  array(
        'id'          => 'header_canvas_sidebar',
        'label'       => __( 'Header Canvas Sidebar', THEMENAME ),
        'desc'        => __('hide or show canvas sidebar', THEMENAME ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'slider_in_mobile',
        'label'       => __( 'Slider in Mobile', THEMENAME ),
        'desc'        => __('hide or show slider in mobile view', THEMENAME ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'show_mobile_menu_max_width',
        'label'       => __( 'Screen Max Width for Responsive Menu', THEMENAME ),
        'desc'        => __( 'in pixel', THEMENAME ),
        'std'         => '768',
        'type'        => 'numeric-slider',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '320,991,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_background',
        'label'       => __( 'Header background', THEMENAME ),
        'desc'        => '',
        'std'         => array(
            'background-image' => '',
            'background-color' => '#fff'
            ),
        'type'        => 'background',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.header',
                    'property'   => 'background'
                    )
            )
      ),
      array(
        'id'          => 'header_menu_background',
        'label'       => __( 'Header Menu background', THEMENAME ),
        'desc'        => '',
        'std'         => array(
            'background-image' => '',
            'background-color' => '#000'
            ),
        'type'        => 'background',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.header-menu,.header-menu ul,.navbar-inverse',
                    'property'   => 'background'
                    )
            )
      ),
      array(
        'id'          => 'header_submenu_background',
        'label'       => __( 'Header Sub Menu background', THEMENAME ),
        'desc'        => '',
        'std'         => array(
            'background-image' => '',
            'background-color' => '#000'
            ),
        'type'        => 'background',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.primary-menu li ul',
                    'property'   => 'background'
                    )
            )
      ),
      array(
        'id'          => 'header_color',
        'label'       => __( 'Header color', THEMENAME ),
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.primary-menu li a',
                'property'   => 'color'
                ),
            )
      ),
    );

	return apply_filters( 'eshopper_header_options', $options );
} 
?>