<?php
function eshopper_styling_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'preset_color',
        'label'       => __( 'Preset color', THEMENAME ),
        'desc'        => '',
        'std'         => '#dd9933',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.myaccount_user a, .order-info mark, a:hover, .widget span, a, .related-posts a:hover,.cart_item .product-name a,
                .woocommerce .item .star-rating span,.woocommerce-page .item .star-rating span,
                a.comment-reply-link:hover, ul.social-share li a:hover,
                .entry-meta a:hover, a:hover, a:hover span, .entry-title a:hover, .sidebar a:hover,
                a.comment-edit-link:hover, .su-post-comments-link:hover, .breadcrumb a:hover',
                'property'   => 'color'
                ),
				array(
                'selector' => '.featured-post span',
                'property'   => 'background-color'
                )
            )        

      ), 
		array(
        'id'          => 'content_button_background',
        'label'       => __( 'Global dark color', THEMENAME ),
        'desc'        => __('Use this for menu, button background color & button border color.', THEMENAME ),
        'std'         => '#000000',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => 'input[type="submit"],.btn-fill,.btn:hover, .item figure,
                .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
                .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
                .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
                .woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content,
                .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
                .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, 
                .woocommerce .woocommerce-message:before, 
                .woocommerce-page .woocommerce-message:before, .woocommerce .woocommerce-info:before, 
                .woocommerce-page .woocommerce-info:before, .woocommerce span.onsale,                
                .woocommerce #content input.button, .woocommerce #respond input#submit, 
                .woocommerce a.button, .woocommerce button.button, 
                .woocommerce input.button, .woocommerce-page #content input.button, 
                .woocommerce-page #respond input#submit, 
                .woocommerce-page a.button, .woocommerce-page button.button, 
                .woocommerce-page input.button
                ',
                'property'   => 'background-color'
                ),
                array(
                'selector' => 'a,input[type="submit"]:hover,
                input[type="password"],input[type="email"],input[type="text"],code,
                .woocommerce-page .page-title,.woocommerce .page-title,                
                .entry-meta span,.related-posts h3,.nav-single h3, 
                .cart_item .product-name a:hover, .entry-content table, 
                .comment-content table,.woocommerce .coupon .button, .woocommerce-page .coupon .button,
                a.comment-reply-link,.comments-area article header time,
                ul.social-share li a, .entry-meta a,.pagination li a,.pagination li.active a,.pagination li:hover a,
				.woocommerce-pagination .page-numbers li a,a.comment-edit-link,
                .nav-roundslide h3, .breadcrumb, .breadcrumb a,
                .woocommerce .product-hover-light figure:hover .price .amount,
                .woocommerce .product-hover-light figure:hover .product-title,
                .woocommerce .product-hover-light .item figure:hover a i,
                .product-hover-light .item figure.effect-duke:hover figcaption .wishlist-btn i',
                'property'   => 'color'
                ),
                array(
                    'selector' => 'input[type="submit"],textarea:focus,input[type="password"]:focus,
                    input[type="email"]:focus,input[type="text"]:focus,.btn-fill, 
                    .woocommerce .woocommerce-message, .woocommerce-page .woocommerce-message, 
                    .woocommerce .woocommerce-info, .woocommerce-page .woocommerce-info,
                    .woocommerce .coupon .button:hover, .woocommerce-page .coupon .button:hover,
					.widget_product_search .search-field:active,.widget_product_search .search-field:focus,
                    .read-more',
                    'property'   => 'border-color'
                ),
            )        

      ),
      array(
        'id'          => 'font_color',
        'label'       => __( 'Global light color', THEMENAME ),
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => 'input[type="submit"],.btn-fill,.btn-alt,.btn:hover,
                .woocommerce span.onsale,.woocommerce-page span.onsale,.hover-area,
                .woocommerce .item figure .add_to_cart_button:hover,
                .woocommerce .item figure .add_to_cart_button:focus,
                .woocommerce .item figure .add_to_cart_button:active, 
                .woocommerce .item figure .add_to_cart_button,.hover-area a,
                .woocommerce .item figure > .price .amount,.woocommerce .item figure > .price ins,
                figure:hover .product-title,.woocommerce #content div.product p.price, 
                .woocommerce #content div.product figure span.price, 
                .woocommerce div.product figure p.price, .woocommerce div.product figure span.price, 
                .woocommerce-page #content div.product figure p.price, 
                .woocommerce-page #content div.product figure span.price, 
                .woocommerce-page div.product figure p.price, 
                .woocommerce-page div.product figure span.price,
                .woocommerce .price span,
                .woocommerce-page .price span,
                .woocommerce #content input.button, .woocommerce #respond input#submit, 
                .woocommerce a.button, .woocommerce button.button, 
                .woocommerce input.button, .woocommerce-page #content input.button, 
                .woocommerce-page #respond input#submit, 
                .woocommerce-page a.button, 
                .woocommerce-page button.button, 
                .woocommerce-page input.button, .featured-post span,
                .product-hover-dark .item figure.effect-duke:hover figcaption .wishlist-btn i,
                .woocommerce .product-hover-color .star-rating span::before,
                .product-hover-color .item figure.effect-duke:hover figcaption .wishlist-btn i',
                'property'   => 'color'
                ),
				array(
                'selector' => '.btn-fill:hover,.btn-alt:hover,input[type="submit"]:hover,
                input[type="submit"]:hover,.woocommerce #content input.button.alt:hover,
                .woocommerce #respond input#submit.alt:hover,
                .woocommerce a.button.alt:hover,
                .woocommerce button.button.alt:hover,
                .woocommerce input.button.alt:hover,
                .woocommerce-page #content input.button.alt:hover,
                .woocommerce-page #respond input#submit.alt:hover,
                .woocommerce-page a.button.alt:hover,
                .woocommerce-page button.button.alt:hover,
                .woocommerce-page input.button.alt:hover',
                'property'   => 'background-color'
                ),
				 array(
                    'selector' => '.btn-alt, .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form, .navbar-inverse .navbar-toggle',
                    'property'   => 'border-color'
                ),
            )        

      ),
      array(
        'id'          => 'alt_background',
        'label'       => __( 'Alternative light color', THEMENAME ),
        'desc'        => __( 'Use this color as alt background, alt color, input border etc.', THEMENAME ),
        'std'         => '#f9f9f9',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.widget_newsletterwidget,.menucart-container span,.quote,.format-link .link,
                .entry-content .widget-title:before,.format-chat .entry-content p:nth-child(even),
                .quote a,.link a,.format-link .entry-content a,code, .st-sidebar,
                .woocommerce .widget-area .widget_price_filter .price_slider_wrapper .ui-widget-content, div.cs-select, .cs-select .cs-options,
                .woocommerce-page .widget-area .widget_price_filter .price_slider_wrapper .ui-widget-content,
                .woocommerce #content nav.woocommerce-pagination ul li a:focus, 
                .woocommerce #content nav.woocommerce-pagination ul li a:hover, 
                .woocommerce #content nav.woocommerce-pagination ul li span.current, 
                .woocommerce nav.woocommerce-pagination ul li a:focus, 
                .woocommerce nav.woocommerce-pagination ul li a:hover, 
                .woocommerce nav.woocommerce-pagination ul li span.current, 
                .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, 
                .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, 
                .woocommerce-page #content nav.woocommerce-pagination ul li span.current, 
                .woocommerce-page nav.woocommerce-pagination ul li a:focus, 
                .woocommerce-page nav.woocommerce-pagination ul li a:hover, 
                .woocommerce-page nav.woocommerce-pagination ul li span.current,
                .alt.panel-row-style,.woocommerce .coupon .button, .woocommerce-page .coupon .button,
                .comments-area .bypostauthor cite span,.pagination li:hover,.pagination li.active,
                .commentlist .reply, .topbar',
                'property'   => 'background-color'
                ),
				array(
                    'selector' => 'input[type="password"],input[type="email"],input[type="text"],
                    .summary .price, .header, .breadcrumb, .widget-title,
                    .woocommerce table.shop_table, .woocommerce-page table.shop_table,
                    .woocommerce table.shop_table td, .woocommerce table.shop_table tbody th, 
                    .woocommerce table.shop_table tfoot td, .woocommerce table.shop_table tfoot th,
                    .woocommerce #content nav.woocommerce-pagination ul, .woocommerce nav.woocommerce-pagination ul, 
                    .woocommerce-page #content nav.woocommerce-pagination ul, .woocommerce-page nav.woocommerce-pagination ul,
                    .woocommerce #content nav.woocommerce-pagination ul li, .woocommerce nav.woocommerce-pagination ul li,
					.woocommerce-page #content nav.woocommerce-pagination ul li, 
                    .woocommerce-page nav.woocommerce-pagination ul li, legend,.woocommerce .coupon .button, .woocommerce-page .coupon .button,
                    .pagination ul,.pagination li,.widget_product_search .search-field,
                    .commentlist .comment-wrap',
                    'property'   => 'border-color'
                ),
            )        
      ),
      array(
        'id'          => 'footer_link_hover',
        'label'       => __( 'Footer link hover', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.footer .footer-menu li a:hover',
                'property'   => 'color'
                ),
            ) 
      ),
    );

	return apply_filters( 'eshopper_styling_options', $options );
}  
?>