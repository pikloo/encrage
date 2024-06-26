<?php

/**
 * Encrage Theme functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package encrage
 */
require_once WP_CONTENT_DIR . '/themes/encrage/inc/admin/custom-admin.php';
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

        wp_enqueue_style('styleCss', get_theme_file_uri('/src/style.css'), [], time());
        wp_enqueue_style('swiperCss', get_theme_file_uri('/build/main.css'), [], time());
        wp_enqueue_script('bundle', get_theme_file_uri('/build/main.js'), [], '1.0', time());
        wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=PT+Serif+Caption:ital@0;1&display=swap');

        wp_register_script(
            'load-more',
            get_stylesheet_directory_uri() . '/assets/js/load-more.js',
            ['jquery']
        );
        if (!is_home())  wp_enqueue_script('load-more');

        wp_localize_script('load-more', 'ajax_posts', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'noposts' => __('No older posts found', 'encrage'),
            'nonce' => wp_create_nonce('load_more_posts'),
            'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
            'post_type' => $wp_query->query_vars['post_type'],
        ));
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
        $pages = ['toplevel_page_encrage_settings_page', 'serie'];

        if (in_array(get_current_screen()->id, $pages)) {
            wp_enqueue_media();
            wp_enqueue_style('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
            wp_enqueue_style('gallery', get_theme_file_uri('/src/admin-gallery.css'), [], time());
            wp_enqueue_style('option-page', get_theme_file_uri('/src/admin-option-page.css'), [], time());
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
        create_post_type('serie', 'Portfolio', 'Portolios', 'dashicons-portfolio', true);
        create_post_type('release', 'Publication', 'Publications', 'dashicons-format-quote', true);
    }
}


if (!function_exists('publication_clause_member')) {
    add_filter('posts_clauses', 'publication_clause_member', 10, 2);

    function publication_clause_member($clauses, $wp_query)
    {
        global $wpdb;

        $photographer = $_GET['_photographer'] ?? false;

        $post_types = ['serie', 'release'];

        if ($photographer && isset( $wp_query->query['post_type'] ) &&  in_array($wp_query->query['post_type'], $post_types)) {
            $clauses['join'] .= <<<SQL
            INNER JOIN {$wpdb->postmeta} AS photographer ON ({$wpdb->posts}.ID=photographer.post_id AND photographer.meta_key = 'photographer')
            INNER JOIN {$wpdb->posts} AS cpt_member ON cpt_member.ID = photographer.meta_value
            SQL;

            $clauses['where'] .= " AND cpt_member.post_title = '$photographer'";
        }
        return $clauses;
    }
}


if (!function_exists('add_categories_to_pages')) {
    function add_categories_to_pages()
    {
        register_taxonomy_for_object_type('category', 'page');
    }
    add_action('init', 'add_categories_to_pages');
}


if (!function_exists('custom_length_excerpt')) {
    add_filter('wp_trim_excerpt', 'custom_length_excerpt', 10, 1);
    function custom_length_excerpt($text)
    {
        if (is_admin()) {
            return $text;
        }
        $text = get_the_content();
        // Clear out shortcodes
        $text = strip_shortcodes($text);
        $text = substr($text, 0, 140);
        $text .= '…';
        return $text;
    }
}

if(!function_exists('pippin_get_image_id')){
    function pippin_get_image_id($image_url) {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
            return $attachment[0]; 
    }
}

require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/member.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/serie.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/post-types/release.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/admin/gallery.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/admin/options-page.php';
require_once WP_CONTENT_DIR . '/themes/encrage/inc/load-more.php';

