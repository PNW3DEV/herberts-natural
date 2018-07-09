<?php
$title_display = get_post_meta( get_the_ID(), 'title_display', true );
$title_display = ($title_display == '')? 'on' : $title_display;
if( $title_display == 'on' ):

	
	$title = get_post_meta( get_the_ID(), 'title', true );
	$title = ( $title != '' )? esc_attr($title) : get_the_title();
	$subtitle = esc_attr( get_post_meta( get_the_ID(), 'subtitle', true ) );
	?>

	<header class="entry-header">
        <h1 class="entry-title"><?php echo esc_attr($title); ?></h1>
        <?php if( $subtitle != '' ): ?>
        <p class="sub-title"><?php echo balanceTags($subtitle); ?></p>
        <?php endif; ?>
    </header>

<?php endif; ?>	