
<?php
//include connection file 
include_once("conn.php");
include_once('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('22.jpg', 0, 0, 500);
        $this->SetFont('Arial', 'B', 13);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(80, 10, 'Customer List', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('user_id' => 'ID', 'user_firstname' => 'First Name', 'user_lastname' => 'Last Name', 'user_email' => 'Email', 'user_address' => 'Address',);

$result = mysqli_query($connString, "select * from userview ") or die("database error:" . mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM userview");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 10);
foreach ($header as $heading) {
    $pdf->Cell(40, 12, $display_heading[$heading['Field']], 1);
}
foreach ($result as $row) {
    $pdf->Ln();
    foreach ($row as $column)
        $pdf->Cell(40, 12, $column, 1);
}
$pdf->Output();
?>