<?php
    $id = $_POST['id'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $image = $_POST['image'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "UPDATE contact_page SET email = '".$email."' , address = '".$address."' , phone = '".$phone."' , website = '".$website."' , image = '".$image."'   WHERE id = '".$id."'";
    if ($conn->query($sql) === TRUE) {
        echo "Update successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>