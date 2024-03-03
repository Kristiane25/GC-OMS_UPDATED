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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-center font-weight-normal" href="index.php"><button
                class="btn btn-link btn-sm order-1 order-lg-0 me-0 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i></button>GC - OMS</a>

        <div>
            <h4 class="m-t-10 m-l-20 header-title">Monitoring</h4>
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
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            Dashboard
                        </a>
                        <!-- <a class="nav-link" href="view.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                            View
                        </a> -->
                        <a class="text-black btn btn-lg btn-primary" href="logout.php"><i
                                class="mr-2 fas fa-sign-out"></i>LOGOUT</a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">

            <div class="container-fluid px-1">
                <div class="container-fluid px-1">
                    <!-- <h1 class="mt-4">My Class <i class="fas fa-laptop"></i></h1>
                            Navbar Search -->
                    <form method="POST" action="total_hours.php"
                        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group mt-3 mb-3">
                            <!-- <input class="form-control" type="text" placeholder="" aria-label="Search for..."
                                aria-describedby="btnNavbarSearch" id="u_id" name="u_id" />
                            <button class="btn btn-warning" id="btnNavbarSearch" type="submit">Monitor</button> -->
                        </div>
                    </form>



                    <div class="container">
                        <?php
                        $block = isset($_GET['block']) ? $_GET['block'] : '';

                        function getBlockForStudent($conn, $u_id) {
                        $query = "SELECT block FROM stud_login WHERE u_id = '$u_id'";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        return $row['block'];
                        } else {
                        return null;
                        }
                    }
                        function getStudentProgram($conn, $u_id) {
                            $query = "SELECT program FROM stud_login WHERE u_id = '$u_id' ";
                            $result = mysqli_query($conn, $query);
                        
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                return $row['program'];
                            } else {
                                return null;
                            }
                        }

                        // Function to retrieve the program associated with the advisor
function getAdvisorProgram($conn) {
    // Replace 'advisor_id' with the identifier for the advisor, e.g., $_SESSION['advisor_id']
    $advisorId = $_SESSION['adv_no']; // Replace this with the actual identifier for the advisor

    $query = "SELECT program FROM adv_login WHERE adv_no = '$advisorId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['program'];
    } else {
        return null;
    }
}
                        
function calculateTotalHours($u_id) {
    // Database configuration
    // Establish database connection
    $conn = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg');

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Get the program associated with the advisor
    $advisorProgram = getAdvisorProgram($conn);

    // Get the program associated with the entered student ID
    $studentProgram = getStudentProgram($conn, $u_id);

    // Get the block associated with the entered student ID
    $block = getBlockForStudent($conn, $u_id);

     // Check if the programs match
     if (!$studentProgram || $studentProgram !== $advisorProgram) {
     $errorMessage = "The student does not belong to the $advisorProgram program or this block.";
     mysqli_close($conn);

    // Display the error message as a popup using JavaScript on the same page
     echo "<script>showPopup('$errorMessage');</script>";
     echo "<script>setTimeout(function() { history.back(); }, 750);</script>";

    return;
}



// Fetch student name from the database
$queryy = "SELECT name FROM log_table WHERE u_id = '$u_id'";
$result = mysqli_query($conn, $queryy);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $studentName = $row['name'];

    // Print the student name in an <h4> heading
     echo "<h4 style='color: black;'><button type='button' onclick='history.back();'><span style='font-size: 1.2em;'>&#8592;</span></button><span style='margin-right: 10px;'></span>Student Name: $studentName</h4>";
} else {
    echo "<h4 style='color: black;'><button type='button' onclick='history.back();'><span style='font-size: 1.2em;'>&#8592;</span></button><span style='margin-right: 10px;'></span>Student has not logged yet.</h4>";
}

    // Fetch log entries from the database for the given u_id
$query = "SELECT log_entry FROM log_table WHERE u_id = '$u_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    $totalHours = 0;

    // Create an array to store the start and end times separately
    $sessions = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $logEntry = $row['log_entry'];

        // Extract start and end times from log entry using regular expressions
        $patternStart = '/\[(\d{4}-\d{2}-\d{2})\] \[(\d{2}:\d{2}:\d{2})\] - Started OJT session./';
        $patternEnd = '/\[(\d{4}-\d{2}-\d{2})\] \[(\d{2}:\d{2}:\d{2})\] - Ended OJT session./';

        if (preg_match($patternStart, $logEntry, $matches)) {
            $startTime = $matches[1] . " " . $matches[2];

            // Store the start time in the sessions array
            $sessions[] = array('start' => $startTime, 'end' => null);
        } elseif (preg_match($patternEnd, $logEntry, $matches)) {
            $endTime = $matches[1] . " " . $matches[2];

            // Ensure there's a valid session in the array before updating the end time
            if (!empty($sessions)) {
                $key = count($sessions) - 1;
                $sessions[$key]['end'] = $endTime;

                // Calculate the session hours
                $startDateTimeObj = DateTime::createFromFormat('Y-m-d H:i:s', $sessions[$key]['start']);
                $endDateTimeObj = DateTime::createFromFormat('Y-m-d H:i:s', $endTime);

                if ($startDateTimeObj && $endDateTimeObj) {
                    $sessionHours = ($endDateTimeObj->getTimestamp() - $startDateTimeObj->getTimestamp()) / (60 * 60);
                    $totalHours += $sessionHours;
                } else {
                    echo "Invalid date/time format encountered.<br>";
                }
            }
        }
    }

        // Close database conn
        mysqli_close($conn);

        // Print the start and end times in a table
        echo "<div class='table-container'>";
        echo "<a id='table-anchor'></a>";
        echo "<div class='table-responsive table-striped'>";
        echo "<table class='table' style='border-collapse: collapse;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th style='border: 1px solid black; padding: 5px;'>Day</th>";
        echo "<th style='border: 1px solid black; padding: 5px;'>Start Time</th>";
        echo "<th style='border: 1px solid black; padding: 5px;'>End Time</th>";
        echo "<th style='border: 1px solid black; padding: 5px;'>Total Hours</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Variables to store cumulative session hours, minutes, and seconds
        $cumulativeHours = 0;
        $cumulativeMinutes = 0;
        $cumulativeSeconds = 0;

        // Check if $sessions array is not empty before processing
if (!empty($sessions)) {
    foreach ($sessions as $session) {
        $startDate = explode(' ', $session['start']);
        $endDate = explode(' ', $session['end']);

        $day = $startDate[0]; // Extract the day component

        // Calculate the session hours, minutes, and seconds
        $startDateTimeObj = DateTime::createFromFormat('Y-m-d H:i:s', $session['start']);
        $endDateTimeObj = DateTime::createFromFormat('Y-m-d H:i:s', $session['end']);

        if ($startDateTimeObj && $endDateTimeObj) {
            $sessionSeconds = $endDateTimeObj->getTimestamp() - $startDateTimeObj->getTimestamp();
            $sessionHours = floor($sessionSeconds / 3600);
            $sessionMinutes = floor(($sessionSeconds % 3600) / 60);
            $sessionSeconds = $sessionSeconds % 60;

            // Add the session hours, minutes, and seconds to the cumulative values
            $cumulativeHours += $sessionHours;
            $cumulativeMinutes += $sessionMinutes;
            $cumulativeSeconds += $sessionSeconds;

            // Handle any carryover from seconds to minutes and minutes to hours
            if ($cumulativeSeconds >= 60) {
                $cumulativeMinutes += floor($cumulativeSeconds / 60);
                $cumulativeSeconds = $cumulativeSeconds % 60;
            }

            if ($cumulativeMinutes >= 60) {
                $cumulativeHours += floor($cumulativeMinutes / 60);
                $cumulativeMinutes = $cumulativeMinutes % 60;
            }
                    echo "<tr>";
                    echo "<td style='border: 1px solid black; padding: 5px;'>" . $startDate[0] . "</td>";
                    echo "<td style='border: 1px solid black; padding: 5px;'>" . $startDate[1] . "</td>";
                    echo "<td style='border: 1px solid black; padding: 5px;'>" . $endDate[1] . "</td>";
                    echo "<td style='border: 1px solid black; padding: 5px;'>" . $sessionHours . "h " . $sessionMinutes . "m " . $sessionSeconds . "s" . "</td>";
                    echo "</tr>";
                } else {
                    echo "Invalid date/time format encountered.<br>";
                }
            }

            // Print the cumulative session hours, minutes, and seconds
            echo "<tfoot>";
            echo "<tr>";
            echo "<td style='border: 1px solid black; padding: 5px;'></td>";
            echo "<td style='border: 1px solid black; padding: 5px;'><strong>Cumulative Total:</strong></td>";
            echo "<td style='border: 1px solid black; padding: 5px;'></td>";
            echo "<td style='border: 1px solid black; padding: 5px;'><strong>" . $cumulativeHours . "h " . $cumulativeMinutes . "m " . $cumulativeSeconds . "s" . "<strong></td>";
            echo "</tr>";
            echo "</tfoot>";
        } else {
            echo "<tr>";
            echo "<td colspan='4'>No session data found for this user.</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";

        return $totalHours;
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}
?>

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

<?php
// Usage:
$u_id = $_POST['u_id']; // Assuming u_id is retrieved from the session
$totalHours = calculateTotalHours($u_id);
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
    

</body>

</html>