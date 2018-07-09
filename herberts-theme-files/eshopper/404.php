<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */

get_header(); ?>

	<?php get_template_part( 'content/before', '' ); ?>

		
		<article id="post-0" class="post error404 no-results not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e('404 Page', THEMENAME); ?></h1>
                <?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', THEMENAME ); ?>
            </header>
        
            <div class="entry-content">
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', THEMENAME  ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post -->
			

	<?php get_template_part( 'content/after', '' ); ?>


<?php get_footer(); ?>