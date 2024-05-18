<?php
get_header();

$logo_site = get_option('encrage_theme_options')['encrage_logo'];
$logo_site_attachment_id = $logo_site ? pippin_get_image_id($logo_site) : null; 

get_template_part('partials/header', 'header', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
$is_home = is_home();
?>
<main class="overflow-hidden main">
    <?php get_template_part('partials/home/slider', 'slider-home'); ?>
    <?php get_template_part('partials/members-list', 'members-list', ['is_home' => is_home()]); ?>
    
    <?php 
       set_query_var('is_home', $is_home);
        get_template_part('partials/releases-list', 'releases-list'); ?>
        <?php 
    set_query_var('is_home', $is_home);
    get_template_part('partials/series-list', 'series-list'); ?>
    <?php get_template_part('partials/blogposts-list', 'blogposts-list'); ?>
</main>
<?php
get_template_part('partials/footer', 'footer', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
get_footer(); 
?>