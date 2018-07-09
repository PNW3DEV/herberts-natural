<?php
//require THEMEDIR. '/inc/eshopper-shortcodes.php';
require THEMEDIR. '/inc/scripts.php';
require THEMEDIR. '/inc/comment-form.php';
require THEMEDIR. '/inc/breadcrumbs.php';
require THEMEDIR. '/inc/numeric-nav.php';
require THEMEDIR. '/inc/woo-functions.php';
require THEMEDIR. '/inc/widgets.php';
/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since eshopper 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function eshopper_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', THEMENAME ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'eshopper_wp_title', 10, 2 );

function eshopper_default_main_menu(){
	echo '<ul class="inner"><li><a class="active" href="'.admin_url('nav-menus.php').'"  target="_blank"> '.__( 'Menu settings', THEMENAME).'</a></li></ul>';
}

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since eshopper 1.0
 */
function eshopper_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'eshopper_page_menu_args' );


if ( ! function_exists( 'eshopper_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since eshopper 1.0
 */
function eshopper_content_nav( $html_id ) {
	global $wp_query;


	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', THEMENAME ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', THEMENAME ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', THEMENAME ) ); ?></div>
		</nav><!-- #<?php echo esc_attr( $html_id ); ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'eshopper_numeric_posts_nav' ) ) :
function eshopper_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation pagination"><ul class="list-inline">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

	echo '</ul></div>' . "\n";

}
endif;

if ( ! function_exists( 'eshopper_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own eshopper_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since eshopper 1.0
 */
function eshopper_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', THEMENAME ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', THEMENAME ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrap">
			<div class="author-img">
				<?php echo get_avatar( $comment, 100 ); ?>
			</div>
			<div class="commment-body">
			<div class="comment-meta comment-author vcard">
				<?php
					
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite> &vert; ',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', THEMENAME ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', THEMENAME ), get_comment_date(), get_comment_time() )
					);
				?>
				<div class="reply">
					
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', THEMENAME ), 'before' => ' ', 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', THEMENAME ); ?></p>
			<?php endif; ?>

			<div class="comment-content">
				<?php comment_text(); ?>				
			</div>
			</div><!-- .comment-content -->
			<?php edit_comment_link( __( 'Edit', THEMENAME ), '', '' ); ?>
		</div><!-- #comment-## -->		
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


/**
 * Extend the default WordPress body classes.
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function eshopper_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'eshopper-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';


	global $wp_query;

	$wp_query->eshopper = eshopper_theme_option_velues();

	return $classes;
}
add_filter( 'body_class', 'eshopper_body_class' );


function eshopper_theme_option_velues( $options = array() ){
	global $wp_query;
	
	if( is_page() ):		
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );

		$sidebar = 	get_post_meta( get_the_ID(), 'sidebar', true );	
		$sidebar = ( $sidebar== '' )? 'sidebar-2' : $sidebar;
	elseif( is_single() ):
		$layout = ot_get_option('single_layout', 'rs');	
		$sidebar = 	ot_get_option( 'single_layout_sidebar', 'sidebar-1' );	
	else:
		$layout = ot_get_option('blog_layout', 'rs');
		$sidebar = 	ot_get_option( 'blog_layout_sidebar', 'sidebar-1' );
	endif;

	if( function_exists('is_woocommerce') ){
		if( is_product() ):
			$layout = ot_get_option('product_layout', 'rs');
			$sidebar = 	ot_get_option( 'product_layout_sidebar', 'sidebar-3' );
		elseif( is_woocommerce() ):
			$layout = ot_get_option('shop_layout', 'full');
			$sidebar = 	ot_get_option( 'shop_layout_sidebar', 'sidebar-3' );
		endif;
	}

	$layout = ( $layout == '' )	? 'rs' : $layout;

	$options['layout'] = $layout;
	$options['sidebar'] = ( $layout != 'full' )? $sidebar : '';

	return apply_filters(  'eshopper_theme_option_velues', $options );
	
}


function eshopper_post_class( $classes ) {
	
	$custom_bg_type = get_post_meta( get_the_ID(), 'custom_bg_type', true );
	$custom_bg_type = ( $custom_bg_type != '' )? $custom_bg_type : 'light';
	$classes[] = $custom_bg_type;

	return $classes;
}
add_filter( 'post_class', 'eshopper_post_class' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since eshopper 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function eshopper_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'eshopper_customize_register' );

function eshopper_inline_style($post_id){
	global $wpdb;
	$custom_backdround = get_post_meta( $post_id, 'custom_background', true );

	if( $custom_backdround == 'on' ){
		$background = get_post_meta( $post_id, 'background', true ); 

		if(!empty($background)){
			echo 'style=" ';
			foreach ($background as $key => $value) {
				if( $key == 'background-image' )
					echo "{$key}: url({$value}); ";
				else	
				echo "{$key}: {$value}; ";
			}
			echo ' "';
		}
	}
}

function eshopper_get_user_data( $user_id ){
	
}

function eshopper_terms( $post_id, $tax, $link=true ){

	$terms = get_the_terms( $post_id, $tax );
	$category = '';
	if ( $terms && ! is_wp_error( $terms ) ) : 
		$category_name = array();
		$i = 0;
		foreach ( $terms as $term ) {
			$sep = ( $i != 0 )? ', ' : '';
			if($link)$category .= $sep.'<a class="'.$tax.'-item" href="'.get_term_link( $term, $tax ).'">'.$term->name.'</a>';
			else $category .= $sep.' '.$term->name;
			$i++;
		}									
		
	 endif; 

	 return $category;
			
}


function eshopper_fabicon_ico(){
	if( function_exists('ot_get_option') )
   echo (ot_get_option('fabicon') != '')? '<link rel="shortcut icon" href="'.ot_get_option('fabicon').'">' : '';
}

function int($s){return(int)preg_replace('/[^\-\d]*(\-?\d*).*/','$1',$s);}

function eshopper_fix_gallery_wpse43558($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;
    $size_class = '';

    /**
     *  will remove this since we don't want an endless loop going on here
     */
    // Allow plugins/themes to override the default gallery template.
    //$output = apply_filters('post_gallery', '', $attr);

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => '3',
        'size'       => '',
        'include'    => '',
        'exclude'    => '',
        'gallerytype'   => 'justified'
    ), $attr));

   
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = int( $columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        */

     $i = 1;
	$col = 12/$columns;
	$width = round(1280/($columns));
	$height = '';
	    
    $size_class = ($size != '' )?sanitize_html_class( $size ) : 'normal';
    $gallery_div = "<div id='{$selector}' data-total-col='{$columns}' data-width='{$width}' class='gallery gallery-column-{$columns} galleryid-{$id} {$gallerytype}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
    
   
    foreach ( $attachments as $id => $attachment ) {
    	$metadata = wp_get_attachment_metadata($id);
    	$w = $metadata['width'];
    	$h = $metadata['height'];



        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		 $image_url = wp_get_attachment_url($id, $size, false, false);
		 $attatchement_image = eshopper_image_resize( $image_url, $width, $width, true, false, false );
		$class = '';
        
		
        $output .= "<a class='item' href='".$image_url."' data-effect='mfp-zoom'> 
        <img src='" . $attatchement_image . "' alt='".get_the_title($id)."' />
            </a>";
     $i++;   
    }
    $output .= "</div>\n";
    return $output;
}
add_filter("post_gallery", "eshopper_fix_gallery_wpse43558",10,2);

 if ( ! function_exists( 'modify_attachment_link' ) ) :
	function modify_attachment_link( $markup, $id, $size, $permalink, $icon, $text ){

	    // We need just thumbnails.
	    if ( 'portfolio-thumb' !== $size )
	    {   // Return the original string untouched.

	        return $markup;
	    }

	       

	    // Recreate the missing information.
	    $_post      = get_post( $id );
	    $new_url  = wp_get_attachment_url( $_post->ID, 'medium' );
	    $post_title = esc_attr( $_post->post_title );

	    if ( $text ) 
	    {
	        $link_text = esc_attr( $text );
	    } 
	    elseif ( 
	           ( is_int( $size )    && $size != 0 ) 
	        or ( is_string( $size ) && $size != 'none' ) 
	        or $size != FALSE 
	    ) 
	    {
	        $link_text = wp_get_attachment_image( $id, $size, $icon );
	    } 
	    else 
	    {
	        $link_text = '';
	    }

	    if ( trim( $link_text ) == '' )
	    {
	        $link_text = $_post->post_title;
	    }
	    return "<div class='blog-thumbnail element' data-link='$new_url' data-zoom='$new_url'><a class='element-lightbox' rel='croc-lightbox[pop_gal]' href='$new_url' title='$post_title' target='_blank'><i class='icon-zoom-in'></i></a></div>{$link_text}";
	}

	add_filter( 'wp_get_attachment_link', 'modify_attachment_link', 10, 6 );
endif;


if ( ! function_exists( 'eshopper_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own eshopper_entry_meta() to override in a child theme.
 *
 */
function eshopper_entry_meta() {

	if(is_single()){
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', THEMENAME ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', THEMENAME ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', THEMENAME ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( '<div class="meta-wrap"><span>Category:</span> %1$s &nbsp; &nbsp;<span>Tags:</span> %2$s</div>', THEMENAME );
	} elseif ( $categories_list ) {
		$utility_text = __( '<div class="meta-wrap"><span>Category:</span>  %1$s</div>', THEMENAME );
	} else {
		$utility_text = '';
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list	
	);
	}

	if(!is_single()){
		if( ot_get_option('social_share_in_archive', 'off') == 'on' ){eshopper_social_share();}
	}
}
endif;

if ( ! function_exists( 'eshopper_entry_header_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own eshopper_entry_meta() to override in a child theme.
 *
 */
function eshopper_entry_header_meta() {

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', THEMENAME ), get_the_author() ) ),
		get_the_author()
	);

	
	$utility_text = __( '<div class="header-meta">%1$s on %2$s</div>', THEMENAME );
	

	printf(
		$utility_text,
		$author,
		$date	
	);
}
endif;

function default_eshopper_menu(){
	$html = '';
	echo '<ul class="nav-menu primary-menu" id="header-menu-1">
			 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1 current-menu-item">
			 <a href="' .esc_url( home_url() ). '/wp-admin/nav-menus.php" target="_blank">menu settings</a></li>
			 <li id="st-trigger-effects" class="column">
				<span data-effect="st-effect-2"><span class="genericon genericon-draggable"></span></span>
				</li>
             </ul>';
  
 }

 function default_eshopper_footer_menu(){
	$html = '';
	echo '<ul class="footer-menu list-inline" id="footer-menu-1">
			 <li class="">
			 <a href="' .esc_url( home_url() ). '/wp-admin/nav-menus.php" target="_blank">footer menu settings</a></li>
             </ul>';
 
 }

function eshopper_excerpt_more( $more ) {
	if( function_exists('ot_get_option') ){
		$read_more = ot_get_option('readmore_text', 'Read more &raquo;');
		return '<div class="btn-wrap"><a class="read-more btn alt" href="'.get_permalink().'">'.esc_attr($read_more).'</a></div>';
	}else{
		return '<div class="btn-wrap"><a class="read-more btn alt" href="'.get_permalink().'">Read More &raquo;</a></div>';
	}
	

}
add_filter( 'excerpt_more', 'eshopper_excerpt_more' );

function eshopper_excerpt_length( $length ) {
	if( function_exists('ot_get_option') ){
		return ot_get_option('excerpt_length', 50);
	}else{
		return 55;
	}
	
}
add_filter( 'excerpt_length', 'eshopper_excerpt_length', 999 );

function eshopper_post_format_icon($postid){
	global $post, $wpdb;
	//'image', 'video', 'gallery', 'audio', 'quote'
	$format = get_post_format($postid);
	switch ($format) {
    case 'video':
        return '<i class="dash fa fa-film"></i>';
        break;
    case 'gallery':
        return '<i class="genericon genericon-gallery"></i>';
        break;
    case 'audio':
        return '<i class="dash fa fa-music"></i>';
        break; 
    case 'quote':
        return '<i class="dash genericon genericon-quote"></i>';
        break;
    case 'link':
        return '<i class="dash fa fa-link"></i>';
        break;       
    default: 
    	return '';         
	}
	
}

function get_eshopper_post_info($postid){
	global $wpdb;
	$output = '<p class="meta-info">';
	$output .= '<a href="'.get_permalink($postid).'">';
	
	$output .= '<span class="date-meta"><i class="genericon genericon-time"></i>'.get_the_time( 'd/m/Y', $postid ).'</span>';		
	$output .= '</a>';
	$output .= '<span class="count-comment"><a href="'.get_comments_link($postid).'" class="su-post-comments-link"><i class="fa fa-comment-o"></i> '.get_comments_number( $postid ).'</a></span>';
	
	$output .= '</p>';
	$output .= eshopper_post_format_icon($postid);
	return $output;
}

function eshopper_post_info(){
	global $post;
	$output = '
	<p class="meta-info">
		<span class="date-meta"><i class="genericon genericon-time"></i>'.get_the_time( get_option( 'date_format' ) ).'</span>';
		 if(is_single()): 
			$output .= '<span class="author-meta"><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'"><i class="genericon genericon-user"></i>'.get_the_author().'</a></span>
			<span class="category-meta"><i class="genericon genericon-document"></i>'.get_the_category_list( __( ', ', THEMENAME ) ).'</span>';
		 endif; 
		$output .= '<span class="count-comment"><a href="'.get_comments_link().'" class="su-post-comments-link"><i class="fa fa-comment-o"></i>'.get_comments_number(  ).'</a></span>
	</p>';
	echo  $output;
}

function eshopper_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'eshopper' ) ) {
		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Lato:300,400,700,900,300italic,400italic,700italic',
			'subset' => 'latin,latin-ext',
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

function eshopper_mce_css( $mce_css ) {
	$font_url = eshopper_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'eshopper_mce_css' );


function eshopper_widget_text($output){
	return '<div class="newsletter-description">'.$output.'</div>';
}
add_filter( 'widget_text', 'eshopper_widget_text' );


if(!function_exists('eshopper_social_share')):
	function eshopper_social_share(){
		global $post;
		?>
		<ul class="social-share">
		    <li class="facebook">
		       <!--fb-->
		       <a target="_blank" href="//www.facebook.com/share.php?u=<?php print(urlencode(the_permalink())); ?>&title=<?php print(urlencode(get_the_title())); ?>" title="<?php _e('Share this post on Facebook!', THEMENAME)?>"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a>
		    </li>
		    <li class="twitter">
		       <!--twitter-->
		       <a target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>" title="<?php _e('Share this post on Twitter!', THEMENAME)?>"><i class="fa fa-twitter-square"></i> <span>Twitter</span></a>
		    </li>
		    <li class="google-plus">
		       <!--g+-->
		       <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php _e('Share this post on Google Plus!', THEMENAME)?>"><i class="fa fa-google-plus-square"></i> <span>Google +</span></a>
		    </li>
		    <li class="linkedin">
		       <!--linkedin-->
		       <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=LinkedIn" title="<?php _e('Share this post on Linkedin!', THEMENAME)?>"><i class="fa fa-linkedin-square"></i> <span>Linkedin</span></a>
		    </li>
		    <li class="pinterest">
		       <!--Pinterest-->
		       <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>&description=<?php the_title();?> on <?php bloginfo('name'); ?> <?php echo site_url()?>" class="pin-it-button" count-layout="horizontal" title="<?php _e('Share on Pinterest',THEMENAME) ?>"><i class="fa fa-pinterest-square"></i> <span>Pinterest</span></a>
		    </li>
		    <li class="email-share">
			   <!--Email-->
		       <a title="<?php _e('Share by email',THEMENAME) ?>" href="mailto:?subject=Check this post - <?php the_title();?> &body= <?php the_permalink()?>&title="<?php the_title()?>" email"=""><i class="fa fa-envelope"></i> <span><?php _e('Share by email', THEMENAME)?></span></a>
		    </li>
		</ul>
		<?php
	}
endif;
?>