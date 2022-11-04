//Accessories Datatable
$("#table-accessories").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    "bPaginate": false,
    "paging":   false,
    // "ordering": false,
    "info":     false,
    "searching": false
});




$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var title = $(this).data("title");
    var summary = $(this).data("title2");
    var content = $(this).data("content");
    var image = $(this).data("image");
    $("#editHomeModal input[name='id']").val(id);
    $("#editHomeModal input[name='title']").val(title);
    $("#editHomeModal input[name='title2']").val(summary);
    $("#editHomeModal textarea[name='content']").val(content);
    $("#editHomeModal input[name='image']").val(image);
    $("#editHomeModal").modal("show");
});

$(document).on('submit','#editHomeModal', function(e) {
    e.preventDefault();
    var id = $("#editHomeModal input[name='id']").val();
    var title = $("#editHomeModal input[name='title']").val();
    var title2 = $("#editHomeModal input[name='title2']").val();
    var content = $("#editHomeModal textarea[name='content']").val();
    var image = $("#editHomeModal input[name='image']").val();
    $.ajax({
        url: "app/backend/admin/UI/home_edit.php",
        method: "POST",
        data: {id: id, title: title, content: content, title2: title2, image: image},
        success: function(data) {
            // $('#editHomeModal')[0].reset();
            $('#editHomeModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_home.php"
            });
        }
    });
});

