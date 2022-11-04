<?php 
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $post_id = $_POST['id'];
    $sql2 = "SELECT * FROM comment_post JOIN users ON comment_post.username = users.username WHERE id_post = $post_id ORDER BY date DESC;";
    $result2 = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($result2) > 0){
        while ($row2 = mysqli_fetch_assoc($result2)){
            echo '
            <div id="comment'.$row2["id"].'">
                <hr>
                <div class="box-content" style="margin-left: 15px;">
                    <div class="row">
                        <div class="col-2">
                            <img id="cmt-user-avatar" src="'.$row2["image"].'" alt="" style="width: 70px; height: 70px" alt="" class="rounded-circle border mb-2">
                            <p style="margin-left: 10px;">'.$row2["username"].'</p>
                        </div>
                        <div class="col-8">
                            <div class="input clearfix">
                            <p><small>'.substr($row2["date"],0, 10).'</small></p> 
                            <p>'.$row2["content"].'</p>
                            </div>
                        </div>
                        <div  class = "col-2">
                            <butto class="delete_view btn btn-danger"  type="submit" style="margin:auto;" data-id ='.$row2["id"].'>Delete comment</button>
                        </div>
                    </div>
                </div>       
            </div>

            ';
        }
    }
?>