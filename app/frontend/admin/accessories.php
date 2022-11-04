<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ACCESSORIES LIST</h1>
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
                                    <button class="btn btn-primary btn-add" type="button">Add new accessories</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped" id="table-accessories">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Quantity</th>
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
                                                $sql = "SELECT * FROM product WHERE type = 'accessories'";
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$i."</td>
                                                                <td>".$row['name']."</td>
                                                                <td>".$row['description']."</td>
                                                                <td>".number_format($row['price'])." VND</td>
                                                                <td>".strtoupper($row['category'])."</td>
                                                                <td>".$row['amount']."</td>
                                                                <td>
                                                                    <button type='button' class='btn btn-success btn-view btn-xs mr-1' data-title='".$row['name']."' data-content='".$row['description']."' data-price='".number_format($row['price'])."' data-img='".$row['image']."'><i class='fas fa-eye'></i></button>
                                                                    <button type='button' class='btn btn-primary btn-edit btn-xs mr-1' data-id ='".$row['uid']."' data-name='".$row['name']."' data-description='".$row['description']."' data-price='".$row['price']."' data-amount='".$row['amount']."' data-type='".$row['category']."' data-image='".$row['image']."'><i class='fas fa-edit'></i></button>
                                                                    <button type='button' class='btn btn-danger btn-delete btn-xs' data-id ='".$row['uid']."' data-name='".$row['name']."'><i class='fas fa-trash'></i></button>
                                                                </td>
                                                            </tr>";
                                                        $i++;
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

<!-- Add modal -->
<div class="modal fade" id="addAccessoriesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Accessories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addAccessoriesForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Accessories Name" type="text" name="name"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" placeholder="Accessories Description" type="text" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" id="add-type-sel2" name="type" style="width:100%;">
                            <?php
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
                                        echo "<option value='".$row['name']."'>".strtoupper($row['name'])."</option>";
                                    }
                                }
                                mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" placeholder="Available amount" type="number" name="amount"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" placeholder="Accessories Price" type="number" name="price"/>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" placeholder="Image Link" type="text" name="image"/>
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



<!-- View modal -->
<div class="modal fade" id="viewAccessoriesModal">
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
                        <p class="card-text h5" name="description"></p>
                        <p class="card-text h5" name="price"></p>
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
<div class="modal fade" id="editAccessoriesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAccessoriesForm">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"/>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" name="description"/>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" id="edit-type-sel2" name="type" style="width:100%;">
                            <?php
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
                                        echo "<option value='".$row['name']."'>".strtoupper($row['name'])."</option>";
                                    }
                                }
                                mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" type="number" name="amount"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" name="price"/>
                    </div>
                    <div class="form-group">
                        <label>Image Link</label>
                        <input class="form-control" type="text" name="image"/>
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
<div class="modal fade" id="deleteAccessoriesModal">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Accessories</h4>
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