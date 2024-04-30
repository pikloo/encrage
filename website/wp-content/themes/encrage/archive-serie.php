<?php
get_header();
get_template_part('partials/header', 'header');

$filter_photographer = get_query_var('_photographer');
$args =  [
    'post_type' => 'serie',
    'orderby' => 'year',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'DESC',
];

if($filter_photographer ){
    $args['meta_query'][] = [
        'post_type' => 'photographer',
            'key' => 'title',
            'compare' => '=',
            'value' => $filter_photographer,
    ];
}

$loop = new WP_Query($args);


$membersArgs =  [
    'post_type' => 'member',
    'orderby' => 'title',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'ASC',
    
];
$photographers = new WP_Query($membersArgs);

?>

<main class="overflow-hidden pt-28 pb-6">
    <h1>Séries</h1>
    <form class="ml-4 mb-10">
        <label for="photographer">Filtrer par photographe : </label>
        <select name="_photographer" id="photographer">
            <option value="">Sélectionner un(e) photographe</option>
            <?php while ($photographers->have_posts()) : $photographers->the_post(); ?>
                <option value="<?php the_title() ?>">
                    <?php the_title(); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Filtrer</button>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        <?php if ($loop->have_posts()) : ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php
                get_template_part('partials/series/content', 'content'); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <div class="mt-20 flex items-center">
        <svg class="to-top text-gray-500 cursor-pointer" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        <?php if ($loop->max_num_pages > 1) : ?>
            <button class="button load-more" type="button">plus de séries</button>
        <?php endif; ?>
    </div>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>