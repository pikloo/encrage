<?php
extract($args);
$is_home_page = is_front_page() && is_home();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args =  [
    'post_type' => 'release',
    'posts_per_page' => 8,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
];

if ($is_home_page) {
    $selected_releases = isset(get_option('encrage_settings')['encrage_home_releases']) ? get_option('encrage_settings')['encrage_home_releases'] : false;
}

if ($post_type == 'member') {
    $args['meta_query'][] = [
        'key' => 'photographer',
        'value' => $member_id,
        'compare' => '='
    ];
}
$releases = new WP_Query($args);
?>

<section class="container mx-auto py-10 xl:px-10">
    <h2 class="section">publications</h2>
    <div class="sm:masonry-sm xl:masonry-md 2xl:masonry-xl space-y-4 px-4 duration-500">
        <?php if ($is_home_page && $selected_releases) {
            foreach ($selected_releases as $release) {
                $args['p'] = $release;
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        get_template_part('partials/releases/content', 'content', [
                            'is_home' => $is_home_page,
                            'is_member_page' => $post_type == 'member'
                        ]);
                    }
                    wp_reset_postdata();
                }
            }
        } else if (!$is_home_page) {
            $wp_query = new WP_Query($args);
            $wp_query->have_posts();
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                get_template_part('partials/releases/content', 'content', [
                    'is_home' => $is_home_page,
                    'is_member_page' => $post_type == 'member'
                ]);
            }

            wp_reset_postdata();
        } ?>
    </div>
    <div class="mt-20 flex items-center">
        <svg class="to-top reveal" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        <?php if ($is_home_page) : ?>
            <a aria-label="Voir plus de publications" class="button text-center" href="<?= esc_url(get_post_type_archive_link('release')) ?>">Toutes les publications</a>
        <?php elseif (!$is_home_page && $wp_query->max_num_pages > 1) : ?>
            <button aria-label="Charger plus de publications" class="button load-more text-center" type="button">plus de publications</button>
        <?php endif; ?>
    </div>

</section>