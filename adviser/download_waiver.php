<?php
// Function to download resume
function downloadWaiver() {

    session_start();

    // Check if u_id is set in session
    if(isset($_SESSION['u_id'])) {
        $u_id = $_SESSION['u_id'];

        // Include the database connection file
        include 'connection.php';

        // Prepare SQL statement to select file based on u_id
        $sql = "SELECT file_name, file_type, file_size, file_path FROM waivers WHERE u_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $u_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Bind the result variables
            $stmt->bind_result($file_name, $file_type, $file_size, $file_path);

            // Fetch the result
            if ($stmt->fetch()) {
                // Extract file extension
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                // Set appropriate headers for file download
                header("Content-Type: $file_type");
                header("Content-Disposition: attachment; filename=\"$u_id.$file_extension\"");
                header("Content-Length: $file_size");

                // Output the file content
                readfile($file_path);
                exit();
            } else {
                // If no file found for the provided u_id
                echo "File not found";
            }
        } else {
            echo "No resume found for this user.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "U_ID not found in session.";
    }
    // Log to console to confirm function invocation
    echo "<script>console.log('downloadResume() function called');</script>";
}

// Call the function to trigger its execution
downloadWaiver();
?>
