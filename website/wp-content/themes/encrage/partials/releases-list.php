<?php
$releases = [
    [
        'media_name' => 'l\'humanité',
        'title' => 'Législative - « Première victoire de la gauche »',
        'author' => 'Jeanne actu',
        'year' => '2023'
    ],
    [
        'media_name' => 'libération',
        'title' => 'Un homme émasculé par un policier lors de la manifestation du 19 janvier porte plainte',
        'author' => 'leo kekemenis',
        'year' => '2023'
    ],
    [
        'media_name' => 'libération',
        'title' => 'Chez les antifascistes, une dissolution qui fâche',
        'author' => 'Tulyppe',
        'year' => '2023'
    ],
    [
        'media_name' => 'l\'humanité',
        'title' => 'Législative - « Première victoire de la gauche »',
        'author' => 'Jeanne actu',
        'year' => '2023'
    ],
    [
        'media_name' => 'libération',
        'title' => 'Un homme émasculé par un policier lors de la manifestation du 19 janvier porte plainte',
        'author' => 'leo kekemenis',
        'year' => '2023'
    ],
    [
        'media_name' => 'libération',
        'title' => 'Chez les antifascistes, une dissolution qui fâche',
        'author' => 'Tulyppe',
        'year' => '2023'
    ],
]
?>

<section class="container mx-auto py-10">
    <h2>publications</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        <?php for ($i = 0; $i < 3; $i++) : ?>
            <figure class="relative group mx-auto max-w-sm">
                <img src="./wp-content/themes/encrage/assets/images/publi-big.png" alt="" class="release" />
                <figcaption>
                    <div class="xl:text-xl">
                        <h3 class="mt-4">
                            <span class="after:h-[1px] after:bg-black
              after:inline-block after:relative after:w-[20px] after:align-middle after:ml-1"><?= $releases[$i]['media_name'] ?></span>
                            <span class="ml-2 before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black before:shadow-lg before:shadow-black/50 relative inline-block">
                                <span class="relative text-white"><?= $releases[$i]['author'] ?></span>
                            </span>
                        </h3>
                        <blockquote class="text-slate-600 italic mt-2"><?= $releases[$i]['title'] ?></blockquote>
                        <span class="text-slate-500"><?= $releases[$i]['year'] ?></span>
                    </div>
                </figcaption>
            </figure>
        <?php endfor; ?>
    </div>
    <div class="mt-20 flex items-center">
        <svg class="to-top text-gray-500 cursor-pointer" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698">
            <g id="iOS7" fill="currentColor" fill-rule="evenodd">
                <path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path>
            </g>
        </svg>
        <button class="button" type="button">plus de publications</button>
    </div>

</section>