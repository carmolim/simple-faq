<?php

	/**
	 * Enqueue scripts and styles.
	 */

	 if ( ! function_exists('sfaq_scripts') ) {

		function sfaq_scripts() {
			wp_enqueue_style( 'sfaq-style', plugin_dir_url( __FILE__ ) . 'assets/sfaq.css', SFAQ_VERSION );
			wp_enqueue_script('sfaq-js', plugin_dir_url( __FILE__ ) . 'assets/sfaq.js', array('jquery'), SFAQ_VERSION, true );
		}

		add_action( 'wp_enqueue_scripts', 'sfaq_scripts' );
	}

 ?>
