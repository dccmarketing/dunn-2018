<?php
/**
 * The template for displaying all pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dunn
 */

?><form action="/" class="<?php

	/**
	 * The dunn_search_form_class filter.
	 *
	 * @var 	string 		The form class.
	 */
	echo apply_filters( 'dunn_search_form_class', 'search-form' );

	?>" method="get" role="search" >
	<label class="screen-reader-text" for="site-search"><?php

		/**
		 * The dunn_search_form_label filter.
		 *
		 * @var 	string 		The label class.
		 */
		echo apply_filters( 'dunn_search_form_label', _x( 'Search for:', 'label', 'dunn' ) );

	?></label>
	<input class="<?php

		/**
		 * The dunn_search_field_class filter.
		 *
		 * @var 	string 		The field class.
		 */
		echo apply_filters( 'dunn_search_field_class', 'search-field' );

		?>" id="site-search" name="s" placeholder="<?php

		/**
		 * The dunn_search_form_placeholder filter.
		 *
		 * @var 	string 		The form field placeholder.
		 */
		echo apply_filters( 'dunn_search_form_placeholder', esc_attr_x( 'Search &hellip;', 'placeholder', 'dunn' ) );

	?>" title="<?php

		/**
		 * The dunn_search_form_label filter.
		 *
		 * @var 	string 		The form label.
		 */
		echo apply_filters( 'dunn_search_form_label', esc_attr_x( 'Search for:', 'label', 'dunn' ) );

	?>" type="search" value="<?php

		get_search_query();

	?>"  />
	<button type="submit" class="<?php

		/**
		 * The dunn_search_button_class filter.
		 *
		 * @var 	string 		The button class.
		 */
		echo apply_filters( 'dunn_search_button_class', 'search-submit' );

		?>">
		<span class="screen-reader-text"><?php

			/**
			 * The dunn_search_form_button_text filter.
			 *
			 * @var 	string 		The button text.
			 */
			echo apply_filters( 'dunn_search_form_button_text', esc_attr_x( 'Search', 'submit button', 'dunn' ) );

		?></span>
		<span class="search-icon"><?php dunn_the_svg( 'search', 'hidden-search-icon' ); ?></span>
	</button>
</form>
