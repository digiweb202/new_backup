<?php

//INCLUDING FPDF
require_once('C:\xampp\htdocs\hit\admin\sneat-bootstrap-html-admin-template\FPDF\fpdf.php');
// Database connection parameters
include 'dbconnect.php';
// Fetch data from the database
$sql = "SELECT p.product_id,p.product_name,p.product_desc, p.product_price, p.product_status, s.sub_cat_name, c.cat_name FROM (
    (product p INNER JOIN sub_cat s ON p.sub_cat_id =s.sub_cat_id)
    INNER JOIN category c ON s.cat_id = c.cat_id) where p.product_status='active' AND s.sub_cat_status='active' AND c.cat_status='active';";
$result = $conn->query($sql);

//FOR CSV FILE
// // Set appropriate headers for file download
// header("Content-type: text/csv");
// header("Content-Disposition: attachment; filename=productreport.csv");

// // Create a file handle for writing the report content
// $handle = fopen('php://output', 'w');

// // Write the report header
// fputcsv($handle, array('ID', 'Name', 'desc','price','status','Sub_cat_name','Category Name'));

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


//FOR PDF FILE

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(15,10,'ID','1','0','C');
$pdf->Cell(40,10,'Name','1','0','C');
$pdf->Cell(50,10,'Desc','1','0','C');
$pdf->Cell(20,10,'Price','1','0','C');
$pdf->Cell(35,10,'Category','1','0','C');
$pdf->Cell(38,10,'Sub-category','1','1','C');
while($row=mysqli_fetch_assoc($result))
{
$pdf->Cell(15,10,$row['product_id'],'1','0','C');
$pdf->Cell(40,10,$row['product_name'],'1','0','C');
$pdf->Cell(50,10,$row['product_desc'],'1','0','C');
$pdf->Cell(20,10,$row['product_price'],'1','0','C');
$pdf->Cell(35,10,$row['cat_name'],'1','0','C');
$pdf->Cell(38,10,$row['sub_cat_name'],'1','1','C');
}

// $pdf->Output('report.pdf','D');
$pdf->Output();
?>
