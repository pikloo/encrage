<?php

if (!function_exists('gallery_logic')) {

    add_action('admin_footer', 'gallery_logic');
    add_action('admin_head-post.php', 'gallery_logic');
    add_action('admin_head-post-new.php', 'gallery_logic');

    /**
     * Gestion de la galerie
     * 
     * @return void
     *
     */
    function gallery_logic()
    {
        global $post;

        if (isset($post) && 'serie' != $post->post_type)
            return;
?>
        <script type="text/javascript">
            function remove_img(value, single = false) {        
                var parent = jQuery(value).parent().parent();
                parent.remove();

                if(single){
                    var html = '<input class="button add" type="button" value="+" onclick="open_media_uploader_image_alone();" title="Add image" />'
                    var target = jQuery('#logo_wrapper #add_gallery_single_row');
                    target.append(html);
                }
            }
            var media_uploader = null;

            function open_media_uploader_image(obj) {
                media_uploader = wp.media({
                    frame: "post",
                    state: "insert",
                    multiple: false
                });
                media_uploader.on("insert", function() {
                    var json = media_uploader.state().get("selection").first().toJSON();
                    var image_url = json.url;
                    var html = '<img class="gallery_img_img" src="' + image_url + '" height="55" width="55" onclick="open_media_uploader_image_this(this)"/>';
                    console.log(image_url);
                    jQuery(obj).append(html);
                    jQuery(obj).find('.meta_image_url').val(image_url);
                });
                media_uploader.open();
            }

            function open_media_uploader_image_this(obj) {
                media_uploader = wp.media({
                    frame: "post",
                    state: "insert",
                    multiple: false
                });
                media_uploader.on("insert", function() {
                    var json = media_uploader.state().get("selection").first().toJSON();
                    var image_url = json.url;
                    jQuery(obj).attr('src', image_url);
                    jQuery(obj).siblings('.meta_image_url').val(image_url);
                });
                media_uploader.open();
            }

            function open_media_uploader_image_plus() {
                media_uploader = wp.media({
                    frame: "post",
                    state: "insert",
                    multiple: true
                });
                media_uploader.on("insert", function() {

                    var length = media_uploader.state().get("selection").length;
                    var images = media_uploader.state().get("selection").models

                    for (var i = 0; i < length; i++) {
                        var image_url = images[i].changed.url;
                        var box = jQuery('#master_box').html();
                        jQuery(box).appendTo('#gallery_wrapper #img_box_container');
                        var element = jQuery('#gallery_wrapper #img_box_container .gallery_single_row:last-child').find('.image_container');
                        var html = '<img class="gallery_img_img" src="' + image_url + '" height="55" width="55" onclick="open_media_uploader_image_this(this)"/>';
                        element.append(html);
                        element.find('.meta_image_url').val(image_url);
                    }
                });
                media_uploader.open();
            }

            function open_media_uploader_image_alone() {
                media_uploader = wp.media({
                    frame: "post",
                    state: "insert",
                    multiple: false
                });
                media_uploader.on("insert", function() {

                    var image = media_uploader.state().get('selection').first().toJSON();
                    var target = jQuery('#img_box_container').parent()
                    target.append('<div id="image-single-wrapper"><img style="width:300px" src="' + image.sizes.medium.url + '"/><div style="position:relative"><span class="button remove-single" onclick="remove_img(this, true)" title="Supprimer"><i class="fas fa-trash-alt"></i> Supprimer</span></div></div>')
                    var button = jQuery('#logo_wrapper .add')
                    console.log(button)
                    button.remove()
                });
                media_uploader.open();
            }


            jQuery(function() {
                jQuery("#img_box_container").sortable(); // Activate jQuery UI sortable feature
            });
        </script>
<?php


    }
}
