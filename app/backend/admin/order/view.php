<?php
    $id = $_POST['id'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM product JOIN (belong JOIN cart ON belong.cart_id = cart.id_cart) ON product.uid = belong.product_id WHERE id_cart = '".$id."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo '
            <div class="col-md-5 col-lg-3 col-xl-3">
            <img src="'.$row['image'].'" alt="Sample" width = 150px>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
                <div class = "row">
                    <div class="col-6">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>'.$row['name'].'</h4>
                                <h6>CATEGORY: '.$row['category'].'</h6>
                                <p class="mb-5 text-muted text-uppercase small">'.$row['description'].'</p>
                            </div>
                            </div>
                            </div>
                        <div>
                    </div>
                    <div class="col-3">
                            <label>Quantity: '.$row['quantity'].'</label>
                    </div>
                    <div class="col-3">
                        <p class="mb-0"><span><strong id="summary"> '.number_format($row['price']).' VND</strong></span></p class="mb-0">
                    </div>
                </div>

            </div>
    </div>
    </div>
</div>';
        }
    }
    $conn->close();
?>

