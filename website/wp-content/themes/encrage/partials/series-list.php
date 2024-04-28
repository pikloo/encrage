<?php
$is_home_page = is_front_page() && is_home();
$is_member_page = 'member' == get_post_type();
$memberID = $is_member_page ? get_the_ID() :  null;

$args =  [
    'post_type' => 'serie',
    'orderby' => 'year',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'order' => 'DESC',
];

if ($memberID) {
    $args['meta_query'][] = [
        'key' => 'photographer',
        'value' => $memberID,
        'compare' => '='
    ];
}
$series = new WP_Query($args);
?>

<section class="container mx-auto py-10 xl:px-10">
    <h2>Séries</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        <?php while ($series->have_posts()) : $series->the_post(); ?>
            <figure class="relative group xl:overflow-hidden">
                <img class="w-full h-72  object-cover" src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')) ?>" alt="<?= the_title(); ?>" />
                <figcaption class="xl:hidden xl:absolute xl:group-hover:block xl:bottom-0 xl:text-white xl:group-hover:animate-slideInUp">
                    <div class="xl:bg-black xl:px-4 xl:text-xl xl:w-fit">
                        <h3 class="mt-4 <?php if(is_singular()) echo 'inline-block' ?>">
                            <span class="<?php if(!is_singular()) echo 'after:h-[1px] after:bg-black xl:after:bg-white
              after:inline-block after:relative after:w-[20px] after:align-middle after:ml-1' ?>"><?= the_title(); ?></span>
                            <?php if(!is_singular()) :  ?>
                            <span class="ml-2 before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black xl:before:bg-white relative inline-block">
                                <span class="relative text-white xl:text-black"><?= get_the_title(get_post_meta(get_the_ID(), 'photographer', true)) ?></span>
                            </span>
                            <?php endif; ?>
                        </h3>
                        <p class="text-gray-500 lg:text-white font-light"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)); ?></p>
                    </div>
                </figcaption>
            </figure>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="mt-20 flex items-center">
        <svg class="to-top text-gray-500 cursor-pointer" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        <?php if($series->post_count < $series->found_posts): ?>
        <button class="button" type="button">plus de séries</button>
        <?php endif; ?>
    </div>
</section>