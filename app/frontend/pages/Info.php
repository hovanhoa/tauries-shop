<!-- Start Section -->
<section class="container py-5 px-5">
<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $username = $_COOKIE['username'];
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    echo '
        <div class="row text-center pt-5 pb-5">
            <div class="col-lg-6 m-auto">
                <img src="'.$user['image'].'" style="width: 220px; height: 220px" alt="" data-toggle="popover" tabindex="50" data-placement="right" class="rounded-circle border">
                <h2 class="mt-4">'.$user['name'].'</h2>
            </div>
        </div>';
    echo '
        <form id="updateInfoForm">
            <div class="row pt-3 pb-3 px-5">
                <div class="col-lg-6 m-auto">
                    <div class="mb-3">
                        <label class="form-label fw-bold h3">Username</label>
                        <input type="text" class="form-control" disabled name="username" value="'.$user['username'].'">
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <div class="mb-3">
                        <label class="form-label fw-bold h3">Name</label>
                        <input type="text" class="form-control" name="name" value="'.$user['name'].'">
                    </div>
                </div>
            </div>
            <div class="row pb-3 px-5">
                <div class="col-lg-6 m-auto">
                    <div class="mb-3">
                        <label class="form-label fw-bold h3">Email</label>
                        <input type="email" class="form-control" name="email" value="'.$user['email'].'">
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <div class="mb-3">
                        <label class="form-label fw-bold h3">Phone number</label>
                        <input type="text" class="form-control" name="phone" value="'.$user['phone'].'">
                    </div>
                </div>
            </div>
            <div class="row pb-3 px-5">
                <div class="col-lg-12 m-auto">
                    <div class="mb-3">
                        <label class="form-label fw-bold h3">Address</label>
                        <input type="text" class="form-control" name="address" value="'.$user['address'].'">
                    </div>
                </div>
            </div>';
            if ($user['name'] == '' || $user['email'] == '' || $user['phone'] == '' || $user['address'] == '') {
                echo ' 
                <div class="row pb-3 px-5">
                    <div class="col-lg-12 m-auto text-center">
                        <h5 class="text-danger">You haven\'t filled out all information. Please fill out all your information for best service.</h5>
                    </div>
                </div>';
            }
    echo    '<div class="row pb-3 px-5">
                <div class="col-lg-12 m-auto text-center">
                    <button type="submit" class="btn btn-primary btn-lg mr-2">Update Information</button>
                    <button type="button" class="btn btn-secondary btn-lg btn-changepw">Change password</button>
                </div>
            </div>
        </form>
    '
?>
</section>
<!-- End Section -->

<!-- Change Avatar modal -->
<div class="modal fade" id="changeAvatarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Avatar</h4>
            </div>
            <form id="changeAvatarForm" action="app/backend/info/upload.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="username" value="<?php echo $_COOKIE['username']?>"/>
                    </div>
                    <div class="form-group">
                        <!-- <label>Input image</label> -->
                        <!-- <input class="form-control mt-2" type="text" name="image"/> -->
                        <input class="form-control form-control-lg"  type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-hide" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Change Password modal -->
<div class="modal fade" id="changePasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
            </div>
            <form id="changePasswordForm">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="username" value="<?php echo $_COOKIE['username']?>"/>
                    <div class="form-group">
                        <label>Please type your old password</label>
                        <input class="form-control" type="password" name="oldpw">
                    </div>
                    <div class="form-group">
                        <label>Please type your new password</label>
                        <input class="form-control" type="password" name="newpw">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-hide" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $('document').ready(function() {
        $('[data-toggle=popover]').popover({
            html: true,
            content: '<a href="#" class="btn btn-outline-dark btn-change">Change Avatar</a>',
        }) 
    });

    $(document).on('click', '.btn-change',function(e){
        $("#changeAvatarModal").modal("show");
        $('[data-toggle=popover]').popover('hide');
    });
</script>
