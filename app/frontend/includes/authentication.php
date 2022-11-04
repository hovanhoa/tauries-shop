<?php
    if (isset($_COOKIE['username']) == false) {
        // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
        header('Location: login.php');
    }
?>