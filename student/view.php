<?php

  session_start();
  ?>

<?php
include 'connection.php'; 
 ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded successfully
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Retrieve the uploaded file details
        $fileName = $_FILES['file']['name'];
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        // Specify the upload directory
        $uploadDir = 'uploads/';

        // Generate a unique file name to avoid conflicts
        $uniqueFileName = uniqid() . '_' . $fileName;

        // Set the destination path for the uploaded file
        $destination = $uploadDir . $uniqueFileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($fileTmpPath, $destination)) {
            // File upload successful
            // Now, store the file details in the database for future reference

            // Database connection
            $con = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg');
            if (!$con) {
                die('Failed to connect to the database');
            }

            // Insert the file details into the database
            $query = "INSERT INTO files (file_name, file_path, file_size, file_type) VALUES ('$fileName', '$destination', '$fileSize', '$fileType')";
            if (mysqli_query($con, $query)) {
                // File details inserted into the database
                
            } else {
                echo "Failed to insert file details into the database";
            }

            mysqli_close($con);
        } else {
            echo "Failed to move the uploaded file to the destination directory";
        }
    } else {
        echo "Failed to upload the file";
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>GC-OMS | Admin</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />



    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <script src="assets/js/modernizr.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/img/logo/gcoms.png">

</head>

</head>


<body class="fixed-left">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" href="index.php">GC - OMS</a>
        <!-- Sidebar Toggle-->
        <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" href="#!"> -->
        <!-- <i class="fas fa-bars"></i></button> -->
        <!-- Navbar Search-->
        <div>
            <h4 class="m-t-10 m-l-50 header-title">Dashboard</h4>
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
                    <a id="department" class="nav-link text-center" href="form.php"> &nbsp; &nbsp; &nbsp;
                            <?php echo $_SESSION['name']; ?>
                            <br><?php echo $_SESSION['program']; ?></a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            Dashboard
                        </a>
                        <!-- <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                            Announcement
                        </a> -->

                        <a class="text-black btn btn-lg btn-primary" href="logout.php"><i
                                class="mr-2 fas fa-sign-out"></i>LOGOUT</a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">

            <!-- <div class="container-fluid px-1">
                <div class="container-fluid px-1">
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

            <!-- </div>  -->

            <!-- <div class="content-page">


                <div class="content">

                    <div class="row">
                        <div class="col-lg-12"> -->


            <div class="container">
                <!-- <div class="table-container">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Program</th>
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
                    // $con = mysqli_connect('localhost', 'root', '', 'u_reg');

                    // $adviser_id = $_SESSION['adv_no'];
                    // $adviser_query = "SELECT program FROM adv_login WHERE adv_no = $adviser_id";
                    // $adviser_result = mysqli_query($con, $adviser_query);
                    // $adviser_row = mysqli_fetch_array($adviser_result);
                    // $program = $adviser_row['program'];

                    // $que = "SELECT * FROM stud_login WHERE program = '$program'";
                    // $run = mysqli_query($con, $que);

                    // while ($row = mysqli_fetch_array($run)) {
                    //     $u_id = $row['u_id'];
                    //     $name = $row[0];
                    //     $program = $row[1];
                    //     $email = $row[2];
                    //     $contact_no = $row[4];
                    //     $company_name = $row[5];
                    //     $company_address = $row[6];
                    //     $company_contact_no = $row[7];
                    //     $company_email = $row[8];
                    //     $company_supervisor = $row[9];
                    // ?>
                    //             <tr>
                    //                 <td><?php echo $u_id; ?></td>
                    //                 <td><?php echo $name; ?></td>
                    //                 <td><?php echo $program; ?></td>
                    //                 <td><?php echo $email; ?></td>
                    //                 <td><?php echo $contact_no; ?></td>
                    //                 <td><?php echo $company_name; ?></td>
                    //                 <td><?php echo $company_address; ?></td>
                    //                 <td><?php echo $company_contact_no; ?></td>
                    //                 <td><?php echo $company_email; ?></td>
                    //                 <td><?php echo $company_supervisor; ?></td>
                                    <!-- <td>
                                        <form id="uploadForm" action="view.php" method="POST"
                                            enctype="multipart/form-data" onsubmit="return validateForm()">
                                            <input type="file" name="file">
                                            <input type="hidden" name="id" value="<?php echo $u_id; ?>"> 
                                            <input type="submit" value="Upload" id="upload-button">
                                        </form>

                                        <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                            aria-labelledby="successModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!-- <span aria-hidden="true">&times;</span> 
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-white">
                                                        The file has been successfully uploaded.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        Error Modal -->
                <!-- <div class="modal fade" id="errorModal" tabindex="-1" role="dialog"
                                            aria-labelledby="errorModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button> -->
                <!-- </div>
                                                    <div class="modal-body">
                                                        An error occurred during file upload.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr> -->
                <?php ?>
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
                                <!-- <td><?php echo $u_jdate; ?></td>
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


    <script>
        $(document).ready(function () {
            $('#uploadForm').submit(function (e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData(this);

                $.ajax({
                    url: 'view.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $('#successModal').modal('show'); // Show the success modal
                        $('#uploadForm')[0].reset(); // Reset the form
                    },
                    error: function () {
                        $('#errorModal').modal('show'); // Show the error modal
                    }
                });
            });
        });
    </script>



</body>

</html>