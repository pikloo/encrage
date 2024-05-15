<?php
get_header();
get_template_part('partials/header', 'header');
$args = array(
    'post_type' => 'release',
    'orderby' => 'year',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'order' => 'DESC',
);
$args['meta_query'][] = [
    'key' => 'photographer',
    'value' => get_the_ID(),
    'compare' => '='
];
$releases = new WP_Query($args);
$has_releases = $releases->found_posts ?? false;

?>
<main class="overflow-hidden pt-36 main">
    <?php get_template_part('partials/member-informations', 'member-informations', [
        'post_type' => 'member'
    ]); ?>
    <?php  ?>
    <?php
    get_template_part('partials/series-list', 'series-list', [
        'post_type' => 'member'
    ]);
    if ($has_releases) {
        get_template_part('partials/releases-list', 'releases-list', ['post_type' => 'member']);
    } ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>