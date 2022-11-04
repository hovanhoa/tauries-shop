//Account Datatable
$("#table-account").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    // paging: false,
    // language: {
    //     url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    // },
    // buttons: [
    //     {
    //         text: "Thêm mới",
    //         action: function (e, dt, node, config) {
    //             window.location.href = "/faculty/add";
    //         },
    //     },
    // ],
});


//Delete account jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete this post ?";
    $("#deleteAccountModal .modal-body p").text(content);
    $("#deleteAccountModal input[name='id']").val(id);
    $("#deleteAccountModal").modal("show");
});

$(document).on('submit','#deleteAccountForm', function(e) {
    e.preventDefault();
    var id = $("#deleteAccountForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/posts/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteAccountForm')[0].reset();
            $('#deleteAccountModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_post.php"
            });
        }
    });
});

//Add service jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addPostModal").modal("show");
});

$(document).on('click', '.delete_view',function(e){  
    var id = $(this).data("id");
    $.ajax({
        url: "app/backend/admin/posts/delete_comment.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            document.getElementById("comment" + id).innerHTML = "";
        }
    });
});


//View service jquery
$(document).on('click', '.btn-view',function(e){  
    var id = $(this).data("id");
    var title = $(this).data("title");
    var content = $(this).data("content");
    var image = $(this).data("image");
    var summary = $(this).data("summary");
    var author = $(this).data("author");
    var category = $(this).data("category");
    var date = $(this).data("date").substring(0,10);
    content = content.replace(/\r?\n/g, '<br />');
    $("#viewPostModal .modal-title").text(title);
    $("#img_view").attr('src',image);
    document.getElementById("content_view").innerHTML = content;
    document.getElementById("title_view").innerHTML = summary;
    document.getElementById("date_view").innerHTML = date;
    document.getElementById("category_view").innerHTML = category;
    document.getElementById("author_view").innerHTML ="Content - " + author + "&nbsp;&nbsp;&nbsp;";
    $.ajax({
        url: "app/backend/admin/posts/comment.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            document.getElementById("admin_comment").innerHTML = data;
        }
    });
    // $("#viewPostModal div[name='content']").text(content);
    $("#viewPostModal").modal("show");
});


$(document).on('submit','#addPostForm', function(e) {
    e.preventDefault();
    var title = $("#addPostForm input[name='title']").val();
    var content = $("#addPostForm textarea[name='content']").val();
    var summary = $("#addPostForm input[name='summary']").val();
    var image = $("#addPostForm input[name='image']").val();
    var author = $("#addPostForm input[name='author']").val();
    console.log(author);
    var category = $("#categoryid").val();
    $.ajax({
        url: "app/backend/admin/posts/add.php",
        method: "POST",
        data: {title: title, content: content, summary: summary, category: category, image: image, author: author},
        success: function(data) {
            $('#addPostForm')[0].reset();
            $('#addPostModal').modal('hide');
            console.log(data);
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_post.php"
            });
        }
    });
});

$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var title = $(this).data("title");
    var content = $(this).data("content");
    var image = $(this).data("image");
    var summary = $(this).data("summary");
    var category = $(this).data("category");
    var author = $(this).data("author");
    // console.log(category);
    $("#editPostModal input[name='id']").val(id);
    $("#editPostModal input[name='title']").val(title);
    $("#editPostModal textarea[name='content']").val(content);
    $("#editPostModal input[name='summary']").val(summary);
    $("#editPostModal input[name='image']").val(image);
    $("#editPostModal input[name='author']").val(author);
    $("#categoryid2").val(category);
    $("#categoryid2").trigger('change');
    $("#editPostModal").modal("show");
});

$(document).on('submit','#editPostForm', function(e) {
    e.preventDefault();
    var id = $("#editPostForm input[name='id']").val();
    var title = $("#editPostForm input[name='title']").val();
    var content = $("#editPostForm textarea[name='content']").val();
    var image = $("#editPostForm input[name='image']").val();
    var summary = $("#editPostForm input[name='summary']").val();
    var author = $("#editPostForm input[name='author']").val();
    var category = $("#editPostForm select[name='category']").val();
    $.ajax({
        url: "app/backend/admin/posts/edit.php",
        method: "POST",
        data: {id: id, title: title, content: content, summary: summary, category: category, image: image, author: author},
        success: function(data) {
            $('#editPostForm')[0].reset();
            $('#editPostForm').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_post.php"
            });
        }
    });
});