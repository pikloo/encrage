<?php
$is_home_page = is_front_page() && is_home();
$is_member_page = 'member' == get_post_type();
$memberID = get_query_var('member_id') ? get_query_var('member_id') :  null;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args =  [
    'post_type' => 'release',
    'posts_per_page' => 8,
    'post_status' => 'publish',
    // 'order' => 'DESC',
    // 'meta_key' => 'year',
    // 'orderby' => 'meta_value_num',
];

if ($memberID) {
    $args['meta_query'][] = [
        'key' => 'photographer',
        'value' => $memberID,
        'compare' => '='
    ];
    $args['meta_key'] = 'year';
    $args['orderby'] = 'meta_value_num';
}
$releases = new WP_Query($args);
$is_home = get_query_var('is_home');
?>

<section class="container mx-auto py-10 xl:px-10">
    <h2 class="section">publications</h2>
    <div class="sm:masonry-sm xl:masonry-md 2xl:masonry-xl space-y-4 px-2 duration-500">
        <?php if ($releases->have_posts()) : ?>
            <?php while ($releases->have_posts()) : $releases->the_post(); ?>
                <?php
                set_query_var( 'is_home_page', $is_home);
                set_query_var('is_member_page', $is_member_page);
                get_template_part('partials/releases/content', 'content'); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="mt-20 flex items-center">
        <svg class="to-top reveal" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        <?php if ($is_home) : ?>
            <a class="button" href="<?= esc_url(get_post_type_archive_link('release'))?>">Toutes les publications</a> 
            <?php elseif (!$is_home && $wp_query->max_num_pages > 1) : ?>
            <button class="button load-more" type="button">plus de publications</button> 
        <?php endif; ?>
    </div>

</section>