<?php

if (!function_exists('release_informations_meta_box')) {
    /**
     * Déclaration de la Méta box informations pour le CPT Publication
     * 
     * @return void
     */
    function release_informations_meta_box()
    {
        add_meta_box(
            'release_informations',
            'Informations',
            'release_informations_meta_box_html',
            'release',
            'normal',
            'high'
        );
    }
}


add_action('add_meta_boxes', 'release_informations_meta_box');

if (!function_exists('release_informations_meta_box_html')) {
    /**
     * Affichage de la Méta box informations 
     *
     * @param WP_Post $post
     * @return void
     */
    function release_informations_meta_box_html($post)
    {

        $start_year = 2015;
        $year = get_post_meta($post->ID, 'year', true);
        $photographer = get_post_meta($post->ID, 'photographer', true);
        $place = get_post_meta($post->ID, 'place', true);
        wp_nonce_field('release_informations' . $post->ID, '_wp_nonce_informations');

        $args = [
            'post_type' => 'member',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'title',
            'post_status' => 'publish',
            'order' => 'ASC',
        ];

        $members = new WP_Query($args);
?>
        <table>
            <tbody>
                <tr>
                    <th><label for="year">Année</label></th>
                    <td>
                        <select name="_year" id="year">
                            <option value="">Sélectionner une année</option>
                            <?php for ($i = $start_year; $i <= date('Y'); $i++) : ?>
                                <option value="<?= $i ?>" <?php selected((int)$year, $i); ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="photographer">Photographe</label></th>
                    <td>
                        <select name="_photographer" id="photographer">
                            <option value="" <?php if (empty($photographer)) echo 'selected'; ?>>Sélectionner un(e) photographe</option>
                            <?php while ($members->have_posts()) : $members->the_post(); ?>
                                <option value="<?= the_ID() ?>" <?= (!empty($photographer)) && $photographer == get_the_ID() ?  'selected' : '' ?>>
                                    <?php the_title(); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="place">Lieu de publication</label></th>
                    <td><input type="text" id="place" placeholder="Libération, L'humanité..." name="_place" value='<?= esc_attr($place) ?>'></td>
                </tr>
            </tbody>
        </table>
<?php

    }
}


if (!function_exists('release_informations_save_meta')) {
    /**
     * Sauvegarde des informations
     *
     * @param string $post_id
     * @return void
     */
    function release_informations_save_meta($post_id)
    {

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset($_POST['_wp_nonce_informations'] ) && wp_verify_nonce($_POST['_wp_nonce_informations'], 'release_informations' . $post_id));
        
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
                return;
        }
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    
        if ( 'release' != $_POST['post_type'] )
            return;
     

        if (isset($_POST['_year'])) {
            update_post_meta($post_id, 'year', sanitize_text_field($_POST['_year']));
        }
        if (isset($_POST['_photographer'])) {
            update_post_meta($post_id, 'photographer', sanitize_text_field($_POST['_photographer']));
        }
        if (isset($_POST['_place'])) {
            update_post_meta($post_id, 'place', sanitize_text_field($_POST['_place']));
        }

        return $post_id;
    }
}

add_action('save_post', 'release_informations_save_meta', 10, 2);


if (!function_exists('release_list_table_head')) {
    /**
     * Customisation du header de la liste des publications
     *
     * @param [type] $defaults
     * @return void
     */
    function release_list_table_head($defaults)
    {
        $defaults['_photographer'] = 'Photographe';
        $defaults['_year'] = 'Année';
        $defaults['_place'] = 'Lieu de publication';
        return $defaults;
    }
}

add_filter('manage_release_posts_columns', 'release_list_table_head');


/**
 * Affichage du header custom de la liste des publications
 *
 * @param [type] $column_name
 * @param [type] $post_id
 * @return void
 */
function release_list_table_content($column_name, $post_id)
{
    if ($column_name == '_photographer') {
        $args = [
            'post_type' => 'member',
            'posts_per_page' => 1,
            'post_status' => 'publish',
            'p' => get_post_meta($post_id, 'photographer', true),
        ];

        $photographer = new WP_Query($args);
        while ($photographer->have_posts()) : $photographer->the_post();
            the_title();
        endwhile;
    }
    if ($column_name == '_year') {
        echo  esc_attr(get_post_meta($post_id, 'year', true));
    }
    if ($column_name == '_place') {
        echo  esc_attr(get_post_meta($post_id, 'place', true));
    }
}

add_action('manage_release_posts_custom_column', 'release_list_table_content', 10, 2);