<?php



if (!function_exists('encrage_register_options_page')) {
    add_action('admin_menu', 'encrage_register_options_page');
    /**
     * Enregistrement de la page d'options
     *
     * @return void
     */
    function encrage_register_options_page()
    {
        add_menu_page(
            'Theme Options',
            'Theme Options',
            'manage_options',
            'theme-options',
            'options_page_html',
            'dashicons-admin-generic',
            1
        );
    }
}

if (!function_exists('options_page_html')) {
    /**
     * Affichage de la page d'options
     *
     * @return void
     */
    function options_page_html()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_GET['settings-updated'])) {
            add_settings_error(
                'encrage_options_messages',
                'encrage_options_message',
                esc_html__('Modifications enregistrées', 'encrage'),
                'updated'
            );
        }

        settings_errors('encrage_options_messages');

?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('encrage_theme_options');
                do_settings_sections('encrage_theme_options');
                submit_button('Enregistrer les modifications');
                ?>
            </form>
        </div>
    <?php
    }
}


if (!function_exists('encrage_register_settings_logo')) {
    add_action('admin_init', 'encrage_register_settings_logo');
    /**
     * Enregistrer les modifications
     *
     * @return void
     */
    function encrage_register_settings_logo()
    {
        add_settings_section(
            'encrage_general_section',
            'Options générales',
            'encrage_render_general_section',
            'encrage_theme_options'
        );


        // add_settings_field(
        //     'encrage_logo',
        //     'Logo',
        //     'encrage_render_logo_field',
        //     'encrage_theme_options',
        //     'encrage_general_section'
        // );
        
        // register_setting(
        //     'encrage_theme_options',
        //     'encrage_logo',
        //     'encrage_sanitize_theme_options'
        // );

        
    }
}


if (!function_exists('encrage_register_settings_slider')) {
    add_action('admin_init', 'encrage_register_settings_slider');
    /**
     * Enregistrer les modifications
     *
     * @return void
     */
    function encrage_register_settings_slider()
    {

        add_settings_section(
            'encrage_home_section',
            'Page d\'accueil',
            'encrage_render_home_section',
            'encrage_theme_options'
        );



        add_settings_field(
            'encrage_home_slider',
            'Galerie d\'images',
            'encrage_render_home_slider_field',
            'encrage_theme_options',
            'encrage_home_section'
        );

        
       
        register_setting(
            'encrage_theme_options',
            'encrage_theme_options',
            // 'encrage_sanitize_theme_options'
        );

        
    }
}


if (!function_exists('encrage_sanitize_theme_options')) {
    function encrage_sanitize_theme_options($input)
    {
        $sanitized_input = array();

        foreach ($input as $key => $value) {
            if (isset($input[$key])) {
                if (!$input['encrage_home_slider']) {
                    $sanitized_input[$key] = sanitize_text_field($input[$key]);
                } else {
                    //TODO: Vérifier les types MIME et poids de l'image
                    $sanitized_input[$key] = $input[$key];
                }
            }
        }

        return $sanitized_input;
    }
}

if (!function_exists('encrage_render_general_section')) {
    function encrage_render_general_section()
    {
        echo '<p>Réglages des paramètres généraux pour le site.</p>';
    }
}

if (!function_exists('encrage_render_home_section')) {
    function encrage_render_home_section()
    {
        echo '<p>Réglages de la page d\'accueil du site.</p>';
    }
}

if (!function_exists('encrage_render_logo_field')) {
    function encrage_render_logo_field()
    {
        $options = get_option('encrage_logo');
        $logo = isset($options['encrage_logo']) ? $options['encrage_logo'] : '';
    ?>
        <div id="logo_wrapper">
            <div id="img_box_container">
                <?php
                if (!empty($logo)) {
                    // for ($i = 0; $i < count($slider); $i++) {
                    //     if ($slider[$i] !== '') {
                ?>
                            <div id="image-single-wrapper">
                                <img style="width:300px" src=<?= $logo ?>/><div style="position:relative"><span class="button remove-single" onclick="remove_img(this, true)" title="Supprimer"><i class="fas fa-trash-alt"></i> Supprimer</span></div></div>
                            
                            <!-- <div class="gallery_single_row dolu">
                                <div class="gallery_area image_container ">
                                    <img class="gallery_img_img" src="<?php esc_html_e($logo); ?>" height="55" width="55" onclick="open_media_uploader_image_this(this)" />
                                    <input type="hidden" class="meta_image_url" name="encrage_theme_options[encrage_logo]" value="<?php esc_html_e($logo) ?>" />
                                </div>
                                <div class="gallery_area">
                                    <span class="button remove" onclick="remove_img(this)" title="Supprimer"><i class="fas fa-trash-alt"></i></span>
                                </div>
                                <div class="clear" />
                            </div> -->
            </div>
<?php
                        }
                //     }
                // }
?>
        </div>
        <div style="display:none" id="master_box">
            <div class="gallery_single_row">
                <div class="gallery_area image_container" onclick="open_media_uploader_image(this)">
                    <input class="meta_image_url" value="" type="hidden" name="encrage_theme_options[encrage_logo]" />
                </div>
                <div class="gallery_area">
                    <span class="button remove" onclick="remove_img(this)" title="Supprimer"><i class="fas fa-trash-alt"></i></span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php if (empty($logo)) : ?>
        <div id="add_gallery_single_row">
            <input class="button add" type="button" value="+" onclick="open_media_uploader_image_alone();" title="Add image" />
        </div>
        <?php endif;?>
        </div>
    <?php

    }
}

if (!function_exists('encrage_render_home_slider_field')) {
    function encrage_render_home_slider_field()
    {
        $options = get_option('encrage_theme_options');
        $slider = isset($options['encrage_home_slider']) ? $options['encrage_home_slider'] : '';
    ?>

        <div id="gallery_wrapper">
            <div id="img_box_container">
                <?php
                if (!empty($slider)) {
                    for ($i = 0; $i < count($slider); $i++) {
                        if ($slider[$i] !== '') {
                ?>
                            <div class="gallery_single_row dolu">
                                <div class="gallery_area image_container ">
                                    <img class="gallery_img_img" src="<?php esc_html_e($slider[$i]); ?>" height="55" width="55" onclick="open_media_uploader_image_this(this)" />
                                    <input type="hidden" class="meta_image_url" name="encrage_theme_options[encrage_home_slider][]" value="<?php esc_html_e($slider[$i]); ?>" />
                                </div>
                                <div class="gallery_area">
                                    <span class="button remove" onclick="remove_img(this)" title="Remove"><i class="fas fa-trash-alt"></i></span>
                                </div>
                                <div class="clear" />
                            </div>
            </div>
<?php
                        }
                    }
                }
?>
        </div>
        <div style="display:none" id="master_box">
            <div class="gallery_single_row">
                <div class="gallery_area image_container" onclick="open_media_uploader_image(this)">
                    <input class="meta_image_url" value="" type="hidden" name="encrage_theme_options[encrage_home_slider][]" />
                </div>
                <div class="gallery_area">
                    <span class="button remove" onclick="remove_img(this)" title="Remove"><i class="fas fa-trash-alt"></i></span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="add_gallery_single_row">
            <input class="button add" type="button" value="+" onclick="open_media_uploader_image_plus();" title="Add image" />
        </div>
        </div>

<?php
    }
}
