<?php

	function sfaq_question_categories(){
		$categories = get_the_category();
		$separator = ' ';
		$output = '';
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {

				$output .= esc_html( $category->slug ) . $separator;

			}
			echo trim( $output, $separator );
		}
	}

	function sfaq_question_categories_array(){
		$categories = get_the_category();
		$array = array();

		if ( ! empty( $categories ) ) {

			foreach( $categories as $category ) {
				array_push($array, $category->slug);
			}

			return json_encode($array);
		}
	}

	 // todos os termos registrados nesse CTP
 	function sfaq_question_terms_array(){

 		$terms = wp_get_post_terms( get_the_ID(), SFAQ_CTP . '_taxonomy' );
 		$array = array();

 		if ( ! empty( $terms ) ) {

 			foreach( $terms as $term ) {
 				array_push($array, $term->slug);
 			}

 			return json_encode($array);
 		}
 	}
 ?>
