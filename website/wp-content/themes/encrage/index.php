<?php
get_header();

$logo_site = isset(get_option('encrage_settings')['encrage_logo']) ? get_option('encrage_settings')['encrage_logo'] : false;
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
<div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xs sm:max-w-md relative animate-popup">
        <button id="closePopup" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-lg font-bold">&times;</button>
        <img src="<?= esc_url(wp_get_upload_dir()['baseurl'] . '/2024/11/WhatsApp-Image-2024-11-09-at-00.51.24.jpeg'); ?>" alt="Popup Image" class="w-full h-auto rounded-lg">
</div>
<?php
get_template_part('partials/footer', 'footer', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
get_footer();
?>