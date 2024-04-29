<?php
$is_home_page = is_front_page() && is_home();
$bg = $is_home_page || 'serie' == get_post_type() ? 'bg-white/70' : 'bg-white';
?>
<header class="flex items-center w-fit fixed top-0 left-0 right-0 z-10 bg-white">
  <nav class="relative flex justify-between items-center">
    <button class="menu-toggle" id="menu-toggle" aria-expanded="false"><span class="screen-reader-text">Menu</span>
      <svg class="icon icon-menu-toggle" aria-hidden="true" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100">
        <g class="svg-menu-toggle">
          <path class="line line-1" d="M5 13h90v14H5z" />
          <path class="line line-2" d="M5 43h90v14H5z" />
          <path class="line line-3" d="M5 73h90v14H5z" />
        </g>
      </svg>
    </button>
    <a href=<?= home_url(); ?>><img src="<?= get_template_directory_uri(); ?>/assets/images/ancrage_logo.png" alt="<?= esc_html(get_bloginfo('description')) ?> " class="w-[250px] px-10" /></a>
  </nav>
  </div>
</header>