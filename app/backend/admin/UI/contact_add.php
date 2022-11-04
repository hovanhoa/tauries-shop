<?php
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    // $create_date = $_POST['create_date'];
    $image = $_POST['image'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "INSERT INTO contact_page(address,phone,email,website,image) VALUES('".$address."','".$phone."','".$email."','".$website."','".$image."')";
    if ($conn->query($sql) === TRUE) {
        echo "Add successfully!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
