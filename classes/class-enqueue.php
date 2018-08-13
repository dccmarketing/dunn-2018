<?php

/**
 * Enqueues and manages all scripts and styles.
 *
 * @since 			1.0.0
 * @package 		DunnBrothers
 * @subpackage 		DunnBrothers\Classes
 */

namespace DunnBrothers\Classes;

class Enqueue {

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

		add_action( 'admin_enqueue_scripts', 				array( $this, 'enqueue_admin' ) );
		add_action( 'customize_preview_init', 				array( $this, 'enqueue_customizer_scripts' ) );
		add_action( 'customize_controls_enqueue_scripts', 	array( $this, 'enqueue_customizer_controls' ) );
		add_action( 'customize_controls_print_styles', 		array( $this, 'enqueue_customizer_styles' ) );
		add_action( 'login_enqueue_scripts',	 			array( $this, 'enqueue_login' ) );
		add_action( 'wp_enqueue_scripts', 					array( $this, 'enqueue_public' ) );
		add_action( 'wp_print_scripts', 					array( $this, 'print_scripts_header' ) );
		add_action( 'wp_print_footer_scripts', 				array( $this, 'print_scripts_footer' ) );

		add_filter( 'script_loader_tag', 					array( $this, 'async_scripts' ), 10, 2 );
		add_filter( 'style_loader_src', 					array( $this, 'remove_cssjs_ver' ), 10, 2 );
		add_filter( 'script_loader_src', 					array( $this, 'remove_cssjs_ver' ), 10, 2 );
	
	} // hooks()

	/**
	 * Sets the async attribute on all script tags.
	 *
	 * @hooked 		script_loader_tag
	 */
	public function async_scripts( $tag, $handle ) {

		if ( is_admin() ) { return $tag; }

		$check = strpos( $handle, 'dunn-' );

		if ( ! $check || 0 < $check ) { return $tag; }

		return str_replace( ' src', ' async="async" src', $tag );

	} // async_scripts()

	/**
	 * Enqueues scripts and styles for the admin
	 *
	 * @hooked 		admin_enqueue_scripts
	 */
	public function enqueue_admin( $hook ) {

		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_style( 'dunn-admin', get_theme_file_uri( '/admin.css' ) );

		wp_enqueue_style( 'datepicker', '//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css', array(), PARENT_THEME_VERSION, 'all' );

		wp_enqueue_style( 'timepicker', '//cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css', array(), PARENT_THEME_VERSION, 'all' );



		wp_enqueue_media();

		wp_enqueue_script( 'dunn-admin', get_theme_file_uri( '/assets/js/admin.min.js' ), array( 'jquery', 'media-upload', 'jquery-ui-datepicker', 'wp-color-picker', 'timepicker', 'jquery-ui-slider' ), PARENT_THEME_VERSION, true );

		wp_enqueue_script( 'timepicker', '//cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js', array( 'jquery', 'jquery-ui-datepicker', 'jquery-ui-slider' ), PARENT_THEME_VERSION, true );



		//if ( 'nav-menus.php' != $hook ) { return; } // Page-specific scripts & styles after this

	} // enqueue_admin()

	/**
	 * Used by customizer controls, mostly for active callbacks.
	 *
	 * @hooked		customize_controls_enqueue_scripts
	 * @access 		public
	 * @see 		add_action( 'customize_preview_init', $func )
	 * @since 		1.0.0
	 */
	public function enqueue_customizer_controls() {

		wp_enqueue_script( 'dunn-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.min.js' ), array( 'jquery', 'customize-controls' ), PARENT_THEME_VERSION, true );

	} // enqueue_customizer_controls()

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @hooked 		customize_preview_init
	 */
	public function enqueue_customizer_scripts() {

		wp_enqueue_script( 'dunn-customizer', get_theme_file_uri( '/assets/js/customizer.min.js' ), array( 'jquery', 'customize-preview' ), PARENT_THEME_VERSION, true );

	} // enqueue_customizer_scripts()

	/**
	 * Loads custopmizer.css file for Customizer Previewer styling.
	 *
	 * @hooked 		customize_controls_print_styles
	 */
	public function enqueue_customizer_styles() {

		wp_enqueue_style( 'dunn-customizer-style', get_theme_file_uri( 'customizer.css' ), 10, 2 );

	} // enqueue_customizer_styles()

	/**
	 * Enqueues scripts and styles for the login page
	 *
	 * @hooked 		login_enqueue_scripts
	 */
	public function enqueue_login() {

		wp_enqueue_style( 'dunn-login', get_theme_file_uri( 'login.css' ), 10, 1 );

	} // enqueue_login()

	/**
	 * Enqueue scripts and styles for the front end.
	 *
	 * @hooked 		wp_enqueue_scripts
	 */
	public function enqueue_public() {

		wp_scripts()->add_data( 'jquery', 'group', 1 );
		wp_scripts()->add_data( 'jquery-core', 'group', 1 );
		wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

		wp_enqueue_style( 'dunn-style', get_stylesheet_uri() );

		//wp_enqueue_script( 'enquire', '//cdnjs.cloudflare.com/ajax/libs/enquire.js/2.1.2/enquire.min.js', array(), PARENT_THEME_VERSION, true );

		wp_enqueue_script( 'dunn-libs', get_theme_file_uri( '/assets/js/lib.min.js' ), array(), PARENT_THEME_VERSION, true );

		wp_enqueue_script( 'dunn-public', get_theme_file_uri( '/assets/js/public.min.js' ), array( 'jquery', 'dunn-libs' ), PARENT_THEME_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

			wp_enqueue_script( 'comment-reply' );

		}

		// wp_enqueue_style( 'dunn-fonts', $this->fonts_url(), array(), null );

	} // enqueue_public()

	/**
	 * Properly encode a font URLs to enqueue a Google font
	 *
	 * @see 		enqueue_public()
	 * @return 		mixed 		A properly formatted, translated URL for a Google font
	 */
	public static function fonts_url() {

		$return 	= '';
		$families 	= '';
		$fonts[] 	= array( 'font' => 'Open Sans', 'weights' => '400,700', 'translate' => esc_html_x( 'on', 'Open Sans font: on or off', 'dunn-brother' ) );

		foreach ( $fonts as $font ) {

			if ( 'off' == $font['translate'] ) { continue; }

			$families[] = $font['font'] . ':' . $font['weights'];

		}

		if ( ! empty( $families ) ) {

			$query_args['family'] 	= urlencode( implode( '|', $families ) );
			$query_args['subset'] 	= urlencode( 'latin' );
			$return 				= add_query_arg( $query_args, '//fonts.googleapis.com/css' );

		}

		return $return;

	} // fonts_url()

	/**
	 * Prints scripts in the footer.
	 */
	public function print_scripts_footer() {

		//

	} // print_scripts_footer()

	/**
	 * Prints scripts in the header.
	 */
	public function print_scripts_header() {

		//

	} // print_scripts_header()

	/**
	 * Removes query strings from static resources
	 * to increase Pingdom and GTMatrix scores.
	 *
	 * Does not remove query strings from Google Font calls.
	 *
	 * @hooked		style_loader_src
	 * @hooked 		script_loader_src
	 * @param 		string 		$src 			The resource URL
	 * @return 		string 						The modifed resource URL
	 */
	public function remove_cssjs_ver( $src ) {

		if ( empty( $src ) ) { return; }
		if ( strpos( $src, 'https://fonts.googleapis.com' ) ) { return; }

		if ( strpos( $src, '?ver=' ) ) {

			$src = remove_query_arg( 'ver', $src );

		}

		return $src;

	} // remove_cssjs_ver()

} // class