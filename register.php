<!DOCTYPE html>
<html lang="en">

<head>
<title> Tauries Laptop  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/apple_icon_MGQ_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    
    <!-- sweetalert2-->
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo align-self-center" style="font-size: 30px !important" href="index.php" >
            <i class="fa fa-chevron-left"></i>
                Back
            </a>

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php" >
                Tauries 
            </a>
        </div>
    </nav>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-2 text-uppercase text-success">Create an account</h2>
                        <p class="text-white-50 mb-4">Please fill out following information to sign up</p>
                            <form action="" method="post">
                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <label for="nameInput" class="col-form-label">Your name</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="name" id="nameInput" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <label for="mailInput" class="col-form-label">Your email</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" name="mail" id="mailInput" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <label for="userInput" class="col-form-label">Username</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="username" id="userInput" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-3">
                                        <label for="inputPassword" class="col-form-label">Password</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="password" id="inputPassword" name="password" class="form-control" >
                                    </div>
                                </div>
                                <p id="message" class= "mt-2"></p>
                                <button class="btn btn-success btn-lg px-5 mt-3 " name="submitBtn" type="submit">Sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

<?php
    if (isset($_POST['submitBtn'])){
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        if (empty($name) || empty($email) || empty($username) || empty($password)) echo 
            "<script> 
                var x = document.getElementById('message');
                x.style.color = 'red';
                x.innerHTML = 'Please fill out all information';
            </script>";
        else {
            $host = "localhost";
            $user = "root";
            $pw = "";
            $database = "laptop_business";
            $conn = mysqli_connect($host,$user,$pw,$database);
            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }
            $sql = "INSERT INTO users(name, email, username, password, role) VALUES ('$name','$email','$username','$password','customer')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                    alert('Account has been signed up');
                    location.replace('index.php');
                </script>";
            }
            else echo "<script>
                    var x = document.getElementById('message');
                    x.style.color = 'red';
                    x.innerHTML = 'Something went wrong! Please try a different username';
                </script>";
            $conn->close();
        }
    }  
?>

