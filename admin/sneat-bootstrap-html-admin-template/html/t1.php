<?php


//INCLUDING FPDF
require_once('C:\xampp\htdocs\hit\admin\sneat-bootstrap-html-admin-template\FPDF\fpdf.php');
// Database connection parameters
include 'dbconnect.php';
// Fetch data from the database
$sql = "SELECT * from category where cat_status='active';";
$result = $conn->query($sql);



//FOR CSV FILES
// // Set appropriate headers for file download
// header("Content-type: text/csv");
// header("Content-Disposition: attachment; filename=categoryreport.csv");

// // Create a file handle for writing the report content
// $handle = fopen('php://output', 'w');

// // Write the report header
// fputcsv($handle, array('ID', 'Name','Category Desc','status'));

// // Write the report data from the database to the CSV file
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         fputcsv($handle, $row);
//     }
// }

// // Close the file handle
// fclose($handle);

// // Close the database connection
// $conn->close();

//FOR PDF

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(90,10,'ID','1','0','C');
$pdf->Cell(100,10,'Name','1','1','C');
// $pdf->Cell(40,10,'Desc','1','0','C');
// $pdf->Cell(30,10,'Price','1','0','C');
// $pdf->Cell(45,10,'Category','1','0','C');
// $pdf->Cell(45,10,'Sub-category','1','1','C');
while($row=mysqli_fetch_assoc($result))
{
$pdf->Cell(90,10,$row['cat_id'],'1','0','C');
$pdf->Cell(100,10,$row['cat_name'],'1','1','C');
// $pdf->Cell(40,10,$row['product_desc'],'1','0','C');
// $pdf->Cell(30,10,$row['product_price'],'1','0','C');
// $pdf->Cell(45,10,$row['cat_name'],'1','0','C');
// $pdf->Cell(45,10,$row['sub_cat_name'],'1','1','C');
}

// $pdf->Output('report.pdf','D');
$pdf->Output();

?>


