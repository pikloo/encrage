<?php
get_header();
$logo_site = get_option('encrage_theme_options')['encrage_logo'];
$logo_site_attachment_id = $logo_site ? pippin_get_image_id($logo_site) : null;

get_template_part('partials/header', 'header', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
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
            <section id="serie" class="relative h-[calc(100dvh-5rem)] custom-landscape:h-[calc(100dvh-5rem)] md:h-[calc(100dvh-7rem)] flex flex-col justify-end md:py-2">
                <div class="flex flex-col justify-between gap-y-3 md:gap-y-6">
                    <div class="portfolio-title fixed bg-white/60 py-4 top-16 custom-landscape:top-16 md:top-28 px-2 md:px-0 w-full justify-center items-center flex z-[11] gap-x-4">
                        <h1 class="p-0 mt-0"><?php the_title(); ?></h1>
                        <div class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                            <span class="text-sm custom-landscape:text-sm sm:text-lg md:text-xl uppercase relative text-white"><?= esc_attr(get_the_title($photographer)) ?></span>
                        </div>
                        <p class="text-gray-500 text-sm custom-landscape:text-sm sm:text-lg md:text-xl relative"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)) ?></p>
                    </div>
                    <div class="swiper gallery lg:mt-4  relative w-full">
                        <div class="swiper-wrapper items-center h-full">
                            <?php foreach ($url_array as $image_url) : ?>
                                <div class="swiper-slide lg:w-fit">
                                    <img class="gallery-img h-[65vh] md:h-[73vh] object-contain mx-auto" src="<?= $image_url; ?>" alt="<?= esc_attr(get_the_title()) ?>" loading="lazy"/>
                                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-next text-gray-500"></div>
                        <div class="swiper-button-prev text-gray-500"></div>
                    </div>
                    <div class="flex justify-between custom-landscape:justify-between md:justify-center px-4 items-start">
                        <button onclick="history.go(-1);" class="back-button uppercase font-bold flex items-center">
                            <svg version="1.1" id="fi_54321" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="791.966px" height="791.967px" viewBox="0 0 791.966 791.967" style="enable-background:new 0 0 791.966 791.967;" fill="currentColor" class="w-3 h-3 custom-landscape:w-3 custom-landscape:h-3 md:h-6 md:w-6" xml:space="preserve">
                                <g>
                                    <g id="_x37_">
                                        <g>
                                            <path d="M245.454,396.017L617.077,56.579c12.973-12.94,12.973-33.934,0-46.874c-12.973-12.94-34.033-12.94-47.006,0
				L174.615,370.896c-6.932,6.899-9.87,16.076-9.408,25.087c-0.462,9.045,2.476,18.188,9.408,25.088l395.456,361.19
				c12.973,12.94,34.033,12.94,47.006,0c12.973-12.939,12.973-33.934,0-46.873L245.454,396.017z"></path>
                                        </g>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <span>Retour</span></button>
                        <ul class="flex justify-center gap-x-4 serie-nav">
                            <li>
                                <a aria-label="Aller à la série photos" href="#serie" aria-current="location" data-serie-anchor-link class="menu-item inline-block w-fit">
                                    <h2 class="w-fit font-bold">Série</h2>
                                </a>
                            </li>
                            <li>
                                <a href="#about" aria-label="Aller à la section à propos" aria-current="false" data-about-anchor-link class="menu-item inline-block w-fit">
                                    <h2 class="w-fit font-bold">À propos</h2>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

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
get_template_part('partials/footer', 'footer', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
get_footer();
?>