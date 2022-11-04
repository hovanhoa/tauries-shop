<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ACCESSORIES TYPE LIST</h1>
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
                                    <button class="btn btn-primary btn-add" type="button">Add new type</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped" id="table-type">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Type Name</th>
                                                <th>Amount</th>
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
                                                $sql1 = "SELECT * FROM category WHERE type = 'accessories'";
                                                $result1 = mysqli_query($conn, $sql1);
                                                if(mysqli_num_rows($result1) > 0){
                                                    $i = 1;
                                                    while ($row1 = mysqli_fetch_assoc($result1)){
                                                        $sql2 = "SELECT * FROM product WHERE category = '".$row1['name']."';";
                                                        $result2 = mysqli_query($conn, $sql2);
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$i."</td>
                                                                <td>".strtoupper($row1['name'])."</td>
                                                                <td>".mysqli_num_rows($result2)."</td>
                                                                <td>
                                                                    <button type='button' class='btn btn-success btn-view btn-xs mr-1' data-type='".$row1['name']."'><i class='fas fa-eye'></i></button>
                                                                    <button type='button' class='btn btn-primary btn-edit btn-xs mr-1' data-id='".$row1['id']."' data-name='".$row1['name']."'><i class='fas fa-edit'></i></button>
                                                                    <button type='button' class='btn btn-danger btn-delete btn-xs' data-id='".$row1['id']."' data-name='".$row1['name']."'><i class='fas fa-trash'></i></button>
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
<div class="modal fade" id="addTypeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addTypeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Type Name" type="text" name="name"/>
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

<!-- Edit modal -->
<div class="modal fade" id="editTypeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editTypeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id"/>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Type Name" type="text" name="name"/>
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
<div class="modal fade" id="deleteTypeModal">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteTypeForm">
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

<!-- View modal -->
<div class="modal fade" id="viewTypeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-unstyled">
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>