<?php

/**
 * Formats a number to be used in a tel link.
 * 
 * @since 		1.0.0
 * @param 		string 		$number 		A phone number.
 * @return 		string 						A tel link formated phone number.
 */
function dunn_format_phone_number( $number ) {

	$exts 		= array( ' x', ' ext.', ' ext', 'x', 'ext.', 'ext' );
	$extensions = str_replace( $exts, ',', $number );
	$formatted 	= preg_replace( '/[^0-9\,]/', '', $extensions );

	return $formatted;

} // dunn_format_phone_number()

/**
 * Returns a Google Map link from an address
 *
 * @exits 		If $address is empty.
 * @param 		string 		$address 		An address
 * @return 		string 						URL for Google Maps
 */
function dunn_make_map_link( $address ) {

	if( empty( $address ) ) { return FALSE; }

	$return = '';

	$query_args['q'] 	= urlencode( $address );
	$return 			= add_query_arg( $query_args, 'https://www.google.com/maps/' );

	return $return;

} // dunn_make_map_link()