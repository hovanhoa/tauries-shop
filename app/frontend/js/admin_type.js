//Type Datatable
$("#table-type").DataTable({
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

//Add type jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addTypeModal").modal("show");
});

$(document).on('submit','#addTypeForm', function(e) {
    e.preventDefault();
    var name = $("#addTypeForm input[name='name']").val();
    $.ajax({
        url: "app/backend/admin/type/add.php",
        method: "POST",
        data: {name: name},
        success: function(data) {
            $('#addTypeForm')[0].reset();
            $('#addTypeModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_type.php"
            });
        }
    });
});

//View type jquery
// $(document).on('click', '.btn-view',function(e){
//     var type = $(this).data('type');
//     console.log(type);  
//     $("#viewTypeModal").modal("show");
//     $.post("app/frontend/admin/type.php", {type: type});
// });

//Edit type jquery
$(document).on('click', '.btn-edit',function(e){  
    var name = $(this).data("name");
    var id = $(this).data("id");
    $("#editTypeModal input[name='id']").val(id);
    $("#editTypeModal input[name='name']").val(name);
    $("#editTypeModal").modal("show");
});

$(document).on('submit','#editTypeForm', function(e) {
    e.preventDefault();
    var id = $("#editTypeForm input[name='id']").val();
    var name = $("#editTypeForm input[name='name']").val();
    $.ajax({
        url: "app/backend/admin/type/edit.php",
        method: "POST",
        data: {id: id, name: name},
        success: function(data) {
            $('#editTypeForm')[0].reset();
            $('#editTypeModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_type.php"
            });
        }
    });
});

//Delete type jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete '" + $(this).data("name") + "' from accessories type?";
    $("#deleteTypeModal .modal-body p").text(content);
    $("#deleteTypeModal input[name='id']").val(id);
    $("#deleteTypeModal").modal("show");
});

$(document).on('submit','#deleteTypeForm', function(e) {
    e.preventDefault();
    var id = $("#deleteTypeForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/type/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteTypeForm')[0].reset();
            $('#deleteTypeModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_type.php"
            });
        }
    });
});

// View type jquery
$(document).on('click', '.btn-view',function(e){
    var type = $(this).data('type');
    var title = type.toUpperCase() + " AVAILABLE PRODUCTS";
    $('#viewTypeModal .modal-title').html(title);
    $.ajax({
        url: "app/backend/admin/type/view.php",
        method: "POST",
        data: {type: type},
        success: function(data) {
            $('#viewTypeModal .modal-body ul').html(data);
            $("#viewTypeModal").modal("show");
        }
    });
});