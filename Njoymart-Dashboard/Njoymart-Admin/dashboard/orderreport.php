
<?php
// Include the database connection
include 'dbconnect.php';

// Start the session
session_start();

// Assign the username to a variable
$adminName = $_SESSION['admin_name'] ?? null;
$adminId = $_SESSION['admin_id'] ?? null;

// Check if the admin_id is not present, redirect to login-admin.php
if (!$adminId) {
    header("Location: ../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/login-admin.php");
    exit;
}

// Your existing code
$select_customer = "SELECT * FROM admin WHERE admin_id = $adminId";
$res_select_customer = $conn->query($select_customer);

if ($res_select_customer->num_rows > 0) {
    while ($row = $res_select_customer->fetch_assoc()) {
        $adminName_at = $row['admin_name'];
        $adminEmail_at = $row['admin_email_id'];
    }
} else {
    $adminName_at = "Admin Not Found";
    $adminEmail_at = "Admin Not Found";
}
?>
<?php
require_once('dbconnect.php');


$sql = "SELECT o.order_new_id,o.order_date,o.total_price,o.shipping_address,o.status,p.product_name,od.quantity,od.price,od.sub_total,c.customer_name,c.customer_email,c.customer_mobile,p.vendor_id from order_new o
inner JOIN
customer c on o.customer_id=c.customer_id 
inner join
order_item od on o.order_new_id=od.order_id 
inner join
product p on od.product_id=p.product_id where status='$_GET[status]'
 ORDER BY o.order_new_id ASC;";
$result = $conn->query($sql);


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



