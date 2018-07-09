<?php if( ot_get_option('topbar_display', 'on') == 'on' ): ?>
<section class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6"><?php echo esc_attr(ot_get_option('topbar_left_text')) ?></div>
			<div class="col-md-6 col-sm-6">
				<?php
				$social_array = ot_get_option( 'header_social_icons' );
	    		if( !empty($social_array) ): ?>
	                <ul class="list-inline social-list align-right">
	                  <?php 
	                  foreach ($social_array as $key => $value) {
	    				        echo '<li><a href="'.$value['link'].'" title="'.$value['title'].'"><i class="fa '.$value['icon'].'"></i></a></li>';
	                  } 
	                  ?>
	                </ul>
          		<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>