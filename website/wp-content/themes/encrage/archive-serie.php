<?php
get_header();
get_template_part('partials/header', 'header');

$args =  [
    'post_type' => 'serie',
    'orderby' => 'year',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'DESC',
];


$series = new WP_Query($args);


$membersArgs =  [
    'post_type' => 'member',
    'orderby' => 'title',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'ASC',

];
$photographers = new WP_Query($membersArgs);

$currentPhotographer = $_GET['_photographer'] ?? null;
?>

<main class="overflow-hidden pt-28 pb-6 main flex flex-col">
    <div class='relative flex content-center gap-x-6'>
        <h1>Séries</h1>
        <?php if ($currentPhotographer) : ?>
            <h2><?= esc_html($currentPhotographer) ?></h2>
        <?php endif; ?>
    </div>
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
        <?php if ($series->have_posts()) : ?>
            <?php while ($series->have_posts()) : $series->the_post(); ?>
                <?php
                get_template_part('partials/series/content', 'content'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <p>Aucune série trouvée</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php if ($series->max_num_pages > 1) : ?>
    <div class="mt-20 flex items-center">
        <svg class="to-top text-gray-500 cursor-pointer" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        
            <button class="button load-more" type="button">plus de séries</button>
        
    </div>
    <?php endif; ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>