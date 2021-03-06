<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			$link = get_post_meta( get_the_ID(), '_format_link_url', true );
			$title = get_post_meta( get_the_ID(), '_format_link_title', true );
		?>

		<?php if($link != ''): ?>			
			<h2 class="entry-title link">
				<a href="<?php echo ( is_single() )? esc_url($link) : get_permalink(); ?>">
					<?php echo esc_url($link).'<span> - '.esc_attr($title).'</span>'; ?>
				</a>
			</h2>
		<?php endif; ?>
		
		

		<header class="entry-header">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<div class="featured-post">
					<?php _e( 'Featured post', THEMENAME ); ?>
				</div>
			<?php endif; ?>
			<?php eshopper_entry_header_meta(); ?>						
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php endif; // is_single() ?>						
			

			
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', THEMENAME ) . '</span>', __( '1 Reply', THEMENAME ), __( '% Replies', THEMENAME ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>

			

			
		</header><!-- .entry-header -->

		
		<?php if ( !is_single() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEMENAME ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="navigation pagination">' . __( 'Pages:', THEMENAME ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		

		<footer class="entry-meta">
			<?php eshopper_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', THEMENAME ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'eshopper_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', THEMENAME ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', THEMENAME ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
