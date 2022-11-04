<?php
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "UPDATE users SET name='".$name."', email='".$email."', phone='".$phone."', address='".$address."' WHERE username='".$username."'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>