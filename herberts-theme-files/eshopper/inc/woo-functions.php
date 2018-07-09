<?php
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'eshopper_template_loop_product_link_open', 10 );
/**
 * Insert the opening anchor tag for products in the loop.
 */
function eshopper_template_loop_product_link_open() {
  echo '<a href="' . get_the_permalink() . '" class="product-title">';
}
/**
 * Sets a new image size for our single product images
 *
 */
function wptt_single_image_size( $size ){
 
    $size['width'] = ot_get_option('single_image_width', 600);
    $size['height'] = ot_get_option('single_image_height', 600);
 
    return $size;
 
} // wptt_single_image_size
add_filter( 'woocommerce_get_image_size_shop_single', 'wptt_single_image_size' );

/**
 * Sets a new image size for our single product images
 *
 */
function eshopper_shop_catalog( $size ){
 
    $size['width'] = ot_get_option('catalog_image_width', 400);
    $size['height'] = ot_get_option('catalog_image_height', 400);
 
    return $size;
 
} // wptt_single_image_size
add_filter( 'woocommerce_get_image_size_shop_catalog', 'eshopper_shop_catalog' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return ot_get_option( 'product_column', 4 ); // 3 products per row
	}
}

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
  return array(
    'delimiter' => '&nbsp;&nbsp;&#47;',
    'wrap_before' => '<div class="breadcrumb"><div class="container"><ul class="list-inline" itemprop="breadcrumb">',
    'wrap_after' => '</ul></div></div>',
    'before' => '<li>',
    'after' => '</li>',
    'home' => _x( 'Home', 'breadcrumb', 'woocommerce' ),
  );
}


function woocommerce_template_loop_product_thumbnail(){
  global $post, $wp_query, $woocommerce_loop;
  $imagearr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  $full_size_url = (!empty($imagearr))?$imagearr[0] : '';
  $column_offset = get_post_meta( $post->ID, 'column', true );
  $row_offset = get_post_meta( $post->ID, 'row', true );

  $column_offset = ( $column_offset == '' )? 1 : $column_offset;
  $row_offset = ( $row_offset == '' )? 1 : $row_offset;

  $spacing = ot_get_option( 'product_column_spacing', 15 );


  $columns = ( $woocommerce_loop['columns'] == '' )? 4 : $woocommerce_loop['columns'];

  $image_width = ot_get_option('catalog_image_width', 400);
  $image_height = ot_get_option('catalog_image_height', 400);


  if( !is_product() ):
    if( $column_offset > 1 ){
        $image_width = $image_width*$column_offset + ($column_offset)*$spacing;
    }

    if( $row_offset > 1 ){
        $image_height =  $image_height*$row_offset+ ($row_offset)*$spacing;
    }

  endif;

  if( (ot_get_option('product_image_offset') == 'off') && is_shop() ){
    $image_width = ot_get_option('catalog_image_width', 400);
    $image_height = ot_get_option('catalog_image_height', 400);
  }

  if(has_post_thumbnail() && ($full_size_url != '')){
    if( ($row_offset > 1) || ($column_offset > 1) ):
      $imageurl = eshopper_image_resize( $full_size_url, $image_width, $image_height, true, false, false );
      echo '<div class="ImageWrap" style="background-image: url('.$imageurl.')"><img src="'.$imageurl.'" alt="'.get_the_title().'"></div>';
    else:
      echo '<div class="ImageWrap">';
        the_post_thumbnail('shop_catalog');
        echo '</div>';
    endif;
  }else{
    $imageurl = "//placehold.it/{$image_width}x{$image_height}/000000/f9f9f9&text=Product+image";
    echo '<img src="'.$imageurl.'" alt="'.get_the_title().'">';
  }



}
//category image
function woocommerce_subcategory_thumbnail( $category ) {
    global $woocommerce_loop;

    $small_thumbnail_size   = apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' );
    $dimensions         = wc_get_image_size( $small_thumbnail_size );
    $thumbnail_id       = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

    $spacing = ot_get_option( 'product_column_spacing', 15 );


    $columns = ( $woocommerce_loop['columns'] == '' )? 4 : $woocommerce_loop['columns'];

    $image_width = ot_get_option('catalog_image_width', 400);
    $image_height = ot_get_option('catalog_image_height', 400);

    $cat_image_size = eshopper_product_cat_image_size();

    $column_offset = $row_offset = 1;
    if (array_key_exists($category->term_id,$cat_image_size)){
        $column_offset = $cat_image_size[$category->term_id][0];
        $row_offset = $cat_image_size[$category->term_id][1];        

        $image_width = $image_width*$column_offset + ($column_offset-1)*$spacing;
        $image_height = $image_height*$row_offset + ($row_offset-1)*$spacing;
    }
   

    if ( $thumbnail_id ) {      
        $imagearr = wp_get_attachment_image_src( $thumbnail_id, 'full' );
        if( ($column_offset > 1) || ($row_offset > 1) ){
          $image = eshopper_image_resize( $imagearr[0], $image_width, $image_height, true, false, false );
        }else{
          $imagearr = wp_get_attachment_image_src( $thumbnail_id, 'shop_catalog' );
          $image = $imagearr[0];
        }        
    } else {
      $image = "//placehold.it/{$image_width}x{$image_height}/000000/f9f9f9&text=Category+image";
    }

    if ( $image ) {
      // Prevent esc_url from breaking spaces in urls for image embeds
      // Ref: http://core.trac.wordpress.org/ticket/23605
      $image = str_replace( ' ', '%20', $image );

      echo '<div class="ImageWrap" style="background-image: url('.$image.')"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . $image_width . '" height="' . $image_height . '" /></div>';
    }
}


/**
* Place a cart icon with number of items and total cost in the menu bar.
*
* Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
*/
add_filter('eshopper_extra_menu_options', 'eshopper_extra_menu_options_callback');
function eshopper_extra_menu_options_callback($output){
  $header_canvas_sidebar = ot_get_option('header_canvas_sidebar');
      $extmenu = '';
      $extmenu .= eshopper_wcmenucart();
      $extmenu .= ($header_canvas_sidebar == 'on') ? '<li id="st-trigger-effects" class="column">
          <span data-effect="st-effect-2"><span class="genericon genericon-draggable"></span></span>
          </li>' : '';
      $extmenu = ( $extmenu != '' )? '<ul class="ext-menu">'.$extmenu.'</ul>' : '';
  return $extmenu.$output;
}


//eshopper walker
class eShopper_Menu_Walker extends Walker_Nav_Menu {
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= eshopper_wcmenucart()."$indent</ul>\n";
  }

}
add_filter('megamenu_nav_menu_args', 'eshopper_megamenu_nav_menu_args', 10, 3);
function eshopper_megamenu_nav_menu_args($args, $menu_id, $current_theme_location){
  $settings = get_option( 'megamenu_settings' );
  $style_manager = new Mega_Menu_Style_Manager();
      $themes = $style_manager->get_themes();

      $menu_theme = isset( $themes[ $settings[ $current_theme_location ]['theme'] ] ) ? $themes[ $settings[ $current_theme_location ]['theme'] ] : $themes['default'];
  $menu_settings = $settings[ $current_theme_location ];
    $wrap_attributes = apply_filters("megamenu_wrap_attributes", array(
        "id" => '%1$s',
        "class" => '%2$s mega-no-js',
        "data-event" => isset( $menu_settings['event'] ) ? $menu_settings['event'] : 'hover',
        "data-effect" => isset( $menu_settings['effect'] ) ? $menu_settings['effect'] : 'disabled',
        "data-panel-width" => preg_match('/^\d/', $menu_theme['panel_width']) !== 1 ? $menu_theme['panel_width'] : '',
        "data-second-click" => isset( $settings['second_click'] ) ? $settings['second_click'] : 'close',
        "data-mobile-behaviour" => isset( $settings['mobile_behaviour'] ) ? $settings['mobile_behaviour'] : 'standard',
        "data-breakpoint" => absint( $menu_theme['responsive_breakpoint'] )
      ), $menu_id, $menu_settings, $settings, $current_theme_location );

      $attributes = "";

      foreach( $wrap_attributes as $attribute => $value ) {
        if ( strlen( $value ) ) {
          $attributes .= " " . $attribute . '="' . $value . '"';
        }
      }

    $header_canvas_sidebar = ot_get_option('header_canvas_sidebar', 'on');
    $extmenu = '';
    if ( class_exists( 'WooCommerce' ) ) :
      $extmenu .= eshopper_wcmenucart();
    endif;
    $extmenu .= ($header_canvas_sidebar == 'on') ? '<li class="st-trigger-effects column">
        <span data-effect="st-effect-2"><span class="genericon genericon-draggable"></span></span>
        </li>' : '';  

    $args['items_wrap'] = '<ul' . $attributes . '>%3$s'.$extmenu.'</ul>';

    return $args;
}

function eshopper_wcmenucart($menu='', $args=array()) {
  // Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
  if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  )
  return $menu;

  ob_start();
  global $woocommerce;

  $viewing_cart = __('View your shopping cart', THEMENAME);
  $start_shopping = __('Start shopping', THEMENAME);
  $cart_url = $woocommerce->cart->get_cart_url();
  $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
  $cart_contents_count = $woocommerce->cart->cart_contents_count;
  $cart_contents = sprintf(_n('%d', '%d', $cart_contents_count, THEMENAME), $cart_contents_count);
  $cart_total = $woocommerce->cart->get_cart_total();


    $menu_item = '';
	$header_shopping_cart = ot_get_option('header_shopping_cart');
	if($header_shopping_cart == 'on'){
    $header_cart_icon = ot_get_option('header_cart_icon', 'fa fa-shopping-cart');
		$menu_item = '<li class="right menucart-container"><i class="'.$header_cart_icon.'"></i>';	
		$menu_item .= '<a class="cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="'.__('View your shopping cart', THEMENAME).'">';
		$menu_item .= '<span class="item-'.$woocommerce->cart->cart_contents_count.'">';
		$menu_item .= $woocommerce->cart->cart_contents_count;
		$menu_item .= '</span></a></li>';
	}

  // Uncomment the line below to hide nav menu cart item when there are no items in the cart
  // }
  $social = ob_get_clean();

  return $menu . $menu_item;
} 

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', THEMENAME); ?>">
    <?php echo '<span class="item-'.$woocommerce->cart->cart_contents_count.'">'.sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, THEMENAME), $woocommerce->cart->cart_contents_count).'</span>';?>
  </a>
  <?php
  $fragments['a.cart-contents'] = ob_get_clean();
  return $fragments;
} 


add_filter( 'woocommerce_output_related_products_args', 'eshopper_related_products_args' );
function eshopper_related_products_args( $args ) {
  $args['posts_per_page'] = ot_get_option( 'related_product', 4 ); // 4 related products
  $args['columns'] = ot_get_option( 'related_product_column', 4 ); // arranged in 2 columns
  return $args;
} 

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

function custom_meta_boxes() {

  $my_meta_box = array(
    'id'        => 'product_layout_meta_box',
    'title'     => 'Product image grid settings',
    'desc'      => '',
    'pages'     => array( 'product' ),
    'context'   => 'side',
    'priority'  => 'low',
    'fields'    => array(
      array(
        'id'          => 'column',
        'label'       => __('Horizontal offset', THEMENAME ),
        'desc'        => __('each offset contain a column', THEMENAME ),
        'std'         => '1',
        'min_max_step' => '1,4,1',
        'type'        => 'numeric-slider',
        'class'       => '',
        'choices'     => array()
      ),
      array(
        'id'          => 'row',
        'label'       => __('vertical offset', THEMENAME ),
        'desc'        => '',
        'std'         => '1',
        'min_max_step' => '1,5,1',
        'type'        => 'numeric-slider',
        'class'       => '',
        'choices'     => array()
      )
    )
  );
  
  ot_register_meta_box( $my_meta_box );

}



function eshopper_product_cat_image_size(){
  global $wpdb;

  $output = array();
  $category_size = ot_get_option('product_cat_image', array());
  if( !empty($category_size) ){
    foreach ($category_size as $key => $value) {      
      $column = $value['column_offset'];
      $row = $value['row_offset'];
      $output[$value['product_cat']] = array($column, $row);
    }
  }

  return $output;
}




/**
* Change the add to cart text on single product pages
*/
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
 
function woo_custom_cart_button_text() {
 
  global $woocommerce;
  foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
    $_product = $values['data'];
    if( get_the_ID() == $_product->id ) {
      return __(ot_get_option('added_to_cart_text', 'Already in cart'), 'woocommerce');
    }
  }
  return __(ot_get_option('add_to_cart_text', 'Add to cart'), 'woocommerce');
}
 
/**
* Change the add to cart text on product archives
*/
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );
 
function woo_archive_custom_cart_button_text() {
 
  global $woocommerce;
  foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
    $_product = $values['data'];
    if( get_the_ID() == $_product->id ) {
      return __(ot_get_option('added_to_cart_text', 'Already in cart'), 'woocommerce');
    }
  }
  return __(ot_get_option('add_to_cart_text', 'Add to cart'), 'woocommerce');
} 

function eshopper_cart_icon(){
    global $woocommerce;
    foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];
        if( get_the_ID() == $_product->id ) {
          return '<i class="genericon genericon-checkmark"></i>';
        }
    }
    return '<i class="genericon genericon-cart"></i>';
}

function eshopper_product_in_cart(){
  global $woocommerce;
    foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];
        if( get_the_ID() == $_product->id ) {
          return true;
        }
    }
    return false;
}



function workaroundpaginationampersand_bug($link) {
  return str_replace('#038;', '&', $link);
}
//add_filter('paginate_links', 'workaroundpaginationampersand_bug');

add_filter('woocommerce_show_page_title', 'eshopper_woocommerce_show_page_title');
function eshopper_woocommerce_show_page_title(){
  $shop_page_id = wc_get_page_id( 'shop' );
  $title_display = get_post_meta( $shop_page_id, 'title_display', true );
  if( is_shop() ){
      if($title_display != 'off')
      return true;
     else
      return false;
  }

   return true;
    
}


function woocommerce_page_title( $echo = true ) {
    $subtitle = '';
    if ( is_search() ) {
      $page_title = sprintf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );

      if ( get_query_var( 'paged' ) )
        $page_title .= sprintf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );

    } elseif ( is_tax() ) {

      $page_title = single_term_title( "", false );

    } else {

      $shop_page_id = wc_get_page_id( 'shop' );
      $page_title   = get_the_title( $shop_page_id );

      $title_display = get_post_meta( $shop_page_id, 'title_display', true );
      $title_display = ($title_display == '')? 'on' : $title_display;
      if( $title_display == 'on' ){
        $title = get_post_meta( $shop_page_id, 'title', true );
        $page_title = ( $title != '' )? esc_attr($title) : $page_title;  
        $subtitle = esc_attr( get_post_meta( $shop_page_id, 'subtitle', true ) );
        $subtitle = ($subtitle != '' )? '<p class="sub-title">'.balanceTags($subtitle).'</p>': '';
        
      }

    }

    $page_title = apply_filters( 'woocommerce_page_title', '<h1 class="entry-title">'.$page_title.'</h1>'.$subtitle );

    if ( $echo )
        echo $page_title;
      else
        return esc_attr($page_title);
  }

/**
 * Output WooCommerce content.
 *
 * This function is only used in the optional 'woocommerce.php' template
 * which people can add to their themes to add basic woocommerce support
 * without hooks or modifying core templates.
 *
 */
function woocommerce_content() {

  if ( is_singular( 'product' ) ) {

    while ( have_posts() ) : the_post();

      wc_get_template_part( 'content', 'single-product' );

    endwhile;

  } else { ?>
    
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
      <header class="entry-header">
        <?php woocommerce_page_title(); ?>
        <?php do_action( 'woocommerce_archive_description' ); ?>
      </header>
      
    <?php endif; ?>



    <?php if ( have_posts() ) : ?>

      <?php do_action('woocommerce_before_shop_loop'); ?>

      <?php woocommerce_product_loop_start(); ?>

        <?php woocommerce_product_subcategories(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php wc_get_template_part( 'content', 'product' ); ?>

        <?php endwhile; // end of the loop. ?>

      <?php woocommerce_product_loop_end(); ?>

      <?php do_action('woocommerce_after_shop_loop'); ?>

    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

      <?php wc_get_template( 'loop/no-products-found.php' ); ?>

    <?php endif;

  }
}
/**
 * Output the add to cart button for variations.
 */
function woocommerce_single_variation_add_to_cart_button() {
  global $product;
  ?>
  <div class="variations_button">
        <?php woocommerce_quantity_input(); ?>
        <button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
      </div>

      <input type="hidden" name="add-to-cart" value="<?php echo absint($product->id); ?>" />
      <input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
      <input type="hidden" name="variation_id" value="" />

  <?php
}
//add_action('woocommerce_after_single_variation', 'eshopper_after_add_to_cart_button');
add_action('woocommerce_after_add_to_cart_button', 'eshopper_after_add_to_cart_button');

function eshopper_after_add_to_cart_button(){
  $position = get_option('yith_wcwl_button_position');
  if( function_exists( 'YITH_WCWL' ) && ($position == 'shortcode')){
    echo do_shortcode('[yith_wcwl_add_to_wishlist icon="fa fa-heart" link_classes="button"]');
  }
}

add_action( 'wp_ajax_add_to_wishlist_prooduct_after', 'eshopper_add_to_wishlist_prooduct_after_callback' );
add_action( 'wp_ajax_nopriv_add_to_wishlist_prooduct_after', 'eshopper_add_to_wishlist_prooduct_after_callback' );
function eshopper_add_to_wishlist_prooduct_after_callback(){

  $product_id = $_POST['product_id'];

  $default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;

  if( ! empty( $default_wishlists ) ){
      $default_wishlist = $default_wishlists[0]['ID'];
  }
  else{
      $default_wishlist = false;
  }

  if(YITH_WCWL()->is_product_in_wishlist( $product_id, $default_wishlist )) {
    $wishlist_url = esc_url( add_query_arg( 'add_to_wishlist', $product_id ) );
    $success = 0;
  }else{
    $wishlist_url = YITH_WCWL()->get_wishlist_url();
    $success = 1;
  }
  $response = array(
      'product_id' => $product_id,
      'success' => $success,
      'wishlist_url' => $wishlist_url
    );
  wp_send_json( $response );
  die;
}