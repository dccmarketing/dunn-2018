<?php

/**
 * Template part for displaying the footer menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dunn
 */

if ( ! has_nav_menu( 'menu-2' ) ) { return; }

?><nav class="nav-2"><?php

$menu_args['theme_location']	= 'menu-2';
$menu_args['container'] 		= false;
$menu_args['menu_id']         	= 'footer-menu';
$menu_args['menu_class']      	= 'footer-menu-items footer-menu-items-0';
$menu_args['depth']           	= 1;

wp_nav_menu( $menu_args );

?></nav>