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
            $con = mysqli_connect('localhost', 'root', '','u_reg');
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
    <title>File Upload</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>
</body>
</html>

