<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php get_template_part( 'content/title' ); ?>
    

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEMENAME ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    
        <?php edit_post_link( __( 'Edit', THEMENAME ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post -->