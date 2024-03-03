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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>GC-OMS | Students</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-x1BmVpb5xdYrxAymzFhsP/2b8/2bmm8YDvLP1Wld6zTJjqFgJmD4sJlPIS2WNQERcbhwC5Bko87SkRbp7aR3Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/img/logo/gcoms.png">

    <style>
        /* Your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Set a minimum height of 100% of the viewport height */
            display: flex;
            align-items: center;
        }

        .element {
            height: 100vh; /* Set the height of the element to 100% of the viewport height */
        }


        .card-container {
            margin: 0 auto; /* Center the container horizontally */
        }



        .status-content {
            text-align: right; /* Align content to the right */
            margin-left: 50px; /* Adjust the margin as needed */
        }

        .status-heading {
            color: black; /* Set the color of the heading to black */
            text-align: left; /* Align content to the right */
        }

        .download-cards-container {
            display: flex;
            justify-content: center;
            overflow-x: hidden; /* Enable horizontal scrolling if needed */
            padding: 20px; /* Adjust container padding */
        }

        .spacer {
            width: 50px; /* Adjust the width of the space */
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
            display: flex; 
            justify-content: center;
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
            text-decoration: none; /* Remove underline */
        }

        .custom-file-upload:hover {
            background-color: #FFC266;
        }

        .card form input[type="file"] {
            display: none;
        }

        .file-input-container {
            display: flex; 
            justify-content: center;
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
            background-color: #FFA500;
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

        .file-input-container {
            text-align: center;
        }

        .stat-list {
            text-align: left;
            font-size: 16px;
            list-style-type: none; 
            padding-left: 0;"
        }

        .divider {
            border-top: 3px solid #999; /* Increase thickness and change color */
            margin-top: 20px; /* Adjust the top margin as needed */
            margin-bottom: 20px; /* Adjust the bottom margin as needed */
            margin-right: 15%; /* Adjust the right margin based on card container width */
            width: 800px;
        }

            /* CSS for phones */
    @media screen and (max-width: 768px) {

        html {
        overflow: hidden; /* Disable both horizontal and vertical scrolling */
        }

        body {
            min-height: auto; /* Reset minimum height */
            display: block; /* Reset display */
            align-items: stretch; /* Reset align-items */
        }

        .card-container {
            margin: 0; /* Reset margin */
            margin-right: 20px
        }

        .status-content {
            text-align: left; /* Reset text alignment */
            margin-left: 0; /* Reset left margin */
        }

        .download-cards-container {
            display: flex;
            flex-direction: column; /* Display cards vertically */
            align-items: center; /* Center items horizontally */
            overflow-x: hidden; /* Enable horizontal scrolling if needed */
            padding: 20px; /* Adjust container padding */
        }

        .spacer {
            display: none; /* Hide spacer on phones */
        }

        .card-wrapper {
            width: 100%; /* Each card takes up full width */
            margin-right: 0; /* Reset right margin */
            margin-bottom: 20px; /* Add bottom margin for spacing between cards */
        }

        .divider {
            border-top: 3px solid #999; /* Increase thickness and change color */
            margin-top: 20px; /* Adjust the top margin as needed */
            margin-bottom: 20px; /* Adjust the bottom margin as needed */
            max-width: 350px /* Adjust the right margin based on card container width */
        }
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

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <img class="userpic" src="assets/images/\users/user.jpg" style="width:90px;height:90px;">
                        <a id="department" class="nav-link text-center" href="form.php"> &nbsp; &nbsp; &nbsp;
                            <?php echo $_SESSION['name']; ?>
                            <br><?php echo $_SESSION['program']; ?></a>
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
                        <!-- <a href="#" class="dropdown-btn nav-link" style="background-color: transparent" ;>
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            Log &nbsp; <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-container sb-nav-link-icon" style="background-color: transparent">
                            <a class="nav-link" href="daily_log_start.php" onclick="showPopup('start')">Start</a>
                            <a class="nav-link" href="daily_log_end.php" onclick="showPopup('end')">End</a>

                        </div> -->
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
    <!-- Main content -->

       <?php
    // Assume you've already started the session and connected to the database

    // Fetch the user ID from the session
    $u_id = $_SESSION['u_id'];

    // Prepare and execute SQL query to check if a resume exists for the user
    $sql_resume = "SELECT * FROM resumes WHERE u_id = '$u_id'";
    $result_resume = $conn->query($sql_resume);

    // Prepare and execute SQL query to check if a waiver is submitted for the user
    $sql_waiver = "SELECT * FROM waivers WHERE u_id = '$u_id'";
    $result_waiver = $conn->query($sql_waiver);

    // Prepare and execute SQL query to check if an application letter is submitted for the user
    $sql_application_letter = "SELECT * FROM appletters WHERE u_id = '$u_id'";
    $result_application_letter = $conn->query($sql_application_letter);

    // Define default colors for statuses
    $uploadedColor = 'green';
    $notUploadedColor = 'red';

    // Check if the resume exists for the user
    if ($result_resume->num_rows > 0) {
        // Resume exists for the user
        $resumeStatus = 'Submitted';
        $resumeColor = $uploadedColor;
    } else {
        // No resume exists for the user
        $resumeStatus = 'Not Submitted';
        $resumeColor = $notUploadedColor;
    }

    // Check if the waiver is submitted for the user
    if ($result_waiver->num_rows > 0) {
        // Waiver is submitted
        $waiverStatus = 'Submitted';
        $waiverColor = $uploadedColor;
    } else {
        // Waiver is not submitted
        $waiverStatus = 'Not Submitted';
        $waiverColor = $notUploadedColor;
    }

    // Check if the application letter is submitted for the user
    if ($result_application_letter->num_rows > 0) {
        // Application letter is submitted
        $applicationLetterStatus = 'Submitted';
        $applicationLetterColor = $uploadedColor;
    } else {
        // Application letter is not submitted
        $applicationLetterStatus = 'Not Submitted';
        $applicationLetterColor = $notUploadedColor;
    }
?>


        <!-- Add the cards here -->
    <div class="card-container">
        <!-- Status content without card structure -->
        <div class="status-content">
            <h2 class="status-heading">Status</h2>
            <ul style="text-align: left; font-size: 16px; list-style-type: none; padding-left: 0;" id="statusList">
                <li><?php echo "Resume: <span style='color: $resumeColor'>$resumeStatus</span>"; ?></li>
                <li><?php echo "Waiver: <span style='color: $waiverColor'>$waiverStatus</span>"; ?></li>
                <li><?php echo "Application Letter: <span style='color: $applicationLetterColor'>$applicationLetterStatus</span>"; ?></li>
            </ul>
        </div>

        <!-- Divider line -->
        <hr class="divider">

        <!-- Download cards container -->
        <div class="download-cards-container">
            <!-- First card container -->
            <div class="card-wrapper">
                <div class="card">
                    <!-- Card content here -->
                    <h2>Download App Letter Template</h2>
                    <div class="file-input-container">
                        <!-- Replace input type=file with anchor tag -->
                        <a href="assets/templates/OJT-Application-Letter_template.pdf" class="custom-file-upload" download>Download</a>
                    </div>
                </div>
            </div>

            <!-- Large space between cards -->
            <div class="spacer"></div>

            <!-- Second card container -->
            <div class="card-wrapper">
                <div class="card">
                    <!-- Card content here -->
                    <h2>Download Waiver Template</h2>
                    <div class="file-input-container">
                        <!-- Replace input type=file with anchor tag -->
                        <a href="assets/templates/OJT-Parents-Waiver_template.pdf" class="custom-file-upload" download>Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




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

    <script>
        // Indent submenus
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });

            // Indent submenus
            var submenu = dropdown[i].nextElementSibling;
            submenu.style.marginLeft = "20px";
            submenu.style.display = "none";
        }
    </script>

    <script>
        function showPopup(action) {
            // Create a new popup element
            var popup = document.createElement("div");
            popup.classList.add("popup");
            var message = "";

            if (action === "start") {
                message = "OJT session started.";
            } else if (action === "end") {
                message = "OJT session ended.";
            } else {
                message = "error";
            }

            popup.innerHTML = message;

            // Add some basic styles to the popup
            popup.style.position = "fixed";
            popup.style.top = "10%";
            popup.style.left = "50%";
            popup.style.transform = "translate(-50%, 10%)";
            popup.style.width = "200px"; // Set the width to 300 pixels
            popup.style.height = "50px";
            popup.style.padding = "10px";
            popup.style.backgroundColor = "#ffffff";
            popup.style.border = "1px solid #cccccc";
            popup.style.borderRadius = "5px";
            popup.style.boxShadow = "0px 2px 5px rgba(0, 0, 0, 0.2)";
            popup.style.zIndex = "9999";
            popup.style.fontSize = "18px";
            popup.style.textAlign = "center";
            popup.style.display = "flex"; // Set the popup as a flex container
            popup.style.alignItems = "center";

            // Add the popup to the document body
            document.body.appendChild(popup);

            // Remove the popup after a short delay (e.g., 3 seconds)
            setTimeout(function () {
                popup.remove();
            }, 5000);
        }
    </script>

    <script>
        if (window.matchMedia("(max-width: 768px)").matches) {
            let lastScrollTop = 0;
            window.addEventListener("scroll", function() {
                let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
                if (currentScroll > lastScrollTop) {
                    // Down scroll
                    document.documentElement.style.overflowY = "hidden";
                } else {
                    // Up scroll
                    document.documentElement.style.overflowY = "auto";
                }
                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
            });
        }
    </script>
</body>

</html>