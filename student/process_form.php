<?php
require('fpdf186/fpdf.php');

$conn = mysqli_connect('sql209.infinityfree.com', 'if0_35850060', 'KLD2810','if0_35850060_u_reg');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the form
    $company_name = $_POST['company_name'];
    $company_supervisor = $_POST['company_supervisor'];
    $company_address = $_POST['company_address'];
    $company_contact_no = $_POST['company_contact_no'];
    $company_email = $_POST['company_email'];

    session_start();
    $name = $_SESSION['name'];
    $program = $_SESSION['program'];

    // Prepare the SQL statement
    $sql = "UPDATE stud_login SET company_name=?, company_supervisor=?, company_address=?, company_contact_no=?, company_email=? WHERE `name`=?";
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the statement
    $stmt->bind_param("ssssss", $company_name, $company_supervisor, $company_address, $company_contact_no, $company_email, $name);
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    $content = "Dear $company_supervisor,\n\n"
        . "I am writing to provide a strong endorsement for $name, a student of Gordon College, who is seeking an On-the-Job Training (OJT) opportunity at $company_name. \n\n"
        . "$name is a dedicated and diligent student who has consistently demonstrated exceptional academic performance and a passion for their chosen field of study. They have consistently exhibited a strong work ethic, excellent problem-solving skills, and a drive for continuous learning.\n\n"
        . "$name is currently enrolled in $program at Gordon College. Throughout their academic journey, they have excelled in coursework, actively participated in extracurricular activities, and consistently displayed a high level of professionalism.\n\n"
        . "Given $name's outstanding academic achievements and enthusiasm for practical experience, I believe they would be an asset to your organization's OJT program. Their commitment to personal and professional growth, combined with their ability to work well in teams, makes them an ideal candidate for an OJT opportunity at $company_name.\n\n"
        . "I am confident that $name's dedication, strong work ethic, and willingness to learn will ensure their successful contribution to your team. By providing them with an OJT opportunity, you will not only be offering a valuable learning experience to a deserving student but also benefit from their enthusiasm and fresh perspectives.\n\n"
        . "I highly recommend $name for an OJT opportunity at $company_name. I am certain that they will make significant contributions and thrive in your organization's dynamic and challenging environment.\n\n"
        . "Thank you for considering $name for an OJT opportunity. If you require any further information or have any questions, please do not hesitate to contact me.\n\n"
        . "Sincerely,\n\n"
        . "Kristiane Dizon\n"
        . "Dean\n"
        . "Gordon College";

    $pdf->MultiCell(0, 10, $content);
    $pdf->Output('D', 'Endorsement_letter.pdf');
    exit();
}

?>
