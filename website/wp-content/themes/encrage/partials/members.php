<?php
$photographers = [
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'nickname' => 'Nnoman',
        'image' => false,
        'fb' => 'nnoman1',
        'twitter' => '@Nnoman1',
        'instagram' => '@Nnoman1',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'nickname' => 'Nnoman',
        'image' => false,
        'fb' => 'nnoman1',
        'twitter' => '@Nnoman1',
        'instagram' => '@Nnoman1',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'nickname' => 'Nnoman',
        'image' => false,
        'fb' => 'nnoman1',
        'twitter' => '@Nnoman1',
        'instagram' => '@Nnoman1',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'nickname' => 'Nnoman',
        'image' => false,
        'fb' => 'nnoman1',
        'twitter' => '@Nnoman1',
        'instagram' => '@Nnoman1',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
    [
        'firstname' => 'Leo',
        'lastname' => 'Kekemenis',
        'image' => true,
        'fb' => 'leoksphotography',
        'twitter' => '@leo_ks',
        'instagram' => '@LeoKekemenis',
        'website' => 'www.leoks.com',
    ],
]


?>

<section class="container mx-auto py-10">
    <h2><span class="pl-4">Les photographes</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10">
        <?php foreach ($photographers as $photographer) : ?>
            <!-- PHOTOGRAPHE -->
            <div class="flex flex-col justify-center items-center gap-4">
                <img class="h-64 w-64 rounded-full" src="./wp-content/themes/encrage/assets/images/<?=  $photographer['image'] ? 'leo.png' : 'logo-encrage.png' ?>" alt="" />
                <h3 class="text-xl font-medium capitilize"><?= $photographer['firstname'] && $photographer['lastname'] ?  $photographer['firstname'] . ' ' . $photographer['lastname'] : $photographer['nickname'] ?></h3>
                <ul class="md:hidden">
                    
                    <?php if ($photographer['instagram']): ?>
                    <li class="flex text-sm items-center gap-2">
                        <svg viewBox="0 0 512.00096 512.00096" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                            <path d="m373.40625 0h-234.8125c-76.421875 0-138.59375 62.171875-138.59375 138.59375v234.816406c0 76.417969 62.171875 138.589844 138.59375 138.589844h234.816406c76.417969 0 138.589844-62.171875 138.589844-138.589844v-234.816406c0-76.421875-62.171875-138.59375-138.59375-138.59375zm108.578125 373.410156c0 59.867188-48.707031 108.574219-108.578125 108.574219h-234.8125c-59.871094 0-108.578125-48.707031-108.578125-108.574219v-234.816406c0-59.871094 48.707031-108.578125 108.578125-108.578125h234.816406c59.867188 0 108.574219 48.707031 108.574219 108.578125zm0 0"></path>
                            <path d="m256 116.003906c-77.195312 0-139.996094 62.800782-139.996094 139.996094s62.800782 139.996094 139.996094 139.996094 139.996094-62.800782 139.996094-139.996094-62.800782-139.996094-139.996094-139.996094zm0 249.976563c-60.640625 0-109.980469-49.335938-109.980469-109.980469 0-60.640625 49.339844-109.980469 109.980469-109.980469 60.644531 0 109.980469 49.339844 109.980469 109.980469 0 60.644531-49.335938 109.980469-109.980469 109.980469zm0 0"></path>
                            <path d="m399.34375 66.285156c-22.8125 0-41.367188 18.558594-41.367188 41.367188 0 22.8125 18.554688 41.371094 41.367188 41.371094s41.371094-18.558594 41.371094-41.371094-18.558594-41.367188-41.371094-41.367188zm0 52.71875c-6.257812 0-11.351562-5.09375-11.351562-11.351562 0-6.261719 5.09375-11.351563 11.351562-11.351563 6.261719 0 11.355469 5.089844 11.355469 11.351563 0 6.257812-5.09375 11.351562-11.355469 11.351562zm0 0"></path>
                        </svg>
                        <span>@LeoKekemenis</span>
                    </li>
                    <?php endif;?>
                    <?php if ($photographer['twitter']): ?>
                    <li class="flex text-sm items-center gap-2">
                        <svg enable-background="new 0 0 1226.37 1226.37" height="14" width="14" viewBox="0 0 1226.37 1226.37" xmlns="http://www.w3.org/2000/svg">
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
                        </svg>
                        <span><?= $photographer['twitter'] ?></span>
                    </li>
                    <?php endif;?>
                    <?php if ($photographer['fb']): ?>
                    <li class="flex text-sm items-center gap-2">
                        <svg enable-background="new 0 0 24 24" height="14" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg">
                            <path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"></path>
                        </svg>
                        <span><?= $photographer['fb'] ?></span>
                    </li>
                    <?php endif;?>
                    <?php if ($photographer['website']): ?>
                    <li class="flex text-sm items-center gap-2">
                        <svg height="14" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg">
                            <path id="link-alt" d="m10.88 13.87a.744.744 0 0 1 -.53-.22 4.663 4.663 0 0 1 -.474-6.094 3.632 3.632 0 0 1 .473-.566l3.36-3.36a4.709 4.709 0 1 1 6.659 6.66l-1.84 1.84a.75.75 0 1 1 -1.06-1.06l1.84-1.84a3.215 3.215 0 0 0 0-4.54 3.285 3.285 0 0 0 -4.538 0l-3.36 3.36a2.44 2.44 0 0 0 -.3.358 3.189 3.189 0 0 0 .3 4.182.75.75 0 0 1 -.53 1.28zm-3.919 7.88a4.71 4.71 0 0 1 -3.329-8.04l1.84-1.84a.75.75 0 1 1 1.06 1.06l-1.84 1.84a3.215 3.215 0 0 0 0 4.54 3.285 3.285 0 0 0 4.538 0l3.36-3.36a3.092 3.092 0 0 0 .749-1.188 3.174 3.174 0 0 0 -.749-3.352.75.75 0 1 1 1.06-1.06 4.713 4.713 0 0 1 1.106 4.9 4.57 4.57 0 0 1 -1.106 1.76l-3.359 3.36a4.678 4.678 0 0 1 -3.33 1.38z" fill="rgb(0,0,0)"></path>
                        </svg>
                        <span><?= $photographer['website'] ?></span>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
            <!--  FIN PHOTOGRAPHE -->
        <?php endforeach; ?>
    </div>
</section>