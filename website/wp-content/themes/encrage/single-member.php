<?php
get_header();
get_template_part('partials/header', 'header');
?>
<main class="overflow-hidden pt-36">
    <?php get_template_part('partials/member-informations', 'member-informations'); ?>
    <?php get_template_part('partials/series-list', 'series-list'); ?>
    <?php get_template_part('partials/releases-list', 'releases-list'); ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>