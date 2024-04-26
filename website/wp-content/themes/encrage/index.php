<?php
get_header();
get_template_part('partials/header', 'header');
?>
<main class="overflow-hidden">
    <?php get_template_part('partials/home/slider', 'slider-home'); ?>
    <?php get_template_part('partials/members-list', 'members-list'); ?>
    <?php get_template_part('partials/series-list', 'series-list'); ?>
    <?php get_template_part('partials/releases-list', 'releases-list'); ?>
    <?php get_template_part('partials/blogposts-list', 'blogposts-list'); ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer(); 
?>