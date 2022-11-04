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
                        <select class="form-control" onchange="filterAccessories(this)">  
                            <?php
                                if (!isset($_GET['type'])) echo "<option selected value='featured'>Featured</option>";
                                else echo "<option value='featured'>Featured</option>";
                                $host = "localhost";
                                $user = "root";
                                $pw = "";
                                $database = "laptop_business";
                                $conn = mysqli_connect($host,$user,$pw,$database);
                                if (!$conn) {
                                    die('Could not connect: ' . mysqli_error($conn));
                                }
                                $sql = "SELECT * FROM category WHERE type = 'accessories'";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                        if (isset($_GET['type']) && $_GET['type'] == $row['name']) echo "<option selected value='".$row['name']."'>".strtoupper($row['name'])."</option>";
                                        else echo "<option value='".$row['name']."'>".strtoupper($row['name'])."</option>";
                                    }
                                }
                                mysqli_close($conn);
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
                    $query = $type == null ? "SELECT COUNT(uid) as total from product where type='accessories'" : "SELECT COUNT(uid) as total from product where type='accessories' and category='$type'" ;
                    $result = mysqli_query($conn,$query);
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 9;
                    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($total_records / $limit);
                    // Giới hạn current_page trong khoảng 1 đến total_page
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
                    // Tìm Start
                    $start = ($current_page - 1) * $limit;
                    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                    $query = $type == null ? "SELECT * FROM product WHERE type = 'accessories' LIMIT $start, $limit" : "SELECT * FROM product WHERE type='accessories' and category='$type' LIMIT $start, $limit";
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
                    // PHẦN HIỂN THỊ PHÂN TRANG
                    // BƯỚC 7: HIỂN THỊ PHÂN TRANG
        
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($current_page > 1 && $total_page > 1){
                        if (isset($_GET['type'])) echo '<li class="page-item"><a  class="page-link" href="accessories.php?page='.($current_page-1).'&type='.$_GET['type'].'">Prev</a><li>';
                        else echo '<li class="page-item"><a  class="page-link" href="accessories.php?page='.($current_page-1).'">Prev</a></li>';
                    }
        
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            echo '<li class="page-item"><span class="page-link active">'.$i.'</span> </li> ';
                        }
                        else{
                            if (isset($_GET['type'])) echo '<li class="page-item"><a  class="page-link" href="accessories.php?page='.$i.'&type='.$_GET['type'].'">'.$i.'</a></li>';
                            else echo '<li class="page-item"><a  class="page-link" href="accessories.php?page='.$i.'">'.$i.'</a></li>';
                        }
                    }
        
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1){
                        if (isset($_GET['type'])) echo '<li class="page-item"><a  class="page-link" href="accessories.php?page='.($current_page+1).'&type='.$_GET['type'].'">Next</a><li>';
                        else echo '<li class="page-item"><a  class="page-link" href="accessories.php?page='.($current_page+1).'">Next</a></li>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<script>
    function filterAccessories(e) {
        if (e.value=='featured') window.location.href = 'accessories.php';
        else window.location.href = 'accessories.php?type=' + e.value;
    }
</script>
