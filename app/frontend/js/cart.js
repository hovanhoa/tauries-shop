$(document).ready(function() {
    $(".quantity-sel2").select2({
        theme: "bootstrap4",
    });
});


$('.btn-addcart').on('click', function(e) {
    var productid = $(this).data('id');
    var quantity = parseInt($(this).data('quantity'));
    var available = parseInt($(this).data('available'));
    if (available == 0) {
        Swal.fire({ 
            title: "Notification",
            text: "Sorry, this product is not available",
            icon: "error" ,
        });
    } else {
        $.ajax({
            url: "app/backend/cart/add.php",
            method: "POST",
            data: {id: productid, quantity: quantity},
            success: function(data) {
                console.log(data);
                if (data=='error') {
                    Swal.fire({ 
                        title: "Notification",
                        text: "Please login to use this service",
                        icon: "error" ,
                    });
                }
                else {
                    
                    $('#cart').html(data);
                    // console.log(data);
                }
            }
        });
    }
});

$(document).on('submit','#add-cart-form', function(e) {
    e.preventDefault();
    var productid = parseInt($("#add-cart-form input[name='id']").val());
    var quantity = parseInt($('#var-value').text());
    var available = parseInt($("#add-cart-form input[name='available']").val());
    if (available == 0) {
        Swal.fire({ 
            title: "Notification",
            text: "Sorry, this product is not available",
            icon: "error" ,
        });
    } 
    else {
        $.ajax({
            url: "app/backend/cart/add.php",
            method: "POST",
            data: {id: productid, quantity: quantity},
            success: function(data) {
                console.log(data);
                if (data=='error') {
                    Swal.fire({ 
                        title: "Notification",
                        text: "Please login to use this service",
                        icon: "error" ,
                    });
                }
                else {
                
                    $('#cart').html(data);
                    // console.log(data);
                }
            }
        });
    }
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function updatecart(id, quantity) {
    var quantity = parseInt(quantity);
    $.ajax({
        url: "app/backend/cart/update.php",
        method: "POST",
        data: {id: id, quantity: quantity},
        success: function(data) {
            $('#temporary').html(addCommas(data) + " VND");
            $('#total').html(addCommas(Math.ceil(data*1.1))+ " VND");
        }
    });
}

$(document).on('click','.btn-remove', function(e) {
    var name = $(this).data('name');
    $.ajax({
        url: "app/backend/cart/remove.php",
        method: "POST",
        data: {name: name},
        success: function(data) {
            window.location.reload();
        }
    });
});

$(document).on('click','.delete-cart', function(e) {
    $.ajax({
        url: "app/backend/cart/delete.php",
        method: "POST",
        success: function(data) {
            console.log(data);
            window.location.reload();
        }
    });
});

$(document).on('click','.btn-continue', function(e) {
    window.location.href = "laptop.php";
});

$(document).on('click','.btn-checkout', function(e) {
    $("#checkoutModal").modal('show');
});

$(document).on('submit','#checkoutForm', function(e) {
    e.preventDefault();
    var id = $("#checkoutForm input[name='cart-id']").val();
    var name = $("#checkoutForm input[name='cart-name']").val();
    var email = $("#checkoutForm input[name='cart-email']").val();
    var phone = $("#checkoutForm input[name='cart-phone']").val();
    var address = $("#checkoutForm input[name='cart-address']").val();
    var total = $("#checkoutForm input[name='cart-total']").val();
    var date = new Date();
    if (name=='' || email=='' || phone=='' || address=='') {
        Swal.fire({ 
            title: "Notification",
            text: "Please input all information!",
            icon: "error" ,
        });
    }
    else {
        $.ajax({
            url: "app/backend/cart/checkout.php",
            method: "POST",
            data: { name: name, email: email, phone: phone, address: address, id: id, total: total, date: date},
            success: function(data) {
                if (data == 'success') {
                    Swal.fire({ 
                        title: "Notification",
                        text: "Thank you for your order! We hope to see you again",
                        icon: "success" ,
                        didClose: () => window.location.href = "laptop.php"
                    });
                }
                else {
                    Swal.fire({ 
                        title: "Notification",
                        text: "There's something wrong! Please try again",
                        icon: "error" ,
                    });
                }
            }
        });
    }
});
