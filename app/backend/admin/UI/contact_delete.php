<?php
    $create_date = $_POST['create_date'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "DELETE from contact_page WHERE create_date='".$create_date."'";
    if ($conn->query($sql) === TRUE) {
        echo "Delete successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
