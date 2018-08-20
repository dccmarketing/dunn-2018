<?php

/**
 * Template part for displaying the CTA button.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dunn
 */

$number 	= get_theme_mod( 'company_phone' );
$formatted 	= dunn_format_phone_number( $number );
$classes = isset( $classes ) ? $classes : array();

/**
 * The button_cta_classes filter.
 * 
 * @param 		array 		$classes 		The 
 */
$classes = apply_filters( 'button_cta_classes', $classes );
$classes = implode( ' ', $classes );

?><div class="btn-cta <?php echo esc_attr( $classes ); ?>" itemprop="telephone">
	<a class="btn-cta-link" href="tel:<?php echo esc_html( $formatted ); ?>"><?php

		dunn_the_svg('phone');

		?><span class="screen-reader-text"><?php echo esc_html__( 'Call ', 'rosh' ); ?></span><?php

		echo esc_html( $number );

	?></a>
</div>