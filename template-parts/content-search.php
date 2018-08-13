<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DunnBrothers
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php 
	
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
		
		if ( 'post' === get_post_type() ) : 
		
			?><div class="entry-meta"><?php

				dunn_brothers_posted_on();
				dunn_brothers_posted_by();
			
			?></div><!-- .entry-meta --><?php 
			
		endif; 
		
	?></header><!-- .entry-header --><?php 
	
	dunn_brothers_post_thumbnail(); 
	
	?><div class="entry-summary"><?php 
	
		the_excerpt(); 
		
	?></div><!-- .entry-summary -->

	<footer class="entry-footer"><?php 
	
		dunn_brothers_entry_footer(); 
	
	?></footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->