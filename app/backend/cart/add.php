<?php
    if (!isset($_COOKIE['username'])) {
        echo "error";
    }
    else {
        session_start();
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $host = "localhost";
        $user = "root";
        $pw = "";
        $database = "laptop_business";
        $conn = mysqli_connect($host,$user,$pw,$database);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
        }
        $sql = "SELECT * FROM product WHERE uid = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $cartArray = array(
            $row['name'] =>array(
                'name'=> $row['name'],
                'uid'=> $row['uid'],
                'description'=> $row['description'],
                'price'=> $row['price'],
                'quantity' => $quantity,
                'max' => $row['amount'],
                'image'=> $row['image']
            )
        );

        if(empty($_SESSION["cart"])) {
            $_SESSION["cart"] = $cartArray;
        } 
        else {
            $contain = false;
            foreach($_SESSION["cart"] as $item) {
                if ($row['uid'] == $item['uid']) {
                    $_SESSION["cart"][$row['name']]['quantity'] = ($_SESSION["cart"][$row['name']]['quantity'] + $quantity >= $_SESSION["cart"][$row['name']]['max'] ? $_SESSION["cart"][$row['name']]['max'] : $_SESSION["cart"][$row['name']]['quantity'] + $quantity);
                    $contain = true;
                    break;
                }
            }
            if ($contain == false) {
                $cartArray = array_merge($_SESSION["cart"],$cartArray);
                $_SESSION["cart"] = $cartArray;
            }
        }
        echo count($_SESSION['cart']);
    }
?>