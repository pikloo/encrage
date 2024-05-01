<?php

/**
 * Encrage Theme functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package encrage
 */

require_once WP_CONTENT_DIR . '/themes/encrage/inc/cpt-generator.php';

if (!function_exists('theme_encrage_init')) {
    add_action('after_setup_theme', 'theme_encrage_init');
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



if (!function_exists('load_assets')) {
    add_action('wp_enqueue_scripts', 'load_assets');
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
        wp_enqueue_script('bundle', get_theme_file_uri('/build/main.js'), [], '1.0', time());
        wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
        wp_enqueue_script('jquery_last', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', 'jquery', null, true);

        wp_register_script(
            'load-more',
            get_stylesheet_directory_uri() . '/assets/js/load-more.js'
        );
        wp_enqueue_script('load-more');

        wp_localize_script('load-more', 'ajax_posts', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'noposts' => __('No older posts found', 'encrage'),
            'nonce' => wp_create_nonce('load_more_posts'),
            'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
            'post_type' => $wp_query->query_vars['post_type'],
            // 'max_page' => $wp_query->max_num_pages,
        
        ));

        // wp_localize_script('load_more', 'load_more_params', array(
        //     'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
        //     'posts' => json_encode($wp_query->query_vars),
        //     'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        //     'max_page' => $wp_query->max_num_pages,
        //     'nonce' => wp_create_nonce('load_more_nonce')
        // ));
    }
}



if (!function_exists('load_admin_assets')) {
    add_action('admin_enqueue_scripts', 'load_admin_assets');
    /**
     * Chargement des scripts et des styles dans l'admin
     *
     * @return void
     */
    function load_admin_assets()
    {
        if ('serie' === get_current_screen()->id) {
            wp_enqueue_style('gallery', get_theme_file_uri('/src/admin-gallery.css'), [], time());
            wp_enqueue_style('JQueryCss', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/ui-lightness/jquery-ui.min.css');
            wp_enqueue_script('JQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js', [], null, true);
        }
    }
}




function module_support($tag, $handle)
{
    if ($handle === 'JS') {
        if (current_theme_supports('html5', 'script')) {
            return substr_replace($tag, '<script type="module"', strpos($tag, '<script'), 7);
        } else {
            return substr_replace($tag, 'module', strpos($tag, 'text/javascript'), 15);
        }
    }

    return $tag;
}

add_filter('script_loader_tag', 'module_support', PHP_INT_MAX, 2);


if (!function_exists('custom_cpts')) {
    add_action('init', 'custom_cpts');
    /**
     * Création des CPT Membres, Séries et publications
     * 
     * @return void
     */
    function custom_cpts()
    {
        create_post_type('member', 'Membre', 'Membres', 'dashicons-id');
        create_post_type('serie', 'Portfolio', 'Portolios', 'dashicons-portfolio');
        create_post_type('release', 'Publication', 'Publications', 'dashicons-format-quote');
    }
}


if(!function_exists('publication_join_member')) {

	add_filter('posts_join', 'publication_join_member', 10, 2);

	function publication_join_member($join, $wp_query) {
        global $wpdb;
        $post_types = ['serie','release'];

        if( is_home() || is_page() )
			return;
        
		if (isset($wp_query) && in_array($wp_query->query['post_type'], $post_types)){
            $restriction1 = 'photographer';
            return $join .="
            INNER JOIN $wpdb->postmeta AS $restriction1 ON(
            $wpdb->posts.ID = $restriction1.post_id
            AND $restriction1.meta_key = '$restriction1'
            )
            INNER JOIN $wpdb->posts AS cpt_member ON cpt_member.ID = $restriction1.meta_value
            ";
         }
         
         else {
            return $join;
        }
	}

}


if(!function_exists('publication_where_member')) {

	add_filter( 'posts_where', 'publication_where_member', 10, 2 );

	function publication_where_member($where, $wp_query) {
        
        $photographer = $_GET['_photographer'] ?? false;
        $post_types = ['serie','release'];

		//we'll get 404 error on single post
		//we want only list items to affect, disable this feature for single posts:
		if(is_single() || is_home() || !$photographer)
			return $where;

		//always start with AND because we have a default WHERE 1=1 in the query
		//try only fetching posts with comments on them:
        if (isset($wp_query) && in_array($wp_query->query['post_type'], $post_types)){
            return $where.= " AND cpt_member.post_title = '$photographer'";
        }
        else{
            return $where;
        }
	}

}






add_filter('login_url', 'custom_login_url', PHP_INT_MAX);
function custom_login_url($login_url)
{
    return str_replace('wp-login', 'encrage-login', $login_url);
}

require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/member.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/serie.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/release.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/admin/gallery.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/load-more.php';
