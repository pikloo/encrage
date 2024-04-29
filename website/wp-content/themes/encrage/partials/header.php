<?php
$is_home_page = is_front_page() && is_home();
$bg = $is_home_page || 'serie' == get_post_type() ? 'bg-white/70' : 'bg-white';

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
<header class="main-header flex items-center w-fit fixed top-0 left-0 right-0 z-10 bg-white">
  <nav class="relative flex justify-between items-center bg-white">
    <button class="menu-toggle z-20" id="menu-toggle" aria-expanded="false"><span class="screen-reader-text">Menu</span>
      <svg class="icon icon-menu-toggle" aria-hidden="true" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100">
        <g class="svg-menu-toggle">
          <path class="line line-1" d="M5 13h90v14H5z" />
          <path class="line line-2" d="M5 43h90v14H5z" />
          <path class="line line-3" d="M5 73h90v14H5z" />
        </g>
      </svg>
    </button>
    <a class="z-20 bg-white" href=<?= home_url(); ?>><img src="<?= get_template_directory_uri(); ?>/assets/images/ancrage_logo.png" alt="<?= esc_html(get_bloginfo('description')) ?> " class="w-[250px] px-10" /></a>
    <div id="sideBar" class="fixed top-0 left-0 bg-transparent h-full overflow-x-hidden duration-500 z-10">
      <!--navigation menu box-->
      <div id="sideNav" class="text-2xl sm:text-3xl fixed top-0 left-0 bg-white text-black h-full flex flex-col justify-center items-center overflow-x-hidden duration-500 z-50">
        <!--exit icon, will close navbar when clicked-->
        <!-- <a href="javascript:void(0)" class="text-3xl absolute top-0 right-0 mr-3 mt-2">&times;</a> -->
        <!--menu links-->
        <div id="sideLinks" class="flex flex-col items-center divide-y-2 divide-black justify-content duration-500 delay-2">
          <?= $menu_main; ?>
          <ul class="grid grid-cols-2 justify-items-center py-6 font-bold">
            <?php while ($membersMenu->have_posts()) : $membersMenu->the_post(); ?>
              <li><a href=<?= the_permalink() ?>><?= the_title(); ?></a></li>
            <?php endwhile;
            wp_reset_postdata(); ?>

          </ul>
          <div class="py-6 space-y-6 text-xl sm:text-2xl text-center">
            <div>
              <p>Retrouvez aussi nos photos sur</p>
              <a href="https://www.pixpalace.com/" target="_blank"><img src="<?= get_template_directory_uri() ?>/assets/images/logo_pixpalace.png" alt="Retrouvez aussi nos photos sur PixPalace" class="w-[100px] mx-auto" /></a>
            </div>
            <div>
              <p>Ou sur nos réseaux sociaux</p>
              <ul class="flex gap-x-2 mx-auto w-fit">
                <li><a href="https://www.instagram.com/encrage_photo" target="_blank"><svg viewBox="0 0 512.00096 512.00096" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="fi_1077042">
                      <path d="m373.40625 0h-234.8125c-76.421875 0-138.59375 62.171875-138.59375 138.59375v234.816406c0 76.417969 62.171875 138.589844 138.59375 138.589844h234.816406c76.417969 0 138.589844-62.171875 138.589844-138.589844v-234.816406c0-76.421875-62.171875-138.59375-138.59375-138.59375zm108.578125 373.410156c0 59.867188-48.707031 108.574219-108.578125 108.574219h-234.8125c-59.871094 0-108.578125-48.707031-108.578125-108.574219v-234.816406c0-59.871094 48.707031-108.578125 108.578125-108.578125h234.816406c59.867188 0 108.574219 48.707031 108.574219 108.578125zm0 0"></path>
                      <path d="m256 116.003906c-77.195312 0-139.996094 62.800782-139.996094 139.996094s62.800782 139.996094 139.996094 139.996094 139.996094-62.800782 139.996094-139.996094-62.800782-139.996094-139.996094-139.996094zm0 249.976563c-60.640625 0-109.980469-49.335938-109.980469-109.980469 0-60.640625 49.339844-109.980469 109.980469-109.980469 60.644531 0 109.980469 49.339844 109.980469 109.980469 0 60.644531-49.335938 109.980469-109.980469 109.980469zm0 0"></path>
                      <path d="m399.34375 66.285156c-22.8125 0-41.367188 18.558594-41.367188 41.367188 0 22.8125 18.554688 41.371094 41.367188 41.371094s41.371094-18.558594 41.371094-41.371094-18.558594-41.367188-41.371094-41.367188zm0 52.71875c-6.257812 0-11.351562-5.09375-11.351562-11.351562 0-6.261719 5.09375-11.351563 11.351562-11.351563 6.261719 0 11.355469 5.089844 11.355469 11.351563 0 6.257812-5.09375 11.351562-11.355469 11.351562zm0 0"></path>
                    </svg></a></li>
                <li><a href="https://www.facebook.com/encrage.photo" target="_blank"><svg version="1.1" id="fi_220342" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                      <g transform="translate(1 1)">
                        <g>
                          <path d="M468.333-1H41.667C17.773-1-1,17.773-1,41.667v426.667C-1,492.227,17.773,511,41.667,511h196.267h102.4h128
			C492.227,511,511,492.227,511,468.333V41.667C511,17.773,492.227-1,468.333-1z M255,493.933V323.267h-68.267V255H255v-59.733
			c0-48.64,37.547-89.6,85.333-93.867h76.8v68.267h-68.267c-14.507,0-25.6,11.093-25.6,25.6V255H408.6v68.267h-85.333v170.667H255z
			 M493.933,468.333c0,14.507-11.093,25.6-25.6,25.6h-128v-153.6h85.333v-102.4h-85.333v-42.667c0-5.12,3.413-8.533,8.533-8.533
			H434.2v-102.4h-94.72c-57.173,5.12-101.547,53.76-101.547,110.933v42.667h-68.267v102.4h68.267v153.6H41.667
			c-14.507,0-25.6-11.093-25.6-25.6V41.667c0-14.507,11.093-25.6,25.6-25.6h426.667c14.507,0,25.6,11.093,25.6,25.6V468.333z"></path>
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
                    </svg></a></li>
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