<?php
    $id = strtolower($_POST['id']);
    $name = strtolower($_POST['name']);
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "UPDATE category SET name = '".$name."' WHERE id = '".$id."'";
    if ($conn->query($sql) === TRUE) {
        echo "Update successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>