//Comment Datatable
$("#table-comment").DataTable({
    responsive: true,
    // lengthChange: false,
    autoWidth: false,
    columnDefs: [
        {"className": "dt-center", "targets": "_all"}
    ],
});

//View comment jquery
$(document).on('click', '.btn-view',function(e){  
    var id = $(this).data("id");
    var title = "Comments on " + $(this).data("name");
    $("#viewCommentModal .modal-title").text(title);
    $.ajax({
        url: "app/backend/admin/comments/product_view.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#viewCommentModal .modal-body').html(data);
            $("#viewCommentModal").modal("show");
        }
    });
});

//Change status jquery
function read(id) {
    var readTitle = "#readCheckbox" + id;
    var blockTitle = "#blockCheckbox" + id;
    var status;
    if ($(readTitle).is(':checked')) {
        status = "read";
        $(blockTitle).prop('checked', false); 
    }
    else {
        status = "unread";
    }
    var title = "#status" + id;
    $.ajax({
        url: "app/backend/admin/comments/product_status.php",
        method: "POST",
        data: {id: id, status: status},
        success: function(data) {
            if (data == "read") {
                $(title).html("<span class='right badge badge-success'>Read</span>");
            }
            else if (data == "unread") {
                $(title).html("<span class='right badge badge-primary'>New</span>");
            }
            else console.log(data);
        }
    });
}

function block(id) {
    var blockTitle = "#blockCheckbox" + id;
    var readTitle = "#readCheckbox" + id;
    var status;
    if ($(blockTitle).is(':checked')) {
        status = "block";
        $(readTitle).prop('checked', false); 
    }
    else {
        status = "read";
    }
    var title = "#status" + id;
    $.ajax({
        url: "app/backend/admin/comments/product_status.php",
        method: "POST",
        data: {id: id, status: status},
        success: function(data) {
            if (data == "block") {
                $(title).html("<span class='right badge badge-danger'>Blocked</span>");
            }
            else if (data == "read") {
                $(readTitle).prop('checked', true); 
                $(title).html("<span class='right badge badge-success'>Read</span>");
            }
            else console.log(data);
        }
    });
}