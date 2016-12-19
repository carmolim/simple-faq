<?php

	function sfaq_filters($atts, $content=null){

		$terms = get_terms( array(
    		'taxonomy' => SFAQ_CTP . '_taxonomy',
		) );

		$html = '';

		$html .= '<div class="sfaq-filters">';
		$html .= '	<input class="sfaq-filters__input" type="text" id="quicksearch" placeholder="Search">';
		$html .= '	<div id="filters" class="sfaq-filters__button-group">';
		$html .= '		<button class="sfaq-filters__button is-checked" data-filter="all">Todos</button>';

		if ( ! empty( $terms ) ) {

			foreach( $terms as $term ) {
				$html .= '		<button class="sfaq-filters__button" data-filter="' . $term->slug .'">' . $term->name .'</button>';
			}
		}

		$html .= '	</div>';
		$html .= '</div>';

		return apply_filters( 'sfaq_filters_html', $html );
	}

	add_shortcode('sfaq_filters', 'sfaq_filters');


	function sfaq_questions($atts, $content=null){

		$html = '';

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

		$html .= '<div class="b-questions">';

		// The Loop
		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				ob_start();
				include 'question-block.php';
				$html .= ob_get_clean();
			}

			/* Restore original Post Data */
			wp_reset_postdata();

		} else {
			// no posts found
		}

		$html .= '</div>';

		return apply_filters( 'sfaq_questions_html', $html );
	}

	add_shortcode('sfaq_questions', 'sfaq_questions');

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
