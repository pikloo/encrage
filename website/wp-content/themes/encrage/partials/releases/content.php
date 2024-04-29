<?php
$is_member_page = get_query_var('is_member_page');
?>
<figure class="relative group mx-auto max-w-sm">
    <?php if (has_post_thumbnail(get_the_ID())) : ?>
        <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) ?>" alt="<?= the_title(); ?>" class="release cover-contain" />
    <?php endif; ?>
    <figcaption>
        <div class="xl:text-xl">
            <h3 class="mt-4">
                <span class="<?php if (!$is_member_page) echo 'after:h-[1px] after:bg-black
              after:inline-block after:relative after:w-[20px] after:align-middle after:ml-1' ?>"><?= esc_attr(get_post_meta(get_the_ID(), 'place', true)); ?></span>
                <?php if (!$is_member_page) :  ?>
                <span class="ml-2 before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                    <span class="relative text-white"><?= get_the_title(get_post_meta(get_the_ID(), 'photographer', true)) ?></span>
                </span>
                <?php endif; ?>
            </h3>
            <blockquote class="text-slate-600 italic mt-2"><?= the_title(); ?></blockquote>
            <span class="text-slate-500"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)); ?></span>
        </div>
    </figcaption>
</figure>