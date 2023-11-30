<?php
if($_GET['name']=='product')
{
//INCLUDING FPDF
require_once('C:\xampp1\htdocs\hit\admin\sneat-bootstrap-html-admin-template\FPDF\fpdf.php');
// Database connection parameters
include 'dbconnect.php';
// Fetch data from the database
$sql = "SELECT p.product_id,p.product_name,p.product_desc, p.product_price, p.product_status, c.cat_name, s.sub_cat_name FROM (
    (product p INNER JOIN sub_cat s ON p.sub_cat_id =s.sub_cat_id)
    INNER JOIN category c ON s.cat_id = c.cat_id) where p.product_status='$_GET[status]' AND s.sub_cat_status='$_GET[status]' AND c.cat_status='$_GET[status]';";
$result = $conn->query($sql);

// FOR CSV FILE 
// Set appropriate headers for file download
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=productreport.csv");

// Create a file handle for writing the report content
$handle = fopen('php://output', 'w');

// Write the report header
fputcsv($handle, array('ID', 'Name', 'desc','price','status','Category Name','Sub_cat_name'));

// Write the report data from the database to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($handle, $row);
    }
}

// Close the file handle
fclose($handle);

// Close the database connection
$conn->close();
}
else if($_GET['name']=='category')
{
require_once('C:\xampp1htdocs\hit\admin\sneat-bootstrap-html-admin-template\FPDF\fpdf.php');
// Database connection parameters
include 'dbconnect.php';
// Fetch data from the database
$sql = "SELECT p.product_id,p.product_name,p.product_desc, p.product_price, p.product_status, c.cat_name, s.sub_cat_name FROM (
    (product p INNER JOIN sub_cat s ON p.sub_cat_id =s.sub_cat_id)
    INNER JOIN category c ON s.cat_id = c.cat_id) where p.product_status='$_GET[status]' AND s.sub_cat_status='$_GET[status]' AND c.cat_status='$_GET[status]';";
$sql_category="Select id,name ";
"select count(product_id) as t from product p inner join sub_cat sc on sc.sub_cat_id=p.sub_cat_id 
INNER join category c on c.cat_id=sc.cat_id where c.cat_id='$row[cat_id]'";

$result = $conn->query($sql);

// FOR CSV FILE 
// Set appropriate headers for file download
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=productreport.csv");

// Create a file handle for writing the report content
$handle = fopen('php://output', 'w');

// Write the report header
fputcsv($handle, array('ID', 'Name','Number of product ','status'));

// Write the report data from the database to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($handle, $row);
    }
}

// Close the file handle
fclose($handle);

// Close the database connection
$conn->close();

}
?>
