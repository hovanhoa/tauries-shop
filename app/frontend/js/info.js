$(document).on('click', '.btn-hide',function(e){
    $("#changeAvatarModal").modal("hide");
    $("#changePasswordModal").modal("hide");
});

// $(document).on('submit', '#changeAvatarForm',function(e){
//     e.preventDefault();
//     var username = $("#changeAvatarForm input[name='username']").val();
//     var image = $("#changeAvatarForm input[name='image']").val();
//     if (image== '') {
//         Swal.fire({ 
//             title: "Notification",
//             text: "You haven\'t input your avatar!",
//             icon: "error" ,
//         });
//     }
//     else {
//         $.ajax({
//             url: "app/backend/info/changeavatar.php",
//             method: "POST",
//             data: {username: username, image: image},
//             success: function(status) {
//                 $('#changeAvatarForm')[0].reset();
//                 $('#changeAvatarModal').modal('hide');
//                 Swal.fire({ 
//                     title: "Notification",
//                     text: status == "success" ? "Avatar changed!" : "There was an error. Please try again",
//                     icon: status == "success" ? "success" : "error" ,
//                     didClose: () => window.location.reload()
//                 });
//             }
//         });
//     }
// });

$(document).on('submit', '#updateInfoForm',function(e){
    e.preventDefault();
    var username = $("#updateInfoForm input[name='username']").val();
    var name = $("#updateInfoForm input[name='name']").val();
    var email = $("#updateInfoForm input[name='email']").val();
    var phone = $("#updateInfoForm input[name='phone']").val();
    var address = $("#updateInfoForm input[name='address']").val();
    $.ajax({
        url: "app/backend/info/updateinfo.php",
        method: "POST",
        data: {username: username, name: name, email: email, phone: phone, address: address},
        success: function(status) {
            Swal.fire({ 
                title: "Notification",
                text: status == "success" ? "Information updated!" : "There was an error. Please try again",
                icon: status == "success" ? "success" : "error" ,
                didClose: () => window.location.reload()
            });
        }
    });
});

$(document).on('click', '.btn-changepw',function(e){
    $("#changePasswordModal").modal("show");
});

$(document).on('submit', '#changePasswordForm',function(e){
    e.preventDefault();
    var username = $("#changePasswordModal input[name='username']").val()
    var oldpw = $("#changePasswordForm input[name='oldpw']").val();
    var newpw = $("#changePasswordForm input[name='newpw']").val();
    if (oldpw == '' || newpw == '') {
        Swal.fire({ 
            title: "Notification",
            text: "Please type all information",
            icon: "error"
        });
    }
    else {
        $.ajax({
            url: "app/backend/info/changepassword.php",
            method: "POST",
            data: {username: username, oldpw: oldpw, newpw: newpw},
            success: function(status) {
                Swal.fire({ 
                    title: "Notification",
                    text: status == "error" ? "Wrong old password! Please try again." : "Your password has been changed",
                    icon: status == "error" ? "error" : "success" ,
                    didClose: () => {$("#changePasswordModal").modal("hide"); $("#changePasswordForm")[0].reset()}
                });
                // console.log(status);
            }
        });
    }
});
