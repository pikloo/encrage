<?php
get_header();
get_template_part('partials/header', 'header');
?>
<main class="overflow-hidden pt-36">
    <?php while (have_posts()) : the_post(); ?>
        <div>
            <span class="-translate-y-6 before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                <h1 class="relative text-xl font-medium uppercase text-white"><?php the_title(); ?></h1>
            </span>
            <h2>Les photographes</h2>
        </div>
    <?php endwhile; ?>
</main>
<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>