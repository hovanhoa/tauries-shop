$(document).on('submit','#commentForm', function(e) {
    e.preventDefault();
    var id = $("#commentForm input[name='id']").val();
    var username = $("#commentForm input[name='username']").val();
    var content = $("#commentForm textarea[name='comment']").val();
    if (content== '') {
        Swal.fire({ 
            title: "Notification",
            text: "You haven\'t written your comment!",
            icon: "error" ,
        });
    }
    else {
        $.ajax({
            url: "app/backend/product/sendcomment.php",
            method: "POST",
            data: {id: id, username: username, content: content},
            success: function(status) {
                Swal.fire({ 
                    title: "Notification",
                    text: status == "success" ? "Your comment has been sent!" : "There was an error. Please try again",
                    icon: status == "success" ? "success" : "error" ,
                    didClose: () => window.location.reload()
                });
            }
        });
    }
});