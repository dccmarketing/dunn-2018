<?php

/**
 * Template part for displaying the social menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dunn
 */

if ( ! has_nav_menu( 'menu-3' ) ) { return; }

?><nav class="nav-3"><?php

$menu_args['theme_location']	= 'menu-3';
$menu_args['container'] 		= false;
$menu_args['menu_id']         	= 'social-menu';
$menu_args['menu_class']      	= 'social-menu-items social-menu-items-0';
$menu_args['depth']           	= 1;

wp_nav_menu( $menu_args );

?></nav>