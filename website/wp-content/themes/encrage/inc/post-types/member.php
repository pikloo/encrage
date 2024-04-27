<?php

if (!function_exists('member_informations_meta_box')) {
    /**
     * Déclaration de la Méta box informations pour le CPT Member
     * 
     * @return void
     */
    function member_informations_meta_box()
    {
        add_meta_box(
            'member_informations',
            'Informations',
            'member_informations_meta_box_html',
            'member'
        );
    }
}

add_action('add_meta_boxes', 'member_informations_meta_box');


if (!function_exists('member_informations_meta_box_html')) {
    /**
     * Affichage de la Méta box informations 
     *
     * @param WP_Post $post
     * @return void
     */
    function member_informations_meta_box_html($post)
    {
        $insta = get_post_meta($post->ID, 'insta', true);
        $fb = get_post_meta($post->ID, 'fb', true);
        $x = get_post_meta($post->ID, 'x', true);
        $website = get_post_meta($post->ID, 'website', true);
        $place = get_post_meta($post->ID, 'place', true);

        wp_nonce_field('member_informations' . $post->ID, '_wp_nonce_informations');

?>
        <table>
            <tbody>
                <tr>
                    <th><label for="insta">Instagram</label></th>
                    <td><input type="text" id="insta" name="_insta" value='<?= esc_attr($insta) ?>'></td>
                </tr>
                <tr>
                    <th><label for="x">X</label></th>
                    <td><input type="text" id="x" name="_x" value='<?= esc_attr($x) ?>'></td>
                </tr>
                <tr>
                    <th><label for="fb">Facebook</label></th>
                    <td><input type="text" id="fb" name="_fb" value='<?= esc_attr($fb) ?>'></td>
                </tr>
                <tr>
                    <th><label for="website">Site</label></th>
                    <td><input type="text" id="website" name="_website" value='<?= esc_attr($website) ?>'></td>
                </tr>
                <tr>
                    <th><label for="place">Lieu</label></th>
                    <td><input type="text" id="website" name="_place" value='<?= esc_attr($place) ?>'></td>
                </tr>
            </tbody>
        </table>
<?php

    }
}


if (!function_exists('member_informations_save_meta')) {
    /**
     * Sauvegarde des informations
     *
     * @param string $post_id
     * @return void
     */
    function member_informations_save_meta($post_id)
    {

        if (!isset($_POST['_wp_nonce_informations'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['_wp_nonce_informations'], 'member_informations' . $post_id)) {
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

add_action('save_post', 'member_informations_save_meta', 10, 2);