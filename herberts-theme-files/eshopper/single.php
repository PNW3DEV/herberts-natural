<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */

get_header(); ?>

	<?php get_template_part( 'content/before', '' ); ?>
		

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php 
					if( ot_get_option('social_share_in_single', 'on') == 'on' ){
						eshopper_social_share();
					} 
				?>

				<div class="nav-wrap">
					<nav class="nav-roundslide">
						<span class="prev"><?php previous_post_link( '%link', '<span class="icon-wrap"><i class="genericon genericon-previous"></i></span>' . _x( '', 'Previous post link', THEMENAME ) . '<h3>%title</h3>' ); ?></span>
						<span class="next"><?php next_post_link( '%link', '<h3>%title</h3> <span class="icon-wrap"><i class="genericon genericon-next"></i></span>' . _x( '', 'Next post link', THEMENAME )  ); ?></span>
					</nav>
				</div>

				<?php get_template_part( 'inc/related-posts', '' ); ?>				
				

				<?php comments_template( '', true ); ?>
			
			<?php endwhile; // end of the loop. ?>

	<?php get_template_part( 'content/after', '' ); ?>

<?php get_footer(); ?>