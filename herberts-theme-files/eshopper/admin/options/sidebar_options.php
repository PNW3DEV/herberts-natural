<?php
function eshopper_sidebar_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'create_sidebar',
        'label'       => __( 'Create Sidebar', THEMENAME ),
        'desc'        => __('You must need to save after creating sidebar. Then go to Apperance->Widgets and see your sidebar.', THEMENAME ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebar_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(           
          array(
            'id'          => 'desc',
            'label'       => __( 'Description', THEMENAME ),
            'desc'        => __( '(optional)', THEMENAME ),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
	  array(
        'id'          => 'sidebar_background',
        'label'       => __( 'Sidebar background', THEMENAME ),
        'desc'        => '',
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'sidebar_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.sidebar',
                    'property'   => 'background'
                    )
            )
      ),
    );

	return apply_filters( 'eshopper_sidebar_options', $options );
}   
?>