<?php
// Include your database connection file
include 'connection.php';

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is uploaded
    if (isset($_FILES["fileToUpload2"]) && $_FILES["fileToUpload4"]["error"] == UPLOAD_ERR_OK) {
        // Get file details
        $fileName = $_FILES["fileToUpload2"]["name"];
        $fileTmpName = $_FILES["fileToUpload2"]["tmp_name"];
        $fileType = $_FILES["fileToUpload2"]["type"];
        $fileSize = $_FILES["fileToUpload2"]["size"];

        // Get student ID from session
        $u_id = $_SESSION['u_id'];
        $stud_name = $_SESSION['name'];

        // Directory where uploaded files will be stored
        $uploadDir = "../student/uploads/";

        // Generate a unique filename to prevent overwriting existing files
        $uniqueFileName = uniqid() . "_" . $fileName;

        // Path to store the uploaded file
        $filePath = $uploadDir . $uniqueFileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($fileTmpName, $filePath)) {
            // Check if a file already exists for the user
            $checkSql = "SELECT * FROM appletters WHERE u_id = ?";
            $checkStmt = $conn->prepare($checkSql);
            $checkStmt->bind_param("i", $u_id);
            $checkStmt->execute();
            $result = $checkStmt->get_result();

            if ($result->num_rows > 0) {
                // If file exists, update the record
                $updateSql = "UPDATE appletters SET stud_name = ?, file_name = ?, file_type = ?, file_size = ?, file_path = ? WHERE u_id = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("sssssi", $stud_name, $fileName, $fileType, $fileSize, $filePath, $u_id);
                if ($updateStmt->execute()) {
                    // Set session variable for success message
                    $_SESSION['success_message'] = "Application letter updated successfully.";
                } else {
                    echo "Error updating file: " . $updateStmt->error;
                }
            } else {
                // If file does not exist, insert a new record
                $insertSql = "INSERT INTO appletters (u_id, stud_name, file_name, file_type, file_size, file_path) VALUES (?, ?, ?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param("isssss", $u_id, $stud_name, $fileName, $fileType, $fileSize, $filePath);
                if ($insertStmt->execute()) {
                    // Set session variable for success message
                    $_SESSION['success_message'] = "Application letter uploaded successfully.";
                } else {
                    echo "Error uploading file: " . $insertStmt->error;
                }
            }
        } else {
            // Set session variable for error message
            $_SESSION['error_message'] = "No file uploaded or an error occurred.";
        }
    } else {
        // Set session variable for error message
        $_SESSION['error_message'] = "No file uploaded or an error occurred.";
    }

    // Redirect back to previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
