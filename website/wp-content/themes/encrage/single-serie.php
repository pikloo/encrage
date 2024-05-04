<?php
get_header();
get_template_part('partials/header', 'header');
$photos_query = get_post_meta($post->ID, 'gallery_data', true);
$url_array = $photos_query['image_url'];

$photographer = get_post_meta($post->ID, 'photographer', true);

$args =  [
    'post_type' => 'serie',
    'posts_per_page' =>  1,
    'post_status' => 'publish',
    'p' =>  $post->ID,

];
$loop = new WP_Query($args);
?>

<main class="overflow-hidden main relative pt-20 md:pt-0">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="portfolio-title z-[11] md:top-28 text-white before:block before:absolute before:-inset-1 before:skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 inline-block">
            <h1><?php the_title(); ?></h1>
            <p class="text-gray-500 text-xl ml-2 relative"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)) ?></p>
        </div>
        <section class="space-y-4 h-[calc(100vh-40px)]">
            <div class="swiper gallery relative">
                <div class="swiper-wrapper">
                    <?php foreach ($url_array as $image_url) : ?>
                        <div class="swiper-slide"><img class="gallery-img h-full object-contain mx-auto" src="<?= $image_url; ?>" alt="" /></div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next text-gray-500"></div>
                <div class="swiper-button-prev text-gray-500"></div>
            </div>
            <div thumbsSlider="" class="swiper thumbnails">
                <div class="swiper-wrapper flex">
                    <?php foreach ($url_array as $image_url) : ?>
                        <div class="swiper-slide"><img class="gallery-img" src="<?= $image_url; ?>" alt="" /></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="container xl:px-10 mx-auto py-10">
            <h2 class="section">À propos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 items-center">
                <article class="px-6 content"><?php the_content(); ?></article>
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