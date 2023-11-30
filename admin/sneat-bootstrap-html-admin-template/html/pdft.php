<?php

require_once('C:\xampp\htdocs\hit\admin\sneat-bootstrap-html-admin-template\FPDF\fpdf.php');
require_once('dbconnect.php');
$sql = "SELECT p.product_id,p.product_name,p.product_desc, p.product_price, p.product_status, s.sub_cat_name, c.cat_name FROM (
    (product p INNER JOIN sub_cat s ON p.sub_cat_id =s.sub_cat_id)
    INNER JOIN category c ON s.cat_id = c.cat_id);";
$data=$conn->query($sql);



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(25,10,'ID','1','0','C');
$pdf->Cell(40,10,'Name','1','0','C');
// $pdf->Cell(40,10,'Desc','1','0','C');
$pdf->Cell(30,10,'Price','1','0','C');
$pdf->Cell(45,10,'Category','1','0','C');
$pdf->Cell(45,10,'Sub-category','1','1','C');
while($row=mysqli_fetch_assoc($data))
{
$pdf->Cell(25,10,$row['product_id'],'1','0','C');
$pdf->Cell(40,10,$row['product_name'],'1','0','C');
// $pdf->Cell(40,10,$row['product_desc'],'1','0','C');
$pdf->Cell(30,10,$row['product_price'],'1','0','C');
$pdf->Cell(45,10,$row['cat_name'],'1','0','C');
$pdf->Cell(45,10,$row['sub_cat_name'],'1','1','C');
}

$pdf->Output('report.pdf','D');
?>