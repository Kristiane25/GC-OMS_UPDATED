<?php
  session_start();  

include 'resume_upload.php';
include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GC-OMS | Students</title>
    <!-- App css -->
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/img/logo/gcoms.png">
    <!-- Custom styles for file upload -->
    <style>
        /* Your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .card-container {
        display: flex;
        overflow-x: auto; /* Enable horizontal scrolling if needed */
        padding: 20px; /* Adjust container padding */
    }

    .card-wrapper {
        flex: 0 0 auto; /* Allow containers to grow */
        width: 300px; /* Set a fixed width for each container */
        background-color: transparent; /* Change to your desired background color */
        border-radius: 8px; /* Adjust as needed */
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Adjust shadow */
        margin-right: 20px; /* Adjust margin to create spacing between containers */
    }

    .card {
        background-color: #fff;
        border-radius: 8px; /* Adjust as needed */
        padding: 30px; /* Adjust padding */
        text-align: center;
        font-size: 18px; /* Adjust font size */
        color: #333; /* Adjust text color */
    }



        .card h2 {
            margin-top: 0;
            color: #333;
        }

        .card form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #FFA500;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        .custom-file-upload:hover {
            background-color: #FFC266;
        }

        .card form input[type="file"] {
            display: none;
        }

        .file-input-container {
            display: flex;
            align-items: center;
        }

        .file-name {
            margin-top: 5px;
            font-size: 18px;
            color: #666;
            text-align: left;
            margin-left: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }

        .clear-icon1 {
            display: none;
            cursor: pointer;
            color: red; /* Change color to red */
            font-size: 18px;
            margin-left: 5px;
        }

        .clear-icon2 {
            display: none;
            cursor: pointer;
            color: red; /* Change color to red */
            font-size: 18px;
            margin-left: 5px;
        }

        .clear-icon3 {
            display: none;
            cursor: pointer;
            color: red; /* Change color to red */
            font-size: 18px;
            margin-left: 5px;
        }

        .clear-icon:hover {
        cursor: pointer; /* Change cursor to pointer on hover */
    }

        .upload-btn-container {
            width: 100%;
            margin-top: 10px;
        }

        .upload-btn {
            background-color: #FFA500;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .upload-btn:hover {
            background-color: #FFC266;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        .success {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-orange">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" style="color: #000000;" href="index.php"><button
                class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" style="color: #000000;" href="#!">
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
    <!-- Side Navigation -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- Include your side navigation HTML here -->
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- Your side nav content here -->
                        <!-- Example: -->
                        <img class="userpic" src="assets/images/users/user.jpg" style="width:90px;height:90px;">
                        <a id="department" class="nav-link text-center" href="form.php">
                            <?php echo $_SESSION['name']; ?><br><?php echo $_SESSION['program']; ?>
                        </a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="form.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Student Profile
                        </a>
                        <a class="nav-link" href="upload.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right" style="color: #000000;"></i></div>
                            Upload Documents
                        </a>

                        <a class="text-black btn btn-lg btn-primary"  href="logout.php"><i class="mr-2 fas fa-sign-out" style="color: #000000;"></i><span style="color: #000000;">LOGOUT</span></a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <!-- Main content -->
            <!-- Add the cards here -->
            <div class="card-container">
        <!-- First card container -->
<div class="card-wrapper">
    <div class="card">
        <!-- Card content here -->
        <h2>Upload Resume</h2>
        <form id="resumeForm" action="resume_upload.php" method="post" enctype="multipart/form-data">
            <div class="file-input-container">
                <input type="file" name="fileToUpload1" id="fileToUpload1" onchange="updateFileDetails(this, 1)">
                <label for="fileToUpload1" class="custom-file-upload">Choose File</label>
                <span class="file-name" id="file-name1"></span>
                <span class="clear-icon1" onclick="clearFile(1)">x</span>
            </div>
            <div class="upload-btn-container">
                <input type="submit" value="Upload" class="upload-btn" name="submit1">
            </div>
        </form>
    </div>
</div>

<!-- Second card container -->
<div class="card-wrapper">
    <div class="card" id="appletter-card">
        <!-- Card content here -->
        <h2>Upload App Letter</h2>
        <form id="appletter" action="appletter_upload.php" method="post" enctype="multipart/form-data">
            <div class="file-input-container">
                <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="updateFileDetails(this, 2)">
                <label for="fileToUpload2" class="custom-file-upload">Choose File</label>
                <span class="file-name" id="file-name2"></span>
                <span class="clear-icon2" onclick="clearFile(2)">x</span>
            </div>
            <div class="upload-btn-container">
                <input type="submit" value="Upload" class="upload-btn" name="submit2">
            </div>
        </form>
    </div>
</div>
<!-- Third card container -->
<div class="card-wrapper">
    <div class="card">
        <!-- Card content here -->
        <h2>Upload Waiver</h2>
        <form id="waiver" action="waiver_upload.php" method="post" enctype="multipart/form-data">
            <div class="file-input-container">
                <input type="file" name="fileToUpload3" id="fileToUpload3" onchange="updateFileDetails(this, 3)">
                <label for="fileToUpload3" class="custom-file-upload">Choose File</label>
                <span class="file-name" id="file-name3"></span>
                <span class="clear-icon3" onclick="clearFile(3)">x</span>
            </div>
            <div class="upload-btn-container">
                <input type="submit" value="Upload" class="upload-btn" name="submit3">
            </div>
        </form>
    </div>
</div>

    </div>
        </div>
    </div>

    <!-- JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <!-- HTML for Bootstrap modal -->
<div class="modal fade" id="errorMessageModal" tabindex="-1" aria-labelledby="errorMessageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorMessageModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="errorMessage">
        <!-- Error message will be displayed here -->
      </div>
    </div>
  </div>
</div>

<script>
  // JavaScript to show Bootstrap modal with error message
  $(document).ready(function() {
    // Check if the error message session variable is set
    <?php if(isset($_SESSION['error_message'])): ?>
      // Display the error message in the modal
      $('#errorMessage').html('<?php echo $_SESSION['error_message']; ?>');
      $('#errorMessageModal').modal('show');
      // Clear the session variable
      <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
  });
</script>


    <!-- HTML for Bootstrap modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="successMessage">
        <!-- Success message will be displayed here -->
      </div>
    </div>
  </div>
</div>

<script>
  // JavaScript to show Bootstrap modal with success message
  $(document).ready(function() {
    // Check if the success message session variable is set
    <?php if(isset($_SESSION['success_message'])): ?>
      // Display the success message in the modal
      $('#successMessage').html('<?php echo $_SESSION['success_message']; ?>');
      $('#successModal').modal('show');
      // Clear the session variable
      <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
  });
</script>


    
    <!-- Add your additional JavaScript here -->
    <script>
    // JavaScript function to display file name and show/hide clear icon
    function updateFileDetails(input, index) {
        var fileNameElement = document.getElementById('file-name' + index);
        var clearIcon = document.querySelector('.clear-icon' + index);
        if (input.files.length > 0) {
            var fileName = input.files[0].name; // Get the file name
            fileNameElement.innerHTML = fileName; // Display file name
            clearIcon.style.display = 'inline-block'; // Show clear icon
        } else {
            fileNameElement.innerHTML = ''; // Clear file name display
            clearIcon.style.display = 'none'; // Hide clear icon
        }
    }

    // JavaScript function to clear the file input
    function clearFile(index) {
        var fileInput = document.getElementById('fileToUpload' + index);
        fileInput.value = ""; // Clear file input
        updateFileDetails(fileInput, index); // Update file details
    }
</script>


</body>

</html>
