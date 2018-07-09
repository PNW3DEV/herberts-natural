<style type="text/css">
<?php

eshopper_dynamic_css();

?>

<?php
	for( $i=1; $i<=4; $i++ ){
		for( $j=$i; $j>=1; $j-- ){
			$unit = round(100/$i);
			for($k=$i; $k>=1; $k--){
				echo ".column{$i} .size{$k}{$j}";
				echo '{width: '.round($unit*$k).'%;} ';
			}
			
		}
	}
?>


<?php
$slider_in_mobile = ot_get_option('slider_in_mobile');
if( $slider_in_mobile != 'on' ) {
	echo '@media only screen and (max-width: 480px) {';
	echo ".eshopper-main-slider";
	echo '{display: none;} ';
	echo '}';
}
?>


<?php
$show_mobile_menu_max_width = ot_get_option('show_mobile_menu_max_width', '768');
$default_menu_screen_width = $show_mobile_menu_max_width + 1;
echo '@media only screen and (min-width: '.$default_menu_screen_width.'px) {';
?>	

	.primary-menu li{
		position: relative;
	}

	.inner:after {
		  content: "";
		  display: table;
		  clear: both;
	}

	.primary-menu li a{
		display: block;
		margin: 0px 0px 0 0;
		text-decoration: none;
		font-size: 14px;
		padding: 0 20px 0;
		text-align: center;	
		color: #fff;
		line-height: 70px;
		text-transform: uppercase;
		letter-spacing: 3px;
	}


	.primary-menu li ul{
		display: none;
		position: absolute;
		top: 61px;
		left: 0;
		color: #fff;
		z-index: 9999;
		width: 240px;
		padding: 0;
	}

	.primary-menu li:hover > ul{
		display: block;
	}

	.primary-menu li ul li{
		width: 100%;
	}


	.primary-menu li ul a{
		text-transform: none !important;
		text-align: left;
		line-height: 40px !important;
		letter-spacing: inherit;
	}

	.primary-menu li ul ul{
		left: 230px;
		top: 0;
	}
	
	.header-menu ul > .menu-item-has-children > a:after {
		content: "\f431";
		position: absolute;
		right: 5px;
		top: 2px;
		font-family: genericons;
		font-size: 12px;
	}
	
	.primary-menu li ul li a {
		width: 100%;
		position: relative;
	}
	
	.header-menu ul > li > ul > .menu-item-has-children > a:after {
		content: "\f501";
		position: absolute;
		right: 8px;
		top: 0;
		font-family: genericons;
		font-size: 8px;
	}

	#eshopper-navigation .menu-item-has-children span{
		display: none;
	}
<?php	
echo '}';

echo '@media only screen and (max-width: '.$show_mobile_menu_max_width.'px) {';	
?>	
	.navbar-header {
		float: none;
	}
	
	.collapse {
		display: none;
	}
	
	.navbar-collapse.collapse {
		display: none!important;
	}
	
	.navbar-collapse.collapse.in {
		display: block!important;
	}
	
	.navbar-collapse {
		overflow-x: visible!important;
		padding-left: 0;
	}
	
	.navbar-collapse.in {
		overflow-y: auto;
	}
	
	.navbar-collapse {
		border-top: 1px solid transparent;
	}
	
	.navbar-toggle {
		margin-right: 0;
		border-radius: 0;
		-webkit-border-radius: 0;
		-ms-border-radius: 0;
		-o-border-radius: 0;
		display: block;
		float: left;
		padding: 9px 7px;
	}
	
	.navbar-inverse .navbar-toggle:hover,
	.navbar-inverse .navbar-toggle:focus {
		background: none;
	}

	.header-menu  .nav-menu{
		max-height: inherit;
	}
	
	.header-menu ul li {
		display: block;
		text-align: left;
	}
	
	.header-menu a {
		padding-right: 0;
		padding-left: 0;
	}
	
	.navbar-collapse {
		padding-right: 0;
	}
	
	.header-menu ul > li > a {
		line-height: 40px;
	}
	
	.header-menu ul > li > ul {
		padding-left: 20px;
	}
	
	.header-menu ul li.right.menucart-container {
		display: block;
		right: 45px;
		position: absolute;
		text-align: right;
		top: 0;
		width: 30px;
	}
	.primary-menu > .menucart-container a {
		right: 20px;
	}
	
	.header-menu ul.extra-items {
		display: block;
	}
	
	.header-menu .navbar-collapse ul li.right.menucart-container,
	.navbar-collapse .st-trigger-effects {
		display: none;
	}
	
	.primary-menu > .menucart-container i {
		display: inline-block;
	}
	
	.st-trigger-effects {
		display: block;
		float: right;
		right: 0;
		position: absolute;
		text-align: left;
		top: 0;
		width: 23px;
	}
	
	.st-trigger-effects > span {
		float: left;
	}
	.menucart-container > i {
		line-height: 51px;
	}
	
	.header-menu .st-trigger-effects > span {
		line-height: 44px;
	}
	
	.menucart-container a {
		right: -22px;
	}

	.header-menu li li{
		text-transform: none;
	}

	#eshopper-navigation .menu-item-has-children{
		position: relative;
	}

	#eshopper-navigation .menu-item-has-children span{
		display: block;
		float: right;
		cursor: pointer;
		font-size: 1.5em;
		padding: 0 15px;
		position: absolute;
		right: 0;
		top: 0;
	}

	#eshopper-navigation .menu-item-has-children span.open,
	#eshopper-navigation .menu-item-has-children span:hover,
	#eshopper-navigation .menu-item-has-children span:focus,
	#eshopper-navigation .menu-item-has-children span:active{
		background-color: #f9f9f9;
		color: #000;
	}

	#eshopper-navigation li .menu-item-has-children span{
		right: 15px;
	}

	#eshopper-navigation li li .menu-item-has-children span{
		right: 30px;
	}

	.menu-item-has-children span.open i:before{
		content: "\f432";
       
	}

	#eshopper-navigation .menu-item-has-children > ul{
		display: none;
	}

	#eshopper-navigation .menu-item-has-children.open > ul{
		display: block;
	}
<?php 	
echo '}';
?>
</style>

		