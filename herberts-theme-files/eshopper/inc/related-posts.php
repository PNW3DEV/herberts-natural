<?php    
    $terms =  array();
    $postid = get_the_ID();
	$terms = wp_get_post_terms( $postid, 'post_tag' , array("fields" => "slugs") );

	if( !empty($terms) && (ot_get_option('related_posts_show') == 'on') ): ?>
	
		
    	<div class="related-posts">
              <h3><?php echo ot_get_option('related_posts_text' , 'Related Posts : ') ?></h3>                  
        
			<?php		
	       
	        $sticky = get_option( 'sticky_posts' );
	        $sticky[] = $postid;
	        
			$args = array(
	        'post__not_in' => $sticky,
	        'posts_per_page' => ot_get_option('total_related_post_show' , 3),
	        'tax_query' => array(
	            array(
	                'taxonomy' => 'post_tag',
	                'field' => 'slug',
	                'terms' => $terms
	            ))
	        );
	        $query = new WP_Query( $args ); 

	        if ( $query->have_posts() ):
	        echo '<ul class="blog-related-posts">';	       
			while ( $query->have_posts() ) :$query->the_post();
				
				 ?>
	        		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	        	       
	        <?php
			endwhile;
			echo '</ul>';
			endif;
	       
		
		wp_reset_postdata();
	  ?>

</div>
<?php endif; ?>