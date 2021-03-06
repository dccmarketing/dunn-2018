<?php

/**
 * Methods for setting up the Dunn theme.
 *
 * @since 			1.0.0
 * @package 		Dunn
 * @subpackage 		Dunn\Classes
 */

namespace Dunn\Classes;

class Theme_Setup {

	/**
	 * Constructor
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {}

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'init', 		array( $this, 'text_domain' ) );
		add_action( 'init', 		array( $this, 'theme_supports' ) );
		add_action( 'init', 		array( $this, 'register_menus' ) );
		add_action( 'init', 		array( $this, 'content_width' ), 0 );
		add_action( 'init', 		array( $this, 'disable_emojis' ) );

	} // hooks()

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @hooked 		after_setup_theme
	 * @global 		int 		$content_width
	 */
	public function content_width() {

		$GLOBALS['content_width'] = apply_filters( 'dunn_content_width', 640 );

	} // content_width()

	/**
	 * Removes WordPress emoji support everywhere
	 *
	 * @hooked 		init
	 */
	public function disable_emojis() {

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	} // disable_emojis()

	/**
	 * Registers Menus
	 *
	 * @hooked 		after_setup_theme
	 */
	public function register_menus() {

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'dunn' ),
			'menu-2' => esc_html__( 'Footer', 'dunn' ),
			'menu-3' => esc_html__( 'Social', 'dunn' ),
		) );

	} // register_menus()

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /assets/languages/ directory.
	 *
	 * @hooked 		after_setup_theme
	 */
	public function text_domain() {

		load_theme_textdomain( 'dunn', get_template_directory() . '/languages' );

	} // text_domain()

	/**
	 * Setup theme support options.
	 * 
	 * Adds:
	 * 		Support for wide/full alignment image blocks in Gutenberg
	 * 		Posts and comments RSS feed links to head.
	 * 		Custom logo in Customizer.
	 * 		Selective refresh for widgets in the Customizer.
	 * 		Custom block color palettes.
	 * 		HTML5 markup for supported elements:
	 * 			Search form
	 * 			Comment form
	 * 			Comment list
	 * 			Gallery
	 * 			Caption
	 * 		Let WordPress manage the document title.
	 * 		Post thumbnails on posts and pages.
	 *
	 * @hooked 		after_setup_theme
	 */
	public function theme_supports() {

		add_theme_support( 'align-wide' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'Dunn Red', 'dunn' ),
				'slug' => 'dunn-red',
				'color' => '#a8022e',
			),
			array(
				'name' => __( 'Black', 'dunn' ),
				'slug' => 'black',
				'color' => '#000000',
			),
			array(
				'name' => __( 'light gray', 'dunn' ),
				'slug' => 'light-gray',
				'color' => '#eaeaea',
			),
			array(
				'name' => __( 'gray', 'dunn' ),
				'slug' => 'gray',
				'color' => '#b8b8b8',
			),
			array(
				'name' => __( 'Dark Gray', 'dunn' ),
				'slug' => 'dark-gray',
				'color' => '#333333',
			),
		) );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		add_editor_style( 'editor.css' );

	} // theme_supports()

} // class