<?php
extract($args);
?>

<figure class="<?php if (isset($is_home)  || isset($is_member_page)) echo 'reveal' ?> relative group xl:overflow-hidden break-inside">
    <?php if (has_post_thumbnail(get_the_ID())) : ?>
        <a href="<?= esc_url(get_permalink()); ?>"><img class="w-full h-72  object-cover" src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) ?>" alt="<?= the_title(); ?>" /></a>
    <?php endif; ?>
    <figcaption class="xl:hidden xl:absolute xl:group-hover:block xl:bottom-0 xl:text-white xl:group-hover:animate-slideInUp">
        <div class="xl:bg-black xl:px-4 xl:text-xl xl:w-fit">
            <h3><?= the_title(); ?></h3>
            <?php $year =  get_post_meta(get_the_ID(), 'year', true); ?>
            <?php if ($year) : ?>
                <p class="text-gray-500 xl:text-white font-light"><?= esc_attr($year); ?></p>
            <?php endif; ?>
            <?php if (!isset($is_member_page) || !$is_member_page) :  ?>
                <a href="<?= esc_url(get_permalink(get_post_meta(get_the_ID(), 'photographer', true))); ?>">
                <span class="mt-0.5 before:block before:absolute before:-inset-1 before:-skew-y-3 before:shadow-lg before:shadow-black/50 before:bg-black xl:before:bg-white relative inline-block">
                        <p class="relative uppercase text-white xl:text-black"><?= esc_html(get_the_title(get_post_meta(get_the_ID(), 'photographer', true))); ?></p>
                    </span></a>
            <?php endif; ?>


        </div>
    </figcaption>
</figure>