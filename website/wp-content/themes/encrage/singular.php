<?php
get_header();
get_template_part('partials/header', 'header');
$args =  [
    'post_type' => 'page',
    'posts_per_page' =>  1,
    'post_status' => 'publish',
    'p' =>  $post->ID,

];
$loop = new WP_Query($args);

?>
<main class="overflow-hidden pt-36">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <h1><?= the_title(); ?></h1>
        <article class="px-6 text-justify"><?= the_content(); ?></article>
    <?php endwhile; ?>
</main>
<aside>
    <?php get_template_part('partials/members-list', 'members-list'); ?>
</aside>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>