<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php 
            $host = "localhost";
            $user = "root";
            $pw = "";
            $database = "laptop_business";
            $conn = mysqli_connect($host,$user,$pw,$database);
            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }
            $sql = "SELECT * FROM carousel";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                echo '<div class="carousel-item active">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="'.$row["image"].'" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success">'.$row["title"].'</h1>
                                    <h3 class="h2">'.$row["title2"].'</h3>
                                    <p>
                                    '.$row["content"].'
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    ';
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        echo '<div class="carousel-item">
                            <div class="container">
                                <div class="row p-5">
                                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                        <img class="img-fluid" src="'.$row["image"].'" alt="">
                                    </div>
                                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                                        <div class="text-align-left align-self-center">
                                            <h1 class="h1 text-success">'.$row["title"].'</h1>
                                            <h3 class="h2">'.$row["title2"].'</h3>
                                            <p>
                                            '.$row["content"].'
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                }   
            }
            mysqli_close($conn);
        
        ?>
        
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>

<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-8 m-auto">
            <h1 class="h1">THIS MONTH'S BEST-SELLERS</h1>
            <h4 class ="h4">
                Check out our most sold products of this month!
            </h4>
        </div>
    </div>
    <div class="row">
        <?php
            $host = "localhost";
            $user = "root";
            $pw = "";
            $database = "laptop_business";
            $conn = mysqli_connect($host,$user,$pw,$database);
            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }
            for ($i = 8; $i < 12; $i++) {
                $a = $i+3*$i;
                $sql = "SELECT * FROM product WHERE uid = '$a'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "
                        <div class='col-12 col-md-3 p-5 mt-3'>
                            <a href='product.php?id=".$row['uid']."'><img src='".$row['image']."'class='rounded-circle img-fluid border'></a>
                            <h6 class='text-center mt-3 mb-3'>".$row['name']."</h6>
                            <p class='text-center'><a href='product.php?id=".$row['uid']."' class='btn btn-success'>Buy now!</a></p>
                        </div>";
                    }
                }
            }
            mysqli_close($conn);
        ?>
    </div>
</section>
<!-- End Categories of The Month -->

<!-- Start Featured Product -->
<section>
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">BIG SALES</h1>
                <h4 class ="h4">
                    Don't miss out our biggest sales of the month!
                </h4>
            </div>
        </div>
        <div class="row">
            <?php
                $host = "localhost";
                $user = "root";
                $pw = "";
                $database = "laptop_business";
                $conn = mysqli_connect($host,$user,$pw,$database);
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                for ($i = 9; $i < 13; $i++) {
                    $a = $i+2*$i;
                    $sql = "SELECT * FROM product WHERE uid = '$a'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "
                            <div class='col-12 col-md-3 mb-4'>
                                <div class='card h-100'>
                                    <a href='product.php?id=".$row['uid']."'>
                                        <img src='".$row['image']."'class='card-img-top' alt='...'>
                                    </a>
                                    <div class='card-body'>
                                        <a href='product.php?id=".$row['uid']."' class='h2 text-decoration-none text-dark'>".$row['name']."</a>
                                        <p class='card-text mt-2 h4'>
                                            <del>".number_format($row['price'])." VND</del> <span class='h4'>-".$a."% </span>
                                        </p>
                                        <p class='card-text mt-2 h3 text-danger fw-bold'>"
                                            .number_format($row['price']*(1-$a/100))." VND
                                        </p>
                                    </div>
                                    <div class='card-footer text-center'>
                                        <a href='product.php?id=".$row['uid']."'  style='color: red'>
                                            <button type='button' class='btn btn-outline-danger'>
                                                Buy now 
                                                <i class='fas fa-shopping-cart'></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                }
                mysqli_close($conn);
            ?>
        </div>
    </div>
</section>