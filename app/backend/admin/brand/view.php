<?php
    $brand = $_POST['brand'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM product WHERE category = '".$brand."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "
            <li class='media align-items-center'>
                <img src='".$row['image']."' class='mr-3' style='width:8rem;' alt='...'>
                <div class='media-body'>
                    <h5 class='mt-0 mb-1'>".$row['name']."</h5>
                    <p>".$row['description']."</p>
                </div>
            </li>";
        }
    }
    $conn->close();
?>