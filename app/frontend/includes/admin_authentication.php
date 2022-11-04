<?php
    $admin_list = array();
    $check = 0;
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM users WHERE role ='admin'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
            $password = $row['password'];
            $temp = array($username => $password);
            $admin_list = $admin_list + $temp;
        }
    }
    $conn->close();
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Unauthorized';
        exit;
    } 
    else {
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];
        foreach ($admin_list as $key => $value) {
            if ($username == $key && $password == $value) {
                $check = 1;
                break;       
            }
        }
        if ($check == 0) {
            header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Unauthorized';
            exit;
        }
    }
?>