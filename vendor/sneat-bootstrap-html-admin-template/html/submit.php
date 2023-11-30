<?php 
include "dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$a=$_POST['personal1'];
$b=$_POST['personal2'];
$name=$a." ".$b;
$c=$_POST['personal3'];
$d=$_POST['email'];
$e=$_POST['personal5'];
$f=$_POST['address'];
$g=$_POST['city'];
$h=$_POST['state'];
$i=$_POST['business1'];
$j=$_POST['business2'];
$k=$_POST['business3'];

$pdfFileName = $_FILES["pancard"]["name"];
$pdfTempName = $_FILES["pancard"]["tmp_name"];
$pdfUploadPath = "files/" . $pdfFileName;
// Move the uploaded PDF to a designated directory
move_uploaded_file($pdfTempName, $pdfUploadPath);


$insert_vendor="INSERT INTO vendor (vendor_name, brand_name, vendor_pan, vendor_email,vendor_mobile, vendor_password, vendor_address, vendor_city, vendor_state, vendor_status,vendor_product_name, vendor_product_cat) VALUES ('$name', '$j', '$pdfUploadPath', '$d', '$c', '$e', '$f', '$g', '$h', 'pending', '$i', '$k');";
$res_insert_vendor=$conn->query($insert_vendor);
echo "<script>alert('After getting approved you can login ');
window.location.href='auth-login-basic.html';</script>";




}
?>