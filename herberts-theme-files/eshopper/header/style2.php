<div class="header-style-2">
<?php get_template_part('header/topbar', ''); ?>
<section class="header">
  <div class="container">
    <?php $logo = ot_get_option('logo', THEMEURI.'/images/logo.png'); ?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a></h1>     
    <?php $site_description = ot_get_option('site_description', 'on');
      if( $site_description == 'on' ): ?>
        <h2 class="site-description"><?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></h2>
    <?php endif; ?>     
  </div>
</section><!-- .header -->

<?php $sticky = ot_get_option('sticky_navigation', 'on'); ?>
  <div class="header-menu" id="sticky-navigation-<?php echo esc_attr($sticky); ?>">
    <div class="container">
      <div class="main-menu-block">
  	    <div class="navbar navbar-inverse bs-docs-nav sticky-navigation">
              <div class="container">
                  <?php
                    $header_canvas_sidebar = ot_get_option('header_canvas_sidebar', 'on');
                      $extmenu = '';
                      if ( class_exists( 'WooCommerce' ) ) :
                        $extmenu .= eshopper_wcmenucart();
                      endif;
                      $extmenu .= ($header_canvas_sidebar == 'on') ? '<li class="st-trigger-effects column">
                          <span data-effect="st-effect-2"><span class="genericon genericon-draggable"></span></span>
                          </li>' : '';
                  ?>
                  <?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) : ?>
                          <div id="eshopper-navigation">
                            <?php                     
                              wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu primary-menu', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$extmenu.'</ul>', 'fallback_cb'  => 'default_eshopper_menu', ) );         
                            ?>
                          </div>                          
                   <?php else: ?>       
                          <div class="navbar-header">
                              <!-- LOGO ON STICKY NAV BAR -->
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#eshopper-navigation">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              </button>
                          </div><!-- .navbar-header -->
                          
                          <div class="navbar-collapse collapse" id="eshopper-navigation">
                              <?php                     
                                wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu primary-menu', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'fallback_cb'  => 'default_eshopper_menu', ) );         
                              ?>
                          </div>
                              <?php
                              if ( $extmenu != '' ) :
                                echo '<ul id="extra-items" class="extra-items">' .$extmenu. '</ul>'; 
                              endif;
                            ?>
                   <?php endif; ?> 
              </div><!-- #eshopper-navigation -->            
          </div><!-- .container -->
      </div>        
    </div>
  </div><!-- .header-menu -->
 </div><!-- .header-style-2 --> 

  