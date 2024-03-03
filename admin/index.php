<?php
  session_start();  
?>

<?php
include 'connection.php'; 
 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <title>GC-OMS | Admin</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/img/logo/gcoms.png">

</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        
        <a class="navbar-brand text-center font-weight-normal" href="index.php"><button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i></button>GC - OMS</a>
        <!-- Sidebar Toggle -->
        
        <!-- Navbar Search-->
        <div>
            <h4 class="m-t-10 m-l-20 header-title">Dashboard</h4>
        </div>
        <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="time">
                <h5> <i class="fa fa-calendar" aria-hidden="true"></i> <span id="time"> </span></h5>
            </div>
        </form> -->
        <!-- Navbar-->
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <img class="userpic" src="assets/images/\users/user.jpg" style="width:90px;height:90px;">
                        <a id="department" class="nav-link text-center" href="index.php"> &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;
                            <?php echo $_SESSION['username']; ?>
                            <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $_SESSION['position']; ?></a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="view.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            View Students
                        </a>
                        <!-- <a class="nav-link" href="update.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                            Announcement
                        </a>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                            Forums
                        </a> -->

                        <br>
                        <br>
                        <br>
                        <a class="text-black btn btn-lg btn-primary" href="logout.php"><i
                                class="mr-2 fas fa-sign-out"></i>LOGOUT</a>

                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-1">
                    <!-- <div class="container-fluid px-1">
                            <h1 class="mt-4">My Class <i class="fas fa-laptop"></i></h1>
                            Navbar Search-->
                    <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Search for..."
                                        aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    <button class="btn btn-warning" id="btnNavbarSearch" type="button"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </form> -->
                    <!-- <ol class="breadcrumb mb-4">
                                <br>
                                <br>
                            </ol> -->
                </div>

                <div class="row">
                    <div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">


                                <h2 class="header mt-0 m-b-30">Total OJTs</h2>

                                <div class="widget-detail-1">
                                    <?php
                                            $con=mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg');
                                            $con=mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg');
                                            $que='SELECT * FROM stud_login';
                                            $run=mysqli_query($con,$que);
                                            $number=mysqli_num_rows($run);
                
                                            ?>
                                    <h3 class="p-t-10 mb-0"><?php echo $number; ?></h3>
                                    <p class="text-muted m-b-10">Registered</p>
                                </div>








                            </div>
                        </div>
                    </div>


                </div>


        </div>
    </div>

    <!-- </div> -->

    <!-- </div>
    </main>
    </div>
    </div> -->
    <!-- <div id="wrapper">

            <div class="topbar">

                
                <div class="topbar-left">
                    <a href="index.php" class="logo"><span>GC-<span>OMS</span></span><i class="mdi mdi-layers"></i></a>
                </div>

               
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">


                        <ul class="nav navbar-nav list-inline navbar-left">
                            <li class="list-inline-item">
                                <button class="button-menu-mobile open-left">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                        </ul>

                        <nav class="navbar-custom">

                            <ul class="list-unstyled topbar-right-menu float-right mb-0">


                                <li class="hide-phone">
                                    <form class="app-search">
                                        <input type="text" placeholder="Search..."
                                                  class="form-control">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
           


            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">


                <div class="user-box">
                        <div class="user-img">
                            <img src="assets/images/users/avatar-1.png" alt="user-img" title="admin" class="rounded-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                        </div>
                        <h5><a href="#"><?php echo $_SESSION['username']; ?></a> </h5>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" >
                                    <i class="mdi mdi-settings"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="logout.php" class="text-custom">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div id="sidebar-menu">
                        <ul>
                        	
                            <li>
                                <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <li>
                                <a href="admin.php" class="waves-effect"><i class="mdi mdi-account-box"></i> <span> Manage Admins </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-box"></i> <span>Manage Students </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="view.php">Update or Delete</a></li>
                                    <li><a href="search.php">Search By</a></li>            
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    

                    <div class="clearfix"></div>

                </div>

            </div>


            <div class="content-page">
         
                <div class="content">
                    <div class="container-fluid">


                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                        		<div class="card-box">
                                

                        			<h2 class="header mt-0 m-b-30">Total Interns</h2>

                                        <div class="widget-detail-1">
                                            <?php
                                            $con=mysqli_connect('localhost','root','','u_reg');
                                            $que='SELECT * FROM u_reg';
                                            $run=mysqli_query($con,$que);
                                            $number=mysqli_num_rows($run);
                                            
                                             ?>
                                            <h3 class="p-t-10 mb-0"><?php echo $number; ?></h3>
                                            <p class="text-muted m-b-10">Registered</p>
                                        </div>


                                    





                                    </div>
                        		</div>
                            </div>


                        </div>


                    </div> 
                </div> 

                <footer class="footer text-right">
                    Copyright © GC-OMS
                </footer>

            </div> -->



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>