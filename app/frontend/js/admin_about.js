//View Accessories jquery
$(document).on('click', '.btn-view',function(e){  
    var title = $(this).data("title");
    var content = "description: " + $(this).data("content");
    // var price = "Price: " + $(this).data("price") + " VND";
    var img = $(this).data("image");
    $("#viewAboutModal .modal-title").text(title);
    $("#viewAboutModal .modal-body .card img").attr('src',img);
    $("#viewAboutModal .modal-body p[name='description']").text(content);
    // $("#viewAboutModal .modal-body p[name='price']").text(price);
    $("#viewAboutModal").modal("show");
});

$("#table-about").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    "bPaginate": false,
    "paging":   false,
    // "ordering": false,
    "info":     false,
    "searching": false
});



//Edit
$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var title = $(this).data("title");
    var description = $(this).data("description");
    var content = $(this).data("content");
    var image = $(this).data("image");
    $("#editAboutModal input[name='id']").val(id);
    $("#editAboutModal input[name='title']").val(title);
    $("#editAboutModal input[name='description']").val(description);
    $("#editAboutModal textarea[name='content']").val(content);
    $("#editAboutModal input[name='image']").val(image);
    $("#editAboutModal").modal("show");
});

$(document).on('submit','#editAboutModal', function(e) {
    e.preventDefault();
    var id = $("#editAboutModal input[name='id']").val();
    var title = $("#editAboutModal input[name='title']").val();
    var description = $("#editAboutModal input[name='description']").val();
    var content = $("#editAboutModal textarea[name='content']").val();
    var image = $("#editAboutModal input[name='image']").val();
    $.ajax({
        url: "app/backend/admin/UI/about_edit.php",
        method: "POST",
        data: {id: id, title: title, content: content, description: description, image: image},
        success: function(data) {
            // $('#editAboutModal')[0].reset();
            $('#editAboutModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_about.php"
            });
        }
    });
});

//Add Accessories jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addContactModal").modal("show");
});

$('#add-type-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#addContactModal"),
    allowClear: false,
});

$(document).on('submit','#addAccessoriesForm', function(e) {
    e.preventDefault();
    var title = $("#addAccessoriesForm input[name='title']").val();
    var description = $("#addAccessoriesForm input[name='description']").val();
    var content = $("#addAccessoriesForm input[name='content']").val();
    // var website = $("#addAccessoriesForm input[name='website']").val();
    // var create_date = new Date(); 

    var image = $("#addAccessoriesForm input[name='image']").val();
    // var type = $("#add-type-sel2").val();
    $.ajax({
        url: "app/backend/admin/UI/about_add.php",
        method: "POST",
        data: {title: title, description: description, content: content, image: image},
        success: function(data) {
            $('#addAccessoriesForm')[0].reset();
            $('#addContactModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_about.php"
            });
        }
    });
});

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
        url: "app/backend/admin/UI/about_delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteAccessoriesForm')[0].reset();
            $('#deleteAccessoriesModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_about.php"
            });
        }
    });
});

