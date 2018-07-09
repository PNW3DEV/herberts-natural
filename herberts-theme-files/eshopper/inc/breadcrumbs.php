<?php
function eshopper_breadcrumbs() {
  $show_breadcrumbs =  ot_get_option('show_breadcrumbs', 'on');
  if( $show_breadcrumbs == 'off' )
    return false;

  if( function_exists('is_woocommerce')){
    if ( is_woocommerce() ) return true;     
  }

  if( is_front_page() ) return false;
 
  
  $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&nbsp;&nbsp;&#47;'; // delimiter between crumbs
  $bredcrumb_menu_prefix = ot_get_option('bredcrumb_menu_prefix');
  if( $bredcrumb_menu_prefix != '' ){
    $home = $bredcrumb_menu_prefix;
  } else {
  $home = 'Home'; // text for the 'Home' link
  }
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
 
 
  global $post, $wp_query;
  $homeLink = home_url();
  
  if ( is_home() && ( 'page' == get_option('show_on_front')) ) {
  
    if ($showOnHome == 1) {
      echo '<div class="breadcrumb"><div class="container"><ul class="list-inline"><li><a href="' . $homeLink . '">' . $home . '</a></li>';
    
       echo '<li>&#47;&nbsp;&nbsp;'. get_the_title(get_option('page_for_posts')) . '</li>';
    
      echo '</ul></div></div>';
    }
  
  } else {
  
    echo '<div class="breadcrumb"><div class="container"><ul class="list-inline"><li><a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . '</li>';
  
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo '<li><span class="current">' . 'Archive by category "' . single_cat_title('', false) . '"' . '</span></li>';
  
    } elseif ( is_search() ) {
      echo '<li><span class="current">' . 'Search results for "' . get_search_query() . '"' . '</span></li>';
  
    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' </li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li> ';
      echo '<li><span class="current">' . get_the_time('d') . '</span></li>';
  
    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
      echo '<li><span class="current">' . get_the_time('F') . '</span></li>';
  
    } elseif ( is_year() ) {
      echo '<li><span class="current">' . get_the_time('Y') . '</span></li>';
  
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' .get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $delimiter . '</li>';
        if ($showCurrent == 1) echo '<li><span class="current">' . get_the_title() . '</span></li>';
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo '<li>' .$cats. '</li>';
        if ($showCurrent == 1) echo '<li><span class="current">' . get_the_title() . '</span></li>';
      }
  
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo '<li><span class="current">' . $post_type->labels->singular_name . '</span></li>';
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter . '</li>';
      if ($showCurrent == 1) echo ' ' . '<li><span class="current">' . get_the_title() . '</span></li>';
  
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo '<li><span class="current">' . get_the_title() . '</span></li>';
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> '.$delimiter.' </li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo force_balance_tags($breadcrumbs[$i]);
       // if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . '<li><span class="current">' . get_the_title() . '</span></li>';
  
    } elseif ( is_tag() ) {
      echo '<li><span class="current">' . 'Posts tagged "' . single_tag_title('', false) . '"' . '</span></li>';
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo '<li><span class="current">' . 'Articles posted by ' . $userdata->display_name . '</span></li>';
  
    } elseif ( is_404() ) {
      echo '<li><span class="current">' . 'Error 404' . '</span></li>';
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li>(';
      echo __('Page', THEMENAME) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</li>';
    }
    
    
  
    echo '</ul></div></div>';
  
  }
} // end eshopper_breadcrumbs()
?>