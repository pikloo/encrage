window.addEventListener('DOMContentLoaded', function(event){


// const loadMoreButton = document.querySelector('.load-more');

// loadMoreButton.addEventListener('click', async (e) => {
//     const data = {
//         'action' : 'loadmore',
//         'query': load_more_params.posts, // that's how we get params from wp_localize_script() function
//         'page' : load_more_params.current_page
//     }

//     await fetch(load_more_params.ajaxurl, {
//         method: 'POST',
//         body: JSON.stringify(data),
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     }).then((response) => {
//         return response.text();
//     }).then((data) => {
//         console.log(data);
//         load_more_params.current_page++
//         if (data) {
//             if ( load_more_params.current_page == load_more_params.max_page ) { 
//                 e.currentTarget.remove();
//             }
//         }else {
//             e.currentTarget.remove();
//         }
        
//     });
// });

});