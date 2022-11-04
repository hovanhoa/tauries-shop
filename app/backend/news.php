<?php
    $id_post = $_POST['id_post'];
    $username = $_POST['username'];
    $content = $_POST['content'];

    if(strlen($content) == 0) {
        $message = "Please comment with content!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else {
        $host = "localhost";
        $user = "root";
        $pw = "";
        $database = "laptop_business";
        $conn = mysqli_connect($host,$user,$pw,$database);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
        }
    
        $sql = "INSERT INTO comment_post(id_post, username, content) VALUES('".$id_post."','".$username."','".$content."')";
        if ($conn->query($sql) === TRUE) {
            echo "Add successfully!";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


?>