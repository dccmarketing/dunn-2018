<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dunn
 */

	?><footer class="site-footer" id="colophon">
		<div class="footer-wrap"><?php

		the_custom_logo();

		?><div class="copyright">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( get_admin_url() ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></div>
		<address class="address"><?php echo get_theme_mod( 'company_address' ); ?></address><?php

		get_template_part( 'template-parts/menu', 'footer' );

		get_template_part( 'template-parts/button', 'cta' );

		get_template_part( 'template-parts/menu', 'social' );

	?></div></footer><!-- .site-footer --><?php 

	wp_footer(); 

	?></body>
</html>
