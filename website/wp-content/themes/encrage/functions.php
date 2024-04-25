<?php

/**
 * Encrage Theme functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package encrage
 */


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
        wp_enqueue_style('styleCss', get_theme_file_uri('style.css'));
        wp_enqueue_script('JS', get_theme_file_uri('index.js'), [], null, true);
        wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
    }
}

add_action('wp_enqueue_scripts', 'load_assets');