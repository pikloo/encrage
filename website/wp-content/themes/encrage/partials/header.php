<?php
extract($args);
$is_home_page = is_front_page() && is_home();
$bg = $is_home_page || 'serie' == get_post_type() ? 'bg-white/70' : 'bg-white';
$isSinglePortfolio = 'serie' == get_post_type() && is_single();

$membersArgs =  [
  'post_type' => 'member',
  'orderby' => 'title',
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'order' => 'ASC',
];
$membersMenu = new WP_Query($membersArgs);

$menu_main = wp_nav_menu([
  'menu' => 'Main',
  'container' => 'ul',
  'menu_class' => 'main-menu',
  'echo' => false,
  'container_aria_label' => 'Navigation principal',
]);

?>
<header class="main-header flex items-center shadow-sm w-max-w-sm lg:w-full fixed top-0 left-0 right-0 z-20 bg-white duration-500 delay-2">
  <nav class="relative w-full lg:pr-10 flex lg:justify-between items-center bg-white">
    <button class="menu-toggle z-20 lg:hidden" id="menu-toggle" aria-expanded="false"><span class="screen-reader-text">Menu</span>
      <svg class="icon icon-menu-toggle" aria-hidden="true" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100">
        <g class="svg-menu-toggle">
          <path class="line line-1" d="M5 13h90v14H5z" />
          <path class="line line-2" d="M5 43h90v14H5z" />
          <path class="line line-3" d="M5 73h90v14H5z" />
        </g>
      </svg>
    </button>
    <a class="z-20 bg-white w-full custom-landscape:w-full lg:w-fit custom-landscape:p-0 lg:py-6" href=<?= home_url(); ?>><img src="<?= wp_get_attachment_image_url($logo_site_attachment_id, 'medium'); ?>" alt="<?= esc_html(get_bloginfo('description')) ?> " class="w-[150px] custom-landscape:w-[150px] md:w-[200px] lg:w-[250px] logo-site mx-auto lg:px-10 lg:m-0" /></a>
      <div class="hidden lg:flex items-center lg:text-2xl menu-full bg-white">
        <?= $menu_main; ?>
        <!-- photographes -->
        <div class="ml-4">
          <input type="checkbox" value="selected" id="toggle-one" class="toggle-input">
          <label for="toggle-one" class="block cursor-pointer uppercase menu-item relative after:content-['\25BC'] after:text-xs after:absolute after:bottom-1 after:ml-1 after:duration-150">Les photographes</label>
          <div role="toggle" class="p-6 mega-menu mb-16 shadow-sm bg-white">
            <div class="container mx-auto w-full">
              <ul class="grid grid-cols-4 gap-y-3">
                <?php while ($membersMenu->have_posts()) : $membersMenu->the_post();
                  $thumbnailUrl = null;
                  if (get_the_post_thumbnail()) {
                    $thumbnailUrl = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                  } else {
                    $thumbnailUrl = get_template_directory_uri() . '/assets/images/default_member.png';
                  }
                ?>
                  <li class="menu-item"><a class="flex items-center space-x-2 cursor-pointer" href=<?= the_permalink() ?>>
                  <img class="h-12 w-12 rounded-full object-contain <?php if (!get_the_post_thumbnail()) echo "border border-black" ?>" src=<?= esc_url($thumbnailUrl); ?> alt="" />
                  <span class="text-lg"><?= the_title(); ?></span>
                </a></li>
                <?php endwhile;
                wp_reset_postdata(); ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- end photographes -->
      </div>
    <div id="sideBar" class="bg-transparent overflow-x-hidden duration-500 z-10">
      <!--navigation menu box-->
      <div id="sideNav" class="text-xl custom-landscape:text-xl h-full  md:text-2xl lg:text-3xl bg-white text-black flex flex-col justify-center items-center overflow-x-hidden duration-500 z-50">
        <div id="sideLinks" class="flex flex-col items-center justify-content duration-500 delay-2 custom-landscape:flex-row custom-landscape:gap-x-10">
          <?= $menu_main; ?>
          <ul class="relative grid grid-cols-2 md:gap-x-10 justify-items-center py-6 font-bold custom-landscape:after:hidden after:h-[2px] after:bg-black 
       after:absolute after:w-[100px]">
            <?php while ($membersMenu->have_posts()) : $membersMenu->the_post(); ?>
              <li class="menu-item text-base custom-landscape:text-base md:text-xl lg:text-2xl"><a href=<?= the_permalink() ?>><?= the_title(); ?></a></li>
            <?php endwhile;
            wp_reset_postdata(); ?>

          </ul>
          <div class="py-6 space-y-6 text-lg custom-landscape:text-lg md:text-xl lg:text-2xl text-center duration-500">
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
        </div>

      </div>
    </div>
  </nav>
  </div>
</header>