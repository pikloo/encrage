<?php
get_header();
get_template_part('partials/header', 'header');
$is_home = is_home();
?>
<main class="overflow-hidden main">
    <?php get_template_part('partials/home/slider', 'slider-home'); ?>
    <?php get_template_part('partials/members-list', 'members-list', ['is_home' => is_home()]); ?>
    <?php 
    set_query_var('is_home', $is_home);
    get_template_part('partials/series-list', 'series-list'); ?>
    <?php 
       
       set_query_var('is_home', $is_home);
        get_template_part('partials/releases-list', 'releases-list'); ?>
    <?php get_template_part('partials/blogposts-list', 'blogposts-list'); ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer(); 
?>