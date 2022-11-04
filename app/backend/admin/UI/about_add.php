<?php
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    // $website = $_POST['website'];
    // // $create_date = $_POST['create_date'];
    $image = $_POST['image'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "INSERT INTO about_page(title,description,content,image) VALUES('".$title."','".$description."','".$content."','".$image."')";
    if ($conn->query($sql) === TRUE) {
        echo "Add successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
