//Laptop Datatable
$("#table-laptop").DataTable({
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

//View laptop jquery
$(document).on('click', '.btn-view',function(e){  
    var title = $(this).data("title");
    var content = "Description: " + $(this).data("content");
    var price = "Price: " + $(this).data("price") + " VND";
    var img = $(this).data("img");
    $("#viewLaptopModal .modal-title").text(title);
    $("#viewLaptopModal .modal-body .card img").attr('src',img);
    $("#viewLaptopModal .modal-body p[name='description']").text(content);
    $("#viewLaptopModal .modal-body p[name='price']").text(price);
    $("#viewLaptopModal").modal("show");
});


//Edit laptop jquery
$('#edit-brand-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#editLaptopModal"),
    allowClear: false,
});

$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var name = $(this).data("name");
    var description = $(this).data("description");
    var price = $(this).data("price");
    var amount = $(this).data("amount");
    var brand = $(this).data("brand");
    var image = $(this).data("image");
    $("#editLaptopModal input[name='id']").val(id);
    $("#editLaptopModal input[name='name']").val(name);
    $("#editLaptopModal input[name='description']").val(description);
    $("#editLaptopModal input[name='price']").val(price);
    $("#editLaptopModal input[name='amount']").val(amount);
    $("#editLaptopModal input[name='image']").val(image);
    $("#edit-brand-sel2").val(brand);
    $("#edit-brand-sel2").trigger('change');
    $("#editLaptopModal").modal("show");
});

$(document).on('submit','#editLaptopForm', function(e) {
    e.preventDefault();
    var id = $("#editLaptopForm input[name='id']").val();
    var name = $("#editLaptopForm input[name='name']").val();
    var description = $("#editLaptopForm input[name='description']").val();
    var price = $("#editLaptopForm input[name='price']").val();
    var amount = $("#editLaptopForm input[name='amount']").val();
    var image = $("#editLaptopForm input[name='image']").val();
    var brand = $("#edit-brand-sel2").val();
    $.ajax({
        url: "app/backend/admin/laptop/edit.php",
        method: "POST",
        data: {id: id, name: name, description: description, amount: amount, price: price, brand: brand, image: image},
        success: function(data) {
            $('#editLaptopForm')[0].reset();
            $('#editLaptopModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_laptop.php"
            });
        }
    });
});

//Add laptop jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addLaptopModal").modal("show");
});

$('#add-brand-sel2').select2({
    theme: "bootstrap4",
    dropdownParent: $("#addLaptopModal"),
    allowClear: false,
});

$(document).on('submit','#addLaptopForm', function(e) {
    e.preventDefault();
    var name = $("#addLaptopForm input[name='name']").val();
    var description = $("#addLaptopForm input[name='description']").val();
    var price = $("#addLaptopForm input[name='price']").val();
    var amount = $("#addLaptopForm input[name='amount']").val();
    var image = $("#addLaptopForm input[name='image']").val();
    var brand = $("#add-brand-sel2").val();
    $.ajax({
        url: "app/backend/admin/laptop/add.php",
        method: "POST",
        data: {name: name, description: description, amount: amount, price: price, brand: brand, image: image},
        success: function(data) {
            $('#addLaptopForm')[0].reset();
            $('#addLaptopModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_laptop.php"
            });
        }
    });
});

//Delete laptop jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete '" + $(this).data("name") + "' from products?";
    $("#deleteLaptopModal .modal-body p").text(content);
    $("#deleteLaptopModal input[name='id']").val(id);
    $("#deleteLaptopModal").modal("show");
});

$(document).on('submit','#deleteLaptopForm', function(e) {
    e.preventDefault();
    var id = $("#deleteLaptopForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/laptop/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteLaptopForm')[0].reset();
            $('#deleteLaptopModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_laptop.php"
            });
        }
    });
});