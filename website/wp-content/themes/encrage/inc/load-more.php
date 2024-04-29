<?php

add_action('wp_ajax_load_more', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'load_more_posts');

function load_more_posts() {

    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'load_more_nonce')) {
        exit;
    }

    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $post_type = $args['post_type'];

    query_posts( $args );

    if (have_posts()):

        while (have_posts()) : the_post();

            if($post_type === 'serie') {
                get_template_part('partials/series/content', 'series-content');
            }
            elseif($post_type === 'publication'){
                    
            }

            //... etc etc
      
            else {
                //do nothing
            }

        endwhile;

    endif;

    die;
}