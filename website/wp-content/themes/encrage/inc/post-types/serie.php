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

        if (isset($_POST['_year'])) {
            update_post_meta($post_id, 'year', sanitize_text_field($_POST['_year']));
        }
        if (isset($_POST['_photographer'])) {
            update_post_meta($post_id, 'photographer', sanitize_text_field($_POST['_photographer']));
        }

        return $post_id;
    }
}

add_action('save_post', 'serie_informations_save_meta', 10, 2);


if (!function_exists('serie_list_table_head')) {
    /**
     * Customisation du header de la liste des portfolios
     *
     * @param [type] $defaults
     * @return void
     */
    function serie_list_table_head($defaults)
    {
        $defaults['_photographer'] = 'Photographe';
        $defaults['_year'] = 'Année';
        return $defaults;
    }
}

add_filter('manage_serie_posts_columns', 'serie_list_table_head');


/**
 * Affichage du header custom de la liste des portfolios
 *
 * @param [type] $column_name
 * @param [type] $post_id
 * @return void
 */
function serie_list_table_content($column_name, $post_id)
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
}

add_action('manage_serie_posts_custom_column', 'serie_list_table_content', 10, 2);
