<div class="container p-5">
    <?php
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
            echo '
                <div class="row">
                    <h2 class="text-center">Your cart is empty</h2>
                </div>';
        }
        else {
            $total_price = 0;
            echo '
            <!--Section: Block Content-->
            <section>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="mb-3">
                            <div class="pt-4 wish-list">';
                        foreach ($_SESSION["cart"] as $product){
                            echo '
                                <div class="row mb-4">
                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                            <img class="img-fluid w-100" src="'.$product['image'].'" alt="Sample">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-9 col-xl-9">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5>'.$product['name'].'</h5>
                                                    <p class="mb-5 text-muted text-uppercase small">'.$product['description'].'</p>
                                                </div>
                                            <div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pb-2">
                                        <label>Quantity</label>
                                        <select class="form-control select2 quantity-sel2" name="quantity" style="width:50%;" onchange="updatecart('.$product['uid'].',this.value)">';
                                        for ($i = 1; $i <= $product['max']; $i++) {
                                            echo "<option value='$i'";
                                            echo ($product['quantity'] == $i) ? "selected": "";
                                            echo ">$i</option>";
                                        }  
                                        echo '
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#!" type="button" class="btn-remove card-link-secondary small text-uppercase mr-3" style="color:red;" data-name="'.$product['name'].'"><i class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                        </div>
                                        <p class="mb-0"><span><strong id="summary">'.number_format($product['price']).' VND</strong></span></p class="mb-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">';
                        $total_price += ($product["price"]*$product["quantity"]);
                        }
                    echo '
                        <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding items to your cart does not mean booking them.</p>
                    </div>
                  </div>
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-4">
                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4">
                            <h5 class="mb-3 text-center">TOTAL AMOUNT</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount
                                    <span id="temporary">'.number_format($total_price).' VND</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Tax
                                    <span>10%</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span id="total" class="fw-bold">'.number_format(ceil($total_price*1.1)).' VND</span>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary btn-checkout btn-block"><i class="fas fa-wallet"></i>&nbsp Go to checkout</button>
                            <button type="button" class="btn btn-primary btn-continue btn-block"><i class="fas fa-shopping-cart"></i>&nbspContinue shopping</button>
                            <button type="button" class="btn btn-danger delete-cart btn-checkout btn-block"><i class="fas fa-trash"></i>&nbspDelete cart</button>
                            
                        </div>
                    </div>
                  <!-- Card -->
                </div>
                <!--Grid column-->
            </div>
            <!-- Grid row -->
        </section>
        <!--Section: Block Content-->';
        }
    ?>
</div>

 <!-- Checkout modal -->
<div class="modal fade" id="checkoutModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">CHECKOUT YOUR CART</h4>
                <button type="button" class="btn btn-default btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="checkoutForm">
                <div class="modal-body mx-5">
                <?php
                    $host = "localhost";
                    $user = "root";
                    $pw = "";
                    $database = "laptop_business";
                    $username = $_COOKIE['username'];
                    $conn = mysqli_connect($host,$user,$pw,$database);
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql = "SELECT * FROM users WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_assoc($result);
                    echo '
                        <input type="hidden" class="form-control" name="cart-id" value="'.$user['uid'].'">
                        <div class="mb-4">
                            <label class="form-label fw-bold h3">Your name</label>
                            <input type="text" class="form-control" name="cart-name" value="'.$user['name'].'">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold h3">Your email</label>
                            <input type="email" class="form-control" name="cart-email" value="'.$user['email'].'">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold h3">Your phone number</label>
                            <input type="text" class="form-control" name="cart-phone" value="'.$user['phone'].'">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold h3">Your address</label>
                            <input type="text" class="form-control" name="cart-address" value="'.$user['address'].'">
                        </div>';
                    ?>
                    <h3 class="my-3 text-center">YOUR ORDER</h3>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $total_price = 0;
                            foreach ($_SESSION["cart"] as $product){
                                echo '
                                <tr class="text-center">
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$product['name'].'</td>
                                    <td>'.$product['quantity'].'</td>
                                    <td>'.number_format($product['price']).' VND</td>
                                </tr>';
                                $i++;
                                $total_price += ($product["price"]*$product["quantity"]);
                            }
                            echo '
                            <tr class="text-center">
                                <th scope="row">Total</th>
                                <td></td>
                                <td></td>
                                <td>'.number_format($total_price).' VND</td>
                            </tr>
                            <input type="hidden" class="form-control" name="cart-total" value="'.$total_price.'">';
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Confirm order</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>