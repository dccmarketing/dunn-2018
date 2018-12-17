<?php
/**
 * Template part for displaying the company address.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 		Dunn
 */

$data = get_theme_mod( 'company_address' );
$addy = dunn_make_map_link( $data );

?><address class="address">
	<a class="address-link" href="<?php echo esc_url( $addy ); ?>"><?php

		echo esc_html( $data );

	?></a>
</address>