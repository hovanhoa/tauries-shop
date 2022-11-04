<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TAURIES CONTACTS</h1>
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
                                    <button class="btn btn-primary btn-add" type="button">Add new contact</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped" id="table-accessories">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Website</th>
                                                <th>Date changed</th>
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
                                                $sql = "SELECT * FROM contact_page WHERE 1
                                                
                                                ";
                                                $i = 1;
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$i."</td>
                                                                <td>".$row['address']."</td>
                                                                <td>".$row['phone']."</td>
                                                                <td>".($row['email'])."</td>
                                                                <td>".($row['website'])."</td>
                                                                <td>".$row['create_date']."</td>
                                                               
                                                                <td>
                                                                <button type='button' class='btn btn-success btn-view btn-xs mr-1' data-id ='".$row['id']."'
                                                                data-address ='".$row['address']."' data-phone ='".$row['phone']."' data-website ='".$row['website']."'
                                                                data-image ='".$row['image']."' data-email ='".$row['email']."' data-create_date ='".$row['create_date']."'><i class='fas fa-eye'></i></button>
                                                                
                                                                <button type='button' class='btn btn-primary btn-edit btn-xs mr-1' data-id ='".$row['id']."'
                                                                data-address ='".$row['address']."' data-phone ='".$row['phone']."' data-website ='".$row['website']."'
                                                                data-image ='".$row['image']."' data-email ='".$row['email']."'><i class='fas fa-edit'></i></button>
                                                                
                                                                <button type='button' class='btn btn-danger btn-delete btn-xs' data-id ='".$row['id']."'
                                                                    data-address ='".$row['address']."' data-phone ='".$row['phone']."' data-website ='".$row['website']."'
                                                                    data-image ='".$row['image']."' data-email ='".$row['email']."' data-create_date ='".$row['create_date']."'><i class='fas fa-trash'></i></button>
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



<!-- Add modal -->
<div class="modal fade" id="addContactModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addAccessoriesForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" placeholder="" type="text" name="address"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" placeholder="" type="number" name="phone"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" placeholder="" type="email" name="email"/>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" placeholder="" type="text" name="website"/>
                    </div>
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
                <h4 class="modal-title">Delete Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteAccessoriesForm">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="create_date"/>
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

<!-- Edit modal -->
<div class="modal fade" id="editAboutModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editPostForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"/>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" type="text" name="phone"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email"/>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" type="text" name="website"/>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="text" name="image"/>
                        <!-- <input class="form-control form-control-lg"  type="file" name="fileToUpload" id="fileToUpload"> -->
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="" type="hidden" name="create_date"/>
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