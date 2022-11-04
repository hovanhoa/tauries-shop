<?php
    $id = $_POST['id'];
    $username = $_POST['username'];
    $content = $_POST['content'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "INSERT INTO product_comments(username,content,product_id) VALUES ('$username', '$content','$id')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>