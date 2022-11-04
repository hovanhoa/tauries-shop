<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TAURIES ABOUT</h1>
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
                                    <button class="btn btn-primary btn-add" type="button">Add new</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- <h5 style="text-align:center;">CAROUSEL</h5> -->
                                    <table class="table table-bordered table-striped" id="table-about">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Content</th>
                                                <th>Update Time</th>
                              
                                                <!-- <th>Image</th> -->
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
                                                $sql = "SELECT * FROM about_page;
                                                
                                                ";
                                                $i = 1;
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$i."</td>
                                                                <td>".$row['title']."</td>
                                                                <td style='width:300px';>".$row['description']."</td>
                                                                <td>".substr($row['content'],0,30)."...</td>
                                                                <td>".$row['date']."</td>
                                                               
                                                                
                                                  
                                                                <td>
                                                                <button type='button' class='btn btn-success btn-view btn-xs mr-1' data-id ='".$row['id']."'
                                                                data-title ='".$row['title']."' data-content ='".$row['content']."'
                                                                data-image ='".$row['image']."' data-description ='".$row['description']."'><i class='fas fa-eye'></i></button>

                                                                    <button type='button' class='btn btn-primary btn-edit btn-xs mr-1' data-id ='".$row['id']."'
                                                                    data-title ='".$row['title']."' data-content ='".$row['content']."'
                                                                    data-image ='".$row['image']."' data-description ='".$row['description']."'><i class='fas fa-edit'></i></button>
                                                                    
                                                                    <button type='button' class='btn btn-danger btn-delete btn-xs' data-id ='".$row['id']."'
                                                                    data-title ='".$row['title']."' data-content ='".$row['content']."'
                                                                    data-image ='".$row['image']."' data-description ='".$row['description']."'><i class='fas fa-trash'></i></button>

                                                                </td>
                                                            
                                                                
                                                            </tr>";
                                                            $i ++;
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
<div class="modal fade" id="viewAboutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" name="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left:auto; margin-right:auto;">
                <div class="card" style="width: 25rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text h5" name="image"></p>
                        <!-- <p class="card-text h5" name="price"></p> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Edit modal -->
<div class="modal fade" id="editAboutModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit About</h4>
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
                        <label>Description</label>
                        <input class="form-control" type="text" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" type="text" name="content" rows="10" cols="40" ></textarea>
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

<!-- Add modal -->
<div class="modal fade" id="addContactModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add About</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addAccessoriesForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="" type="text" name="title"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" placeholder="" type="text" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input class="form-control" placeholder="" type="text" name="content"/>
                    </div>
                    <!-- <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" placeholder="" type="text" name="website"/>
                    </div> -->
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" placeholder="" type="text" name="image"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="" type="hidden" name="create_date"/>
                    </div>
                    <!-- <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" placeholder="Image Link" type="text" name="image"/>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete modal -->
<div class="modal fade" id="deleteAccessoriesModal">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete About</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteAccessoriesForm">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"/>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-light">Confirm</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
