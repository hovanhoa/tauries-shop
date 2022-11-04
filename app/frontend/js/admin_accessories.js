//Accessories Datatable
$("#table-accessories").DataTable({
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

//View Accessories jquery
$(document).on('click', '.btn-view',function(e){  
    var title = $(this).data("title");
    var content = "Description: " + $(this).data("content");
    var price = "Price: " + $(this).data("price") + " VND";
    var img = $(this).data("img");
    $("#viewAccessoriesModal .modal-title").text(title);
    $("#viewAccessoriesModal .modal-body .card img").attr('src',img);
    $("#viewAccessoriesModal .modal-body p[name='description']").text(content);
    $("#viewAccessoriesModal .modal-body p[name='price']").text(price);
    $("#viewAccessoriesModal").modal("show");
});


//Edit Accessories jquery
$('#edit-type-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#editAccessoriesModal"),
    allowClear: false,
});

$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var name = $(this).data("name");
    var description = $(this).data("description");
    var price = $(this).data("price");
    var amount = $(this).data("amount");
    var type = $(this).data("type");
    var image = $(this).data("image");
    $("#editAccessoriesModal input[name='id']").val(id);
    $("#editAccessoriesModal input[name='name']").val(name);
    $("#editAccessoriesModal input[name='description']").val(description);
    $("#editAccessoriesModal input[name='price']").val(price);
    $("#editAccessoriesModal input[name='amount']").val(amount);
    $("#editAccessoriesModal input[name='image']").val(image);
    $("#edit-type-sel2").val(type);
    $("#edit-type-sel2").trigger('change');
    $("#editAccessoriesModal").modal("show");
});

$(document).on('submit','#editAccessoriesForm', function(e) {
    e.preventDefault();
    var id = $("#editAccessoriesForm input[name='id']").val();
    var name = $("#editAccessoriesForm input[name='name']").val();
    var description = $("#editAccessoriesForm input[name='description']").val();
    var price = $("#editAccessoriesForm input[name='price']").val();
    var amount = $("#editAccessoriesForm input[name='amount']").val();
    var image = $("#editAccessoriesForm input[name='image']").val()
    var type = $("#edit-type-sel2").val();
    $.ajax({
        url: "app/backend/admin/accessories/edit.php",
        method: "POST",
        data: {id: id, name: name, description: description, amount: amount, price: price, type: type, image: image},
        success: function(data) {
            $('#editAccessoriesForm')[0].reset();
            $('#editAccessoriesModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_accessories.php"
            });
        }
    });
});

//Add Accessories jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addAccessoriesModal").modal("show");
});

$('#add-type-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#addAccessoriesModal"),
    allowClear: false,
});

$(document).on('submit','#addAccessoriesForm', function(e) {
    e.preventDefault();
    var name = $("#addAccessoriesForm input[name='name']").val();
    var description = $("#addAccessoriesForm input[name='description']").val();
    var price = $("#addAccessoriesForm input[name='price']").val();
    var amount = $("#addAccessoriesForm input[name='amount']").val();
    var image = $("#addAccessoriesForm input[name='image']").val();
    var type = $("#add-type-sel2").val();
    $.ajax({
        url: "app/backend/admin/accessories/add.php",
        method: "POST",
        data: {name: name, description: description, amount: amount, price: price, type: type, image: image},
        success: function(data) {
            $('#addAccessoriesForm')[0].reset();
            $('#addAccessoriesModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_accessories.php"
            });
        }
    });
});

//Delete Accessories jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete '" + $(this).data("name") + "' from products?";
    $("#deleteAccessoriesModal .modal-body p").text(content);
    $("#deleteAccessoriesModal input[name='id']").val(id);
    $("#deleteAccessoriesModal").modal("show");
});

$(document).on('submit','#deleteAccessoriesForm', function(e) {
    e.preventDefault();
    var id = $("#deleteAccessoriesForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/accessories/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteAccessoriesForm')[0].reset();
            $('#deleteAccessoriesModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_accessories.php"
            });
        }
    });
});

