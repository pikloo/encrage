<?php
get_header();
get_template_part('partials/header', 'header');

$args =  [
    'post_type' => 'post',
    'posts_per_page' => 8,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
];


$query = new WP_Query($args);

get_template_part('partials/archive-publication', 'archive-publication', [
    'query' => $query,
    'label' => 'article',
    'slug' => 'post'
]);

?>

<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>