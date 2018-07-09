<?php
function eshopper_general_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'fabicon',
        'label'       => __( 'Fabicon', THEMENAME ),
        'desc'        => __( 'Upload or put a url of an ico image that will appear your website\'s (16px X 16px)', THEMENAME ),
        'std'         => THEMEURI. '/images/favicon.ico',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo',
        'label'       => __( 'Logo', THEMENAME ),
        'desc'        => __('Main logo of site', THEMENAME ),
        'std'         => THEMEURI. '/images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'site_description',
        'label'       => __( 'Site Description', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'admin_logo',
        'label'       => __( 'Admin logo', THEMENAME ),
        'desc'        => '',
        'std'         => THEMEURI. '/images/logo-admin.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sticky_navigation',
        'label'       => __( 'Sticky navigation', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_breadcrumbs',
        'label'       => __( 'Show Breadcrumbs', THEMENAME ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'bredcrumb_menu_prefix',
        'label'       => __( 'Breadcrumbs prefix', THEMENAME ),
        'desc'        => '',
        'std'         => 'Home',
        'type'        => 'text',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'show_breadcrumbs:is(on)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'preloader',
        'label'       => __( 'Preloader', THEMENAME ),
        'desc'        => '',
        'std'         => 'spinner7',
        'type'        => 'select',
        'section'     => 'general_options',
        'rows'        => '',
        'choices'     => array(
                array(
                    'value'       => 'none',
                    'label'       => __( 'None', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner1',
                    'label'       => __( 'Spinner 1', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner2',
                    'label'       => __( 'Spinner 2', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner3',
                    'label'       => __( 'spinner 3', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner4',
                    'label'       => __( 'Spinner 4', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner5',
                    'label'       => __( 'Spinner 5', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner6',
                    'label'       => __( 'Spinner 6', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'spinner7',
                    'label'       => __( 'Spinner 7', THEMENAME ),
                    'src'         => ''
                  ),
                  array(
                    'value'       => 'custom',
                    'label'       => __( 'Custom image', THEMENAME ),
                    'src'         => ''
                  ),
            ),
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'preloader_image',
        'label'       => __( 'Pleloader image', THEMENAME ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'preloader:is(custom)',
        'operator'    => 'and'
      )
	);

	return apply_filters( 'eshopper_general_options', $options );
}
?>