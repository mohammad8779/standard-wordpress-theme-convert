<?php
/*
 Template Name: philoshophy books tex query

*/

 $philosophy_tex_query = array(

 		'post_type' => 'book',
 		'posts_per_page' => -1,
 		'tex_query' => array(

 			'relation' => 'AND',
 			
 			array(


 			 'relation' => 'AND',

	 			array(
	 				'taxonomy' => 'language',
	 				'field'  => 'slug',
	 				'terms'   => array('bangla')
	 			),

	 			array(
	 				'taxonomy' => 'language',
	 				'field'    => 'slug',
	 				'terms'    => array('english'),
	 				'operator' => "NOT IN"
	 			)

 			),

 			array(
 				'taxonomy' => 'genre',
 				'field'    => 'slug',
 				'terms'    => array('classic')
 				
 			)
 	   )
 	);

 $philosophy_book_custom_posts = new WP_Query($philosophy_tex_query);

 //echo $philosophy_book_custom_posts->found_posts();

 while($philosophy_book_custom_posts->have_posts()){

 	$philosophy_book_custom_posts->the_post();

 	the_title();

 	echo"<br>";
 }

 wp_reset_query();
