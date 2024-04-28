<?php
$series = [
    [
        'title' => 'Lorem Ipsum',
        'author' => 'Leo kekemenis',
        'year' => '2023'
    ],
    [
        'title' => 'Lorem Ipsum',
        'author' => 'John Doe',
        'year' => '2023'
    ],
    [
        'title' => 'Lorem Ipsum',
        'author' => 'Jane Smith',
        'year' => '2023'
    ],
    [
        'title' => 'Lorem Ipsum',
        'author' => 'John Doe',
        'year' => '2023'
    ],
    [
        'title' => 'Lorem Ipsum',
        'author' => 'John Doe',
        'year' => '2023'
    ],
    [
        'title' => 'Lorem Ipsum',
        'author' => 'John Doe',
        'year' => '2023'
    ],
    [
        'title' => 'Lorem Ipsum',
        'author' => 'John Doe',
        'year' => '2023'
    ]
]
?>

<section class="container mx-auto py-10">
    <h2>Séries</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        <?php for($i=1;$i<4;$i++) :?>
        <figure class="relative group xl:overflow-hidden">
            <img src="./wp-content/themes/encrage/assets/images/serie<?= $i ?>.png" alt="" />
            <figcaption class="xl:hidden xl:absolute xl:group-hover:block xl:bottom-0 xl:text-white xl:group-hover:animate-slideInUp">
                <div class="xl:bg-black xl:px-4 xl:text-xl">
                    <h3 class="mt-4">
                        <span class="after:h-[1px] after:bg-black xl:after:bg-white
              after:inline-block after:relative after:w-[20px] after:align-middle after:ml-1"><?= $series[$i]['title'] ?></span>
                        <span class="ml-2 before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black xl:before:bg-white relative inline-block">
                            <span class="relative text-white xl:text-black"><?= $series[$i]['author'] ?></span>
                        </span>
                    </h3>
                    <span class="text-gray-500 lg:text-white font-light"><?= $series[$i]['year'] ?></span>
                </div>
            </figcaption>
        </figure>
        <?php endfor;?>
    </div>
    <div class="mt-20 flex items-center">
    <svg class="to-top text-gray-500 cursor-pointer" height="40" viewBox="0 0 22 22" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_12363698"><g id="iOS7" fill="currentColor" fill-rule="evenodd"><path id="arrow_move_up" d="m3 2v1h17v-1zm12.5 5.40000153v1.09999847l-3.5015625-2.5-.0000001 14h-.9984374v-14l-3.5 2.5v-1.09999847l4-2.90000153z" fill="currentColor"></path></g></svg>
    <button class="button" type="button">plus de séries</button>
    </div>
    
</section>