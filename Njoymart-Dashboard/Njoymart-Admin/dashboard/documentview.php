<?php 
include 'dbconnect.php';
if($_GET['id'])
{
	$sq="SELECT * from vendor where vendor_id='$_GET[id]';";
	$res=$conn->query($sq);
	$row=mysqli_fetch_assoc($res);
	echo $pdfPath=$row['vendor_pan'];
?>
<?php
echo '<embed src="/hit/vendor/sneat-bootstrap-html-admin-template/html/'. $pdfPath . '" type="application/pdf" width="100%" height="1000px" />';
}
?>
