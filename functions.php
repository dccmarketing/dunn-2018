<?php
/**
 * Dunn Brothers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DunnBrothers
 */

use \DunnBrothers\Classes as Classes;

/**
 * Set the constants used throughout.
 */
define( 'PARENT_THEME_SLUG', 'dunn' );
define( 'PARENT_THEME_VERSION', '1.0.0' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Autoloader
 */
require get_template_directory() . '/classes/class-autoloader.php';

/**
 * Create an instance of each class and load the hooks function.
 */
$classes[] = new Classes\Theme_Setup();
$classes[] = new Classes\Enqueue();
$classes[] = new Classes\Utilities();
$classes[] = new Classes\Media();
$classes[] = new Classes\Uploads();
$classes[] = new Classes\Template_Column();
$classes[] = new Classes\Customizer();
$classes[] = new Classes\Menu_Utilities();
$classes[] = new Classes\Menu_Styles();

$classes[] = new Classes\Automattic();
$classes[] = new Classes\Yoast();
$classes[] = new Classes\Soliloquy();

// $classes[] = new Classes\Critical();
// $classes[] = new Classes\Hidden_Search();
// $classes[] = new Classes\Metabox_Subtitle();
// $classes[] = new Classes\Metabox_FieldsDemo();
// $classes[] = new Classes\Users();
// $classes[] = new Classes\WooCommerce();

foreach ( $classes as $class ) {

	add_action( 'after_setup_theme', array( $class, 'hooks' ) );

}