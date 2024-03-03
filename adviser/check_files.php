<?php

  session_start();
  ?>

<?php
include 'connection.php'; 
 ?>







<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GC-OMS | Adviser</title>
    <!-- App css -->
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
    <!-- Custom styles for file upload -->
    <style>
        /* Your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            // margin: 0;
            // padding: 0;
            //display: flex;
            // align-items: center;
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
            background-color: #4caf50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        .custom-file-upload:hover {
            background-color: #45a049;
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
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .upload-btn:hover {
            background-color: #45a049;
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

        .neon {
            background-color: #333; /* Adjust the background color for neon effect */
            box-shadow: 0 0 20px #00ff00, 0 0 40px #00ff00, 0 0 60px #00ff00, 0 0 80px #00ff00; /* Add multiple box shadows for neon glow */
        }

        .status-button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px; /* Adjust as needed */
            cursor: pointer;
            border-radius: 5px;
        }

        .status-button:hover {
            background-color: #45a049; /* Darker Green */
        }

        .status-button:disabled {
            background-color: #CCCCCC; /* Light gray */
            color: #666666; /* Dark gray */
            //cursor: not-allowed;
        }

        .status-button:hover:disabled {
            background-color: #CCCCCC; /* Light gray */
            color: #666666; /* Dark gray */
        }

        .custom-button {
        border: 1px solid black; 
        background-color: #FFA500; 
        color: black; 
        cursor: pointer; 
        padding: 10px 25px; 
        font-size: 18px; 
        height: 30px; 
        width: 40px; 
        display: flex; 
        justify-content: center; 
        align-items: center;
        }
        .custom-button:hover {
            background-color: #FFC966; /* lighter shade of orange */
        }


    </style>
</head>



<body class="fixed-left">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-orange">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" style="color: #000000;" href="index.php"><button
                class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" style="color: #000000;" href="#!">
                <i class="fas fa-bars"></i></button>GC - OMS</a>

        <div>
            <h4 class="m-t-10 m-l-20 header-title" style="color: #000000;">Monitoring</h4>
        </div>

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



                    <div class="container">


<?php
// Start the session
session_start();

// Include the database connection file
include 'connection.php';

// Function to retrieve the program associated with the advisor
function getAdvisorProgram($conn) {
    // Assume $_SESSION['adv_no'] holds the advisor's identifier
    $advisorId = $_SESSION['adv_no'];

    $query = "SELECT program FROM adv_login WHERE adv_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $advisorId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['program'];
    } else {
        return null;
    }
}

// Function to get student program
function getStudentProgram($conn, $u_id) {
    $query = "SELECT program FROM stud_login WHERE u_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $u_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['program'];
    } else {
        return null;
    }
}



// Check if u_id is submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if u_id is set and not empty
    if (isset($_POST["u_id"]) && !empty($_POST["u_id"])) {
        // Sanitize the u_id to prevent any potential security issues
        $u_id = $conn->real_escape_string($_POST["u_id"]);

        // Store u_id in session
        $_SESSION['u_id'] = $u_id;

        // Get the advisor's program
        $advisorProgram = getAdvisorProgram($conn);

        // Get the student's program
        $studentProgram = getStudentProgram($conn, $u_id);

        // Check if the student's program matches the advisor's program
        if ($advisorProgram && $studentProgram && $advisorProgram === $studentProgram) {
            // Set the session variable for u_id
            $_SESSION['u_id'] = $u_id;

            // Initialize status variables
            $status_resumes = '';
            $status_waivers = '';
            $status_appletters = '';

            // Check resumes table
            $sql_resumes = "SELECT * FROM resumes WHERE u_id = ?";
            $stmt_resumes = $conn->prepare($sql_resumes);
            $stmt_resumes->bind_param("s", $u_id);
            $stmt_resumes->execute();
            $result_resumes = $stmt_resumes->get_result();
            $status_resumes = ($result_resumes->num_rows > 0) ? "Ok" : "Not Found";

            // Check waivers table
            $sql_waivers = "SELECT * FROM waivers WHERE u_id = ?";
            $stmt_waivers = $conn->prepare($sql_waivers);
            $stmt_waivers->bind_param("s", $u_id);
            $stmt_waivers->execute();
            $result_waivers = $stmt_waivers->get_result();
            $status_waivers = ($result_waivers->num_rows > 0) ? "Ok" : "Not Found";

            // Check appletters table
            $sql_appletters = "SELECT * FROM appletters WHERE u_id = ?";
            $stmt_appletters = $conn->prepare($sql_appletters);
            $stmt_appletters->bind_param("s", $u_id);
            $stmt_appletters->execute();
            $result_appletters = $stmt_appletters->get_result();
            $status_appletters = ($result_appletters->num_rows > 0) ? "Ok" : "Not Found";

            // Get the student's name
            $sql_student_name = "SELECT name FROM stud_login WHERE u_id = ?";
            $stmt_student_name = $conn->prepare($sql_student_name);
            $stmt_student_name->bind_param("s", $u_id);
            $stmt_student_name->execute();
            $result_student_name = $stmt_student_name->get_result();
            $student_name = ($result_student_name->num_rows > 0) ? $result_student_name->fetch_assoc()['name'] : "Unknown";

            // Output student name and back button inside a div
            echo "<div style='display: flex; align-items: center;'>";
            echo "<button onclick='goBack()' class='custom-button'>←</button>";
            echo "<h3 style='color: black; font-weight: bold; margin-left: 10px;'>Name: $student_name</h3>";
            echo "</div>";

            // JavaScript function to go back
            echo "<script>
            function goBack() {
              window.history.back();
            }
            </script>";

            // Output statuses in cards with applied styles
            echo '<div class="card-container">';
            // Output resume status
            echo '<div class="card-wrapper">';
            echo '<div class="card">';
            // Change background color dynamically and add border-radius
            echo '<div class="card-body" style="background-color: ' . ($status_resumes == "Ok" ? "#59E94A" : "#FF5262") . '; border-radius: 10px;">';
            echo '<h5 class="card-title" style="color: black; font-weight: bold;">Resume Status</h5>'; // Change font color to black
            echo '<p class="card-text" style="color: black; font-weight: bold;">' . $status_resumes . '</p>';
            echo '</div>';

            // Add button
            echo '<div class="card-button">';
            echo '<button onclick="location.href=\'download_resume.php\'" class="status-button" type="button" ' . ($status_resumes != "Ok" ? "disabled" : "") . '>View Resume</button>';
            echo '</div>';



            echo '</div>';
            echo '</div>';
            // Output waiver status
            echo '<div class="card-wrapper">';
            echo '<div class="card">';
            // Change background color dynamically and add border-radius
            echo '<div class="card-body" style="background-color: ' . ($status_waivers == "Ok" ? "#59E94A" : "#FF5262") . '; border-radius: 10px;">';
            echo '<h5 class="card-title" style="color: black; font-weight: bold;">Waiver Status</h5>'; // Change font color to black
            echo '<p class="card-text" style="color: black; font-weight: bold;">' . $status_waivers . '</p>';
            echo '</div>';

            // Add button
            echo '<div class="card-button">';
            echo '<button onclick="location.href=\'download_waiver.php\'" class="status-button" type="button" ' . ($status_waivers != "Ok" ? "disabled" : "") . '>View Waiver</button>';
            echo '</div>';

            echo '</div>';
            echo '</div>';

            // Output application letter status
            echo '<div class="card-wrapper">';
            echo '<div class="card">';
            // Change background color dynamically and add border-radius
            echo '<div class="card-body" style="background-color: ' . ($status_appletters == "Ok" ? "#59E94A" : "#FF5262") . '; border-radius: 10px;">';
            echo '<h5 class="card-title" style="color: black; font-weight: bold;">Application Letter Status</h5>'; // Change font color to black
            echo '<p class="card-text" style="color: black; font-weight: bold;">' . $status_appletters . '</p>';
            echo '</div>';

            // Add button
            echo '<div class="card-button">';
            echo '<button onclick="location.href=\'download_appletter.php\'" class="status-button" type="button" ' . ($status_appletters != "Ok" ? "disabled" : "") . '>View Application                Letter</button>';
            echo '</div>';

            echo '</div>';
            echo '</div>';

            echo '</div>'; // Close card-container

        } else {
        echo '<script>
        function downloadResume() {
            // Make an AJAX request to download_resume.php
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "download_resume.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Trigger file download
                    var blob = new Blob([xhr.response], { type: xhr.getResponseHeader("Content-Type") });
                    var link = document.createElement("a");
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "<?php echo $file_name; ?>"; // Dynamically set the filename
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            };
            xhr.send();
        }

        // Display error message as a popup
        function showPopup(message) {
            // Create a new popup element
            var popup = document.createElement("div");
            popup.classList.add("popup");

            popup.innerHTML = message;

            // Add some basic styles to the popup
            popup.style.position = "fixed";
            popup.style.top = "20%";
            popup.style.left = "50%";
            popup.style.transform = "translate(-50%, -50%)";
            popup.style.width = "300px"; // Set the width to 300 pixels
            popup.style.padding = "20px";
            popup.style.backgroundColor = "#ffffff";
            popup.style.border = "1px solid #cccccc";
            popup.style.borderRadius = "5px";
            popup.style.boxShadow = "0px 2px 5px rgba(0, 0, 0, 0.2)";
            popup.style.zIndex = "9999";
            popup.style.fontSize = "18px";
            popup.style.textAlign = "center";
            popup.style.color = "black"; // Set the font color to black

            // Add the popup to the document body
            document.body.appendChild(popup);

            // Remove the popup after a short delay (e.g., 2 seconds)
            setTimeout(function () {
                popup.remove();
                // Go back to the previous page
                window.history.back();
            }, 2000);
        }

        // Call the showPopup function with the error message
        showPopup(\'The student does not belong to the <?php echo $advisorProgram; ?> program.\');
        </script>';


        }
    } else {
        // Handle case where u_id is not provided
        echo "Please provide a u_id";
    }
} else {
    // Handle case where request method is not POST
    echo "Invalid request method";
}
?>



                    </div>

                    <style>
                        .table-container {
                            height: 590px;
                            /* Adjust the height as per your requirement */
                            overflow-y: scroll;
                        }
                    </style>
                </div>

            </div>
        </div>
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

    
<script>
    function showPopup(message) {
        // Create a new popup element
        var popup = document.createElement("div");
        popup.classList.add("popup");

        popup.innerHTML = message;

        // Add some basic styles to the popup
        popup.style.position = "fixed";
        popup.style.top = "10%";
        popup.style.left = "50%";
        popup.style.transform = "translate(-50%, 10%)";
        popup.style.width = "200px"; // Set the width to 200 pixels
        popup.style.height = "200px";
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
        popup.style.color = "black"; // Set the font color to black

        // Add the popup to the document body
        document.body.appendChild(popup);

        // Scroll back to the table after a short delay (e.g., 5 seconds)
        setTimeout(function () {
            popup.remove();
        }, 5000);
    }
</script>

</body>

</html>