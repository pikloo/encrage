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

<main class="overflow-hidden main relative">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <!-- portfolio-title z-[11] md:top-28 text-white before:block before:absolute before:-inset-1 before:skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 inline-block -->
        <div class="flex flex-col justify-between">
            <section class="relative h-[calc(100vh-5rem)] custom-landscape:h-[calc(100vh-5rem)] md:h-[calc(100vh-7rem)] flex flex-col justify-evenly">
                <div class="portfolio-title px-2 md:px-0 w-full justify-center items-center bg-white flex md:z-[11] gap-x-4">
                    <h1 class="p-0"><?php the_title(); ?></h1>
                    <div class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                    <span class="text-sm custom-landscape:text-sm sm:text-lg md:text-xl uppercase relative text-white"><?= esc_attr(get_the_title($photographer)) ?></span></div>
                    <p class="text-gray-500 text-sm custom-landscape:text-sm sm:text-lg md:text-xl relative"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)) ?></p>
                </div>
                <div class="swiper gallery h-[70vh] w-full relative">
                    <div class="swiper-wrapper items-center h-full lg:max-w-screen-lg">
                        <?php foreach ($url_array as $image_url) : ?>
                            <div class="swiper-slide ">
                                <img class="gallery-img h-full object-contain mx-auto" src="<?= $image_url; ?>" alt="" />
                                <div class="swiper-lazy-preloader h-auto swiper-lazy-preloader-white"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next text-gray-500"></div>
                    <div class="swiper-button-prev text-gray-500"></div>
                </div>
                
            </div>
            <ul class="flex justify-center gap-x-4 serie-nav">
                <ul class="flex justify-center gap-x-4 serie-nav">
                    <li>
                        <a href="#serie" aria-current="location" data-serie-anchor-link class="menu-item inline-block w-fit">
                            <h2 class="w-fit font-bold">Série</h2>
                        </a>
                    </li>
                    <li>
                        <a href="#about" aria-current="false" data-about-anchor-link class="menu-item inline-block w-fit">
                            <h2 class="w-fit font-bold">À propos</h2>
                        </a>
                    </li>
                </ul>
            </section>


            <section class="container xl:px-10 mx-auto py-8 md:pt-20" id="about">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 items-center reveal">
                    <article class="px-6 content"><?php the_content(); ?></article>
                    <aside class="px-6 md:order-first">
                        <?php get_template_part('partials/member-informations', 'member-informations', [
                            'is_serie_single_page' => true,
                        ]); ?>
                    </aside>
                </div>
                <svg class="to-top reveal" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
                    <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                        <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
                    </g>
                </svg>
            </section>
        <?php endwhile; ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>