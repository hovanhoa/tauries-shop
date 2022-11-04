<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $website = $_POST['website'];
    // // $create_date = $_POST['create_date'];
    // $image = $_POST['image'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "INSERT INTO feedback(name,email,subject,message) VALUES('".$name."','".$email."','".$subject."','".$message."')";
    if ($conn->query($sql) === TRUE) {
        echo "Send successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
