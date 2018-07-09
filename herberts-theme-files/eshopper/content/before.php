<?php
global $wp_query;
//layout 
$class = 'col-md-9 col-lg-9 col-sm-9 col-xs-12';
$layout = $wp_query->eshopper['layout'];
if( $layout == 'full' ){
	$class = 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
}elseif( $layout == 'ls' ){
	$class = 'col-md-9 col-lg-9 col-sm-9 col-xs-12 pull-right';
}



if( is_page() ):
$header_type = get_post_meta( get_the_ID(), 'header_type', true );
$header_image = esc_url(get_post_meta( get_the_ID(), 'header_image', true ));
$slider_shortcode = esc_attr(get_post_meta( get_the_ID(), 'slider_shortcode', true ));

	if( ($header_type == 'image') && ($header_image != '') ){ ?>
	<section class="header-image" style="background-image:url(<?php echo esc_url($header_image); ?>)" data-speed="10">
		
    </section>
    <?php
	}elseif( ($header_type == 'slider') && ($slider_shortcode != '') ){
		echo '<div class="eshopper-main-slider">'.do_shortcode($slider_shortcode).'</div>';
	}
endif;
?>

<?php  eshopper_breadcrumbs();  ?>
<section class="container-wrap">
    <div class="container">
    	<div class="row">
			<div class="<?php echo esc_attr($class); ?>">
