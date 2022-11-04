<?php
    $username = $_POST['username'];
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM users WHERE username='".$username."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($oldpw,$row['password'])) {
        $newpw = password_hash($newpw, PASSWORD_BCRYPT, ['cost' => 12]);
        $sql = "UPDATE users SET password = '".$newpw."' WHERE username='".$username."'";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        }
    }
    else {
        echo "error";
    }

?>
