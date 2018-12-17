<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Dunn
 */

get_header();

?><main id="main" class="site-main"><?php 
	
if ( have_posts() ) : 
	
	?><header class="page-header">
		<h1 class="page-title"><?php

			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'dunn' ), '<span>' . get_search_query() . '</span>' );
			
		?></h1>
	</header><!-- .page-header --><?php
	
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'search' );

	endwhile;

	the_posts_navigation();

else :

	get_template_part( 'template-parts/content', 'none' );

endif;

?></main><!-- #main --><?php

get_footer();
