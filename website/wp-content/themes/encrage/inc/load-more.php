<?php

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback(){
//   check_ajax_referer('load_more_posts', 'security');
  $paged= $_POST['page'];
  $post_type = $_POST['post_type'];

  $args = array(

    'post_type' => $post_type,
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => 6,
    'paged' =>$paged,
    'meta_key' => 'year',
    'orderby' => 'meta_value_num',
  );

  $query = new WP_Query($args);    

  if ($query-> have_posts()) { ?>

    <?php
      while($query-> have_posts()){
        $query-> the_post();
         ?>
        <?php  get_template_part('partials/'. $post_type .'s/content', 'content'); ?>
    <?php  }
    ?>
<?php  }

wp_die();
}

