<?php

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');

require_once( get_theme_file_path("/lib/csf/cs-framework.php") );
require_once( get_theme_file_path("/inc/cs.php") );
require_once get_theme_file_path("/inc/tgm.php");
require_once get_theme_file_path("widgets/social-icons-widget.php");
require_once get_theme_file_path("/inc/cmb2-attached-posts.php");
if(class_exists('Attachments')){
    require_once get_theme_file_path("/lib/attachments.php");
}

if(site_url() == "http://localhost/first-wptheme"){
    define("VERSION",time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}

function philosophy_default_function(){

	load_theme_textdomain("philosophy");
	add_theme_support("title-tag");
	add_theme_support("post-thumbnails");
	add_theme_support("post-formats", array("video","image","audio","quote","gallery","link","status","aside","chat"));
    add_theme_support("html5",array("search-form"));
    add_theme_support( "custom-logo" );
	add_editor_style("/assets/css/editor-style.css");
    register_nav_menu("philosophy_tommenu", __("Philosophy Top Menu","philosophy"));
    register_nav_menus(array(
        'footer_left' => __("Footer Left Menu","philoshophy"),
        'footer_middle' => __("Footer Middle Menu","philoshophy"),
        'footer_right' => __("Footer Right Menu","philoshophy"),
    ));
    add_image_size("philosophy-home-square",400,400,true);

}
add_action("after_setup_theme","philosophy_default_function");

function philosophy_assets() {
    wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.css" ), null, "1.0" );
    wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.0" );
    wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
    wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
    wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
    wp_enqueue_style( "philosophy-css", get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
    wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
    wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), "1.0", true );
}

add_action( "wp_enqueue_scripts", "philosophy_assets" );



function philosophy_pagination(){
     global $wp_query;
     $links = paginate_links( array( 
         'current'  => max(1, get_query_var('paged')),
         'total'    => $wp_query->max_num_pages,
         'type'     => 'list',
         'mid_size' => apply_filters("philosophy_pagination_mid_size", 3)
      ));
    $links = str_replace("page-numbers","pgn__num",$links );
    $links = str_replace("<ul class='pgn__num'>","<ul>",$links );
    $links = str_replace("next pgn__num","pgn__next",$links );
     $links = str_replace("prev pgn__num","pgn__prev",$links );
    echo $links;

}

remove_action("term_description","wpautp");

function philosophy_sidebar() {
    register_sidebar( array(
        'name'          => __( 'About Us', 'philosophy' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on about us page', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Google Maps', 'philosophy' ),
        'id'            => 'google-map',
        'description'   => __( 'Widgets in this area will be shown on contact page', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="map-wrap %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Info Section', 'philosophy' ),
        'id'            => 'contact-info',
        'description'   => __( 'Widgets in this area will be shown on contact page', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Before Footer Right Section', 'philosophy' ),
        'id'            => 'before-footer-right',
        'description'   => __( 'Before Footer Right Section Text', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Section', 'philosophy' ),
        'id'            => 'footer-sectio',
        'description'   => __( 'Footer Section Newslatter Text', 'philosophy' ),
        'before_widget' => '<p>',
        'after_widget'  => '</p>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Bottom', 'philosophy' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'Footer Bottom CopyRight  Text', 'philosophy' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Header Section', 'philosophy' ),
        'id'            => 'social-links',
        'description'   => __( 'Widgets in this area will be shown on header top', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class=" %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}

add_action( 'widgets_init', 'philosophy_sidebar' );


function philosophy_search_form($form) {
    $homedir      = home_url( "/" );
    $label        = __( "Search for:", "philosophy" );
    $button_label = __( "Search", "philosophy" );

     $post_type    = <<<PT
<input type="hidden" name="post_type" value="post">
PT;

    if ( is_post_type_archive( 'book' ) ) {
        $post_type = <<<PT
<input type="hidden" name="post_type" value="book">
PT;
    }

   
   

    $newform      = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$homedir}">
    <label>
        <span class="hide-content">{$label}</span>
        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
               title="{$label}" autocomplete="off">
    </label>
    {$post_type}
    <input type="submit" class="search-submit" value="{$button_label}">
    
</form>
FORM;

    return $newform;

}

add_filter( "get_search_form", "philosophy_search_form" );

//custom action hooks practices
function philoshophy_custom_before_hooks1(){
    echo "<p> Hook test of before title 1.</p>";
}
add_action("philoshophy_before_title","philoshophy_custom_before_hooks1");

function philoshophy_custom_before_hooks2(){
    echo "<p> Hook test of before title 2.</p>";
}
add_action("philoshophy_before_title","philoshophy_custom_before_hooks2",9);

function philoshophy_custom_before_hooks3(){
    echo "<p> Hook test of before title 3.</p>";
}
add_action("philoshophy_before_title","philoshophy_custom_before_hooks3",8);

remove_action("philoshophy_before_title","philoshophy_custom_before_hooks2",9);
remove_action("philoshophy_before_title","philoshophy_custom_before_hooks3",8);


function philoshophy_custom_after_hooks(){
    echo "<p> Hook test of after title.</p>";
}
add_action("philoshophy_after_title","philoshophy_custom_after_hooks");

function philoshophy_custom_before_des(){
    echo "<p> Hook test of before description.</p>";
}
add_action("philoshophy_before_description","philoshophy_custom_before_des");

function philoshophy_custom_after_des(){
    echo "<p> Hook test of after description.</p>";
}
add_action("philoshophy_after_description","philoshophy_custom_after_des");

function philosophy_custom_hooks_for_parametter( $category_title ){

    if("test" == $category_title){

        $visit_count = get_option("category_test");
        $visit_count =  $visit_count?$visit_count:0;
        $visit_count++;
        update_option("category_test",$visit_count);
    }

}

add_action("philoshophy_category_page","philosophy_custom_hooks_for_parametter");

//custom filter hooks
function philosophy_test_filter($text){
    echo strtoupper($text);
}
add_filter("philoshophy_text_filter","philosophy_test_filter");

// apply filter
function pagination_mid_size($size){
  return 3;
}
add_filter("philosophy_pagination_mid_size","pagination_mid_size");
//apply filter
function philosophy_home_banner_class($class_name){
    if(is_home()){
        return $class_name;
    }
    else{
        return "";
    };
}

add_filter("philosophy_home_banner_class","philosophy_home_banner_class");

//apply filter for many param
function uppercase_words($param1,$param2,$param3){
    return ucwords( $param1 )." ".strtoupper( $param2 )." ".ucwords( $param3 );
}

add_filter("philoshophy_text_filter","uppercase_words",10,3);


//for relational post type url change

function philosophy_cpt_slug_url_fix($post_link,$id){

    $p = get_post($id);
    if(is_object($p) && 'chapter' == get_post_type($id)){

        $parent_post_id = get_field('parent_book');
        $parent_post    = get_post($parent_post_id);

        if($parent_post){
            $post_link = str_replace("%book%",$parent_post->post_name,$post_link);
        }
    }
    return $post_link;
}
add_filter("post_type_link","philosophy_cpt_slug_url_fix",1,2);

//custom filter for language texonomy info

function philoshophy_footer_tag_languages_heading( $title ){

    if(is_post_type_archive( 'book' ) || is_tax('language') ){

        $title = __("Language","philosophy");
    }
    return $title;

}

add_filter('philoshophy_footer_tag_heading','philoshophy_footer_tag_languages_heading');


function philoshophy_footer_tag_languages_terms($tags){

    if(is_post_type_archive( 'book' ) || is_tax('language') ){

        $tags = get_terms( array(

            'taxonomy' => 'language',
            'hide_empty' => false
        ));
    }
    return $tags;

}

add_filter('philoshophy_footer_tag_items','philoshophy_footer_tag_languages_terms');




