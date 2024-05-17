<?php
get_header();
get_template_part('partials/header', 'header');

$args =  [
    'post_type' => 'release',
    'posts_per_page' => 8,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
];

$query = new WP_Query($args);

$membersArgs =  [
    'post_type' => 'member',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'ASC',
    'orderby' => 'title',

];
$photographers = new WP_Query($membersArgs);


get_template_part('partials/archive-publication', 'archive-publication', [
    'query' => $query,
    'photographers' => $photographers,
    'label' => 'publication',
    'slug' => 'releases'
]);

?>

<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>