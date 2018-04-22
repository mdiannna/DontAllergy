require("./bootstrap");

$(document).ready(function() {
  // Initialize datatables
  $(".data-table").DataTable();

  // Delete a post
  $(".delete-post").click(function() {
    post = $(this);
    swal("Are you sure you want to delete this post?", {
      buttons: {
        cancel: "cancel",
        yes: true
      }
    }).then(value => {
      switch (value) {
        case "yes":
          swal("Ok!", "Post deleted", "success");
          axios
            .delete("/user/post/delete", {
              data: { id: post.data("post") }
            })
            .then(function(response) {
              if (response.data.success) {
                post.parents(".card").fadeOut(function() {
                  $(this).remove();
                });
              }
            })
            .catch(function(error) {
              console.log(error);
            });
          break;
      }
    });
  });

  $("#post-something").click(function(e) {
    e.preventDefault();
    form = $("#post-form");
    formData = form.serializeArray();
    for (i = 1; i < formData.length; i++) {
        if (formData[i].value == '') {
            $('[name=' + formData[i].name + ']').addClass('is-invalid');
            $('[name=' + formData[i].name + ']').next().find('strong').text('This field is required!');
            return false;
        }
    }
    form.submit();
  });
});
