<?php
include 'dbconnect.php';
if(isset($_POST['submit']))
{
	$uname=$_POST['email-username'];
	 $pwd=$_POST['password'];
	$sql="SELECT * FROM admin WHERE admin_email_id='$uname';";
	$result = $conn->query($sql);

	//checking email id is there in customer table or not
	if ($result->num_rows > 0) 
	{  
  		$row = $result->fetch_assoc();
  		$a=$row['admin_password'];
    	// $a=password_hash($row['c_pwd'],PASSWORD_DEFAULT);
		//checking hash password from database with the password entered by user if email is present in table
  		// if(password_verify($pwd,$a))
  		if($pwd==$a)

  		{
  			$otpg=$_POST['a'];
  			//$otp=rand(100000,999999);
  			// $oyp=$row['admin_otp'];
        	// echo "<script>alert('loggedin $oyp');</script>";
  			$otpr= $_POST['demo'];;			
        	session_start();
        	if($otpg==$otpr)
        	{    	
            $_SESSION['loggedin_admin'] = true;
            $_SESSION['Role'] = "admin";
            $_SESSION['admin_id']=$row['admin_id'];
			header("Location:/hit/admin/sneat-bootstrap-html-admin-template/html/index.php?id=$row[admin_id]");
            // echo '<script> window.location.href="index.php" </script>';    
  			}
  			else
  			{
  				echo "<script>alert('Please enter correct OTP $otpr');</script>";
            echo '<script> window.location.href="index.php" </script>';    

  			}
  		}
  	    else
  		{
    		//Email is there but password is not matched
    		echo "<script> alert('not loggedin Please enter correct password');</script>";
            echo '<script> window.location.href="auth-login-basic.html" </script>';    

		}
	}
	else
	{
 	 //Email not registered in database
	  echo "<script> alert('not a user please register first ');</script>";
            echo '<script> window.location.href="auth-register-basic.html" </script>';    

	}

}
?>