$(document).on('click','#sendMessage', function(e) {
    console.log('ihi');
    e.preventDefault();
    var name = $("#message input[name='name']").val();
    var email = $("#message input[name='email']").val();
    var subject = $("#message input[name='subject']").val();
    var message = $("#message textarea[name='message']").val();
    // var create_date = new Date(); 

    // var image = $("#message input[name='image']").val();
    // var type = $("#add-type-sel2").val();
    $.ajax({
        url: "app/backend/feedback.php",
        method: "POST",
        data: {name: name, subject: subject, email: email, message: message},
        success: function(data) {
            Swal.fire({ 
                title: "Notification",
                text: data,
                icon: data =="Send successfully!" ? "success" : "error" ,
                didClose: () => window.location.href = "contact.php"
            });
        }
    });
});