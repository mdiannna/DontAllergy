require('./bootstrap');
require("datatables.net");

$(document).ready( function () {
    // Initialize datatables
    $('.data-table').DataTable();

    // Delete a post
    $('.delete-post').click(function() {
        post = $(this);
        axios.delete('/user/post/delete', { 
            data: { id: post.data('post') }
        })
        .then(function (response) {
            if (response.data.success) {
                post.parents('.card').fadeOut(function(){$(this).remove()});
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    })
} );
