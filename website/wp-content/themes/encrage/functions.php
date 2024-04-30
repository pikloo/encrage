<?php

/**
 * Encrage Theme functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package encrage
 */

 require_once WP_CONTENT_DIR . '/themes/encrage/inc/cpt-generator.php';

 if (!function_exists('theme_encrage_init')) {
    /**
     * Initialisation de la configuration du thème
     * @return void
     */
    function theme_encrage_init()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
}

add_action('after_setup_theme', 'theme_encrage_init');

if (!function_exists('load_assets')) {

    /**
     * Chargement des scripts et des styles
     *
     * @return void
     */
    function load_assets()
    {
        global $wp_query;
        
        wp_enqueue_style('styleCss', get_theme_file_uri('style.css'), [], time());
        wp_enqueue_style('swiperCss', get_theme_file_uri('/build/main.css'), [], time());
        wp_enqueue_script( 'bundle', get_theme_file_uri('/build/main.js'), [], '1.0', time() );
        wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

        
        wp_register_script( 
            'load_more', 
            get_stylesheet_directory_uri() . '/src/load-more.js' 
        );
        wp_enqueue_script( 'load_more' );
        wp_localize_script( 'load_more', 'load_more_params', array(
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
            'posts' => json_encode( $wp_query->query_vars ),
            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages,
            'nonce' => wp_create_nonce('load_more_nonce')
        ) );
    }
}

add_action('wp_enqueue_scripts', 'load_assets');

if (!function_exists('load_admin_assets')) {
    /**
     * Chargement des scripts et des styles dans l'admin
     *
     * @return void
     */
    function load_admin_assets()
    {
        if ('serie' === get_current_screen()->id) {
            wp_enqueue_style('gallery', get_theme_file_uri('/src/admin-gallery.css') , [], time());
            wp_enqueue_style('JQueryCss', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/ui-lightness/jquery-ui.min.css');
            wp_enqueue_script( 'JQuery','https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js', [], null, true );
        }
    }
}

add_action('admin_enqueue_scripts', 'load_admin_assets');


function module_support( $tag, $handle ) {
    if( $handle === 'JS' ) {
        if( current_theme_supports( 'html5', 'script' ) ) { 
            return substr_replace( $tag, '<script type="module"', strpos( $tag, '<script' ), 7 );
        }
        else {
            return substr_replace( $tag, 'module', strpos( $tag, 'text/javascript' ), 15 );
        }
    }

    return $tag;
}

add_filter( 'script_loader_tag', 'module_support', PHP_INT_MAX, 2 );


if (!function_exists('custom_cpts')) {
    /**
     * Création des CPT Membres, Séries et publications
     * 
     * @return void
     */
    function custom_cpts()
    {
        create_post_type('member','Membre', 'Membres', 'dashicons-id');
        create_post_type('serie','Portfolio', 'Portolios', 'dashicons-portfolio');
        create_post_type('release', 'Publication', 'Publications', 'dashicons-format-quote');
    }
}

add_action('init', 'custom_cpts');




if (!function_exists('add_query_params')) {
   /**
    * Ajout de parametres à la requête pour le filtrage
    *
    * @param WP_Query $query
    * @return void
    */
    function add_query_params($query)
    {
        $post_types = [
              'serie','release'  
        ];
        
        if ($query->is_main_query() && !is_admin()) {
            if (in_array($query->get('post_type'), $post_types)) {
                if (!empty($_GET['_photographer'])) {
                    $orderParam = explode('-', $_GET['_photographer']);
                    $orderBy = $orderParam[0];
                    $order = $orderParam[1];
                    $query->set('orderby', $orderBy);
                    $query->set('order', $order);
                }
            }
        }
    }
}


add_action('pre_get_posts', 'add_query_params');

add_filter( 'login_url', 'custom_login_url', PHP_INT_MAX );
function custom_login_url( $login_url ) {
	return str_replace( 'wp-login', 'encrage-login', $login_url );
}

require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/member.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/serie.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/release.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/admin/gallery.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/load-more.php';
