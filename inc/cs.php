<?php

define( 'CS_ACTIVE_FRAMEWORK',   true ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    true ); // default true
define( 'CS_ACTIVE_SHORTCODE',   true ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true

define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

function philosophy_csf_metabox(){

	 CSFramework_Metabox::instance( array() );
	 CSFramework_Shortcode_Manager::instance( array() );
	 CSFramework_Taxonomy::instance( array() );
	 
}

add_action('init','philosophy_csf_metabox');

//taxonomy metabox by csf

function philosophy_taxonomy_language_featured_image_by_csf($options){

	$options[] =  array(
		  'id'        => 'language_featured_image',
		  'taxonomy' => 'language', // or array( 'category', 'post_tag' )

		  // begin: fields
		  'fields'    => array(

		    // begin: a field
		    array(
		      'id'    => 'featured_image',
		      'type'  => 'image',
		      'title' => __('Add Featured Image','philosophy'),
		    ),
		    

		  ), 
		);

	return $options;

}
add_filter('cs_taxonomy_options','philosophy_taxonomy_language_featured_image_by_csf');



function philosophy_page_metabox(){

	$page_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta($page_id,'_wp_page_template',true);
    
    if(!in_array($current_page_template,array('about-us.php','contact.php'))){

    	return $options;
    }

    $options[] = array(

			'id'        => 'page-metabox',
			'title'     => __('Page Meta Info','philosophy'),
			'post_type' =>'page',
			'context'   => 'normal',
			'priority'  => 'default',
            'sections'  => array(

				 array(

				 	'name'   => 'page-section1',
				 	'title'  => __('Page Settings','philosophy'),
				 	'icon'   => 'fa fa-image',
				 	'fields' =>array(

				 		  array(

				 		  	'id'      => 'page-heading',
				 		  	'type'    => 'text',
				 		  	'title'   => __('Page Heading','philosophy'),
				 		  	'default' => __('Page Heading','philosophy')
				 		  ),

				 		  array(

				 		   	'id'      => 'page-teaser',
				 		  	'type'    => 'textarea',
				 		  	'title'   => __('Teaser Page','philosophy'),
				 		  	'default' => __('Teaser Page','philosophy')
				 		  ),

			 		   	 array(

	                        'id'      => 'is-favorite',
				 		  	'type'    => 'switcher',
				 		  	'title'   => __('Is Favorite','philosophy'),
				 		  	'default' => 1
			 		     ),

			 		     array(

	                        'id'      => 'is-favorite-extra',
				 		  	'type'    => 'switcher',
				 		  	'title'   => __('Extra Favorite','philosophy'),
				 		  	'default' => 1
			 		     ),

			 		     array(

				 		   	'id'      => 'is-favorite-text',
				 		  	'type'    => 'text',
				 		  	'title'   => __('Favorite Text','philosophy'),
				 		  	'dependency' => array('is-favorite|is-favorite-extra','==|==','1|1')
				 		  ),

			 		     array(

			 		     		'id'      =>'support-language',
			 		     		'type'    =>'checkbox',
			 		     		'title'   =>__('Languages','philosophy'),
			 		     		'options' =>array(

			 		     			 'bangla'  => 'Bangla',
			 		     			 'english' => 'English',
			 		     			 'french'  => 'French'
			 		     		),

			 		     		'attributes'=> array(

			 		     		  'data-depend-id' => 'support-language'
			 		         )

			 		     ),

			 		     

			 		      array(

				 		   	'id'      => 'extra-support-language',
				 		  	'type'    => 'text',
				 		  	'title'   => __('Extra Language','philosophy'),
				 		  	//'dependency' => array('support-language_bangla|support-language_english','==|==','1|1')
				 		  	'dependency' => array('support-language','any','bangla,english')
				 		  ),

				 	)

				 ),

				  array(

				 	'name'   => 'page-section2',
				 	'title'  => __('Page Settings2','philosophy'),
				 	'icon'   => 'fa fa-book',
				 	'fields' =>array(

				 		  array(

				 		  	'id'      => 'page-heading2',
				 		  	'type'    => 'text',
				 		  	'title'   => __('Page Heading2','philosophy'),
				 		  	'default' => __('Page Heading2','philosophy')
				 		  ),

				 		  array(

				 		   	'id'      => 'page-teaser2',
				 		  	'type'    => 'textarea',
				 		  	'title'   => __('Teaser Page2','philosophy'),
				 		  	'default' => __('Teaser Page2','philosophy')
				 		  ),

			 		   	 array(

	                        'id'      => 'is-favorite2',
				 		  	'type'    => 'switcher',
				 		  	'title'   => __('Is Favorite2','philosophy'),
				 		  	'default' => 1
			 		  )

				 	)

				 )
			)

	);

	return $options;
}


add_filter('cs_metabox_options','philosophy_page_metabox');



function philosophy_upload_metabox($options){


	$options[] = array(

			'id'        => 'page-upload-metabox',
			'title'     => __('Upload Files','philosophy'),
			'post_type' =>'page',
			'context'   => 'normal',
			'priority'  => 'default',
            'sections'  => array(

				 array(

				 	'name'   => 'page-section1',
				 	'title'  => __('Upload Files','philosophy'),
				 	'icon'   => 'fa fa-image',
				 	'fields' =>array(

				 		  array(

				 		  	'id'      => 'page-upload',
				 		  	'type'    => 'upload',
				 		  	'title'   => __('PDF Upload','philosophy'),
				 		  	'settings' => array(

				 		  		'upload_type'   => 'application/pdf',
				 		  		'button_title'  => __('Upload','philosophy'),
				 		  		'frame_title'   => __('Select a PDF','philosophy'),
				 		  		'insert_title'  => __('use this PDF','philosophy'),


				 		  	),
				 		  ),

				 		  array(

				 		   	'id'      => 'page-image',
				 		  	'type'    => 'image',
				 		  	'title'   => __('Upload Image','philosophy'),
				 		  	'add_title' => __('Add An Image','philosophy')
				 		  	
				 		  ),

				 		   array(
                              'id'          => 'page-gallery',
							  'type'        => 'gallery',
							  'title'       => 'Page Gallery Images',
							  'add_title'   => 'Add Images',
							  'edit_title'  => 'Edit Images',
							  'clear_title' => 'Remove Images',

				 		  ),


				 		   	array(
								  'id'              => 'unique_option_901',
								  'type'            => 'group',
								  'title'           => 'Group Field',
								  'button_title'    => 'Add New',
								  'accordion_title' => 'Add New Field',
								  'fields'          => array(
								    array(
								      'id'    => 'featured_posts',
								      'type'  => 'select',
								      'title' => 'Select a book',
								      'options'        => 'posts',
									  'query_args'     => array(
									  	'post_type'    => 'book',
									  	'posts_per_page' =>-1,
									    'orderby'      => 'post_date',
									    'order'        => 'DESC',
									  ),
																	    ),
								   
								   
								  ),
							),

				 	 ),

				


				 ),

			)

	);

	return $options;


}

add_filter('cs_metabox_options','philosophy_upload_metabox');

//for conditinally field show of custom post

function philosophy_custom_post_types( $options ) {

    $page_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }


    $options[] = array(
        'id'        => 'page-custom_post_type',
        'title'     => __( 'Select Post Type', 'philosophy' ),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'page-section1',
//                'title'  => __( 'Post Type', 'philosophy' ),
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'cpt_type',
                        'type'    => 'select',
                        'title'   => 'select a custom post type',
                        'options' => array(
                            'none'    => 'None',
                            'book'    => 'Book',
                            'chapter' => 'Chapter'
                        )
                    ),
                )
            )
        )
    );

    $page_meta_info = get_post_meta( $page_id, 'page-custom_post_type', true );

    if ( isset( $page_meta_info['cpt_type'] ) && $page_meta_info['cpt_type'] == 'book' ) {
        $options[] = array(
            'id'        => 'page-custom_post_type_book',
            'title'     => __( 'Options For Book', 'philosophy' ),
            'post_type' => 'page',
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => array(
                array(
                    'name'   => 'page-section1',
//                'title'  => __( 'Post Type', 'philosophy' ),
                    'icon'   => 'fa fa-image',
                    'fields' => array(
                        array(
                            'id'    => 'option_book_text',
                            'type'  => 'text',
                            'title' => 'Some Book Info',
                        ),
                    )
                )
            )
        );
    }

    if ( isset( $page_meta_info['cpt_type'] ) && $page_meta_info['cpt_type'] == 'chapter' ) {
        $options[] = array(
            'id'        => 'page-custom_post_type_chapter',
            'title'     => __( 'Options For Chapter', 'philosophy' ),
            'post_type' => 'page',
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => array(
                array(
                    'name'   => 'page-section1',
//                'title'  => __( 'Post Type', 'philosophy' ),
                    'icon'   => 'fa fa-image',
                    'fields' => array(
                        array(
                            'id'    => 'option_chapter_text',
                            'type'  => 'text',
                            'title' => 'Some chapter Info',
                        ),
                    )
                )
            )
        );
    }

    return $options;
}

add_filter( 'cs_metabox_options', 'philosophy_custom_post_types' );

//shortcode form for admin panel by CSF

function philosophy_csf_gmap_shortcode($options){


	$options[]     = array(

			  'name'          => 'group_1',
			  'title'         => 'Group #1',
			  'shortcodes'    => array(

			    array(
			      'name'      => 'gmap',
			      'title'     => 'Goggle Map',
			      'fields'    => array(
			        array(
			          'id'    => 'place',
			          'type'  => 'text',
			          'title' => 'Place',
			          'help'  => 'Enter Your Place',
			          'default' => 'Mirpur DOHS'
			        ),
			        array(
			          'id'    => 'width',
			          'type'  => 'text',
			          'title' => 'Width',
			          'default' => '100%'
			        ),
			        array(
			          'id'    => 'height',
			          'type'  => 'text',
			          'title' => 'Height',
			          'default' => '100%'
			        ),
			        array(
			          'id'    => 'zoom',
			          'type'  => 'text',
			          'title' => 'Zoom',
			          'default' => 14
			        ),
			      ),
			    ),

		  )
		);

	return $options ;

}
add_filter('cs_shortcode_options','philosophy_csf_gmap_shortcode');


//theme options by csf

function philosophy_theme_option_init(){

	// Top level Menu
	$settings           = array(
	  'menu_title'      => __('Philosophy Options','philosophy'),
	  'framework_title' => __('Philosophy Options','philosophy'),
	  'menu_type'       => 'submenu', // menu, submenu, options, theme, etc.
	  'menu_parent'     => 'themes.php',
	  'menu_slug'       => 'philosophy_options_panel',
	  'menu_icon'       => 'dashicons-dashboard',
	  'menu_position'   => 20,
	  'ajax_save'       => false,
	  'show_reset_all'  => false
	  
	);

    $options = philosophy_theme_options();
	new CSFramework( $settings,$options);
}
add_action('init','philosophy_theme_option_init');

function philosophy_theme_options(){

		
		  $options      = array(); // remove old options

		  $options[]    = array(
		    'name'      => 'footer_options',
		    'title'     => __('Footer Options','philosophy'),
		    'icon'      => 'fa fa-edit',
		    'fields'    => array(
		      array(
		        'id'    => 'footer_tag',
		        'type'  => 'switcher',
		        'title' => __('Do you want to show Tags Area?','philosophy'),
		      ),

		       array(
		        'id'    => 'social_facebook',
		        'type'  => 'text',
		        'title' => __('Facebook URL','philosophy'),
		      ),

		       array(
		        'id'    => 'social_twitter',
		        'type'  => 'text',
		        'title' => __('Twitter URL','philosophy'),
		      ),

		       array(
		        'id'    => 'social_youtube',
		        'type'  => 'text',
		        'title' => __('Youtube Video URL','philosophy'),
		      ),
		     
		    )
		  );


	//this below section for another group field post metabox example of csf without theme options panel
    
    $options[] = array(

        'name'   => 'group_section',
        'title'  => __('Group Section','philosophy'),
        'icon'   => 'fa fa-heart',
        'fields' => array(

        	array(
        	'id'              => 'group_field',
            'type'            => 'group',
            'title'           => __( 'Group Field', 'philosophy' ),
            'button_title'    => __( 'Add New', 'philosophy' ),
            'accordion_title' => __( 'Add New Data', 'philosophy' ),
            'fields'=> array(

            	array(
                        'id'    => 'text_data',
                        'type'  => 'text',
                        'title' => __( 'Some Text', 'philosophy' ),
                    ),
                    array(
                        'id'         => 'select_data',
                        'type'       => 'select',
                        'title'      => __( 'Select Book', 'philosophy' ),
                        'options'    => 'post',
                        'query_args' => array(
                            'posts_per_page' => - 1,
                            'post_type'      => 'book'
                        )
                    ),
                    array(
                        'id'    => 'image_data',
                        'type'  => 'image',
                        'title' => __( 'Upload Image', 'philosophy' ),
                    ),

            )

          )

        )


    ); 

    
	
	return $options; 

}

add_filter('cs_framework_options','philosophy_theme_options');


//this below section for another group field post metabox example of csf without theme options panel

function philosophy_metabox_group_fields_demo( $options ){

	$options[] = array(

		'id'        => 'post_group_data',
        'title'     => __( 'Group Data Demo', 'philosophy' ),
        'post_type' => 'post',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(

        	array(

        		'name'   => 'group_section',
        		'icon'   => 'fa fa-image',
        		'fields' => array(

        			array(
            			
            			'id'    =>'group_field',
            			'title' =>__('Group','philosophy'),
            			'type'  =>'group',
            			'button_title'=>__('Add New','philosophy'),
            			'accordion_title'=>__('Add New Data','philosophy'),
            			'fields' => array(

            				array(

            					'id'=>'text_data',
            					'type'=>'text',
            					'title'=>__('Some Text','philosophy'),
            				),

            				array(

            					'id'=>'select_data',
            					'type'=>'select',
            					'title'=>__('Select Book','philosophy'),
            					'options'=>'post',
            					'query_args'=> array(

            						'posts_per_page' => -1,
            						'post_type'       => 'book'
            					)
            				),



            				array(

            					'id'=>'image_data',
            					'type'=>'image',
            					'title'=>__('Upload Image','philosophy'),
            				)

            			)

        			)

        		)

        	)

        )
	);

	return $options;

}
add_filter('cs_metabox_options','philosophy_metabox_group_fields_demo');


