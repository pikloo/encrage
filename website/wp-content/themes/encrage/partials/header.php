<?php
$is_home_page = is_front_page() && is_home();
$bg = $is_home_page ? 'bg-white/70' : 'bg-white';
?>
<header class="h-36 px-10 flex items-center w-full fixed top-0 left-0 right-0 z-10 <?= $bg ?>">
  <nav class="relative flex justify-between items-center w-full">
    <a href=<?= home_url(); ?>><img src="<?= get_template_directory_uri(); ?>/assets/images/logo-encrage.png" alt="Encrage" /></a>
    <div class="xl:hidden">
      <button class="navbar-burger flex items-center p-3">
        <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 0.88501H21" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" />
          <path d="M1 8.38501H21" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" />
          <path d="M1 16.115H21" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" />
        </svg>
      </button>
    </div>
    <div class="navbar-regular hidden xl:block self-start">
      <ul class="flex uppercase gap-x-6 text-2xl">
        <li>
          <a href="#">L'agence</a>
        </li>
        <li>
          <a href="#">Les photographes</a>
        </li>
        <li>
          <a href="#">Les publications</a>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="navbar-menu relative z-[60] hidden">
    <div class="navbar-backdrop fixed inset-0 opacity-25"></div>
    <nav class="fixed bg-white top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
      <div class="flex items-center mb-8">
        <a class="mr-auto" href=<?= esc_url(home_url()); ?>>
          <img src="<?= get_template_directory_uri(); ?>/assets/images/logo-encrage.png" alt="Encrage" />
        </a>
        <button class="navbar-close">
          <svg class="h-6 w-6 text-third cursor-pointer hover:text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div>
        <ul class="flex flex-col divide-y divide-black gap-6 uppercase">
          <li>
            <a href="#">L'agence</a>
          </li>
          <li>
            <a href="#">Les photographes</a>
          </li>
          <li>
            <a href="#">Les publications</a>
          </li>
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>