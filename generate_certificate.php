<?php
require('fpdf/fpdf.php');

// Get employee details from form submission
//Get employee details from form submission
$employeeName = $_POST['employee_name'];
$companyName = $_POST['company_name'];
$designation = $_POST['designation'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];
$supervisorName = $_POST['supervisor_name'];
$supervisorDesignation = $_POST['supervisor_designation'];

// Create a PDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Experience Certificate', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(); // Add space

// Experience details
$pdf->Cell(0, 10, "This is to certify that $employeeName was employed at $companyName as a $designation from $startDate to $endDate.", 0, 1);

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, "During this period, their work was commendable and they fulfilled their responsibilities with dedication and professionalism.", 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "They reported directly to $supervisorName, $supervisorDesignation.", 0, 1);
$pdf->Ln(); // Add space

// Signatory
$pdf->Cell(0, 10, 'Sincerely,', 0, 1);
$pdf->Cell(0, 10, $supervisorName, 0, 1);
$pdf->Cell(0, 10, $supervisorDesignation, 0, 1);

// Output the PDF
$pdf->Output();

// Add CSS-like styling
$css = "
    body {
        background-color: #f2f2f2;
    }
    h1 {
        color: #333;
    }
    p {
        color: #555;
    }
    .signatory {
        font-style: italic;
        color: #777;
    }
";

$pdf->SetFont('Arial', '', 12);
$pdf->WriteHTML($css);
?>
