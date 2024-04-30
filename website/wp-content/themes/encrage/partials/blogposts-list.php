<?php
$posts = [
    [
        'title' => 'La fierté des nôtres - Le podcast',
        'date' => 'mars 2024',
        'text' => '40 ans de Marche, Partie 1 : Se souvenir de la Marche.<br /><br />
Aujourd’hui, nous revenons sur un événement fédérateur qui est né dans nos quartiers populaires. Il y a 40 ans aujourd’hui, quelques banlieusards, enfants d’immigrés, deuxième-troisième génération, militants antiracistes, partent à pied de Marseille le 15 octobre 1983, dans une quasi indifférence médiatique et politique, avec l’objectif de rejoindre Paris, la fin des violences institutionnelles, l’égalité des droits pour toutes et tous, et la lutte contre les discriminations.
'
    ],
    [
        'title' => 'La fierté des nôtres - Le podcast',
        'date' => 'juin 2024',
        'text' => '40 ans de Marche, Partie 1 : Se souvenir de la Marche.<br /><br />
Aujourd’hui, nous revenons sur un événement fédérateur qui est né dans nos quartiers populaires. Il y a 40 ans aujourd’hui, quelques banlieusards, enfants d’immigrés, deuxième-troisième génération, militants antiracistes, partent à pied de Marseille le 15 octobre 1983, dans une quasi indifférence médiatique et politique, avec l’objectif de rejoindre Paris, la fin des violences institutionnelles, l’égalité des droits pour toutes et tous, et la lutte contre les discriminations.
'
    ],
    [
        'title' => 'La fierté des nôtres - Le podcast',
        'date' => 'avril 2024',
        'text' => '40 ans de Marche, Partie 1 : Se souvenir de la Marche.<br /><br />
Aujourd’hui, nous revenons sur un événement fédérateur qui est né dans nos quartiers populaires. Il y a 40 ans aujourd’hui, quelques banlieusards, enfants d’immigrés, deuxième-troisième génération, militants antiracistes, partent à pied de Marseille le 15 octobre 1983, dans une quasi indifférence médiatique et politique, avec l’objectif de rejoindre Paris, la fin des violences institutionnelles, l’égalité des droits pour toutes et tous, et la lutte contre les discriminations.
'
    ]
]


?>

<section class="container mx-auto p-10 h-fit <?php if(get_query_var('is_home')) echo 'reveal'?>">
    <h2 class="section">nos actus</h2>
    <div class="swiper blogpost-carousel lg:max-w-screen-lg">
        <div class="swiper-wrapper h-fit">
            <?php foreach ($posts as $key => $post) : ?>
                <a class="swiper-slide">
                    <header class="pl-10 mb-8 text-xl uppercase">
                        <h3><?= $post['title'] ?></h3>
                        <span class="inline-block text-gray-500"><?= $post['date'] ?></span>
                    </header>
                    <main class="grid grid-cols-1 lg:grid-cols-2 items-center justify-center justify-items-center px-14 gap-y-4 lg:gap-y-0 w-full mx-auto">
                        <aside class="max-w-sm"><img src="<?= get_template_directory_uri(); ?>/assets/images/post<?= $key ?>.png" alt="" /></aside>
                        <article class="max-w-sm">
                            <p class="text-justify"><?= $post['text'] ?></p>
                        </article>
                    </main>
                    <div class="mt-20 flex items-center">

                        <button class="button" type="button">lire la suite</button>
                    </div>
                </a>

            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next text-gray-500"></div>
        <div class="swiper-button-prev text-gray-500"></div>
    </div>
    <svg class="to-top text-gray-500 cursor-pointer" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
        <g id="iOS7" fill="currentColor" fill-rule="evenodd">
            <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
        </g>
    </svg>
</section>