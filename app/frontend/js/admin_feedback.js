//Delete Accessories jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure to delete this?";
    $("#deleteAccessoriesModal .modal-body p").text(content);
    $("#deleteAccessoriesModal input[name='id']").val(id);
    $("#deleteAccessoriesModal").modal("show");
});

$(document).on('submit','#deleteAccessoriesForm', function(e) {
    e.preventDefault();
    var id = $("#deleteAccessoriesForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/UI/feedback_delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteAccessoriesForm')[0].reset();
            $('#deleteAccessoriesModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_feedback.php"
            });
        }
    });
});