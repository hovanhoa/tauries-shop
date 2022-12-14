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



<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none nav-link link-dark" href="service.php">
                        Services
                    </a>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none nav-link link-dark" href="laptop.php">
                        Laptops
                    </a>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none nav-link link-dark" href="accessories.php">
                        Accessories
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control" onchange="filterService(this)">  
                            <?php
                                if (!isset($_GET['type'])) echo "<option selected value='featured'>Featured</option>";
                                else echo "<option value='featured'>Featured</option>";
                                if (isset($_GET['type']) && $_GET['type'] == 'install') echo "<option selected value='install'>Installation</option>";
                                else echo "<option value='install'>Installation</option>";
                                if (isset($_GET['type']) && $_GET['type'] == 'repair') echo "<option selected value='repair'>Repair</option>";
                                else echo "<option value='repair'>Repair</option>";
                            ?>
                        </select>
                    </div>
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
                    $type = isset($_GET['type']) ? $_GET['type'] : null;
                    $query = $type == null ? "SELECT COUNT(uid) as total from product where type='service'" : "SELECT COUNT(uid) as total from product where type='service' and category='$type'" ;
                    $result = mysqli_query($conn,$query);
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                    // B?????C 3: T??M LIMIT V?? CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 9;
                    // B?????C 4: T??NH TO??N TOTAL_PAGE V?? START
                    // t???ng s??? trang
                    $total_page = ceil($total_records / $limit);
                    // Gi???i h???n current_page trong kho???ng 1 ?????n total_page
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
                    // T??m Start
                    $start = ($current_page - 1) * $limit;
                    // B?????C 5: TRUY V???N L???Y DANH S??CH TIN T???C
                    // C?? limit v?? start r???i th?? truy v???n CSDL l???y danh s??ch tin t???c
                    $query = $type == null ? "SELECT * FROM product WHERE type = 'service' LIMIT $start, $limit" : "SELECT * FROM product WHERE type='service' and category='$type' LIMIT $start, $limit";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "
                            <div class='col-md-4 card-group'>
                                <div class='card mb-4 product-wap rounded-0'>
                                    <div class='card rounded-0'>
                                        <img class='card-img rounded-0 img-fluid' src='".$row['image']."'>
                                        <div class='card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center'>
                                            <ul class='list-unstyled'>
                                                <li><a class='btn btn-success text-white mt-2' href='product.php?id=".$row['uid']."'><i class='far fa-eye'></i></a></li>
                                                <li><button class='btn btn-success text-white mt-2 btn-addcart' data-available='".$row['amount']."' data-id='".$row['uid']."' data-quantity='1'><i class='fas fa-cart-plus'></i></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='card-body text-center'>
                                        <a href='product.php?id=".$row['uid']."' class='h3 text-decoration-none'>".$row['name']."</a>
                                    </div>
                                    <div class='card-footer text-center'> 
                                        <ul class='list-unstyled d-flex justify-content-center mb-1'>
                                            <li>
                                                <i class='text-warning fa fa-star'></i>
                                                <i class='text-warning fa fa-star'></i>
                                                <i class='text-warning fa fa-star'></i>
                                                <i class='text-muted fa fa-star'></i>
                                                <i class='text-muted fa fa-star'></i>
                                            </li>
                                        </ul>
                                        <p class='mb-0'>".number_format($row['price'])."VND</p>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                    mysqli_close($conn);
                ?>
            </div>
            <div class="pagination" style="float:right; margin-right: 15px; margin-bottom: 15px;">
                <?php 
                    // PH???N HI???N TH??? PH??N TRANG
                    // B?????C 7: HI???N TH??? PH??N TRANG
        
                    // n???u current_page > 1 v?? total_page > 1 m???i hi???n th??? n??t prev
                    if ($current_page > 1 && $total_page > 1){
                        if (isset($_GET['type'])) echo '<li class="page-item"><a  class="page-link" href="service.php?page='.($current_page-1).'&type='.$_GET['type'].'">Prev</a><li>';
                        else echo '<li class="page-item"><a  class="page-link" href="service.php?page='.($current_page-1).'">Prev</a></li>';
                    }
        
                    // L???p kho???ng gi???a
                    for ($i = 1; $i <= $total_page; $i++){
                        // N???u l?? trang hi???n t???i th?? hi???n th??? th??? span
                        // ng?????c l???i hi???n th??? th??? a
                        if ($i == $current_page){
                            echo '<li class="page-item"><span class="page-link active">'.$i.'</span> </li> ';
                        }
                        else{
                            if (isset($_GET['type'])) echo '<li class="page-item"><a  class="page-link" href="service.php?page='.$i.'&type='.$_GET['type'].'">'.$i.'</a></li>';
                            else echo '<li class="page-item"><a  class="page-link" href="service.php?page='.$i.'">'.$i.'</a></li>';
                        }
                    }
        
                    // n???u current_page < $total_page v?? total_page > 1 m???i hi???n th??? n??t prev
                    if ($current_page < $total_page && $total_page > 1){
                        if (isset($_GET['type'])) echo '<li class="page-item"><a  class="page-link" href="service.php?page='.($current_page+1).'&type='.$_GET['type'].'">Next</a><li>';
                        else echo '<li class="page-item"><a  class="page-link" href="service.php?page='.($current_page+1).'">Next</a></li>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<script>
    function filterService(e) {
        if (e.value=='featured') window.location.href = 'service.php';
        else window.location.href = 'service.php?type=' + e.value;
    }
</script>
