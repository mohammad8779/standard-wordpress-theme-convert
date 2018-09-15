<?php

/*
 * Plugin Name: philosophy cpt helper
 * Author: locus
 * Text Domain: philosophy_cpt_helper
 * Domain Path: /languages
 */


//this file is loaded from plugins directory as a zip file but unzip file is also here to understand those zip codes


function cptui_register_my_cpts_book() {

	/**
	 * Post Type: Books.
	 */

	$labels = array(
		"name" => __( "Books", "philosophy" ),
		"singular_name" => __( "Book", "philosophy" ),
		"menu_name" => __( "Books", "philosophy" ),
		"all_items" => __( "My all books", "philosophy" ),
		"add_new" => __( "Add new book", "philosophy" ),
		"not_found" => __( "Off no book found", "philosophy" ),
		"featured_image" => __( "Cover image for this book", "philosophy" ),
		"set_featured_image" => __( "Cover image for this book", "philosophy" ),
	);

	$args = array(
		"label" => __( "Books", "philosophy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "book", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "book", $args );
}

add_action( 'init', 'cptui_register_my_cpts_book' );






