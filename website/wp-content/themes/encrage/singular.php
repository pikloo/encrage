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
<main class="overflow-hidden pt-36 main">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <h1 class="<?php if($post->post_name === 'lagence') echo 'translate-y-6 mb-0'?>"><?= the_title(); ?></h1>
        <div class="px-6 text-justify flex flex-col gap-y-10 lg:flex-row lg:gap-x-10">
            <?php if (has_post_thumbnail()) : ?>
                <aside class="max-w-sm md:max-w-md">
                    <?php the_post_thumbnail(); ?>
                </aside>
            <?php endif; ?>
            <article class="lg:max-w-xl first-letter:text-7xl first-letter:font-semibold first-letter:mr-2 first-letter:float-left">
                <?= the_content(); ?></article>
        </div>
    <?php endwhile; ?>
</main>
<aside>
    <?php get_template_part('partials/members-list', 'members-list'); ?>
</aside>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>