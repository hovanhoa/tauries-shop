<?php
    $id = $_POST['id'];
    $status = $_POST['status'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "UPDATE product_comments SET status = '".$status."' WHERE id = '".$id."'";
    if ($conn->query($sql) === TRUE) {
        echo $status;
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>