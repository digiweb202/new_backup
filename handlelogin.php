<?php
include 'Njoymart-Dashboard\Njoymart-Admin\dashboard\dbconnect.php';
if(isset($_POST['login']))
{
	
	//VENDOR LOGINs
	$uname=$_POST['email'];
	$pwd=$_POST['password'];
	$sql_vendor="SELECT * FROM vendor WHERE vendor_email='$uname' AND vendor_status='registered';";
	$result_vendor= $conn->query($sql_vendor);

	//checking email id is there in Vendor table or not
	if ($result_vendor->num_rows > 0) 
	{  
  		$row = $result_vendor->fetch_assoc();
  		$a=$row['vendor_password'];
  		if($pwd==$a)

  		{
        	session_start();
        	// $_SESSION['customer_loggedin']=true;
            // header("Location:Njoymart-Dashboard\Njoymart-admin\dashboard\index.php");
            $_SESSION['loggedin_vendor'] = true;
            $_SESSION['Role_vendor'] = "vendor";
            $_SESSION['vendor_id']=$row['vendor_id'];
			header("Location:/hit/vendor/sneat-bootstrap-html-admin-template/html/index.php?id=$row[vendor_id]");
  		}
  	    else
  		{
  			echo "<script>alert('Please enter correct password');
  			window.location.href='/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/page-login.php';</script>";
    		//Email is there but password is not matched
		}
	}
	//Customer che
	else if( $sql_customer="SELECT * FROM customer WHERE customer_email ='$uname'")
	{
		
		$result_cust = $conn->query($sql_customer);
		if ($result_cust->num_rows > 0) 
		{  
  		$row = $result_cust->fetch_assoc();
  		$a=$row['customer_pwd'];
  		if($pwd==$a)
  		{
        	session_start();
        	$_SESSION['customer_loggedin']=true;
			$_SESSION['customer_id']=$row['customer_id'];
			?>
			<script>window.location.href='mart-website Frontend/Njoymart-website-Frontend/nest/demo/page-account.php';</script>
			<?php
			
  		}
  	    else
  		{
  			echo "<script>alert('Please enter correct password');
  			window.location.href='/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/page-login.php';</script>";
    		//Email is there but password is not matched
		}
	}
 	 //Email not registered in database
	
	//Admin che
	else
	{
		 $sql="SELECT * FROM admin WHERE admin_email_id='$uname';";
		$result_admin = $conn->query($sql);
		if ($result_admin->num_rows > 0) 
		{  
  		$row = $result_admin->fetch_assoc();
  		$a=$row['admin_password'];
    	// $a=password_hash($row['c_pwd'],PASSWORD_DEFAULT);
		//checking hash password from database with the password entered by user if email is present in table
  		// if(password_verify($pwd,$a))
  		if($pwd==$a)
  		{
            $_SESSION['loggedin_admin'] = true;
            $_SESSION['Role'] = "admin";
            $_SESSION['admin_id']=$row['admin_id'];
			header("Location:/hit/Njoymart-Dashboard/Njoymart-Admin/dashboard/index.php?id=$_SESSION[admin_id]"); 
  		}
  			else
  			{
				echo "<script>alert('Please enter correct password');
				window.location.href='/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/page-login.php';</script>";

  			}
  		}
  	    else
  		{
    		//Email is there but password is not matched
    		echo "<script> alert('Not a User Please register ');</script>";
            echo '<script> window.location.href="/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/page-register.html"; </script>';    

		}
	}
	}
}
?>