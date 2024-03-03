<?php
if (isset($_GET['file'])) {
    // Get the file name from the query string
    $fileName = $_GET['file'];

    // Specify the directory where the uploaded files are stored
    $uploadDir = 'uploads/';

    // Generate the full path to the file
    $filePath = $uploadDir . $fileName;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set the appropriate headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and output it to the browser
        readfile($filePath);
        exit;
    } else {
        echo 'File not found.';
    }
}
?>