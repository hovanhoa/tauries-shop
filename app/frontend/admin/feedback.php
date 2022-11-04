<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CUSTOMER FEEDBACK</h1>
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
                            <!-- <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-add" type="button">Add new contact</button>
                                </div>
                            </div> -->
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered table-striped" id="table-accessories">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date update</th>
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
                                                $sql = "SELECT * FROM feedback WHERE 1
                                                
                                                ";
                                                $i = 1;
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result) > 0){
                                                
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "
                                                            <tr class='text-center'>
                                                                <td>".$i."</td>
                                                                <td>".$row['name']."</td>
                                                                <td>".$row['email']."</td>
                                                                <td>".($row['subject'])."</td>
                                                                <td>".($row['message'])."</td>
                                                                <td>".$row['create_date']."</td>
                                                               
                                                                <td>
                                                                
                                                                <button type='button' class='btn btn-danger btn-delete btn-xs' data-id ='".$row['id']."'
                                                                    data-name ='".$row['name']."' data-email ='".$row['email']."' data-subject ='".$row['subject']."'
                                                                    data-message ='".$row['message']."' data-create_date ='".$row['create_date']."'><i class='fas fa-trash'></i></button>
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




<!-- Delete modal -->
<div class="modal fade" id="deleteAccessoriesModal">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Feedback</h4>
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

