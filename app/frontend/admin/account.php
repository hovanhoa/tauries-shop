<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CUSTOMER ACCOUNTS</h1>
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
                                    <table class="table table-bordered table-striped" id="table-account">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Status</th>
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
                                                $sql = "SELECT * FROM users WHERE role ='customer'";
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$row['uid']."</td>
                                                                <td>".$row['name']."</td>
                                                                <td>".$row['email']."</td>
                                                                <td>".$row['address']."</td>
                                                                <td>".$row['phone']."</td>";
                                                        if (isset($_SESSION[$row['username']])) echo "<td>Online</td>";
                                                        else echo "<td>Offline</td>";
                                                        echo "
                                                            <td>
                                                                <button type='button' class='btn btn-view btn-success btn-xs mr-1' data-name = '".$row['name']."' data-username='".$row['username']."' data-password='".$row['password']."'><i class='fas fa-eye'></i></button>
                                                                <button type='button' class='btn btn-danger btn-delete btn-xs' data-id = '".$row['uid']."' data-username='".$row['username']."'><i class='fas fa-trash'></i></button>
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
<div class="modal fade" id="viewAccountModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" name="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" disabled/>
                    </div>
                    <!-- <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="text" name="password" disabled/>
                    </div>                                -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
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