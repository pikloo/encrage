<?php
get_header();
$logo_site = get_option('encrage_theme_options')['encrage_logo'];
$logo_site_attachment_id = $logo_site ? pippin_get_image_id($logo_site) : null; 

get_template_part('partials/header', 'header', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
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
$member_id = get_the_ID();
$releases = new WP_Query($args);
$has_releases = $releases->found_posts ?? false;

?>
<main class="overflow-hidden main">
    <?php get_template_part('partials/member-informations', 'member-informations', [
        'post_type' => 'member'
    ]); ?>
    <?php  ?>
    <?php
    get_template_part('partials/series-list', 'series-list', [
        'post_type' => 'member'
    ]);
    if ($has_releases) {
        get_template_part('partials/releases-list', 'releases-list', [
            'post_type' => 'member',
            'member_id' => $member_id
        ]);
    } ?>
</main>
<?php
get_template_part('partials/footer', 'footer', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
get_footer();
?>