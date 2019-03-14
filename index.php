<?php
    session_start();
    if ($_SESSION['username'] != 'admin') {
        header('location:login.php');
    }else{
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
</head>
<body>

    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> Admin <span class="caret"></span></a>
                        <ul id="g-account-menu" class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-user-secret"></i> My Profile</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- /container -->
    </div>

    <!-- /Header -->

    <!-- Main -->

    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

        <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
            <!--<li class="nav-header"></li>-->
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?page=nilai"><i class="fa fa-star"></i> Data Nilai</a></li>
            <li><a href="index.php?page=makul"><i class="fa fa-book"></i> Data Mata Kuliah</a></li>

        </ul>
    </div><!-- /span-3 -->
    <div class="col-lg-9 col-md-10 col-sm-9 col-xs-12">
        <!-- Right -->

        <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
        <hr>
        <!-- Konten -->
        <div class="row">
            <?php
                if(isset($_GET['page'])){
                    if ($_GET['page'] == 'mahasiswa') {
                        require_once 'mahasiswa.php';
                    }
                    if ($_GET['page'] == 'nilai') {
                        require_once 'nilai.php';
                    }
                    if ($_GET['page'] == 'detail') {
                            require_once 'detail.php';
                    }
                    if ($_GET['page'] == 'makul') {
                        require_once 'makul.php';
                    }
                    if ($_GET['page'] == 'tambah-makul') {
                        require_once 'makul/form-makul.php';
                    }

                    if ($_GET['page'] == 'edit-makul') {
                            require_once 'makul/edit-makul.php';
                    }
                    if ($_GET['page'] == 'tambah-nilai') {
                        require_once 'nilai/nilai.php';
                    }
                    if ($_GET['page'] == 'tambah-mahasiswa') {
                        require_once 'form-mahasiswa.php';
                    }
                } else {
                    require_once 'home.php';
                }
            ?>
        </div>
        <!--  -->

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // DataTable
            $('#DataTable').DataTable();
        } );
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
</body>
</html>
<?php } ?>