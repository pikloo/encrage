<?php
$sliderImages = get_option('encrage_theme_options')['encrage_home_slider'];
?>

<section class="relative" id="slider">
    <div class="swiper slider-home">
        <div class="swiper-wrapper">
            <?php foreach ($sliderImages as $key => $value) : ?>
                <?php if ($value != '') : ?>
                    <div class="swiper-slide"><img class="h-[calc(100dvh-4rem)] custom-landscape:h-[calc(100dvh-4rem)] md:h-[calc(100dvh-7rem)] object-cover custom-landscape:w-screen md:w-screen" src="<?= $value ?>" alt="Slider<?= $key ?>" loading="lazy" />
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <svg class="to-down reveal" data-to-down fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="fi_15795818">
        <path d="m20.5 20h-17a.5.5 0 0 0 0 1h17a.5.5 0 0 0 0-1z"></path>
        <path d="m11.64648 17.85352a.49984.49984 0 0 0 .707 0l5.5-5.5a.5.5 0 0 0 -.707-.707l-4.64648 4.64648v-12.793a.5.5 0 0 0 -1 0v12.793l-4.64648-4.64652a.5.5 0 0 0 -.707.707z"></path>
    </svg>
</section>