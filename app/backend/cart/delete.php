<?php
    session_start();
    unset($_SESSION['cart']);
    if (isset($_SESSION['cart'])) echo "error";
    else echo "success";

?>
