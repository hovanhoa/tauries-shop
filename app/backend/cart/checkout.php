<?php
    session_start();
    $id = $_POST['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $total = $_POST['total'];
    $date = $_POST['date'];
    $error = 0;
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "INSERT INTO cart(user_id,address_cur,amount,date) VALUES('".$id."','".$address."','".$total."','".$date."')";
    if ($conn->query($sql) === FALSE) {
        $error = 1;
    }
    else {
        $sql = "SELECT id_cart FROM cart WHERE date = '".$date."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        foreach ($_SESSION["cart"] as $product){
            $sql = "INSERT INTO belong(cart_id,product_id,quantity) VALUES('".$row['id_cart']."','".$product['uid']."','".$product['quantity']."')";
            $sql1 = "UPDATE product SET amount = amount - ".$product['quantity']." WHERE uid = '".$product['uid']."'";
            if ($conn->query($sql) === FALSE) {
                $error = 1;
            }
            if ($conn->query($sql1) === FALSE) {
                $error = 1;
            } 
        }
    }
    if ($error == 1) echo "error";
    else {
        unset($_SESSION['cart']);
        if (!isset($_SESSION['cart'])) echo "success";
    }
?>