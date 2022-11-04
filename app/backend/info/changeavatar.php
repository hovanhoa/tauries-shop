<?php
    $image = $_POST['image'];
    $username = $_POST['username'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "UPDATE users SET image='".$image."' WHERE username='".$username."'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>