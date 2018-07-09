<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the .st-pusher and #st-container end in footer.
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */
?>
<?php
$social_array = array(
        array(
          'title' => 'Facebook',
          'link'  => '#',
          'icon'  => 'fa-facebook'
          ),
        array(
          'title' => 'Twitter',
          'link'  => '#',
          'icon'  => 'fa-twitter'
          ),
        array(
          'title' => 'Pinterest',
          'link'  => '#',
          'icon'  => 'fa-pinterest'
          ),
        array(
          'title' => 'Google+',
          'link'  => '#',
          'icon'  => 'fa-google-plus'
          ),
        array(
          'title' => 'Instragram',
          'link'  => '#',
          'icon'  => 'fa-instagram'
          ),
        array(
          'title' => 'Linkdin',
          'link'  => '#',
          'icon'  => 'fa-linkedin'
          ),
        );
	$social_array = ot_get_option( 'footer_social_icons', array() );
  $footer_widget_area = ot_get_option('footer_widget_area', 'off');
  if($footer_widget_area == 'on'){
    get_template_part( 'footer/footer-widget-area', '' );
  }
?>
	<div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="nav-menu">
              <?php
              $args = array(
              'theme_location'  => 'footer-menu',
              'menu_class'      => 'footer-menu list-inline',
              'fallback_cb'     => 'default_eshopper_footer_menu'
              );
              wp_nav_menu( $args );
              ?>
            </div>
          </div>
          <?php 
		 
    		  $icon_display = ot_get_option( 'social_icon_display', 'on' );
    		  if( !empty($social_array) && ($icon_display == 'on') ): ?>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="list-inline social-list align-right">
                  <?php 
                  foreach ($social_array as $key => $value) {
    				        echo '<li><a href="'.$value['link'].'" title="'.$value['title'].'"><i class="fa '.$value['icon'].'"></i></a></li>';
                  } 
                  ?>
                </ul>
              </div>
          <?php endif; ?>
        </div>         
      </div>
    </div><!-- .footer -->

    <?php
      $footer_copyright_bar = ot_get_option('footer_copyright_bar', 'on');
      if($footer_copyright_bar == 'on'): 
        $copyright_text = ot_get_option('copyright_text');
        ?>
        <div class="copyright-bar">
          <div class="container">
              <p><?php echo balanceTags($copyright_text); ?><p>
          </div>
        </div><!-- .copyright-bar -->
        <?php 
      endif;
    ?>
    
	</div><!-- .st-pusher -->
</div><!-- #st-container -->
    <a href="#0" class="cd-top">Top</a>
<?php wp_footer(); ?>
</body>
</html>