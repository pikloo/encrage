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
$memberID = get_the_ID();

?>
<main class="overflow-hidden pt-36 main">
    <?php get_template_part('partials/member-informations', 'member-informations'); ?>
    <?php get_template_part('partials/series-list', 'series-list'); ?>
    <?php
    if ($has_releases) {
        set_query_var('member_id', $memberID);
        get_template_part('partials/releases-list', 'releases-list');
    } ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>