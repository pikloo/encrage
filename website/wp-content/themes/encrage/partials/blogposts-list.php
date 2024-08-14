<?php
$args =  [
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
];

$wp_query = new WP_Query($args);
?>
<?php if ($wp_query->have_posts()) : ?>
    <section class="container mx-auto p-4 custom-landscape:p-4 md:p-10 h-fit reveal">
        <h2 class="section">nos actus</h2>
        <div class="swiper blogpost-carousel lg:max-w-screen-lg">
            <div class="swiper-wrapper h-fit">

                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <div class="swiper-slide py-4">
                        <div loading="lazy">
                            <header class="pl-10 mb-8 text-xl uppercase">
                                <h3 class="blog-post-title"><?= the_title(); ?></h3>
                                <span class="inline-block text-gray-500"><?php the_date('F Y'); ?></span>
                            </header>
                            <main class="grid grid-cols-1 lg:grid-cols-2 items-center justify-center justify-items-center px-14 gap-y-4 lg:gap-y-0 w-full mx-auto">
                                <aside class="max-w-sm">
                                    <?php if (has_post_thumbnail(get_the_ID())) : ?>
                                        <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) ?>" alt="<?= the_title(); ?>" class="cover-contain" />
                                    <?php else : ?>
                                        <img src="<?= get_template_directory_uri() . '/assets/images/default_member.png' ?>" alt="<?= the_title(); ?>" class="cover-contain" />
                                    <?php endif; ?>
                                </aside>
                                <article class="max-w-sm">
                                    <div class="text-justify text-md custom-landscape:text-md lg:text-xl"><?= the_excerpt(); ?></div>
                                </article>
                            </main>
                            <div class="mt-4 flex items-center">
                                <a class="button" href="<?= esc_url(get_permalink()); ?>" aria-label="Lire la suite de <?= the_title(); ?> ">lire la suite</a>
                            </div>
                        </div>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    </div>
                <?php endwhile; ?>

            </div>
            <div class="swiper-button-next text-gray-500"></div>
            <div class="swiper-button-prev text-gray-500"></div>
        </div>
        <svg class="to-top reveal" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
    </section>
<?php endif; ?>