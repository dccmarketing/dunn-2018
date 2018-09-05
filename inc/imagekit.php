<?php

/**
 * Returns a path if the file exists, FALSE if not.
 *
 * @param 		string 		$file 		The file name to check for.
 * @return 		mixed 					File path or FALSE
 */
function dunn_check_for_svg_file( $file ) {

	if ( empty( $file ) ) { return FALSE; }

	$return 	= FALSE;
	$paths[] 	= '/assets/svgs/theme';
	$paths[] 	= '/assets/svgs/dashicons';
	$paths[] 	= '/assets/svgs/fontawesome';

	/**
	 * The dunn_svg_paths filter.
	 */
	$paths = apply_filters( 'dunn_svg_paths', $paths );

	if ( empty( $paths ) ) { return FALSE; }

	foreach ( $paths as $path ) {

		$svgfile 		= $file . '.svg';
		$fullpath 		= get_template_directory() . $path;
		$pathtocheck 	= trailingslashit( $fullpath ) . $svgfile;
		$check			= file_exists( $pathtocheck );

		if ( ! $check ) { continue; }

		$uri 	= get_template_directory_uri() . $path;
		$return = trailingslashit( $uri ) . $svgfile;

	} // foreach

	return $return;

} // dunn_check_for_svg_file()

/**
 * Returns an array of the featured image details
 *
 * @param 		int 	$postID 		The post ID
 * @return 		array 					Array of info about the featured image
 */
function dunn_get_featured_images( $postID ) {

	if ( empty( $postID ) ) { return FALSE; }

	$imageID = get_post_thumbnail_id( $postID );

	if ( empty( $imageID ) ) { return FALSE; }

	return wp_prepare_attachment_for_js( $imageID );

} // dunn_get_featured_images()

/**
 * Returns the requested SVG
 *
 * @param 		string 		$svg 		The name of the icon to return
 * @return 		mixed 					The SVG code
 */
function dunn_get_svg( $svg ) {

	if ( empty( $svg ) ) { return; }

	$return 	= '';
	$filecheck 	= dunn_check_for_svg_file( $svg );

	if ( empty( $filecheck ) ) { return FALSE; }

	$get = wp_remote_get( $filecheck );

	if ( is_wp_error( $get ) ) { return FALSE; }

	$return = wp_remote_retrieve_body( $get );

	return $return;

} // dunn_get_svg()

/**
 * Echos the requested SVG.
 *
 * @param 		string 		$svg 		The name of the icon to return
 * @return 		mixed 					The SVG code
 */
function dunn_the_svg( $svg ) {

	echo dunn_get_svg( $svg );

} // dunn_the_svg()