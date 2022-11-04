$(document).on('submit','#addCommentpost', function(e) {
    e.preventDefault();
    var content = $("#txtComment").val();
    var username = $("#userComment").val();
    var id_post = $("#postComment").val();

    $.ajax({
        url: "app/backend/news.php",
        method: "POST",
        data: {id_post: id_post, username: username, content: content},
        success: function(data) {
            location.reload();
        }
    });
});

function read_more() {
    var limit = $("#read_more_number").val();
    var id_post = $("#read_more_id").val();
    var incre_number = parseInt(limit) + 5;
    $("#read_more_number").val(incre_number);

    $.ajax({
        url: "app/backend/news_comment.php",
        method: "POST",
        data: {limit: incre_number, id_post: id_post},
        success: function(data) {
            document.getElementById("comment_list").innerHTML = data;
        }
    });
  }