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
<main class="overflow-hidden pt-20 md:pt-36 pb-6 main">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <?php
        $categories = get_the_category();
        ?>
        <h1 class="<?php if ($post->post_name === 'lagence') echo 'translate-y-6 mb-0' ?>"><?= the_title(); ?></h1>
        <div class="px-6 text-justify flex flex-col gap-y-10 lg:flex-row lg:gap-x-10">
            <?php if (has_post_thumbnail()) : ?>
                <aside class="max-w-sm md:max-w-md">
                    <?php the_post_thumbnail(); ?>
                </aside>
            <?php endif; ?>
            <article class="reveal content
            <?php if (!empty($categories) && $categories[0]->name == 'Légales') {
                echo 'mx-auto lg:max-w-screen-lg';
            } else {
                echo 'lg:max-w-xl';
            } ?>
            ">
                <?= the_content(); ?></article>
        </div>
    <?php endwhile; ?>
</main>
<aside>
    <?php $post->post_name === 'lagence' && get_template_part('partials/members-list', 'members-list'); ?>
    <?php $post->post_name === 'lagence' && get_template_part('partials/blogposts-list', 'blogposts-list'); ?>
</aside>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>