<?php
                ob_start();

                require_once('fpdf186/fpdf.php');

// User-provided student and company information
$studentName = $_SESSION['name'];
$prog = $_SESSION['program'];
// $studentID = $_POST['student_id'];
$companyName = $_SESSION['company_name'];
$contactPerson = $_SESSION['company_supervisor'];
$address = $_SESSION['company_address'];

// Generate the endorsement letter from the college to the company endorsing the student
$endorsementLetter = "
Dear $contactPerson,

I am writing to provide a strong endorsement for $studentName, a student of Gordon College, who is seeking an On-the-Job Training (OJT) opportunity at $companyName.

$studentName is a dedicated and diligent student who has consistently demonstrated exceptional academic performance and a passion for their chosen field of study. They have consistently exhibited a strong work ethic, excellent problem-solving skills, and a drive for continuous learning.

$studentName is currently enrolled in $prog at Gordon College. Throughout their academic journey, they have excelled in coursework, actively participated in extracurricular activities, and consistently displayed a high level of professionalism.

Given $studentName's outstanding academic achievements and enthusiasm for practical experience, I believe they would be an asset to your organization's OJT program. Their commitment to personal and professional growth, combined with their ability to work well in teams, makes them an ideal candidate for an OJT opportunity at $companyName.

I am confident that $studentName's dedication, strong work ethic, and willingness to learn will ensure their successful contribution to your team. By providing them with an OJT opportunity, you will not only be offering a valuable learning experience to a deserving student but also benefit from their enthusiasm and fresh perspectives.

I highly recommend $studentName for an OJT opportunity at $companyName. I am certain that they will make significant contributions and thrive in your organization's dynamic and challenging environment.

Thank you for considering $studentName for an OJT opportunity. If you require any further information or have any questions, please do not hesitate to contact me.

Sincerely,

[Dean Name]
[Your Title]
[College Name]
";

// Output the endorsement letter
// echo nl2br($endorsementLetter);

// Create PDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 12);

// Output the endorsement letter
$pdf->MultiCell(0, 10, $endorsementLetter);

// Output the PDF as a download
$pdf->Output('endorsement_letter.pdf', 'D');
exit();
?>
