<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taurious Admin</title><!-- Google Font: Source Sans Pro-->
    <link rel="shortcut icon" type="image/x-icon" href="img/apple_icon_MGQ_icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"><!-- Font Awesome-->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"><!-- DataTables-->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css"><!-- Theme style-->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- select2-->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- sweetalert2-->
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
     <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- Navbar-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links-->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>
                <li class="nav-item d-none d-sm-inline-block"><a href="admin.php" class="nav-link">Home</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li style="margin-right:10px;"><a href="index.php" class="nav-link">Back to web</a></li>
            </ul>
            
        </nav><!-- /.navbar-->
        <!-- Main Sidebar Container-->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo--><a class="brand-link" href="#"><img class="brand-image img-circle elevation-3" src="img/favicon.ico" alt="AdminLTE Logo" style="opacity: .8"><span class="brand-text font-weight-light">Tauries Admin</span></a><!-- Sidebar-->
            <div class="sidebar">
                <!-- Sidebar Menu-->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">PRODUCTS MANAGEMENT</li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon fas fa-laptop"></i>
                                <p>Laptop<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a class="nav-link" href="admin_laptop.php"><i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="admin_brand.php"><i class="far fa-circle nav-icon"></i>
                                        <p>Brand</p>
                                </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon fas fa-keyboard"></i>
                                <p>Accessories<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a class="nav-link" href="admin_accessories.php"><i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="admin_type.php"><i class="far fa-circle nav-icon"></i>
                                        <p>Type</p>
                                </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="admin_service.php"><i class="nav-icon far fa-question-circle"></i>
                                <p>Services</p>
                        </a></li>
                        <li class="nav-header">CUSTOMER MANAGEMENT</li>
                        <li class="nav-item"><a class="nav-link" href="admin_account.php"><i class="nav-icon far fa-user"></i>
                                <p>Accounts</p>
                        </a></li>
                        <li class="nav-header">ORDER MANAGEMENT</li>
                        <li class="nav-item"><a class="nav-link" href="admin_order.php"><i class="fas fa-shopping-cart"></i>
                                <p>&nbsp&nbspOrder</p>
                        </a></li>
                        <li class="nav-header">POST MANAGEMENT</li>
                        <li class="nav-item"><a class="nav-link" href="admin_post.php"><i class="nav-icon far fa-newspaper"></i>
                                <p>Posts</p>
                        </a></li>
                        <li class="nav-header">COMMENTS MANAGEMENT</li>
                        <li class="nav-item"><a class="nav-link" href="admin_productcomments.php"><i class="fas fa-comment-alt"></i>
                                <p>&nbsp&nbspProduct Comments </p>
                        </a></li>
                        <li class="nav-header">USER INTERFACE</li>
                        <li class="nav-item"><a class="nav-link" href="admin_home.php"><i class="nav-icon fa fa-home"></i>
                                <p>Home</p>
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="admin_about.php"><i class="nav-icon fa fa-eye"></i>
                                <p>About</p>
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="admin_contact.php"><i class="nav-icon fa fa-phone"></i>
                                <p>Contacts</p>
                        </a></li>
                        <li class="nav-header">FEEDBACK MANAGEMENT</li>
                        <li class="nav-item"><a class="nav-link" href="admin_feedback.php"><i class="nav-icon fa fa-inbox"></i>
                                <p>Feedback</p>
                        </a></li>
                    </ul>
                </nav><!-- /.sidebar-menu-->
            </div><!-- /.sidebar-->
        </aside><!-- Content Wrapper. Contains page content-->
