<?php
function eshopper_custom_css( $options = array() ){
	$options = array(
        array(
        'id'          => 'eshopper_css',
        'label'       => __( 'eShopper css', THEMENAME ),
        'class'       => 'hide-option-field',
        'desc'        => '',
        'std'         => '
.site-title{
    margin: {{logo_spacing}}
}
.product-hover-dark .item figure.effect-duke:hover figcaption{
    background-color:{{product_hover_dark}}
}
.product-hover-light .item figure.effect-duke:hover figcaption{
     background-color:{{product_hover_light}}
}
.product-hover-color .item figure.effect-duke:hover figcaption{
    background-color: {{product_hover_color}}
}
',
        'type'        => 'css',
        'section'     => 'custom_css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'custom_css',
        'label'       => __( 'Custom css', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'custom_css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    );

	return apply_filters( 'eshopper_custom_css', $options );
}   
?>