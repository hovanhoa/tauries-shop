<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>



<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
        <?php
                        $host = "localhost";
                        $user = "root";
                        $pw = "";
                        $database = "laptop_business";
                        $conn = mysqli_connect($host,$user,$pw,$database);
                        if (!$conn) {
                            die('Could not connect: ' . mysqli_error($conn));
                        }
                        $sql = "SELECT * FROM about_page
						WHERE date = (SELECT MAX(date) FROM about_page)
						";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "
            <div class='col-md-8 text-white'>
                <h1>About Us</h1>
                <p>
                ".$row['content']."
                </p>
            </div>
            <div class='col-md-4'>
                <img src='".$row['image']."' alt='About'>
            </div>";
                            }
                        }
                        mysqli_close($conn);
                        ?>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Our Services</h1>
            <p>
            We're your trusted local service and repair professionals. 
                    </p>
            <a href="#">How can we help?</a>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                <h2 class="h5 mt-4 text-center">Delivery Services</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Promotion</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
            </div>
        </div>
    </div>
</section>
<!-- End Section -->

<!-- Start Featured Product -->
<section class="bg-transparent">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our team</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 mb-3">
                    <div class="card customer-cards">
                        <div class="card-body">
                            <div class="text-center" style="height: 280px;">
                                <img src="img/hoa.jpg" width="89" height="89" alt="" class="rounded-circle img-fluid border">
                                <p class="m-0 py-3 text-muted">Four are better than one.</p><br>
                                <h6 class="card-title pt-3">Ho Van Hoa</h6>
                                <h6 class="customer-designation text-muted m-0">Leader</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card customer-cards">
                        <div class="card-body">
                            <div class="text-center" style="height: 280px;">
                                <img src="img/bang.jpg" width="89" height="89" alt="" class="rounded-circle img-fluid border">
                                <p class="m-0 py-3 text-muted">The earth laughs in flowers.</p><br>
                                <h6 class="card-title pt-3">Nguyen Thi Duyen Bang</h6>
                                <h6 class="customer-designation text-muted m-0">Member</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card customer-cards">
                        <div class="card-body">
                            <div class="text-center" style="height: 280px;">
                                <img src="img/thanh.jpg" width="89" height="89" alt="" class="rounded-circle img-fluid border">
                                <p class="m-0 py-3 text-muted">A flower blossoms for <br>its own joy.</p>
                                <h6 class="card-title pt-3">Ho Ngoc Thanh</h6>
                                <h6 class="customer-designation text-muted m-0">Member</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card customer-cards">
                        <div class="card-body">
                            <div class="text-center" style="height: 280px;">
                                <img src="img/hieu.jpg" width="89" height="89" alt="" class="rounded-circle img-fluid border">
                                <p class="m-0 py-3 text-muted">You’re the closest to heaven, that I’ll ever be.</p>
                                <h6 class="card-title pt-3">Le Nguyen Minh Hieu</h6>
                                <h6 class="customer-designation text-muted m-0">Member</h6>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Featured Product -->



