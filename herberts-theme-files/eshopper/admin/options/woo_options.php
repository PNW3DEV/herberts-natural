<?php
function eshopper_woo_options( $options = array() ){
	$options = array(
        array(
            'id'          => 'product_column',
            'label'       => __( 'Product column', THEMENAME ),
            'desc'        => __( '', THEMENAME ),
            'std'         => '3',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,4,1',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'product_column_spacing',
            'label'       => __( 'Product column spacing', THEMENAME ),
            'desc'        => __( 'in pixel', THEMENAME ),
            'std'         => '15',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '0,90,5',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
        'id'          => 'social_share_in_product',
        'label'       => __( 'Social sharing in Single product.', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'woo_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
            'id'          => 'related_product',
            'label'       => __( 'Related product show in single product', THEMENAME ),
            'desc'        => __( '', THEMENAME ),
            'std'         => '4',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,10,1',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'related_product_column',
            'label'       => __( 'Related Product column', THEMENAME ),
            'desc'        => __( '', THEMENAME ),
            'std'         => '4',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,4,1',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'catalog_image_width',
            'label'       => __( 'Catalog Images Width', THEMENAME ),
            'desc'        => __( 'The size used in product listing.', THEMENAME ),
            'std'         => '400',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '150,1200,10',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'catalog_image_height',
            'label'       => __( 'Catalog Images height', THEMENAME ),
            'desc'        => __( 'The size used in product listing.', THEMENAME ),
            'std'         => '400',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '150,1000,10',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'product_image_offset',
            'label'       => __( 'Horizontal/vertical image display shop page.', THEMENAME ),
            'desc'        => __( 'Off to apply only catalog image size', THEMENAME ),
            'std'         => 'on',
            'type'        => 'on-off',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '0,90,5',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'single_image_width',
            'label'       => __( 'Single Product Image Width', THEMENAME ),
            'desc'        => __( 'This size used in single product page.', THEMENAME ),
            'std'         => '600',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '150,1200,10',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
        array(
            'id'          => 'single_image_height',
            'label'       => __( 'Single Product Image height', THEMENAME ),
            'desc'        => __( 'This size used in single product page.', THEMENAME ),
            'std'         => '600',
            'type'        => 'numeric-slider',
            'section'     => 'woo_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '150,1000,10',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
		array(
        'id'          => 'product_cat_image',
        'label'       => __( 'Product category image display options', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'woo_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array(),
            'settings'    => array(   
               array(
                'id'          => 'product_cat',
                'label'       => __( 'Select product category', THEMENAME ),
                'desc'        => __( '', THEMENAME ),
                'std'         => '1',
                'type'        => 'taxonomy-select',
                'rows'        => '',
                'post_type'   => 'product',
                'taxonomy'    => 'product_cat',
                'min_max_step'=> '1,4,1',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
              ),         
              array(
                'id'          => 'column_offset',
                'label'       => __( 'Column offset', THEMENAME ),
                'desc'        => __( '', THEMENAME ),
                'std'         => '1',
                'type'        => 'numeric-slider',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '1,4,1',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
              ),
              array(
                'id'          => 'row_offset',
                'label'       => __( 'Row offset', THEMENAME ),
                'desc'        => __( '', THEMENAME ),
                'std'         => '1',
                'type'        => 'numeric-slider',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '1,4,1',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
              )
            )
      ),
        array(
            'id'          => 'product_text_color',
            'label'       => __( 'Product text color', THEMENAME ),
            'desc'        => '',
            'std'         => '#fff',
            'type'        => 'colorpicker',
            'section'     => 'woo_options',
            'condition'   => '',
            'operator'    => 'and',
            'action'      => array(
                    array(
                    'selector' => '.woocommerce .products .item figure > .price .amount, .wishlist-btn i',
                    'property'   => 'color'
                    ),
                    array(
                    'selector' => '',
                    'property'   => 'background-color'
                    )
                )        

          ),
        array(
        'id'          => 'product_hover_color_options',
        'label'       => __( 'Product Hover Color Options', THEMENAME ),
        'desc'        => '',
        'std'         => 'dark',
        'type'        => 'select',
        'section'     => 'woo_options',
        'rows'        => '',
        'choices'     => array(
                array(
                    'value'       => 'dark',
                    'label'       => __( 'Dark', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'light',
                    'label'       => __( 'Light', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'color',
                    'label'       => __( 'Color', THEMENAME ),
                    'src'         => ''
                  ),
            ),
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
            'id'          => 'product_hover_light',
            'label'       => __( 'Product Hover color', THEMENAME ),
            'desc'        => '',
            'std'         => 'rgba(255, 255, 255, 0.9)',
            'type'        => 'colorpicker-opacity',
            'section'     => 'woo_options',
            'condition'   => 'product_hover_color_options:is(light)',
            'operator'    => 'and',
            'action'      => array(
                    array(
                    'selector' => '',
                    'property'   => 'color'
                    ),
                    array(
                    'selector' => '',
                    'property'   => 'background-color'
                    )
                )        

          ), 
        array(
            'id'          => 'product_hover_dark',
            'label'       => __( 'Product Hover color', THEMENAME ),
            'desc'        => '',
            'std'         => 'rgba(0, 0, 0, 0.9)',
            'type'        => 'colorpicker-opacity',
            'section'     => 'woo_options',
            'condition'   => 'product_hover_color_options:is(dark)',
            'operator'    => 'and',
            'action'      => array(
                    array(
                    'selector' => '',
                    'property'   => 'color'
                    ),
                    array(
                    'selector' => '',
                    'property'   => 'background-color'
                    )
                )        

          ),
          array(
            'id'          => 'product_hover_color',
            'label'       => __( 'Product Hover color', THEMENAME ),
            'desc'        => '',
            'std'         => '#dd9933',
            'type'        => 'colorpicker-opacity',
            'section'     => 'woo_options',
            'condition'   => 'product_hover_color_options:is(color)',
            'operator'    => 'and',
            'action'      => array(
                    array(
                    'selector' => '',
                    'property'   => 'color'
                    ),
                    array(
                    'selector' => '',
                    'property'   => 'background-color'
                    )
                )        

          ), 
	  array(
        'id'          => 'shop_layout',
        'label'       => __( 'Shop layout', THEMENAME ),
        'desc'        => '',
        'std'         => 'ls',
        'type'        => 'radio-image',
        'section'     => 'woo_options',
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
          )
        )
      ),
    array(
        'id'          => 'shop_layout_sidebar',
        'label'       => __( 'Select shop Sidebar', THEMENAME ),
        'desc'        => '',
        'std'         => 'sidebar-3',
        'type'        => 'sidebar-select',
        'section'     => 'woo_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'shop_layout:not(full)',
        'operator'    => 'and'
      ),
    array(
        'id'          => 'product_layout',
        'label'       => __( 'Product layout', THEMENAME ),
        'desc'        => '',
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'woo_options',
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
          )
        )
      ),
    array(
        'id'          => 'product_layout_sidebar',
        'label'       => __( 'Product Sidebar', THEMENAME ),
        'desc'        => '',
        'std'         => 'sidebar-3',
        'type'        => 'sidebar-select',
        'section'     => 'woo_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'product_layout:not(full)',
        'operator'    => 'and'
      ),
    array(
        'id'          => 'add_to_cart_text',
        'label'       => __( 'Add to cart text', THEMENAME ),
        'desc'        => '',
        'std'         => 'Add to cart',
        'type'        => 'text',
        'section'     => 'woo_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    array(
        'id'          => 'added_to_cart_text',
        'label'       => __( 'Already in cart text', THEMENAME ),
        'desc'        => '',
        'std'         => 'Already in cart',
        'type'        => 'text',
        'section'     => 'woo_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      
      
    );

	return apply_filters( 'eshopper_woo_options', $options );
}  
?>