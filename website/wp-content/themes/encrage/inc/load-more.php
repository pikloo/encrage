<?php

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback()
{
  //   check_ajax_referer('load_more_posts', 'security');
  $paged = $_POST['page'];
  $post_type = $_POST['post_type'];

  $args = array(

    'post_type' => $post_type,
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => $post_type == 'release' ? 8 : 6,
    'paged' => $paged,
    'orderby' => 'date',
  );

  $query = new WP_Query($args);
  $response = '';
  $max_pages = $query->max_num_pages;

  if ($query->have_posts()) {
    ob_start();
?>
    <?php
    while ($query->have_posts()) {
      $query->the_post();
    ?>
        <?php $response .= get_template_part('partials/' . $post_type . 's/content', 'content'); ?>
    <?php  }
    $output = ob_get_contents();
    ob_end_clean();
    ?>
<?php  } 

else {
  $response = '';
}

$result = [
  'max' => $max_pages,
  'html' => $output,
];

echo json_encode($result);



  wp_die();
}
