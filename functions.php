<?php

   if(site_url()=="http://localhost/satkora")
    {
        define("VERSION", time());
    }
    else{
        define("VERSION",wp_get_theme()->get("Version"));
    }

function philosophy_theme_setup()
{

    load_theme_textdomain("philosophy1");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support('html5', array('search-form','comment-list'));
    add_theme_support("post-formates", array("image","gallary","quote","audio","video"));
    add_editor_style("/assets/css/editor-style.css");

    register_nav_menu("topmenu",__("Top Menu","philosophy"));

}

add_action("after_setup_theme", "philosophy_theme_setup");

function philosophy_assets()
{
	wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.css" ), null, "1.0" );
	wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.0" );
	wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
	wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
	wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
	wp_enqueue_style( "philosophy1-css", get_stylesheet_uri(), null, VERSION );

	wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
	wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
	wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), "1.0", true );
    
}

add_action( "wp_enqueue_scripts", "philosophy_assets" );

function philosophy_menu_item_class( $classes, $item, $args ) {

    if ( 'topmenu' === $args->theme_location ) {
        $contains = (bool) preg_match('/class="[^"]*\bmenu-item-has-children\b[^"]*"/', $html);
        if(!$contains)
        {
            $classes[] = 'has-children';
        }
    }

    return $classes;
}
add_action( 'nav_menu_css_class', 'philosophy_menu_item_class', 10, 3 );




















