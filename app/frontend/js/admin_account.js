//Account Datatable
$("#table-account").DataTable({
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

//View account jquery
$(document).on('click', '.btn-view',function(e){  
    var username = $(this).data("username");
    var password = $(this).data("password");
    var title = "Account Details of " + $(this).data("name");
    $("#viewAccountModal .modal-title").text(title);
    $("#viewAccountModal input[name='username']").val(username);
    $("#viewAccountModal input[name='password']").val(password);
    $("#viewAccountModal").modal("show");
});

//Delete account jquery
$(document).on('click', '.btn-delete',function(e){
    var id = $(this).data("id");
    var content = "Are you sure you want to delete username '" + $(this).data("username") + "' from customer accounts?";
    $("#deleteAccountModal .modal-body p").text(content);
    $("#deleteAccountModal input[name='id']").val(id);
    $("#deleteAccountModal").modal("show");
});

$(document).on('submit','#deleteAccountForm', function(e) {
    e.preventDefault();
    var id = $("#deleteAccountForm input[name='id']").val();
    $.ajax({
        url: "app/backend/admin/account/delete.php",
        method: "POST",
        data: {id: id},
        success: function(data) {
            $('#deleteAccountForm')[0].reset();
            $('#deleteAccountModal').modal('hide');
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data == "Delete successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "admin_account.php"
            });
        }
    });
});