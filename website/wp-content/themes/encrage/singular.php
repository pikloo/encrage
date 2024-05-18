<?php
get_header();
$logo_site = get_option('encrage_theme_options')['encrage_logo'];
$logo_site_attachment_id = $logo_site ? pippin_get_image_id($logo_site) : null; 

get_template_part('partials/header', 'header', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
$args =  [
    'post_type' => 'page',
    'posts_per_page' =>  1,
    'post_status' => 'publish',
    'p' =>  $post->ID,

];
$loop = new WP_Query($args);

?>
<main class="overflow-hidden main">
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <?php
        $categories = get_the_category();
        ?>
        <h1 class="mb-2"><?= the_title(); ?></h1>
        <div class="px-6 <?= $post->post_name === 'lagence' ? 'text-center' : 'text-justify'  ?>  flex flex-col gap-y-10 lg:flex-row lg:gap-x-10 mt-10 lg:justify-evenly lg:items-center lg:mt-20">
            <?php if (has_post_thumbnail()) : ?>
                <aside class="max-w-sm md:max-w-md">
                    <?php the_post_thumbnail(); ?>
                </aside>
            <?php endif; ?>
            <article class="reveal  
            <?php if (!empty($categories) && $categories[0]->name == 'Légales') {
                echo 'mx-auto lg:max-w-screen-lg content';
            } else {
                echo 'mx-auto max-w-sm lg:max-w-xl lg:m-0 text-lg md:text-xl lg:text-2xl first-letter:text-xl lg:first-letter:text-2xl lg:first-letter:text-3xl duration-500';
            } ?>
            ">
                <?= the_content(); ?></article>
            <?php if ($post->post_name === 'lagence') : ?>
                <aside class="reveal">
                    <div class="py-6 space-y-6 text-lg md:text-xl lg:text-2xl text-center duration-500">
                        <div>
                            <p>Retrouvez nous sur</p>
                            <a href="https://www.pixpalace.com/" target="_blank"><img src="<?= get_template_directory_uri() ?>/assets/images/logo_pixpalace.png" alt="Retrouvez aussi nos photos sur PixPalace" class="w-[100px] md:lg:w-[150px] lg:w-[175px] mx-auto duration-500" /></a>
                        </div>
                        <div>
                            <p>Ou sur nos réseaux sociaux</p>
                            <ul class="flex gap-x-2 mx-auto w-fit socials-links">
                                <li><a href="https://www.instagram.com/encrage_photo" target="_blank"><svg viewBox="0 0 512.00096 512.00096" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="fi_1077042">
                                            <path d="m373.40625 0h-234.8125c-76.421875 0-138.59375 62.171875-138.59375 138.59375v234.816406c0 76.417969 62.171875 138.589844 138.59375 138.589844h234.816406c76.417969 0 138.589844-62.171875 138.589844-138.589844v-234.816406c0-76.421875-62.171875-138.59375-138.59375-138.59375zm108.578125 373.410156c0 59.867188-48.707031 108.574219-108.578125 108.574219h-234.8125c-59.871094 0-108.578125-48.707031-108.578125-108.574219v-234.816406c0-59.871094 48.707031-108.578125 108.578125-108.578125h234.816406c59.867188 0 108.574219 48.707031 108.574219 108.578125zm0 0"></path>
                                            <path d="m256 116.003906c-77.195312 0-139.996094 62.800782-139.996094 139.996094s62.800782 139.996094 139.996094 139.996094 139.996094-62.800782 139.996094-139.996094-62.800782-139.996094-139.996094-139.996094zm0 249.976563c-60.640625 0-109.980469-49.335938-109.980469-109.980469 0-60.640625 49.339844-109.980469 109.980469-109.980469 60.644531 0 109.980469 49.339844 109.980469 109.980469 0 60.644531-49.335938 109.980469-109.980469 109.980469zm0 0"></path>
                                            <path d="m399.34375 66.285156c-22.8125 0-41.367188 18.558594-41.367188 41.367188 0 22.8125 18.554688 41.371094 41.367188 41.371094s41.371094-18.558594 41.371094-41.371094-18.558594-41.367188-41.371094-41.367188zm0 52.71875c-6.257812 0-11.351562-5.09375-11.351562-11.351562 0-6.261719 5.09375-11.351563 11.351562-11.351563 6.261719 0 11.355469 5.089844 11.355469 11.351563 0 6.257812-5.09375 11.351562-11.355469 11.351562zm0 0"></path>
                                        </svg></a></li>
                                <li><a href="https://www.facebook.com/encrage.photo" target="_blank">
                                        <svg version="1.1" id="fi_739237" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M449.643,0H62.357C27.973,0,0,27.973,0,62.357v387.285C0,484.027,27.973,512,62.357,512H260.86
			c8.349,0,15.118-6.769,15.118-15.118v-183.31c0-8.349-6.769-15.118-15.118-15.118h-54.341v-43.033h54.341
			c8.349,0,15.118-6.769,15.118-15.118v-61.192c0-33.116,26.942-60.058,60.059-60.058h52.433v43.033h-52.433
			c-9.387,0-17.025,7.639-17.025,17.026v61.192c0,8.349,6.769,15.118,15.118,15.118h54.341v43.033h-54.341
			c-8.349,0-15.118,6.769-15.118,15.118v183.31c0,8.349,6.769,15.118,15.118,15.118h115.513C484.027,512,512,484.027,512,449.643
			V62.357C512,27.973,484.027,0,449.643,0z M481.764,449.643c0,17.712-14.409,32.122-32.122,32.122H349.247h-0.001V328.69h54.341
			c8.349,0,15.118-6.769,15.118-15.118v-73.268c0-8.349-6.769-15.118-15.118-15.118h-54.341v-32.864h54.341
			c8.349,0,15.118-6.769,15.118-15.118v-73.268c0-8.349-6.769-15.118-15.118-15.118h-67.551c-49.788,0-90.294,40.506-90.294,90.294
			v46.074h-54.341c-8.349,0-15.118,6.769-15.118,15.118v73.268c0,8.349,6.769,15.118,15.118,15.118h54.341v153.074H62.357
			c-17.712,0-32.122-14.409-32.122-32.122V62.357c0-17.712,14.409-32.122,32.122-32.122h387.285
			c17.712,0,32.122,14.409,32.122,32.122V449.643z"></path>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a></li>
                                <li><a href="https://twitter.com/encrage_photo" target="_blank"><svg id="fi_5968958" width="24" height="24" fill="currentColor" enable-background="new 0 0 1226.37 1226.37" viewBox="0 0 1226.37 1226.37" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m727.348 519.284 446.727-519.284h-105.86l-387.893 450.887-309.809-450.887h-357.328l468.492 681.821-468.492 544.549h105.866l409.625-476.152 327.181 476.152h357.328l-485.863-707.086zm-144.998 168.544-47.468-67.894-377.686-540.24h162.604l304.797 435.991 47.468 67.894 396.2 566.721h-162.604l-323.311-462.446z"></path>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                        </svg></a></li>
                            </ul>
                        </div>

                    </div>
                </aside>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</main>
<aside>
    <?php $post->post_name === 'lagence' && get_template_part('partials/members-list', 'members-list'); ?>
    <?php $post->post_name === 'lagence' && get_template_part('partials/blogposts-list', 'blogposts-list'); ?>
</aside>
<?php
get_template_part('partials/footer', 'footer', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
get_footer();
?>