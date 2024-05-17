<?php
extract($args);

$post_categories = get_the_terms($post->ID, 'release_category');
$non_quote_terms = ['book', 'coverage'];

$default_post = match (true) {
    $post_categories && array_intersect(array_column($post_categories, 'slug'), $non_quote_terms) => false,
    default => true,
};


?>
<figure class="<?php if (isset($is_home)  || isset($is_member_page)) echo 'reveal' ?> relative group mx-auto max-w-sm break-inside p-4 bg-gray-200/30 hover:bg-gray-200/50 hover:scale-105 transition duration-500">
    <?php if (has_post_thumbnail(get_the_ID())) : ?>
        <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) ?>" alt="<?= the_title(); ?>" class="release cover-contain" />
    <?php endif; ?>
    <figcaption>
        <div class="xl:text-xl">
            <h3 class="mt-4">
            <blockquote class='<?php if($default_post) echo 'indent-4 landscape:indent-4 md:indent-6  italic relative before:not-italic before:content-["\275D"] before:font-caption before:text-3xl landscape:before:text-3xl md:before:text-5xl before:text-gray-400 before:absolute before:-top-2 before:-left-5 landscape:before:-left-5 md:before:-left-9' ?> mt-4 text-slate-600'><?= the_title(); ?></blockquote>
            </h3>
            <span class="text-slate-500"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)); ?></span>
            <div class="mt-2">
            <span class="<?php if ((!isset($is_member_page) || !$is_member_page) && get_post_meta(get_the_ID(), 'place', true)) echo 'after:h-[1px] after:bg-black
              after:inline-block after:relative after:w-[20px] after:align-middle after:ml-1' ?>"><?= esc_attr(get_post_meta(get_the_ID(), 'place', true)); ?></span>
                <?php if (!isset($is_member_page) || !$is_member_page) :  ?>
                    <a href="<?= esc_url(get_permalink(get_post_meta(get_the_ID(), 'photographer', true))); ?>">
                        <span class="<?php if($default_post) echo 'ml-2'?> before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                            <span class="relative text-white"><?= esc_html(get_the_title(get_post_meta(get_the_ID(), 'photographer', true))); ?></span>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
            
            
            
        </div>
    </figcaption>
</figure>