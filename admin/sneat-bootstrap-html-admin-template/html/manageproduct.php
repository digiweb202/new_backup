<?php
include 'dbconnect.php';

if(isset($_POST['mul']))
{
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <!-- <script>window.location.href='auth-login-basic.html';</script> -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

<body>
	<h1>Product</h1>
	<form action="multiproduct.php" method="POST" enctype="multipart/form-data" >
	<table class="table">
		<tr>
			<td>Select Sub-Category</td>
		<td>
			<?php
            	$qry1=("select * from sub_cat");
            	$result=$conn->query($qry1);
            	$rowcount=mysqli_num_rows($result);
    		?>
	    <select name="subcategory" id="subcategory" class="btn btn-info dropdown-toggle" >
    	    <option value="" disabled selected>Select above option</option>
        	<?php
                        
            for($i=1;$i<=$rowcount;$i++)
            {
                $row=mysqli_fetch_array($result)

        	?> 
                        <!-- It's display a option for dropdown and take a value-->
        	<option value="<?php echo $row["sub_cat_id"]?>"><?php echo $row["sub_cat_name"] ?></option>
                           
       		<?php
       		}
                                                     
       		?>
       </select>

		</td>	
		</tr>
		<tr>
		<td>
        	<label for="excelFileToUpload">Select the Excel file with Product :</label>
    	</td>
    	<td>
        <input type="file" name="excelFileToUpload" id="excelFileToUpload"  >
    	</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="multipleprd" id="multipleprd"></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
}


if(isset($_POST['ok'])){
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <!-- <script>window.location.href='auth-login-basic.html';</script> -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

<body>
	<h1>Product</h1>
	<form action="#" method="POST">
	<table class="table">
		<tr>
			<td>Product Name</td>
			<td><input type="text" placeholder="Enter Name of product" name="productname" id="productname" required></td>
		</tr>
		<tr>
			<td>Product Description</td>
			<td><textarea rows="3" cols="50" id="productdesc" name="productdesc" placeholder="Enter Product Description" required></textarea></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input type="text" name="productprice" id="productprice" placeholder="Enter price of product" required></td>
		</tr>
		
		<tr>
			<td>Select Sub-Category</td>
		<td>
			<?php
            	$qry1=("select * from sub_cat");
            	$result=$conn->query($qry1);
            	$rowcount=mysqli_num_rows($result);
    		?>
	    <select name="subcategory" id="subcategory" class="btn btn-info dropdown-toggle" >
    	    <option value="" disabled selected>Select above option</option>
        	<?php
                        
            for($i=1;$i<=$rowcount;$i++)
            {
                $row=mysqli_fetch_array($result)

        	?> 
                        <!-- It's display a option for dropdown and take a value-->
        	<option value="<?php echo $row["sub_cat_id"]?>"><?php echo $row["sub_cat_name"] ?></option>
                           
       		<?php
       		}
                                                     
       		?>
       </select>

		</td>	
		</tr>
				<tr>
			<td>Select status</td>
			<td>
				<input type="radio" id="active" name="status" value="active">
				<label for="active">Active</label>
				<input type="radio" id="deactive" name="status" value="deactive">
				<label for="deactive">Deactive</label><br>
			</td>	
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" id="submit"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
}
if(isset($_POST['submit'])){
$product_name=$_POST['productname'];
$product_desc=$_POST['productdesc'];
$product_price=$_POST['productprice'];
$sub_cat=$_POST['subcategory'];
$stat=$_POST['status'];
echo $sql="INSERT INTO product (product_name,product_desc,product_price,sub_cat_id,product_status) values ('$product_name','$product_desc','$product_price','$sub_cat','$stat');";
$result=$conn->query($sql);
$result;
	echo '<script>window.location.href="product.php";</script>';
}





if (isset($_GET['id']) && ($_GET != '')) 
{
	echo $edit_id=$_GET['id'];
	$sq_info="SELECT * FROM product where product_id='$edit_id';";
	$res=$conn->query($sq_info);
	$row=$res->fetch_assoc();
	$product_name=$row['product_name'];
	$product_desc=$row['product_desc'];
	$product_price=$row['product_price'];
	$sub_cat_id=$row['sub_cat_id'];
	
?>
<html>

  <head>
    <!-- <script>window.location.href='auth-login-basic.html';</script> -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>
<body>
	<h1>Product</h1>
	<form action="#" method="POST">
	<table class="table">
		<tr>
			<td>Product Name</td>
			<td><input type="text" name="productname" id="productname" value="<?php echo $product_name;?>"></td>
		</tr>
		<tr>
			<td>Product Description</td>
			<td><textarea id="productdesc" name="productdesc" rows="5" cols="25"><?php echo $product_desc?></textarea></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input type="text" name="productprice" id="productprice" value="<?php echo $product_price; ?>"></td>
		</tr>
		<tr>
			<td>Sub-Category Name</td>
		<td>
			<?php
            	$qry1=("select * from sub_cat");
            	$result=$conn->query($qry1);
            	$rowcount=mysqli_num_rows($result);
    		?>
	    	<select name="subcat" id="subcat" class="btn btn-info dropdown-toggle" required>
    	    <option value="" disabled selected>Select above option</option>
        	<?php
                        
            for($i=1;$i<=$rowcount;$i++)
            {
                $row=mysqli_fetch_array($result)

        	?> 
                        <!-- It's display a option for dropdown and take a value-->
        	<option value="<?php echo $row["sub_cat_id"]?>"><?php echo $row["sub_cat_name"] ?></option>
                           
       		<?php
       		}
                                                     
       		?>
       		</select>
		</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="update" id="update"></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
}
if(isset($_POST['update']))
{
	$product_name_up=$_REQUEST['productname'];
	$product_desc_up=$_REQUEST['productdesc'];
	$product_price_up=$_REQUEST['productprice'];
	$subcat_up=$_REQUEST['subcat'];
	
	 $sq_update="UPDATE product SET product_name='$product_name_up',product_desc='$product_desc_up',product_price='$product_price_up',sub_cat_id='$subcat_up' where product_id='$edit_id';";
	$res_up=$conn->query($sq_update);
	$res_up;
	echo '<script>window.location.href="product.php";</script>';
}
?>
