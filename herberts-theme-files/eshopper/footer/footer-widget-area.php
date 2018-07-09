<?php
/**
 * footer widget area
 *
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */
?>
<?php
if( function_exists( 'ot_get_option' ) ):
	$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
	if( $footer_widget_area == 'on' ): ?>
	<section class="footer-widget-wrap">
    	<?php
        $i = ot_get_option( 'footer_widget_box', 4 );
		$col_class = 12/$i;
		?>
        <div class="container">
            <div class="row">
                
                    <?php				
                        for( $i = 1; $i <= 4; $i++ ):
                            if ( is_active_sidebar( 'footer-'.$i ) ) : ?>
                            <div class="col-lg-<?php echo esc_attr($col_class); ?> col-md-<?php echo esc_attr($col_class); ?> col-sm-<?php echo esc_attr($col_class); ?> col-xs-12 footer-widget-area">
                                <div class="widget-area" role="complementary">
                                    <?php dynamic_sidebar( 'footer-'.$i ); ?>
                                </div><!-- .widget-area -->
                            </div>
                            <?php
                            endif;
                        endfor; 
                    endif; ?>
                
            </div>
        </div>
	</section>
	<?php
endif;	//if( function_exists( 'ot_get_option' ) ):
?>