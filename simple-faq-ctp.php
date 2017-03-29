<?php


	if ( ! function_exists('simple_faq_questions') ) {

	// Register Custom Post Type
	function simple_faq_questions() {

		$labels = array(
			'name'                  => _x( 'Questions', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Question', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Simple FAQ', 'text_domain' ),
			'name_admin_bar'        => __( 'Simple FAQ', 'text_domain' ),
			'archives'              => __( 'Question Archives', 'text_domain' ),
			'attributes'            => __( 'Question Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Question:', 'text_domain' ),
			'all_items'             => __( 'All Questions', 'text_domain' ),
			'add_new_item'          => __( 'Add New Question', 'text_domain' ),
			'add_new'               => __( 'New Question', 'text_domain' ),
			'new_item'              => __( 'New Question', 'text_domain' ),
			'edit_item'             => __( 'Edit Question', 'text_domain' ),
			'update_item'           => __( 'Update Question', 'text_domain' ),
			'view_item'             => __( 'View Question', 'text_domain' ),
			'view_items'            => __( 'View Questions', 'text_domain' ),
			'search_items'          => __( 'Search Question', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into question', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this question', 'text_domain' ),
			'items_list'            => __( 'Questions list', 'text_domain' ),
			'items_list_navigation' => __( 'Questions list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter question list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Question', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 60,
			'menu_icon'             => 'dashicons-editor-help',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( SFAQ_CTP, $args );

	}
	add_action( 'init', 'simple_faq_questions', 0 );

}

// Register Custom Taxonomy
function simple_faq_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( SFAQ_CTP . '_taxonomy', array( SFAQ_CTP ), $args );

}

add_action( 'init', 'simple_faq_taxonomy', 0 );

?>
