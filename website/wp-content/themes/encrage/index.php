<?php
get_header();
get_template_part('partials/header', 'header');
?>
<main class="overflow-hidden">
    <?php get_template_part('partials/home/slider', 'slider-home'); ?>
    <?php get_template_part('partials/members', 'members'); ?>
    <?php get_template_part('partials/series', 'series'); ?>
</main>
<?php get_footer(); ?>