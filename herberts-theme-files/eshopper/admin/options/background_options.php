<?php
function eshopper_background_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'container_width',
        'label'       => __( 'Container width', THEMENAME ),
        'desc'        => __( 'in pixel', THEMENAME ),
        'std'         => array('1170', 'px'),
        'type'        => 'measurement',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '320,2000,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.container',
                    'property'   => 'max-width'
                    )
            )
      ),
      array(
        'id'          => 'body_background',
        'label'       => __( 'Body background', THEMENAME ),
        'desc'        => '',
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'body',
                    'property'   => 'background'
                    )
            )
      ),
      array(
        'id'          => 'main_container_background',
        'label'       => __( 'Main container background', THEMENAME ),
        'desc'        => '',
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.container-wrap .container',
                    'property'   => 'background'
                    )
            )
      )
    );

	return apply_filters( 'eshopper_background_options', $options );
}  
?>