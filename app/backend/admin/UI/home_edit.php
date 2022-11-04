<?php
    $id = $_POST['id'];
    $title = $_POST['title'];
    $title2 = $_POST['title2'];
    $content = $_POST['content'];
    $image = $_POST['image'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "UPDATE carousel SET title = '".$title."' , title2 = '".$title2."' , content = '".$content."' , image = '".$image."'   WHERE id = '".$id."'";
    if ($conn->query($sql) === TRUE) {
        echo "Update successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>