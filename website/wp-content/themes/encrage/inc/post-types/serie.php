<?php

if (!function_exists('serie_informations_meta_box')) {
    /**
     * Déclaration de la Méta box informations pour le CPT Série
     * 
     * @return void
     */
    function serie_informations_meta_box()
    {
        add_meta_box(
            'serie_informations',
            'Informations',
            'serie_informations_meta_box_html',
            'serie',
            'normal',
            'high'
        );
    }
}


add_action('add_meta_boxes', 'serie_informations_meta_box');


if (!function_exists('serie_informations_meta_box_html')) {
    /**
     * Affichage de la Méta box informations 
     *
     * @param WP_Post $post
     * @return void
     */
    function serie_informations_meta_box_html($post)
    {

        $start_year = 2015;
        $year = get_post_meta($post->ID, 'year', true);
        $photographer = get_post_meta($post->ID, 'photographer', true);
        wp_nonce_field('serie_informations' . $post->ID, '_wp_nonce_informations');

        $args = [
            'post_type' => 'member',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ];

        $members = new WP_Query($args);
        // var_dump($members);exit();
?>
        <table>
            <tbody>
                <tr>
                    <th><label for="year">Année</label></th>
                    <td>
                        <select name="_year" id="year">
                            <option value="">Sélectionner une année</option>
                            <?php for ($i = $start_year; $i <= date('Y'); $i++) : ?>
                                <option value="<?= $i ?>" <?php selected($year, $i); ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="photographer">Photographe</label></th>
                    <td><input type="text" id="photographer" name="_photographer" value='<?= esc_attr($photographer) ?>'></td>
                </tr>
            </tbody>
        </table>
<?php

    }
}


if (!function_exists('serie_informations_save_meta')) {
    /**
     * Sauvegarde des informations
     *
     * @param string $post_id
     * @return void
     */
    function serie_informations_save_meta($post_id)
    {

        if (!isset($_POST['_wp_nonce_informations'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['_wp_nonce_informations'], 'serie_informations' . $post_id)) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        if (isset($_POST['_insta'])) {
            update_post_meta($post_id, 'insta', sanitize_text_field($_POST['_insta']));
        }
        if (isset($_POST['_x'])) {
            update_post_meta($post_id, 'x', sanitize_text_field($_POST['_x']));
        }
        if (isset($_POST['_fb'])) {
            update_post_meta($post_id, 'fb', sanitize_text_field($_POST['_fb']));
        }
        if (isset($_POST['_website'])) {
            update_post_meta($post_id, 'website', sanitize_text_field($_POST['_website']));
        }
        if (isset($_POST['_place'])) {
            update_post_meta($post_id, 'place', sanitize_text_field($_POST['_place']));
        }

        return $post_id;
    }
}

add_action('save_post', 'serie_informations_save_meta', 10, 2);
