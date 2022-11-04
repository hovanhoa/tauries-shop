    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top" style="font-size: 20pt !important;">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <?php
                    if (isset($_COOKIE['username']) == true) echo "
                        <div>
                            <span class='navbar-sm-brand text-light text-decoration-none'> Welcome, ".$_COOKIE['username']."</span>
                        </div>";
                ?>
                <div>
                    <?php
                        if (isset($_COOKIE['username']) == false) echo "
                            <a class='nav-icon d-none d-lg-inline px-3' href='login.php' style='text-decoration:none;'>
                                <i class='fa fa-fw text-white fa-sign-in-alt mr-2'></i>
                                <span class= 'text-white'>Login<span>
                            </a>
                            <a class='nav-icon d-none d-lg-inline' href='register.php' style='text-decoration:none;'>
                                <i class='fa fa-fw text-white fa-user mr-2'></i>
                                <span class= 'text-white'>Create account<span>
                            </a>";
                        else echo "
                                <button class='nav-icon d-none d-lg-inline px-3 btn-dark' onclick='logout()'>
                                    <i class='fa fa-fw text-white fa-sign-out-alt mr-2'></i>
                                    <span class= 'text-white'>Logout<span>
                                </button>";
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->
    
    
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Tauries 
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="laptop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="news.php">News</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_COOKIE['username'])) { 
                            echo 
                                '<a href = "info.php">
                                    <i class="fa fa-fw fa-user text-dark mr-2"></i>
                                </a>
                                <a href="cart.php">
                                    <i class="fa fa-fw fa-cart-arrow-down text-dark"></i>
                                    <span id="cart" class="position-absolute top-10 left-100 translate-middle badge rounded-pill bg-light text-dark">'.(isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0).'</span>
                                </a>';
                        }   
                    ?>
                    <a class="nav-icon d-none d-lg-inline ml-2" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fa fa-fw fa-search text-dark px-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->


    <!-- Search modal -->
    <div class="modal fade" id="searchModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" name="title">SEARCH FOR PRODUCTS, SERVICE OR NEWS</h4>
                    <button type="button" class="btn btn-default btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="margin-left:auto; margin-right:auto;">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <form id="searchForm">
                                <div class = "form-group">
                                    <div class = "row">
                                        <div class = "col-5">
                                            <label class="fw-bold">Select what you want to search</label>
                                        </div>
                                        <div class = "col-7">
                                            <select id="tag-sel2" class="form-control select2" name="tag" style="width:100%;">
                                                <option value="laptop">Laptop</option>
                                                <option value="accessories">Accessories</option>
                                                <option value="service">Service</option>
                                                <option value="news">News</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group input-group-lg">
                                    <input type="search" name="key" class="form-control form-control-lg mt-3" placeholder="Type your keywords here" size="100">
                                    <div class="input-group-append mt-3">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12" id="searchResult">
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <?php
        if (isset($_COOKIE['username'])) echo "
        <script>
            function logout() {
                sessionStorage.removeItem('".$_COOKIE['username']."');
                document.cookie.split(';').forEach(function(c) { document.cookie = c.replace(/^ +/, '').replace(/=.*/, '=;expires=' + new Date().toUTCString() + ';path=/'); });
                window.location.href = 'index.php';
            }
        </script>";
    ?>