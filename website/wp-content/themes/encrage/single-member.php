<?php
get_header();
get_template_part('partials/header', 'header');
$args = array(
    'post_type' => 'release'
);
$releases = new WP_Query( $args );
$has_releases = $releases->found_posts ?? false;
?>
<main class="overflow-hidden pt-36">
    <?php get_template_part('partials/member-informations', 'member-informations'); ?>
    <?php get_template_part('partials/series-list', 'series-list'); ?>
    <?php $has_releases && get_template_part('partials/releases-list', 'releases-list'); ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>