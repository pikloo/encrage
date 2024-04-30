<?php
get_header();
get_template_part('partials/header', 'header');
$photos_query = get_post_meta($post->ID, 'gallery_data', true);
$url_array = $photos_query['image_url'];
$count = sizeof($url_array);

$photographer = get_post_meta($post->ID, 'photographer', true);

$args =  [
    'post_type' => 'serie',
    'posts_per_page' =>  1,
    'post_status' => 'publish',
    'p' =>  $post->ID,

];
$loop = new WP_Query($args);
?>

<main class="overflow-hidden main">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <section class="space-y-4">
            <div class="swiper gallery relative">
                <div class="swiper-wrapper">
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                        <div class="swiper-slide"><img class="gallery-img h-full object-contain mx-auto" src="<?php echo $url_array[$i]; ?>" alt="" /></div>
                    <?php endfor; ?>
                </div>
                <div class="swiper-button-next text-gray-500"></div>
                <div class="swiper-button-prev text-gray-500"></div>
                <div class="absolute z-50 px-10 bottom-[20px] -translate-y-6 text-white before:block before:absolute before:-inset-1 before:skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                    <h3 class="portfolio-title"><?php the_title(); ?></h3><p class="text-gray-500 text-xl text-center relative"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true))?></p>
                </div>
            </div>
            <div thumbsSlider="" class="swiper thumbnails">
                <div class="swiper-wrapper flex">
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                        <div class="swiper-slide"><img class="gallery-img" src="<?php echo $url_array[$i]; ?>" alt="" /></div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
        <section class="container xl:px-10 mx-auto py-10">
            <h2>À propos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 items-center">
                <article class="px-6 text-justify"><?php the_content(); ?></article>
                <aside class="px-6">
                    <?php get_template_part('partials/member-informations', 'member-informations'); ?>
                </aside>
            </div>
        </section>
    <?php endwhile; ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>