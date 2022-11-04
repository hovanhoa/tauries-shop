<?php
    $id = $_POST['id'];
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "laptop_business";
    $conn = mysqli_connect($host,$user,$pw,$database);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT * FROM product_comments JOIN users ON product_comments.username = users.username WHERE product_id = '".$id."' ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='col-12' id='accordion'>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "
                <div class='card card-outline'>
                    <a class='d-block w-100' data-toggle='collapse' href='#collapse".$row['id']."'>
                        <div class='card-header'>
                            <h4 class='card-title w-100' style='color:black;'>".$row['name']." commented at ".$row['date']."</h4>
                            <div id='status".$row['id']."'>";
                            if ($row['status'] == 'unread') echo "<span class='right badge badge-primary'>New</span>";
                            else if ($row['status'] == 'read') echo "<span class='right badge badge-success'>Read</span>";
                            else if ($row['status'] == 'block')echo "<span class='right badge badge-danger'>Blocked</span>";
                        echo "
                            </div>
                        </div>
                    </a>
                    <div id='collapse".$row['id']."' class='collapse' data-parent='#accordion'>
                        <div class='card-body'>
                            <div style='font-size:1.2rem; font-weight:bold;'>".$row['content']."</div>
                            <div class='d-inline'>
                                <span>
                                <div class='custom-control custom-checkbox'>";
                                    if ($row['status'] == 'read') echo "<input class='custom-control-input custom-control-input-success' type='checkbox' checked id='readCheckbox".$row['id']."' onclick='read(".$row['id'].")'>";
                                    else echo "<input class='custom-control-input custom-control-input-success' type='checkbox' id='readCheckbox".$row['id']."' onclick='read(".$row['id'].")'>";
                                echo "
                                    <label style='color:green;' for='readCheckbox".$row['id']."' class='custom-control-label pr-3'>Mark as read</label>
                                </div>  
                                <div class='custom-control custom-checkbox'>";
                                    if ($row['status'] == 'block') echo "<input class='custom-control-input custom-control-input-danger' type='checkbox' checked id='blockCheckbox".$row['id']."' onclick='block(".$row['id'].")'>";
                                    else echo "<input class='custom-control-input custom-control-input-danger' type='checkbox' id='blockCheckbox".$row['id']."' onclick='block(".$row['id'].")'>";
                                echo "
                                    <label style='color:red;' for='blockCheckbox".$row['id']."' class='custom-control-label'>Block comment</label>
                                </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";
    }
    else echo "<h5>No comments yet</h5>";
    $conn->close();
?>