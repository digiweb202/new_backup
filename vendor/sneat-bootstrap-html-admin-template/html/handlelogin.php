<?php
include 'dbconnect.php';
if(isset($_POST['submit']))
{
	$uname=$_POST['email-username'];
	$pwd=$_POST['password'];
	$sql="SELECT * FROM vendor WHERE vendor_email='$uname' AND vendor_status='registered';";
	$result = $conn->query($sql);

	//checking email id is there in customer table or not
	if ($result->num_rows > 0) 
	{  
  		$row = $result->fetch_assoc();
  		$a=$row['vendor_password'];
  		if($pwd==$a)

  		{
        	session_start();
        	
            $_SESSION['loggedin_vendor'] = true;
            $_SESSION['Role_vendor'] = "vendor";
            $_SESSION['vendor_id']=$row['vendor_id'];
			header("Location:/hit/vendor/sneat-bootstrap-html-admin-template/html/index.php?id=$row[vendor_id]");
            // echo '<script> window.location.href="index.php" </script>';    
  		}
  	    else
  		{
  			echo "<script>alert('Please enter correct password');
  			window.location.href='auth-login-basic.html';</script>";
    		//Email is there but password is not matched
		}
	}
	else
	{
  			echo "<script>alert('Not a vendor Please register first');
  			window.location.href='r.php';</script>";

 	 //Email not registered in database
	}

}
?>