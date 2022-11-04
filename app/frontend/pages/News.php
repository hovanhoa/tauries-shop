<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        $host = "localhost";
        $user = "root";
        $pw = "";
        $database = "laptop_business";
        $conn = mysqli_connect($host,$user,$pw,$database);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
        }
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from post');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
 
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
        $result = mysqli_query($conn, "SELECT * FROM post LIMIT $start, $limit");
?>


<div class="container" style="margin-top: 15px;">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
            <h4>Latest news</h4>
            <div class="list_related_news" style="display:block;">
                <br>
                <div class="related_news">
                    <?php
                        $host = "localhost";
                        $user = "root";
                        $pw = "";
                        $database = "laptop_business";
                        $conn = mysqli_connect($host,$user,$pw,$database);
                        if (!$conn) {
                            die('Could not connect: ' . mysqli_error($conn));
                        }
                        $url = $_SERVER['REQUEST_URI'];    
                        $arr = (explode("?",$url));
                        $sql = "SELECT * FROM post ORDER BY date DESC LIMIT 6";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo '
                                <div class="row">
                                    <div class="col-5">
                                        <img src="'.$row["image"].'" alt="" width="100px">
                                    </div>
                                    <div class="col-7"> 
                                        <a href="news.php?'.$row["slug"].'" style="text-decoration: none;color: #337AB6;text-align:justify;"><small>'.mb_substr($row["title"],0, 30, "utf-8").'...</small></a>
                                        <p><small>'.substr($row["date"],0,10).'</small></p>
                                    </div>
                                </div>
                                <hr>';
                            }
                        }
                     ?>

                    
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
            <h3>News</h3>
                <div class="news">
                <?php
                        $host = "localhost";
                        $user = "root";
                        $pw = "";
                        $database = "laptop_business";
                        $conn = mysqli_connect($host,$user,$pw,$database);
                        if (!$conn) {
                            die('Could not connect: ' . mysqli_error($conn));
                        }
                        $url = $_SERVER['REQUEST_URI'];    
                        $arr = (explode("?",$url));
                        if(isset($arr[1]) && substr($arr[1],0,4) != "page"){
                            $sql = "SELECT * FROM post WHERE slug = '$arr[1]';";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $post_id = $row["id"];
                            echo '
                            <img src="'.$row["image"].'" width = 930px style="margin-bottom: 15px;">
                            <br>
                            <h2 style="color: #337AB6; font-weight: bold;">
                            '.$row["title"].'
                            </h2>
                            <br>
                            <p style="color:gray;display:inline; width:400px;"><small><i class="fas fa-user"></i> &nbsp Content - '.$row["author"].'&nbsp</p>
                                <span style="color:gray;display:inline;"> <i class="fas fa-clock"></i> &nbsp '.substr($row["date"], 0, 10).'</small></span>
                                <div style="float:right; margin-right: 15px;color:gray;">
                                    <i class="fa fa-tags"></i>&nbsp; <span id="category_view">'.$row["category"].'</span>
                                </div>
                                <p style="text-align: center;"><span style="color:#000000;"><span style="font-size:28px;"><strong><span style="line-height:2;">'.$row["summary"].'</span></strong></span></span></p>
                                <p style="text-align: justify;">'.nl2br($row["content"]).'</p><br><br><br>
                                ';

                            if (isset($_COOKIE['username'])) {
                            $username = $_COOKIE['username'];
                            $sql3 = "SELECT * FROM users WHERE username = '$username';";
                            $result3 = mysqli_query($conn, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);

                            echo '
                            <div class="article-comment" data-id="1403023" data-type="20">
                            <section id="commentbox" data-id="1403023" class="box-comment">
                                <header class="zone__heading">
                                    <h3>Comment</h3>
                                    <br>
                                </header>
                                <div class="box-content1">
                                    <div class="row">
                                        <div class="col-1">
                                         <img id="cmt-user-avatar" src="'.$row3["image"].'" alt="" style="width: 70px; height: 70px" alt="" class="rounded-circle border mb-2">
                                        </div>
                                        <div class="col-11">
                                            <form id="addCommentpost">
                                                <div class="input clearfix">
                                                    <input id="userComment" type="text" name="username" value="'.$_COOKIE['username'].'" hidden/>
                                                    <input id="postComment" type="text" name="username" value="'.$row['id'].'" hidden/>
                                                    <textarea class="form-control" id="txtComment" placeholder="Leave a comment here!"></textarea>
                                                </div>
                                                <div style="margin:10px;float:right;">
                                                    <button class="btnSubmit btn btn-secondary"  type="submit">Send comment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="comment_list">';
                                }
                                else {
                                    echo "
                                    <div class='row pb-5'>
                                        <div class='col-lg-12 text-center'>
                                            <a href='login.php'><h4>Please login to comment</h5></a>
                                        </div>
                                        </div>
                                    </div><div id='comment_list'>";
                                }


                            $sql2 = "SELECT * FROM comment_post JOIN users ON comment_post.username = users.username WHERE id_post = $post_id ORDER BY date DESC LIMIT 5;";
                            $result2 = mysqli_query($conn, $sql2);
                            $sql4 = "SELECT count(*) AS num FROm comment_post WHERE id_post = $post_id";
                            $result4 = mysqli_query($conn, $sql4);
                            $row4 = mysqli_fetch_assoc($result4);
                            if(mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)){
                                    echo '
                                    <hr>
                                    <div class="box-content">
                                        <div class="row">
                                            <div class="col-2">
                                                <img id="cmt-user-avatar" src="'.$row2["image"].'" alt="" style="width: 70px; height: 70px" alt="" class="rounded-circle border mb-2">
                                                <p style="margin-left: 10px;">'.$row2["username"].'</p>
                                            </div>
                                            <div class="col-10">
                                                <div class="input clearfix">
                                                <p><small>'.substr($row2["date"],0, 10).'</small></p> 
                                            <p>'.$row2["content"].'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                              
                                    ';
                                }
                                echo '
                                </section>
                                </div>
                                <form method="post">
                                    <input id="read_more_number" name ="number_show" type="number" value="5" hidden/>
                                    <input id="read_more_id" type="number" value="'.$row["id"].'" hidden/>
                                </form>';
                                if($row4["num"]) 
                                    echo ' <button onclick="read_more()" id="read_more" class = "btn btn-secondary">Read more</button>';
                                echo '<br>
                                <br></div></div></div>';
                               
                            }


                            
                        }
                        else {
                            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                            $result = mysqli_query($conn, 'select count(id) as total from post');
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];
                    
                            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 5;
                    
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
                            $result = mysqli_query($conn, "SELECT * FROM post ORDER BY date DESC LIMIT $start, $limit");
                            // $sql = "SELECT * FROM post ORDER BY date DESC";
                            // $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "
                                            <div class='row'>
                                    <div class='col-5'>
                                        <img src='".$row["image"]."' alt='' width='340px'>
                                    </div>
                                    <div class='col-7'> 
                                        <p ><a style='text-decoration: none;color: #337AB6;' href='news.php?".$row["slug"]."'>".$row["title"]."</a> </p>
                                        <p style='color:gray;display:inline; width:400px;'><small><i class='fas fa-user'></i> &nbsp Content - ".$row["author"]."&nbsp</p>
                                        <span style='color:gray;display:inline;'> <i class='fas fa-clock'></i> &nbsp ".substr($row["date"], 0, 10)."</small></span>
                                        <p style='text-align: justify;'>".mb_substr($row["content"],0, 200, "utf-8")." ...</p>
                                        <a href='news.php?".$row["slug"]."' class='button_wh_40_blog btn-cart' title='GIÁ CARD ĐỒ HỌA VẪN CAO HƠN GẤP ĐÔI GIÁ NIÊM YẾT' style='font-size: 14px;color: #fff;line-height: 40px;height: 40px;display: inline-block;padding: 0px 25px;background: #ff0034;border-radius: 20px;text-decoration: none;border: solid 1px #ff0034;'>
                                            <span>Xem tiếp</span>
                                        </a>
                                    </div>
                                </div><hr>";
                                        }
                            }   

                            echo '<nav>
                            <div class="pagination" style="float:right; margin-right: 15px; margin-bottom: 15px;">';
                            
                                // PHẦN HIỂN THỊ PHÂN TRANG
                                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                    
                                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                if ($current_page > 1 && $total_page > 1){
                                    echo '<li class="page-item"><a  class="page-link" href="news.php?page='.($current_page-1).'">Prev</a>  </li>';
                                }
                    
                                // Lặp khoảng giữa
                                for ($i = 1; $i <= $total_page; $i++){
                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                    // ngược lại hiển thị thẻ a
                                    if ($i == $current_page){
                                        echo '<li class="page-item"><span class="page-link active">'.$i.'</span> </li> ';
                                    }
                                    else{
                                        echo '<li class="page-item"><a  class="page-link" href="news.php?page='.$i.'">'.$i.'</a> </li>';
                                    }
                                }
                    
                                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                if ($current_page < $total_page && $total_page > 1){
                                    echo '<li class="page-item"><a  class="page-link" href="news.php?page='.($current_page+1).'">Next</a>  </li>';
                                }
                            echo "</div>
                            </nav>";
                            


                            
                        }
                            
                        
                     ?>

                    
                </div>
                
                
                </div></div> 
        </div>
    </div>
</div>




