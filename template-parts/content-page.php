<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dunn
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header content-page <?php if ( has_post_thumbnail( get_the_ID() ) ) { echo 'featured-image-page-header'; } ?>"><?php

		the_post_thumbnail( 'full' );

		the_title( '<h1 class="page-title">', '</h1>' ); 
		
	?></header><!-- .page-header -->
	<div class="page-content"><?php

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dunn' ),
			'after'  => '</div>',
		) );

	?></div><!-- .page-content --><?php 
	
	if ( get_edit_post_link() ) : 
	
		?><footer class="entry-footer"><?php

			dunn_entry_edit_link();

		?></footer><!-- .entry-footer --><?php 

	endif; 
	
?></article><!-- #post-<?php the_ID(); ?> -->
