<?php
    if (!isset($_GET['id'])) {
        http_response_code(404);
        exit;
    }
?>
<?php require_once 'start.php'; ?>
<?php require_once FRONTEND_INCLUDE . 'header.php'; ?>
<?php require_once FRONTEND_INCLUDE . 'navbar.php'; ?>
<?php
    $id = $_GET['id']; 
    $host = 'localhost';
    $user = 'root';
    $pw = '';
    $database = 'laptop_business';
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM product WHERE uid = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $type = $row['type'];
    echo "
    <section class='bg-light'>
        <div class='container pb-5'>
            <div class='row'>
                <div class='col-lg-5 mt-5'>
                    <div class='card mb-3'>
                        <img class='card-img img-fluid' src='".$row['image']."' alt='Card image cap' id='product-detail'>
                    </div>
                    <div class='row'>
                        <!--Start Controls-->
                        <div class='col-1 align-self-center'>
                            <a href='#multi-item-example' role='button' data-bs-slide='prev'>
                                <i class='text-dark fas fa-chevron-left'></i>
                                <span class='sr-only'>Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id='multi-item-example' class='col-10 carousel slide carousel-multi-item' data-bs-ride='carousel'>
                            <!--Start Slides-->
                            <div class='carousel-inner product-links-wap' role='listbox'>
                                <!--First slide-->
                                <div class='carousel-item active'>
                                    <div class='row'>
                                        <div class='col-4'>
                                            <a href='#'>
                                                <img class='card-img img-fluid' src='".$row['image']."' alt='Product Image 1'>
                                            </a>
                                        </div>
                                        <div class='col-4'>
                                            <a href='#'>
                                                <img class='card-img img-fluid' src='".$row['image']."' alt='Product Image 2'>
                                            </a>
                                        </div>
                                        <div class='col-4'>
                                            <a href='#'>
                                                <img class='card-img img-fluid' src='".$row['image']."' alt='Product Image 3'>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class='col-1 align-self-center'>
                            <a href='#multi-item-example' role='button' data-bs-slide='next'>
                                <i class='text-dark fas fa-chevron-right'></i>
                                <span class='sr-only'>Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class='col-lg-7 mt-5'>
                    <div class='card'>
                        <div class='card-body'>
                            <h1 class='h2'>".$row['name']."</h1>
                            <p class='h3 py-2'>".number_format($row['price'])." VND</p>";
                        if ($row['type'] == 'laptop') echo "
                            <ul class='list-inline'>
                                <li class='list-inline-item'>
                                    <h5>Brand:</h5>
                                </li>
                                <li class='list-inline-item'>
                                    <p class='text-muted'><strong>".strtoupper($row['category'])."</strong></p>
                                </li>
                            </ul>";
                        if ($row['type'] == 'accessories') echo "
                            <ul class='list-inline'>
                                <li class='list-inline-item'>
                                    <h5>Type:</h5>
                                </li>
                                <li class='list-inline-item'>
                                    <p class='text-muted'><strong>".strtoupper($row['category'])."</strong></p>
                                </li>
                            </ul>";
                        echo "
                            <h5>Description:</h5>
                            <p>".$row['description']."</p>

                            <h5>Available quantity:</h5>
                            <p>".$row['amount']."</p>

                            <form id='add-cart-form'>
                                <div class='row'>
                                    <div class='col-auto'>
                                        <ul class='list-inline pb-3'>
                                            <li class='list-inline-item text-right'>
                                                Quantity
                                                <input type='hidden' name='id' value='".$row['uid']."'>
                                                <input type='hidden' name='available' value='".$row['amount']."'>
                                            </li>
                                            <li class='list-inline-item'><span class='btn btn-success btn-minus'>-</span></li>
                                            <li class='list-inline-item'><span class='badge bg-secondary' id='var-value'>0</span></li>
                                            <li class='list-inline-item'><span class='btn btn-success btn-plus' data-quantity = '".$row['amount']."'>+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class='row pb-3'>
                                    <div class='col d-grid'>
                                        <button type='submit' class='btn btn-success btn-lg' name='submit' value='addtocard'>Add To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>";

    echo "
    <!-- Start Comments -->
    <section class='py-5'>
        <div class='container'>
            <div class='row text-left p-2 pb-3'>
                <h4>Comments</h4>
            </div>";
    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $sql1 = "SELECT * FROM users WHERE username = '$username'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        echo "
            <div class='row pb-5'>
                <div class='col-lg-2 text-center'>
                    <img src='".$row1['image']."' style='width: 70px; height: 70px' alt='' class='rounded-circle border mb-2'>
                    <p class='fw-bold'>".$row1['name']."</p>
                </div>
                <div class='col-lg-10 text-center'>
                    <form id='commentForm'>
                        <input type='hidden' name='id' value='".$id."'/>
                        <input type='hidden' name='username' value='".$_COOKIE['username']."'/>
                        <div class='form-floating'>
                            <textarea class='form-control' id='commentTextarea' name='comment' placeholder='Leave a comment here' style='height: 80px'></textarea>
                        </div>
                        <div class='text-start mt-3'>
                            <button type='submit' class='btn btn-primary'>Send comment</button>
                        </div>
                    </form>
                </div>
            </div><hr>";
    }
    else {
        echo "
        <div class='row pb-5'>
            <div class='col-lg-12 text-center'>
                <a href='login.php'><h4>Please login to comment</h5></a>
            </div>
        </div><hr>";
    }
    $sql1 = "SELECT * FROM product_comments JOIN users ON product_comments.username = users.username WHERE product_id = '$id' AND NOT status='block' ORDER BY date DESC";
    // echo $sql1;
    $result1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1) > 0){
        while ($row1 = mysqli_fetch_assoc($result1)) {
            echo "<div class='row pt-2 pb-3'>
                    <div class='col-lg-3 text-center'>
                        <img src='".$row1['image']."' style='width: 60px; height: 60px' alt='' class='rounded-circle border mb-2'>
                        <p class='fw-bold'>".$row1['name']."</p>
                    </div>
                    <div class='col-lg-9'>
                        <div class='row pb-1'>
                            <span style='color:gray;display:inline;'><i class ='fas fa-clock'></i>&nbsp Comment at ".$row1['date']."</span>
                        </div>
                        <div class='row'>
                            <p>".$row1['content']."</p>
                        </div>
                    </div>
                </div>";
        }
    }
    else {
        echo "<div class='row pt-2 pb-3'>
                <div class='col-lg-12 text-center'>
                    <h4>BE THE FIRST TO COMMENT</h4>
                </div>
            </div>";
    }

    echo "
        </div>
    </section>
    ";

    echo "
    <!-- Start Article -->
    <section class='py-5'>
        <div class='container'>
            <div class='row text-left p-2 pb-3'>
                <h4>Related Products</h4>
            </div>
            <!--Start Carousel Wrapper-->
            <div id='carousel-related-product'>";
    $sql = "SELECT * FROM product WHERE type = '$type'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "
                <div class='p-2 pb-3'>
                    <div class='product-wap card rounded-0'>
                        <div class='card rounded-0'>
                            <img class='card-img rounded-0 img-fluid' src='".$row['image']."'>
                            <div class='card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center'>
                                <ul class='list-unstyled'>
                                    <li><a class='btn btn-success text-white mt-2' href='product.php?id=".$row['uid']."'><i class='far fa-eye'></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class='card-body text-center'>
                            <a href='product.php?id=".$row['uid']."' class='h3 text-decoration-none'>".$row['name']."</a>
                            <p class='mb-0'>".number_format($row['price'])." VND</p>
                        </div>
                    </div>
                </div>";
        }
    };
    echo "
            </div>
        </div>
    </section>";
    mysqli_close($conn);
?>

    <!-- End Article -->

    <!-- Start Slider Script -->
    <script src='js/slick.min.js'></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->";

    <script src="app/frontend/js/product.js"> </script>

<?php require_once FRONTEND_INCLUDE . 'footer.php'; ?>
