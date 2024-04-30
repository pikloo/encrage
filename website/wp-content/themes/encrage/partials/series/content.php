<?php
$is_member_page = get_query_var('is_member_page');
?>

    <figure class="reveal relative group xl:overflow-hidden break-inside">
        <?php if (has_post_thumbnail(get_the_ID())) : ?>
            <a href="<?= esc_url(get_permalink()); ?>"><img class="w-full h-72  object-cover" src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')) ?>" alt="<?= the_title(); ?>" /></a>
        <?php endif; ?>
        <figcaption class="xl:hidden xl:absolute xl:group-hover:block xl:bottom-0 xl:text-white xl:group-hover:animate-slideInUp">
            <div class="xl:bg-black xl:px-4 xl:text-xl xl:w-fit">
                <h3 class="mt-4 <?php if ($is_member_page) echo 'inline-block' ?>">
                    <span class="<?php if (!$is_member_page) echo 'after:h-[1px] after:bg-black xl:after:bg-white
              after:inline-block after:relative after:w-[20px] after:align-middle after:ml-1' ?>"><?= the_title(); ?></span>
                    <?php if (!$is_member_page) :  ?>
                        <span class="ml-2 before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black xl:before:bg-white relative inline-block">
                            <span class="relative text-white xl:text-black"><?= get_the_title(get_post_meta(get_the_ID(), 'photographer', true)) ?></span>
                        </span>
                    <?php endif; ?>
                </h3>
                <p class="text-gray-500 lg:text-white font-light"><?= esc_attr(get_post_meta(get_the_ID(), 'year', true)); ?></p>
            </div>
        </figcaption>
    </figure>
