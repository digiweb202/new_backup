<?php
include 'dbconnect.php';
session_start();
if(isset($_POST['submit1']))
{
	 $gpwd=$_POST['password'];
	 $gcpwd=$_POST['cpassword'];
	if($gpwd==$gcpwd)
	{
		echo $eid=$_SESSION['forid'];
		 $sq="UPDATE admin SET admin_password ='$gpwd'  WHERE admin_id='$eid';"; 
		$result1=$conn->query($sq);
		echo $result1;
        // echo '<script> alert("Please login with new password"); 
        // window.location.href="auth-login-basic.html" </script>';    
	}
	else
	{
		echo "<script>alert('Please enter same password');</script>";
	}
}
?>