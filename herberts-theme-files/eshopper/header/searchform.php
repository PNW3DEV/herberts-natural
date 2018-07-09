<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo __( 'SEARCH', THEMENAME ); ?>" />
		<button><i class="fa fa-search"></i></button>
		
	</div>
</form>