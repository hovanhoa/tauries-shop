<?php
    session_start();
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM product WHERE uid = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION["cart"][$row['name']]['quantity'] = $quantity;
    $total_price = 0;
    foreach ($_SESSION["cart"] as $product){
        $total_price += ($product["price"]*$product["quantity"]);
    }
    echo $total_price;