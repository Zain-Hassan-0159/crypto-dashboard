<?php 

/**

* Plugin Name: crypto-dashboard 
* Author: Zain Hassan
* Author URI: https://hassanzain.com/
* Version: 1.0.0
* Description: crypto-dashboard Interface
* Text Domain: crypto-dashboard 

*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

register_activation_hook( __FILE__, 'dashboard_index' );
function dashboard_index() {

    $post_id = -1;

    // Setup custom vars
    $author_id = 1;
    $slug = 'crypto-dasboard';
    $title = 'Crypto Dashboard';

    // Check if page exists, if not create it
    if ( null == get_page_by_title( $title )) {

        $uploader_page = array(
            'comment_status'        => 'closed',
            'ping_status'           => 'closed',
            'post_author'           => $author_id,
            'post_name'                     => $slug,
            'post_title'            => $title,
            'post_status'           => 'publish',
            'post_type'                     => 'page'
        );

        $post_id = wp_insert_post( $uploader_page );


        if ( !$post_id ) {

            wp_die( 'Error creating template page' );

        } else {

            update_post_meta( $post_id, '_wp_page_template', 'dashboard.php' );

        }
    } // end check if

}

register_activation_hook( __FILE__, 'login_crypto' );
function login_crypto() {

    $post_id = -1;

    // Setup custom vars
    $author_id = 1;
    $slug = 'crypto-login';
    $title = 'Crypto Login';

    // Check if page exists, if not create it
    if ( null == get_page_by_title( $title )) {

        $uploader_page = array(
            'comment_status'        => 'closed',
            'ping_status'           => 'closed',
            'post_author'           => $author_id,
            'post_name'                     => $slug,
            'post_title'            => $title,
            'post_status'           => 'publish',
            'post_type'                     => 'page'
        );

        $post_id = wp_insert_post( $uploader_page );


        if ( !$post_id ) {

            wp_die( 'Error creating template page' );

        } else {

            update_post_meta( $post_id, '_wp_page_template', 'crypto-login.php' );

        }
    } // end check if

}

register_activation_hook( __FILE__, 'register_crypto' );
function register_crypto() {

    $post_id = -1;

    // Setup custom vars
    $author_id = 1;
    $slug = 'crypto-register';
    $title = 'Crypto Register';

    // Check if page exists, if not create it
    if ( null == get_page_by_title( $title )) {

        $uploader_page = array(
            'comment_status'        => 'closed',
            'ping_status'           => 'closed',
            'post_author'           => $author_id,
            'post_name'                     => $slug,
            'post_title'            => $title,
            'post_status'           => 'publish',
            'post_type'                     => 'page'
        );

        $post_id = wp_insert_post( $uploader_page );


        if ( !$post_id ) {

            wp_die( 'Error creating template page' );

        } else {

            update_post_meta( $post_id, '_wp_page_template', 'crypto-register.php' );

        }
    } // end check if

}

register_activation_hook( __FILE__, 'forget_password' );
function forget_password() {

    $post_id = -1;

    // Setup custom vars
    $author_id = 1;
    $slug = 'crypto-password';
    $title = 'Crypto Password';

    // Check if page exists, if not create it
    if ( null == get_page_by_title( $title )) {

        $uploader_page = array(
            'comment_status'        => 'closed',
            'ping_status'           => 'closed',
            'post_author'           => $author_id,
            'post_name'                     => $slug,
            'post_title'            => $title,
            'post_status'           => 'publish',
            'post_type'                     => 'page'
        );

        $post_id = wp_insert_post( $uploader_page );


        if ( !$post_id ) {

            wp_die( 'Error creating template page' );

        } else {

            update_post_meta( $post_id, '_wp_page_template', 'forget-password.php' );

        }
    } // end check if

}

add_action( 'template_include', 'uploadr_redirect' );
function uploadr_redirect( $template ) {

    $plugindir = dirname( __FILE__ );

    if ( is_page_template( 'dashboard.php' )) {

        $template = $plugindir . '/files/dashboard.php';
    }
    if ( is_page_template( 'crypto-login.php' )) {

        $template = $plugindir . '/files/crypto-login.php';
    }
    if ( is_page_template( 'crypto-register.php' )) {

        $template = $plugindir . '/files/crypto-register.php';
    }
    if ( is_page_template( 'forget-password.php' )) {

        $template = $plugindir . '/files/forget-password.php';
    }

    return $template;

}


register_deactivation_hook( __FILE__, 'deactivate_plugin' );
function deactivate_plugin() {
    wp_delete_post(get_page_by_path('crypto-dasboard')->ID, true);
    wp_delete_post(get_page_by_path('crypto-login')->ID, true);
    wp_delete_post(get_page_by_path('crypto-register')->ID, true);
    wp_delete_post(get_page_by_path('crypto-password')->ID, true);
}


