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


if (!function_exists('serie_gallery_meta_box')) {
 /**
     * Déclaration de la Méta box galerie d'image pour le CPT Série
     * 
     * @return void
     */
    function serie_gallery_meta_box(){
	add_meta_box(
		'serie_gallery',
		'Galerie d\'images',
		'serie_gallery_meta_box_html',
		'serie',
		'normal',
		'high'
	);
}

}
add_action( 'add_meta_boxes', 'serie_gallery_meta_box' );


if (!function_exists('serie_informations_meta_box_html')) {
    /**
     * Affichage de la Méta box informations 
     *
     * @param WP_Post $post
     * @return void
     */
    function serie_informations_meta_box_html($post)
    {

        $start_year = 2000;
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



if (!function_exists('serie_gallery_meta_box_html')) {
    function serie_gallery_meta_box_html($post){
        wp_nonce_field('serie_gallery' . $post->ID, '_wp_nonce_gallery');
        $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
        ?>
        <div id="gallery_wrapper">
            <div id="img_box_container">
            <?php 
            if ( isset( $gallery_data['image_url'] ) ){
                for( $i = 0; $i < count( $gallery_data['image_url'] ); $i++ ){
                ?>
                <div class="gallery_single_row dolu">
                  <div class="gallery_area image_container ">
                    <img class="gallery_img_img" src="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>" height="55" width="55" onclick="open_media_uploader_image_this(this)"/>
                    <input type="hidden"
                             class="meta_image_url"
                             name="gallery[image_url][]"
                             value="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>"
                      />
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
            ?>
            </div>
            <div style="display:none" id="master_box">
                <div class="gallery_single_row">
                    <div class="gallery_area image_container" onclick="open_media_uploader_image(this)">
                        <input class="meta_image_url" value="" type="hidden" name="gallery[image_url][]" />
                    </div> 
                    <div class="gallery_area"> 
                        <span class="button remove" onclick="remove_img(this)" title="Remove"><i class="fas fa-trash-alt"></i></span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="add_gallery_single_row">
              <input class="button add" type="button" value="+" onclick="open_media_uploader_image_plus();" title="Add image"/>
            </div>
        </div>
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

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset($_POST['_wp_nonce_informations'] ) && wp_verify_nonce($_POST['_wp_nonce_informations'], 'serie_informations' . $post_id));
        
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
                return;
        }
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    
        if ( 'serie' != $_POST['post_type'] )
            return;
     

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


if (!function_exists('serie_gallery_save_meta')) {
function serie_gallery_save_meta( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset($_POST['_wp_nonce_gallery'] ) && wp_verify_nonce($_POST['_wp_nonce_gallery'], 'serie_gallery' . $post_id));
    
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( 'serie' != $_POST['post_type'] )
        return;
 
    if ( $_POST['gallery'] ){
        
        // Construction du tableu de sauvegarde
        $gallery_data = array();
        for ($i = 0; $i < count( $_POST['gallery']['image_url'] ); $i++ ){
            if ( '' != $_POST['gallery']['image_url'][$i]){
                $gallery_data['image_url'][]  = $_POST['gallery']['image_url'][ $i ];
            }
        }
 
        if ( $gallery_data ) 
            update_post_meta( $post_id, 'gallery_data', $gallery_data );
        else 
            delete_post_meta( $post_id, 'gallery_data' );
    } 
    // Si tous les champs sont vides on supprime
    else{
        delete_post_meta( $post_id, 'gallery_data' );
    }
}

}
add_action( 'save_post', 'serie_gallery_save_meta' );


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
