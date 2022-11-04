//Brand Datatable
$("#table-brand").DataTable({
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

//Add brand jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addBrandModal").modal("show");
});

$(document).on('submit','#addBrandForm', function(e) {
    e.preventDefault();
    var name = $("#addBrandForm input[name='name']").val();
    $.ajax({
        url: "app/backend/admin/brand/add.php",
        method: "POST",
        data: {name: name},
        success: function(data) {
            $('#addBrandForm')[0].reset();
            $('#addBrandModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_brand.php"
            });
        }
    });
});

// View brand jquery
$(document).on('click', '.btn-view',function(e){
    var brand = $(this).data('brand');
    var title = brand.toUpperCase() + " AVAILABLE PRODUCTS";
    $('#viewBrandModal .modal-title').html(title);
    $.ajax({
        url: "app/backend/admin/brand/view.php",
        method: "POST",
        data: {brand: brand},
        success: function(data) {
            $('#viewBrandModal .modal-body ul').html(data);
            $("#viewBrandModal").modal("show");
        }
    });
});

//Edit brand jquery
$(document).on('click', '.btn-edit',function(e){  
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#editBrandModal input[name='id']").val(id);
    $("#editBrandModal input[name='name']").val(name);
    $("#editBrandModal").modal("show");
});

$(document).on('submit','#editBrandForm', function(e) {
    e.preventDefault();
    var id = $("#editBrandForm input[name='id']").val();
    var name = $("#editBrandForm input[name='name']").val();
    $.ajax({
        url: "app/backend/admin/brand/edit.php",
        method: "POST",
        data: {id: id, name: name},
        success: function(data) {
            $('#editBrandForm')[0].reset();
            $('#editBrandModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_brand.php"
            });
        }
    });
});

//Delete brand jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete '" + $(this).data("name") + "' from laptop brand?";
    $("#deleteBrandModal .modal-body p").text(content);
    $("#deleteBrandModal input[name='id']").val(id);
    $("#deleteBrandModal").modal("show");
});

$(document).on('submit','#deleteBrandForm', function(e) {
    e.preventDefault();
    var id = $("#deleteBrandForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/brand/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteBrandForm')[0].reset();
            $('#deleteBrandModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_brand.php"
            });
        }
    });
});