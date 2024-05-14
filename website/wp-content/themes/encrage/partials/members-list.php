<section class="container px-4 xl:px-10 mx-auto py-10" id="photographers">
    <?php if (!is_home()) : ?>
        <h2 class="section">Les photographes</h2>
    <?php else : ?>
        <h1 class="main-title reveal">  
            <span class="before:block before:absolute before:-inset-1 before:skew-y-1 before:bg-black relative inline-block">
                <span class="relative text-white">Agence de photographes</span>
            </span>
            représentant
        </h1>
    <?php endif; ?>
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-y-10">
        <?php get_template_part('partials/member-informations', 'member-informations'); ?>
    </div>
    <svg class="to-top reveal" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
        <g id="iOS7" fill="currentColor" fill-rule="evenodd">
            <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
        </g>
    </svg>
</section>