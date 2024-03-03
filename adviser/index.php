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
    <title>GC-OMS | Adviser</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/img/logo/gcoms.png">

</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-orange">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" style="color: #000000;" href="index.php"><button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" style="color: #000000;" href="#!">
            <i class="fas fa-bars"></i></button>GC - OMS</a>
        <!-- Sidebar Toggle-->
        <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" href="#!"> -->
        <!-- <i class="fas fa-bars"></i></button> -->
        <!-- Navbar Search-->
        <div>
            <h4 class="m-t-10 m-l-20 header-title" style="color: #000000;">Dashboard</h4>
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
                        <img class="userpic" src="assets/images/\users/user.jpg"
                                style="width:90px;height:90px;"></a>
                        <a id="department" class="nav-link text-center" href="index.php"> &nbsp; &nbsp; &nbsp;
                            <?php echo $_SESSION['adv_name']; ?>
                            <br>&nbsp; &nbsp; &nbsp; <?php echo $_SESSION['program']; ?> Coordinator</a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Dashboard
                        </a>
                        <!-- <a class="nav-link" href="view.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            View
                        </a> -->
                        <!-- <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                            Announcement
                        </a> -->

                        <a class="text-black btn btn-lg btn-primary"  href="logout.php"><i class="mr-2 fas fa-sign-out" style="color: #000000;"></i><span style="color: #000000;">LOGOUT</span></a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-1">
                    <!-- <div class="container-fluid px-1"> -->
                    <h1 class="mt-4 text-black">My Class <i class="fas fa-laptop"></i></h1>
                    <!-- Navbar Search-->
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
                    <div class="col-xl-3 col-md-6" style="width: 22rem;">
                            <div class="card bg-orange text-black mb-4">
                                <div class="card-body">Class Code: 31880</div>
                                <h5 class="text-black">&nbsp; &nbsp;IT PRACTICUM 1-A</h5>
                                <p class="text-black">&nbsp; &nbsp; Sat 10:00AM - 12:00PM</p>
                                <p class="text-black">&nbsp; &nbsp; ROOM 508/OL</p>
                                <br>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="view.php" onclick="return filterStudents('A')">View class</a>
                                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> 

                    <div class="col-xl-3 col-md-6" style="width: 22rem;">
                            <div class="card bg-orange text-black mb-4">
                                <div class="card-body">Class Code: 31880</div>
                                <h5 class="text-black">&nbsp; &nbsp;IT PRACTICUM 1-B</h5>
                                <p class="text-black">&nbsp; &nbsp; Sat 10:00AM - 12:00PM</p>
                                <p class="text-black">&nbsp; &nbsp; ROOM 508/OL</p>
                                <br>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="view.php" onclick="return filterStudents('B')">View class</a>
                                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> 
                    <div class="col-xl-3 col-md-6" style="width: 22rem;">
                            <div class="card bg-orange text-black mb-4">
                                <div class="card-body">Class Code: 31880</div>
                                <h5 class="text-black">&nbsp; &nbsp;IT PRACTICUM 1-C</h5>
                                <p class="text-black">&nbsp; &nbsp; Sat 10:00AM - 12:00PM</p>
                                <p class="text-black">&nbsp; &nbsp; ROOM 508/OL</p>
                                <br>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="view.php" onclick="return filterStudents('C')">View class</a>
                                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-xl-3 col-md-6" style="width: 22rem;">
                            <div class="card bg-orange text-black mb-4">
                                <div class="card-body">Class Code: 31880</div>
                                <h5 class="text-black">&nbsp; &nbsp;IT PRACTICUM 1-D</h5>
                                <p class="text-black">&nbsp; &nbsp; Sat 10:00AM - 12:00PM</p>
                                <p class="text-black">&nbsp; &nbsp; ROOM 508/OL</p>
                                <br>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="view.php" onclick="return filterStudents('D')">View class</a>
                                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>


                </div>

        </div>
        </main>
    </div>
    </div>

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

    <script>
    function filterStudents(block) {
        console.log("Block selected:", block);
        // Redirect to the same page with the block parameter
        window.location.href = 'view.php?block=' + block;
        return false; // Prevent default link behavior
    }
</script>

    
</body>

</html>