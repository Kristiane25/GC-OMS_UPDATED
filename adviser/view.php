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

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>GC-OMS | Adviser</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/img/logo/gcoms.png">

</head>

</head>


<body class="fixed-left">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-orange">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" style="color: #000000;"  href="index.php"><button
                class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" style="color: #000000;"  href="#!">
                <i class="fas fa-bars"></i></button>GC - OMS</a>
        <!-- Sidebar Toggle-->
        <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" href="#!"> -->
        <!-- <i class="fas fa-bars"></i></button> -->
        <!-- Navbar Search-->
        <div>
            <h4 class="m-t-10 m-l-20 header-title" style="color: #000000;">View Students</h4>
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
                        <img class="userpic" src="assets/images/\users/user.jpg" style="width:90px;height:90px;"></a>
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

            <div class="container-fluid px-1">
                <div class="container-fluid px-1">
                    <!-- <h1 class="mt-4">My Class <i class="fas fa-laptop"></i></h1>
                            Navbar Search -->
                    <form method="POST" action="check_files.php"
                        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group mt-3 mb-3">
                            <input class="form-control" type="text" placeholder="Enter Student Id no."
                                aria-label="Search for..." aria-describedby="btnNavbarSearch" id="u_id" name="u_id" />
                            <button class="btn btn-warning" id="btnNavbarSearch" type="submit" ><span style="color: #000000;">Monitor</span></button>
                        </div>
                        <!-- Add a hidden input field to store u_id 
                        <input type="hidden" name="u_id" id="hidden_u_id"> -->
                    </form>
                
                    <!-- <ol class="breadcrumb mb-4">
                                <br>
                                <br>
                            </ol> -->

                    <!-- </div>  -->

                    <!-- <div class="content-page">


                <div class="content">

                    <div class="row">
                        <div class="col-lg-12"> -->


                    <div class="container">
















                        <div class="table-container">
                            <div class="table-responsive table-striped">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Program</th>
                                            <th>Block</th>
                                            <th>Email</th>
                                            <th>Contact #</th>
                                            <th>Company Name</th>
                                            <th>Company Address</th>
                                            <th>Company Contact #</th>
                                            <th>Company Email</th>
                                            <th>Company Supervisor</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php

                                        $block = isset($_GET['block']) ? $_GET['block'] : '';

                                        $con = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg');

                                        $adviser_id = $_SESSION['adv_no'];
                                        $adviser_query = "SELECT program FROM adv_login WHERE adv_no = $adviser_id";
                                        $adviser_result = mysqli_query($con, $adviser_query);
                                        $adviser_row = mysqli_fetch_array($adviser_result);
                                        $program = $adviser_row['program'];

                                        $que = "SELECT * FROM stud_login WHERE program = '$program' AND block = '$block'";
                                        $run = mysqli_query($con, $que);

                                        while ($row = mysqli_fetch_array($run)) {
                                        $u_id = $row['u_id'];
                                        $name = $row[0];
                                        $program = $row[1];
                                        $block = $row[2];
                                        $email = $row[3];
                                        $contact_no = $row[5];
                                        $company_name = $row[6];
                                        $company_address = $row[7];
                                        $company_contact_no = $row[8];
                                        $company_email = $row[9];
                                        $company_supervisor = $row[10];

                                        ?>
                                        <tr>
                                            <td><?php echo $u_id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $program; ?></td>
                                            <td><?php echo $block; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $contact_no; ?></td>
                                            <td><?php echo $company_name; ?></td>
                                            <td><?php echo $company_address; ?></td>
                                            <td><?php echo $company_contact_no; ?></td>
                                            <td><?php echo $company_email; ?></td>
                                            <td><?php echo $company_supervisor; ?></td>
                                        </tr>

                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <style>
                        .table-container {
                            height: 590px;
                            /* Adjust the height as per your requirement */
                            overflow-y: scroll;
                        }
                    </style>
                </div>


                <!-- <div id="wrapper">

        <div class="topbar">

            <div class="topbar-left">
                <a href="index.php" class="logo"><span>Admin<span> Dashboard</span></span><i class="mdi mdi-layers"></i></a>
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
                            <h4 class="page-title">View Records</h4>
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
                        </nav> -->
            </div>
        </div>
    </div>




    <!-- <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft"> -->

    <!-- User -->
    <!-- <div class="user-box">
                <div class="user-img">
                    <img src="assets/images/users/avatar-1.png" alt="user-img" title="admin"
                        class="rounded-circle img-thumbnail img-responsive">
                    <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                </div>
                <h5><a href="index.php"><?php echo $_SESSION['username']; ?></a> </h5>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="mdi mdi-settings"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="#" class="text-custom">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div> -->





    <!-- <div id="sidebar-menu">
                <ul>

                    <li>
                        <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard
                            </span> </a>
                    </li>

                    <li>
                        <a href="admin.php" class="waves-effect"><i class="mdi mdi-account-box"></i> <span> Manage
                                Admins </span> </a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-box"></i>
                            <span>Manage Students </span> <span class="menu-arrow"></span></a>
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

    </div> -->




    <!-- <div class="content-page">


        <div class="content">

            <div class="row">
                <div class="col-lg-12">

                    <h4 class="m-t-0 header-title">Viewing Records</h4>

                    <?php echo @$_GET['deleted'];  ?>
                    <?php echo @$_GET['updated'];  ?>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact #</th>
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Company Contact #</th>
                                <th>Company Email</th>
                                <th>Company Supervisor</th> -->
    <!-- <th>Join Date</th>
                                                    <th>NOC</th>
                                                    <th> Delete </th>
                                                    <th> Update </th> -->
    <!-- </tr>

                        </thead>



                        <tbody>
                            <tr>

                                <?php
          $con=mysqli_connect('localhost', 'root', '', 'u_reg');

  $que='SELECT * FROM u_reg';
  $run=mysqli_query($con, $que);


  while ($row=mysqli_fetch_array($run)) {
      $u_id=$row['u_id'];
      $name=$row[0];
      $email=$row[1];
      $contact_no=$row[2];
      $company_name=$row[3];
      $company_address=$row[4];
      $company_contact_no=$row[5];
      $company_email=$row[6];
      $company_supervisor=$row[7];
      // $u_jdate=$row[8];
      // $u_NOC=$row[9];


      ?>

                                <td><?php echo $u_id; ?></td>
                                <td><?php echo $name ;?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $contact_no; ?></td>
                                <td><?php echo $company_name; ?></td>
                                <td><?php echo $company_address; ?></td>
                                <td><?php echo $company_contact_no; ?></td>
                                <td><?php echo $company_email; ?></td>
                                <td><?php echo $company_supervisor; ?></td>
                                <td><?php echo $u_jdate; ?></td>
                                                    <td><?php echo $u_NOC; ?></td> -->
    <!-- <td><a href="delete.php?id=<?php echo $u_id; ?>" class="text-white"> <button class="btn-danger btn" >  Delete </button></a> </td>
                                                    <td><a href="update.php?id=<?php echo $u_id; ?>" class="text-white"> <button class="btn-primary btn">  Update </button></a>  </td> -->
    <!-- </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div> -->

    <!-- <footer class="footer text-right">
                        Copyright © GC-OMS
                </footer> -->

    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--<script>
    document.getElementById('btnNavbarSearch').addEventListener('click', function(event) {
        // Get the value of u_id input field
        var u_id = document.getElementById('u_id').value;

        // Check if u_id is provided
        if (u_id.trim() === '') {
            // Prevent the form from submitting
            event.preventDefault();

            // Display error message
            alert('Please provide a u_id.');
        } else {
            // Set the value of hidden input field
            document.getElementById('hidden_u_id').value = u_id;
        }
    });
</script> -->





</body>

</html>