<?php



if (!function_exists('create_post_type')) {
    /**
     * Génère un custom Post Type
     * 
     * @param string $singular
     * @param string $plural
     * @param string $menu_icon
     * @param string $description
     * 
     * @return void
     */
    function create_post_type(
        string $name,
        string $singular,
        string $plural,
        string $menu_icon,
        bool $is_category_enabled = false,
        array $support = ['title', 'editor', 'author', 'thumbnail'],
        string $description = '',
    ) {
        register_post_type($name, [
            'public'            => true,
            'show_in_rest'      => false,
            'description'       => $description,
            'menu_icon'         => $menu_icon,
            'hierarchical'      => false,
            'has_archive'       => true,
            'supports'          => $support,
            'menu_position'         => 5,
            'rewrite'           => [
                'slug' => strtolower($plural),
            ],
            'labels' => [
                'name'                      =>  __($plural, 'encrage'),
                'singular_name'             => __($singular, 'encrage'),
                'all_items'             => __('All ' . $plural, 'encrage'),
                'archives'              => __($plural . ' Archives', 'encrage'),
                'attributes'            => __($singular . ' Attributes', 'encrage'),
                'insert_into_item'      => __('Insert into ' . $singular, 'encrage'),
                'uploaded_to_this_item' => __('Uploaded to this ' . $singular, 'encrage'),
                'featured_image'        => __($singular . ' Featured image', 'encrage'),
                'set_featured_image'    => __('Set ' . $singular . ' featured image', 'encrage'),
                'remove_featured_image' => __('Remove ' . $singular . ' featured image', 'encrage'),
                'use_featured_image'    => __('Use as ' . $singular . ' featured image', 'encrage'),
                'filter_items_list'     => __('Filter ' . $plural . ' list', 'encrage'),
                'items_list_navigation' => __($plural . ' list navigation', 'encrage'),
                'items_list'            => __($plural . ' list', 'encrage'),
                'new_item'              => __('Add New ' . $singular, 'encrage'),
                'add_new'               => __('Add New ' . $singular, 'encrage'),
                'add_new_item'          => __('New ' . $singular, 'encrage'),
                'edit_item'             => __('Edit ' . $singular, 'encrage'),
                'view_item'             => __('View ' . $singular, 'encrage'),
                'view_items'            => __('View ' . $plural, 'encrage'),
                'search_items'          => __('Search ' . $plural, 'encrage'),
                'not_found'             => __('No ' . $plural . ' found', 'encrage'),
                'not_found_in_trash'    => __('No ' . $plural . ' found in trash', 'encrage'),
                'menu_name'             => __($plural, 'encrage'),
            ],
        ]);

        if ($is_category_enabled){
            register_taxonomy($name.'_category', $name, array(
                'rewrite'      => ['slug' => $name . 's/category'],
                'label' => __('Catégories', 'encrage'),
                'hierarchical' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'labels' => [
                    'singular_name' => __('Catégorie', 'txtdomain'),
                    'all_items' => __('Toutes les catégories', 'txtdomain'),
                    'edit_item' => __('Modifier les catégories', 'txtdomain'),
                    'view_item' => __('View Catégorie', 'txtdomain'),
                    'update_item' => __('Update Catégorie', 'txtdomain'),
                    'add_new_item' => __('Add New Catégorie', 'txtdomain'),
                    'new_item_name' => __('New Catégorie Name', 'txtdomain'),
                    'search_items' => __('Search Catégories', 'txtdomain'),
                    'parent_item' => __('Parent Catégorie', 'txtdomain'),
                    'parent_item_colon' => __('Parent Catégorie:', 'txtdomain'),
                    'not_found' => __('No Catégories found', 'txtdomain'),
                ]
            ));

            register_taxonomy_for_object_type($name.'_category', $name);
        }
            
    }
}
