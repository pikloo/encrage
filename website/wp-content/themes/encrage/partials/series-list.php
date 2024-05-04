<?php
extract($args);
$is_home_page = is_front_page() && is_home();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args =  [
    'post_type' => 'serie',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
];


if ($post_type == 'member') {
    $args['meta_query'][] = [
        'key' => 'photographer',
        'value' => get_the_ID(),
        'compare' => '='
    ];
    $args['meta_key'] = 'year';
    $args['orderby'] = 'meta_value_num';
}
$wp_query = new WP_Query($args);
?>

<section class="container mx-auto py-10 xl:px-10">
    <h2 class="section">Séries</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        <?php if ($wp_query->have_posts()) : ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php 
            get_template_part( 'partials/series/content', 'content', [
                'is_home' => $is_home_page,
                'is_member_page' => $post_type == 'member'
            ] ); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="mt-20 flex items-center">
        <svg class="to-top reveal" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        <?php if ($is_home_page) : ?>
            <a class="button" href="<?= esc_url(get_post_type_archive_link('serie'))?>" >Toutes les séries</a> 
            <?php elseif (!$is_home_page && $wp_query->max_num_pages > 1) : ?>
            <button class="button load-more" type="button">plus de séries</button> 
        <?php endif; ?>
    </div>
</section>