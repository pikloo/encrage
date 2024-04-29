<?php
get_header();
get_template_part('partials/header', 'header');
$photos_query = get_post_meta($post->ID, 'gallery_data', true);
$url_array = $photos_query['image_url'];
$count = sizeof($url_array);
?>

<main class="overflow-hidden">
    <section >
    <div class="swiper gallery">
        <div class="swiper-wrapper">
            <?php for ($i = 0; $i < $count; $i++) : ?>
                <div class="swiper-slide h-[600px]"><img class="gallery-img object-contain h-48" src="<?php echo $url_array[$i]; ?>" alt="" /></div>
            <?php endfor; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
    <div thumbsSlider="" class="swiper thumbnails">
        <div class="swiper-wrapper h-2/6">
            <?php for ($i = 0; $i < $count; $i++) : ?>
                <div class="swiper-slide"><img class="gallery-img" src="<?php echo $url_array[$i]; ?>" alt="" /></div>
            <?php endfor; ?>
        </div>
    </div>
    </section>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>