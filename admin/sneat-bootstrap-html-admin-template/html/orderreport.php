
<?php
require_once('dbconnect.php');
require_once('C:\xampp\htdocs\hit\admin\sneat-bootstrap-html-admin-template\FPDF\fpdf.php');

// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(25,10,'Order Report',0,1,'C');
$sql = "SELECT o.order_new_id,o.order_date,o.total_price,o.shipping_address,o.status,p.product_name,od.quantity,od.price,od.sub_total,c.customer_name,c.customer_email,c.customer_mobile,p.vendor_id from order_new o
inner JOIN
customer c on o.customer_id=c.customer_id 
inner join
order_item od on o.order_new_id=od.order_id 
inner join
product p on od.product_id=p.product_id where status='$_GET[status]'
 ORDER BY o.order_new_id ASC;";
$result = $conn->query($sql);

// if(mysqli_num_rows($result) > 0) {
// 	$pdf->SetFont('Arial','',12);
// 	$pdf->Cell(25,10,'ID',1,0,'C');
// 	$pdf->Cell(35,10,'Customer Name',1,0,'C');
// 	// $pdf->Cell(45,10,'Customer email',1,0,'C');
// 	$pdf->Cell(45,10,'Customer Mobile',1,0,'C');
// 	$pdf->Cell(35,10,'Order Amount',1,0,'C');
// 	$pdf->Cell(50,10,'Order Date',1,1,'C');


// 	while($row = mysqli_fetch_assoc($result)) {
// 		$pdf->Cell(25,10,$row['order_id'],1,0,'C');
// 		$pdf->Cell(35,10,$row['customer_name'],1,0,'C');
// 		// $pdf->Cell(45,10,$row['customer_email'],1,0,'C');
// 		$pdf->Cell(45,10,$row['customer_mobile'],1,0,'C');
// 		$pdf->Cell(35,10,$row['total_price'],1,0,'C');
// 		$pdf->Cell(50,10,$row['order_date'],1,1,'C');
// 	}
	
// } else {
// 	$pdf->Cell(25,10,'No orders found',0,1,'C');
// }

// $pdf->Output();

// mysqli_close($conn);

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=orderreport.csv");

// Create a file handle for writing the report content
$handle = fopen('php://output', 'w');

// Write the report header
fputcsv($handle, array('Order ID / Invoice Number', 'Order date', 'Order_amount','shipping address','status','Product name','quantity','Price','sub_total','customer Name','Email ID','Mobile'));
$num=mysqli_num_rows($result);
// Write the report data from the database to the CSV file
if ($num > 0) {
    while($row=mysqli_fetch_assoc($result)){
        fputcsv($handle, $row);
    }
}

// Close the file handle
fclose($handle);

// Close the database connection
$conn->close();


?>



