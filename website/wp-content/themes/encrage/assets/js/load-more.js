const ajaxurl = ajax_posts.ajaxurl;
jQuery.noConflict();
jQuery(function ($) {

  $('body').on('click', '.load-more', function (e) {
    ajax_posts.current_page++;
    const grid = $('.mgrid');
    const button = $('.load-more');
    const originalButtonText = button.text();
    const data = {
      'action': 'load_posts_by_ajax',
      'page': ajax_posts.current_page,
      'post_type': ajax_posts.post_type,
      // 'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
    };

    $.ajax({ 
			url :ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text( 'Chargement...' )
			},
			success : function( data ){
				if( data ) { 
          			grid.append(data);
					console.log(data)
					//   data.each(function() {
					// 	$( this ).addClass( "inview" );
					//   });
					button.text( originalButtonText )
					if ( ajax_posts.current_page == ajax_posts.max_page) { 
						button.remove()
					}
				} else {
					button.remove()
				}
			}
		})
  });
});