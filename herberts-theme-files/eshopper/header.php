<?php
/**
 * The Header template for our theme
 *
 * Starting .st-pusher and #st-container
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo ot_get_option('fabicon', THEMEURI.'/images/favicon.ico'); ?>">

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php eshopper_preloader(); ?>

<div id="st-container" class="st-container">
<div class="st-pusher">

  <?php $header_style = ot_get_option('header_style', 'style1'); ?>
  <?php get_template_part('header/'.$header_style, ''); ?>
  <?php get_sidebar('canvas'); ?>