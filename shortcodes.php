<?php

	function sfaq_list_all_questions($atts, $content=null){

		// WP_Query arguments
		$args = array(
		'post_type'              => SFAQ_CTP,
		'order'                  => 'ASC',
		'orderby'                => 'title',
	);

		// The Query
		$the_query = new WP_Query( $args );

		$terms = get_terms( array(
			'taxonomy' => SFAQ_CTP . '_taxonomy',
		) );

		echo '<div class="sfaq">';
		echo '	<head id="b-questions__filter">';
		echo '		<input type="text" id="quicksearch" placeholder="Search">';
		echo '		<div id="filters" class="button-group">';

		echo '			<button class="button is-checked" data-filter="all">Todos</button>';

		if ( ! empty( $terms ) ) {

			foreach( $terms as $term ) {
				echo '			<button class="button" data-filter="' . $term->slug .'">' . $term->name .'</button>';
			}
		}

		echo '		</div>';
		echo '	</head>';
		echo '	<div class="b-questions">';

		// The Loop
		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				include 'question-block.php';
			}

			/* Restore original Post Data */
			wp_reset_postdata();

		} else {
			// no posts found
		}

		echo '	</div>';
		echo '</div>';
	}

	add_shortcode('sfaq_all', 'sfaq_list_all_questions');

 ?>
