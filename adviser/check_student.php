<?php
include 'connection.php';

// Function to check if the student ID exists in the database
function isStudentExists($conn, $u_id) {
    $query = "SELECT COUNT(*) as count FROM stud_login WHERE u_id = '$u_id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'] > 0; // Returns true if student exists, false otherwise
    } else {
        return false;
    }
}
?>
