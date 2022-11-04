// //Accessories Datatable
// $("#table-accessories").DataTable({
//     responsive: true,
//     lengthChange: false,
//     autoWidth: false,
//     // paging: false,
//     // language: {
//     //     url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
//     // },
//     // buttons: [
//     //     {
//     //         text: "Thêm mới",
//     //         action: function (e, dt, node, config) {
//     //             window.location.href = "/faculty/add";
//     //         },
//     //     },
//     // ],
// });

//View Accessories jquery
$(document).on('click', '.btn-view',function(e){  
    // var title = $(this).data("title");
    // var content = "description: " + $(this).data("content");
    // var price = "Price: " + $(this).data("price") + " VND";
    var img = $(this).data("image");
    console.log(img);   
    // $("#viewAboutModal .modal-title").text(title);
    $("#viewAboutModal img").attr('src',img);
    // $("#viewAboutModal .modal-body p[name='description']").text(content);
    // $("#viewAboutModal .modal-body p[name='price']").text(price);
    $("#viewAboutModal").modal("show");
});

// $("#table-about").DataTable({
//     responsive: true,
//     lengthChange: false,
//     autoWidth: false,
//     "bPaginate": false,
//     "paging":   false,
//     // "ordering": false,
//     "info":     false,
//     "searching": false
// });

//choose
// var checked=0;
// $(document).on('click', '.custom-control-input',function(e){  
//     var id = $(this).data("id");
//     var idSwitch = $(this).data("idswitch");
//     console.log(idSwitch); 
//     // var content = "description: " + $(this).data("content");
//     // var price = "Price: " + $(this).data("price") + " VND";
//     // var img = $(this).data("image");
//     var checkBox = document.getElementById(idSwitch);
//     if (checkBox.checked == true && checked==0){
//         console.log('hehe');
//         checked=1;
//         $('#idSwitch').data('type',1); //setter
//         type=1;
//         $.ajax({
//             url: "app/backend/admin/UI/contact_edit.php",
//             method: "POST",
//             data: {id: id, type: type},
            
//         });
    
//       } else {
//         checked=0;
//         $('#idSwitch').data('type',0); //setter
//         type=0;
//         $.ajax({
//             url: "app/backend/admin/UI/contact_edit.php",
//             method: "POST",
//             data: {id: id, type: type},
            
//         });
//       }   
      
      // $("#viewAboutModal .modal-title").text(title);
    // $("#viewAboutModal img").attr('src',img);
    // $("#viewAboutModal .modal-body p[name='description']").text(content);
    // $("#viewAboutModal .modal-body p[name='price']").text(price);
//     // $("#viewAboutModal").modal("show");
// });



//Add Accessories jquery
$(document).on('click', '.btn-add',function(e){  
    $("#addContactModal").modal("show");
});

// $('#add-type-sel2').select2({
//     theme: "bootstrap4",
//     dropdownParent: $("#addContactModal"),
//     allowClear: false,
// });

$(document).on('submit','#addAccessoriesForm', function(e) {
    e.preventDefault();
    var address = $("#addAccessoriesForm input[name='address']").val();
    var phone = $("#addAccessoriesForm input[name='phone']").val();
    var email = $("#addAccessoriesForm input[name='email']").val();
    var website = $("#addAccessoriesForm input[name='website']").val();
    // var create_date = new Date(); 

    var image = $("#addAccessoriesForm input[name='image']").val();
    // var type = $("#add-type-sel2").val();
    $.ajax({
        url: "app/backend/admin/UI/contact_add.php",
        method: "POST",
        data: {address: address, phone: phone, email: email, website: website, image: image},
        success: function(data) {
            $('#addAccessoriesForm')[0].reset();
            $('#addContactModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Add successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_contact.php"
            });
        }
    });
});

//Delete Accessories jquery
$(document).on('click', '.btn-delete',function(e){
    var create_date = $(this).data("create_date");
    var content = "Are you sure to delete this?";
    $("#deleteAccessoriesModal .modal-body p").text(content);
    $("#deleteAccessoriesModal input[name='create_date']").val(create_date);
    $("#deleteAccessoriesModal").modal("show");
});

$(document).on('submit','#deleteAccessoriesForm', function(e) {
    e.preventDefault();
    var create_date = $("#deleteAccessoriesForm input[name='create_date']").val();
    $.ajax({
        url: "app/backend/admin/UI/contact_delete.php",
        method: "POST",
        data: {create_date: create_date},
        success: function(data) {
            $('#deleteAccessoriesForm')[0].reset();
            $('#deleteAccessoriesModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_contact.php"
            });
        }
    });
});

//Edit
$(document).on('click', '.btn-edit',function(e){  
    var id = $(this).data("id");
    var email = $(this).data("email");
    var phone = $(this).data("phone");
    var website = $(this).data("website");
    var address = $(this).data("address");
    var image = $(this).data("image");
    $("#editAboutModal input[name='id']").val(id);
    $("#editAboutModal input[name='email']").val(email);
    $("#editAboutModal input[name='phone']").val(phone);
    $("#editAboutModal input[name='website']").val(website);
    $("#editAboutModal input[name='address']").val(address);
    $("#editAboutModal input[name='image']").val(image);
    $("#editAboutModal").modal("show");
});

$(document).on('submit','#editAboutModal', function(e) {
    e.preventDefault();
    var id = $("#editAboutModal input[name='id']").val();
    var email = $("#editAboutModal input[name='email']").val();
    var phone = $("#editAboutModal input[name='phone']").val();
    var website = $("#editAboutModal input[name='website']").val();
    var address = $("#editAboutModal input[name='address']").val();
    var image = $("#editAboutModal input[name='image']").val();
    $.ajax({
        url: "app/backend/admin/UI/contact_edit.php",
        method: "POST",
        data: {id: id, email: email, phone: phone, website: website, address: address , image: image},
        success: function(data) {
            // $('#editAboutModal')[0].reset();
            $('#editAboutModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Update successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_contact.php"
            });
        }
    });
});


//add modal
// $(document).on('click', '.Cusmessage',function(e){  
//     $("#addContactModal").modal("show");
// });

// $('#add-type-sel2').select2({
//     theme: "bootstrap4",
//     dropdownParent: $("#addContactModal"),
//     allowClear: false,
// });


