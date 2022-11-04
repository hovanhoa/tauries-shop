<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>COMMENTS ON PRODUCTS</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped" id="table-comment">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Type</th>
                                                <th>New Comments</th>
                                                <th>Read Comments</th>
                                                <th>Blocked Comments</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $host = "localhost";
                                                $user = "root";
                                                $pw = "";
                                                $database = "laptop_business";
                                                $conn = mysqli_connect($host,$user,$pw,$database);
                                                if (!$conn) {
                                                    die('Could not connect: ' . mysqli_error($conn));
                                                }
                                                $sql = "SELECT * FROM product";
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        $sql1 = "SELECT COUNT(*) as total FROM product_comments WHERE product_id = '".$row['uid']."' AND status='unread'";
                                                        $result1 = mysqli_query($conn, $sql1);
                                                        $row1 =  mysqli_fetch_assoc($result1);
                                                        $sql2 = "SELECT COUNT(*) as total FROM product_comments WHERE product_id = '".$row['uid']."' AND status='read'";
                                                        $result2 = mysqli_query($conn, $sql2);
                                                        $row2 =  mysqli_fetch_assoc($result2);
                                                        $sql3 = "SELECT COUNT(*) as total FROM product_comments WHERE product_id = '".$row['uid']."' AND status='block'";
                                                        $result3 = mysqli_query($conn, $sql3);
                                                        $row3 =  mysqli_fetch_assoc($result3);
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$row['uid']."</td>
                                                                <td>".$row['name']."</td>
                                                                <td>".strtoupper($row['type'])."</td>
                                                                <td>".$row1['total']."</td>
                                                                <td>".$row2['total']."</td>
                                                                <td>".$row3['total']."</td>
                                                                <td>
                                                                    <button type='button' class='btn btn-primary btn-view btn-xs' data-id='".$row['uid']."' data-name='".$row['name']."'><i class='fas fa-comments'></i></button>
                                                                </td>
                                                            </tr>";
                                                    }
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- View modal -->
<div class="modal fade" id="viewCommentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" name="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left:auto; margin-right:auto;">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>