//Service Datatable
$("#table-service").DataTable({
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

//View service jquery
$(document).on('click', '.btn-view',function(e){  
    var title = $(this).data("title");
    var content = "Description: " + $(this).data("content");
    var price = "Price: " + $(this).data("price") + " VND";
    var img = $(this).data("img");
    $("#viewServiceModal .modal-title").text(title);
    $("#viewServiceModal .modal-body .card img").attr('src',img);
    $("#viewServiceModal .modal-body p[name='description']").text(content);
    $("#viewServiceModal .modal-body p[name='price']").text(price);
    $("#viewServiceModal").modal("show");
});


//Edit service jquery
$('#edit-type-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#editServiceModal"),
    allowClear: false,
});

$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var name = $(this).data("name");
    var description = $(this).data("description");
    var price = $(this).data("price");
    var type = $(this).data("type");
    var image = $(this).data("image");
    $("#editServiceModal input[name='id']").val(id);
    $("#editServiceModal input[name='name']").val(name);
    $("#editServiceModal input[name='description']").val(description);
    $("#editServiceModal input[name='price']").val(price);
    $("#editServiceModal input[name='image']").val(image);
    $("#edit-type-sel2").val(type);
    $("#edit-type-sel2").trigger('change');
    $("#editServiceModal").modal("show");
});

$(document).on('submit','#editServiceForm', function(e) {
    e.preventDefault();
    var id = $("#editServiceForm input[name='id']").val();
    var name = $("#editServiceForm input[name='name']").val();
    var description = $("#editServiceForm input[name='description']").val();
    var price = $("#editServiceForm input[name='price']").val();
    var image = $("#editServiceForm input[name='image']").val();
    var type = $("#edit-type-sel2").val();
    $.ajax({
        url: "app/backend/admin/service/edit.php",
        method: "POST",
        data: {id: id, name: name, description: description, price: price, type: type, image: image},
        success: function(data) {
            $('#editServiceForm')[0].reset();
            $('#editServiceModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_service.php"
            });
        }
    });
});

//Add service jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addServiceModal").modal("show");
});

$('#add-type-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#addServiceModal"),
    allowClear: false,
});

$(document).on('submit','#addServiceForm', function(e) {
    e.preventDefault();
    var name = $("#addServiceForm input[name='name']").val();
    var description = $("#addServiceForm input[name='description']").val();
    var price = $("#addServiceForm input[name='price']").val();
    var image = $("#addServiceForm input[name='image']").val();
    var type = $("#add-type-sel2").val();
    $.ajax({
        url: "app/backend/admin/service/add.php",
        method: "POST",
        data: {name: name, description: description, price: price, type: type, image: image},
        success: function(data) {
            $('#addServiceForm')[0].reset();
            $('#addServiceModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_service.php"
            });
        }
    });
});

//Delete service jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete '" + $(this).data("name") + "' from service?";
    $("#deleteServiceModal .modal-body p").text(content);
    $("#deleteServiceModal input[name='id']").val(id);
    $("#deleteServiceModal").modal("show");
});

$(document).on('submit','#deleteServiceForm', function(e) {
    e.preventDefault();
    var id = $("#deleteServiceForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/service/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteServiceForm')[0].reset();
            $('#deleteServiceModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_service.php"
            });
        }
    });
});