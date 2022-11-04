<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>POST MANAGEMENT</h1>
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
                                    <button class="btn btn-add btn-primary" type="button">Add new post</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped" id="table-account">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Create date</th>
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
                                                $sql = "SELECT * FROM post ORDER BY id DESC";
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo '
                                                            <tr class="text-center">
                                                                <td>'.$row['title'].'</td>
                                                                <td>'.$row['category'].'</td>
                                                                <td>'.$row['date'].'</td>   
                                                            <td>
                                                                <button type="button" class="btn btn-success btn-view btn-xs mr-1"  data-id ="'.$row['id'].'"  data-title ="'.$row['title'].'"  data-content ="'.$row['content'].'" data-image ="'.$row['image'].'" data-summary ="'.$row['summary'].'" data-category ="'.$row['category'].'" data-date ="'.$row['date'].'" data-author ="'.$row['author'].'" ><i class="fas fa-eye"></i></button>
                                                                <button type="button" class="btn btn-primary btn-edit btn-xs mr-1"  data-id ="'.$row['id'].'"  data-title ="'.$row['title'].'"  data-content ="'.$row['content'].'" data-image ="'.$row['image'].'" data-summary ="'.$row['summary'].'" data-category ="'.$row['category'].'" data-author ="'.$row['author'].'" ><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger btn-delete btn-xs" data-id = "'.$row['id'].'" ><i class="fas fa-trash"></i></button>
                                                            </td>
                                                        </tr>';
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
<div class="modal fade" id="viewPostModal">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" name="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <img src="" style="margin:10px;" id="img_view">
            <div id = "postby" style="margin-left: 15px;color:gray;">
                <i class="fa fa-user"></i>&nbsp;<span id="author_view"> &nbsp;Content - Xuân Thái&nbsp;&nbsp;&nbsp;</span>
                <i class="fas fa-clock"></i>&nbsp;<span id="date_view"> &nbsp;23/11/2021</span>
                <div style="float:right; margin-right: 15px;">
                    <i class="fa fa-tags"></i>&nbsp; <span id="category_view" >&nbsp;asdas</span>
                </div>
            </div>
            <div id="title_view" style="font-size:28px; color:#337AB6; margin-left:15px;">

            </div>
            <div class style="margin-left:auto; margin-right:auto; color:black;">
                <div>
                    <div class="card-body" name="content" id="content_view">
                    </div>
                </div>
            </div>
            
            <div id="admin_comment">

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
<div class="modal fade" id="editPostModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editPostForm">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"/>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title"/>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input class="form-control" type="text" name="author"/>
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
                    <div class="form-group">
                        <label>Summary</label>
                        <input class="form-control" type="text" name="summary"/>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="categoryid2" name="category" style="width:100%;">
                            <option value="laptop">Laptop</option>
                            <option value="accessories">Accessories</option>
                            <option value="Services">Services</option>
                        </select>
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

<!-- Delete modal -->
<div class="modal fade" id="deleteAccountModal">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteAccountForm">
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



<!-- Add modal -->
<div class="modal fade" id="addPostModal">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPostForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title post" type="text" name="title"/>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input class="form-control" placeholder="Author post" type="text" name="author"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea rows="15" cols="50" class="form-control" placeholder="Content post" type="text" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <!-- <input class="form-control form-control-lg"  type="file" name="fileToUpload" id="fileToUpload"> -->
                        <input class="form-control" placeholder="Image Link" type="text" name="image"/>
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <input class="form-control" placeholder="Summary post" type="text" name="summary"/>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="categoryid" name="type" style="width:100%;">
                            <option value="laptop">Laptop</option>
                            <option value="accessories">Accessories</option>
                            <option value="Services">Services</option>
                        </select>
                    </div>
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