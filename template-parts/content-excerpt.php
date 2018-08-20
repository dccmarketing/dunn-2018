<?php
/**
 * Template part for displaying post excerpts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 		Dunn
 */

 ?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header content-excerpt"><?php

		 the_title( '<h1 class="entry-title">', '</h1>' );

	 ?></header><!-- .entry-header -->
	<div class="entry-content"><?php

		 the_excerpt();

	?></div><!-- .entry-content -->
	<footer class="entry-footer"><?php

		dunn_entry_footer();

	?></footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
