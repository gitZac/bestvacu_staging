<?php
/*This file is part of wp-bootstrap-child, wp-bootstrap-4 child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function wp_bootstrap_child_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );


	}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_child_enqueue_child_styles' );


function wp_bootstrap_child_enqueue_child_scripts() {

	wp_enqueue_script( 'navbar-scroll', get_stylesheet_directory_uri() . '/js/navbarscroll.js', array( 'jquery' ), '1.0', true );

}

add_action('wp_enqueue_scripts', 'wp_bootstrap_child_enqueue_child_scripts');


add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

/*Write here your own functions */
