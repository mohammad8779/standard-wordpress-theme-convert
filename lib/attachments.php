<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );
function philosophy_gallery_post_attachments($attachments){
	$post_id = null;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ( ! $post_id || get_post_format( $post_id ) != "gallery" ) {
        return;
    }

	$fields = array(
		array(
			'name'  => 'title',
			'type'  => 'text',
			'label' => __('Title','philosophy')
		)
	);

	$args = array(

		'label'       => 'Gllery',
		'post_type'   => array('post'),
		'file_type'   => array("image"),
		'note'       => 'Add Gallery Image',
		'button_text' => __('Attach Files','philosophy'),
		'fields'      => $fields
     );

	$attachments->register('gallery', $args);

	
}
add_action("attachments_register","philosophy_gallery_post_attachments");


