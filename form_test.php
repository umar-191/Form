<?php
/*
Plugin Name: Form Plugin
Plugin URI: http://formplugin.com
Description: Form
Version: 1.0
Author: Umar
Author URI: http://umar.com
*/



function html_form_code() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Post Title <br />';
    echo '<input type="text" name="cf-title" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-title"] ) ? esc_attr( $_POST["cf-title"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Post Content <br />';
    echo '<input type="text" name="cf-content" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-content"] ) ? esc_attr( $_POST["cf-content"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Post Excerpt <br />';
    echo '<input type="text" name="cf-excerpt" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-excerpt"] ) ? esc_attr( $_POST["cf-excerpt"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Post category <br />';
    echo '<input type="text" name="cf-cat" pattern="[a-zA-Z0-9 ]+" value="'. ( isset( $_POST["cf-cat"] ) ? esc_attr( $_POST["cf-cat"] ) : '' ) .  '" size="40" />';
    echo '</p>';
    echo 'Post Tags <br />';
    echo '<input type="text" name="cf-tags" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-tags"] ) ? esc_attr( $_POST["cf-tags"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Send"/></p>';
    echo '</form>';
}



function add_post(){

    if ( isset( $_POST['cf-submitted'] ) ) {

        $Title    = sanitize_text_field( $_POST["cf-title"] );
        $Content   = sanitize_email( $_POST["cf-content"] );
        $Excerpt = sanitize_text_field( $_POST["cf-excerpt"] );
        $cat = esc_textarea( $_POST["cf-category"] );
        $tags =  sanitize_text_field( $_POST["cf-tags"] );

        $post_data = array(
            'post_title'    => $Title,
            'post_content'  => $Content,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_excerpt'=> $Excerpt,
            'post_tags'=> $tags,
            'post_category' => $cat,
        );

        $post_id = wp_insert_post( wp_slash($post_data) );


    }

}

function cf_shortcode() {
    ob_start();
//    deliver_mail();
    add_post();
    html_form_code();

    return ob_get_clean();
}

add_shortcode( 'my_form', 'cf_shortcode' );



?>