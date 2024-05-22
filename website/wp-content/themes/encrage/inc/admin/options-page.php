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
            'encrage_settings_page',
            'options_page_html',
            'dashicons-admin-generic',
            2
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
                settings_fields('encrage_settings');
                do_settings_sections('encrage_settings_page');
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
     * Définition du paramètre Logo
     *
     * @return void
     */
    function encrage_register_settings_logo()
    {
        add_settings_section(
            'encrage_general_section',
            'Options générales',
            'encrage_render_general_section',
            'encrage_settings_page'
        );


        add_settings_field(
            'encrage_logo',
            'Logo',
            'encrage_render_logo_field',
            'encrage_settings_page',
            'encrage_general_section'
        );

        register_setting(
            'encrage_settings',
            'encrage_logo',
            // 'encrage_handle_file_upload'
        );
    }
}


if (!function_exists('encrage_register_settings_home')) {
    add_action('admin_init', 'encrage_register_settings_home');
    /**
     * Définition du paramètre Slider(page d'accueil)
     *
     * @return void
     */
    function encrage_register_settings_home()
    {

        add_settings_section(
            'encrage_home_section',
            'Page d\'accueil',
            'encrage_render_home_section',
            'encrage_settings_page'
        );

        register_setting(
            'encrage_settings',
            'encrage_settings',
            'encrage_sanitize_theme_options'
            // 'encrage_handle_file_upload'
        );

        add_settings_field(
            'encrage_home_slider',
            'Galerie d\'images',
            'encrage_render_home_slider_field',
            'encrage_settings_page',
            'encrage_home_section'
        );

        add_settings_field(
            'encrage_home_series',
            'Mise en avant des porfolios',
            'encrage_render_home_common_publications_field',
            'encrage_settings_page',
            'encrage_home_section',
            ['post_type' => 'serie']
        );

        add_settings_field(
            'encrage_home_releases',
            'Mise en avant des publications',
            'encrage_render_home_common_publications_field',
            'encrage_settings_page',
            'encrage_home_section',
            ['post_type' => 'release']
        );
    }
}


if (!function_exists('encrage_sanitize_theme_options')) {
    function encrage_sanitize_theme_options($input)
    {
        $sanitized_input = array();

        if (isset($input['encrage_home_slider']))
            foreach ($input['encrage_home_slider'] as $key => $value) {
                if (empty($value))
                    unset($input['encrage_home_slider'][$key]);
            }


        foreach ($input as $key => $value) {

            $sanitized_input[$key] = $input[$key];
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
        $options = get_option('encrage_settings');
        $logo = isset($options['encrage_logo']) ? $options['encrage_logo'] : '';

    ?>
        <div id="image-single-wrapper">
            <input type="hidden" name="encrage_settings[encrage_logo]" value="<?php echo esc_attr($logo); ?>">
            <input class="button add" type="button" value="+" onclick="open_media_uploader_image_alone();" title="Add image" />
            <!-- <input type="button" id="upload_image_button" onclick="open_media_uploader_image_alone()" class="button add" value="Upload Image"> -->
            <div id="image-single-preview-wrapper">
                <img src="<?php echo esc_attr($logo); ?>" style="max-width: 200px;" id="custom_image_preview">
                <?php if ($logo) : ?>
                    <div style="position:relative"><span class="button remove-single" onclick="remove_img(this, true)" title="Supprimer"><i class="fas fa-trash-alt"></i> Supprimer</span></div>
                <?php endif; ?>
            </div>

        </div>
    <?php

    }
}

if (!function_exists('encrage_render_home_slider_field')) {
    function encrage_render_home_slider_field()
    {
        $options = get_option('encrage_settings');
        $slider = isset($options['encrage_home_slider']) ? $options['encrage_home_slider'] : '';
        // var_dump($slider);
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
                                    <input type="hidden" class="meta_image_url" name="encrage_settings[encrage_home_slider][]" value="<?php esc_html_e($slider[$i]); ?>" />
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
                    <input class="meta_image_url" value="" type="hidden" name="encrage_settings[encrage_home_slider][]" />
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


if (!function_exists('encrage_render_home_common_publications_field')) {
    function encrage_render_home_common_publications_field($args)
    {
        extract($args);

        $options = get_option('encrage_settings');
        $publications = match (true) {
            $post_type === 'serie' && isset($options['encrage_home_series']) => $options['encrage_home_series'],
            $post_type === 'release' && isset($options['encrage_home_releases']) => $options['encrage_home_releases'],
            default => ''
        };

        $args = [
            'post_type' => $post_type === 'serie' ? 'serie' : 'release',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'date',
        ];

        $publications_list = new WP_Query($args);

        $max = $post_type === 'serie' ? 6 : 8;

    ?>
        <table>
            <tbody>
                <?php for ($index = 0; $index < $max; $index++) : ?>
                    <tr class="form-field">
                        <td>
                            <span><?= $post_type === 'serie' ? 'Série' : 'Publication'; ?><?= '#' .  $index + 1 ?></span>
                        </td>
                        <td>
                            <select name="encrage_settings[encrage_home_<?= $post_type ?>s][<?php echo $index ?>]">
                                <?php while ($publications_list->have_posts()) : $publications_list->the_post(); ?>
                                    <option value="<?php the_ID() ?>" <?php echo (isset($publications[$index]) && (int)$publications[$index] === get_the_ID()) ? 'selected' : '' ?>><?= the_title() . ' -- ID:' . get_the_ID() ?></option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
<?php
        wp_reset_postdata();
    }
}
