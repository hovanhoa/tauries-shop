<?php
    session_start();
    $key = $_POST['name'];
    unset($_SESSION["cart"][$key]);
?>