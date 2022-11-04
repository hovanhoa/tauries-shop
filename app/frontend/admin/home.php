<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TAURIES HOME</h1>
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
                                    <h5 style="text-align:center;">CAROUSEL</h5>
                                    <table class="table table-bordered table-striped" id="table-accessories">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Summary</th>
                                                <th>Content</th>
                                                <th>Update Time</th>
                                                <th>Image</th>
                                                <th>Option</th>
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
                                                $sql = "SELECT * FROM carousel;
                                                
                                                ";
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$row['id']."</td>
                                                                <td>".$row['title']."</td>
                                                                <td>".$row['title2']."</td>
                                                                <td>".substr($row['content'],0,30)."...</td>
                                                                
                                                                <td>".$row['date']."</td>
                                                                <td>
                                                                <img src=".$row['image']." width = 200px>
                                                                </td>
                                                                <td>
                                                                    <button type='button' class='btn btn-primary btn-edit btn-xs mr-1' data-id ='".$row['id']."'
                                                                    data-title ='".$row['title']."' data-title2 ='".$row['title2']."' data-content ='".$row['content']."'
                                                                    data-image ='".$row['image']."'><i class='fas fa-edit'></i></button>
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


<!-- Edit modal -->
<div class="modal fade" id="editHomeModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Carousel Home</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editPostForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"/>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title"/>
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <input class="form-control" type="text" name="title2"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" type="text" name="content" rows="15" cols="50" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="text" name="image"/>
                        <!-- <input class="form-control form-control-lg"  type="file" name="fileToUpload" id="fileToUpload"> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
