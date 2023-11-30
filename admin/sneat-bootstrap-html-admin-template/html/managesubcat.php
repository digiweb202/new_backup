<?php
include 'dbconnect.php';
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
	<h1>Sub Category</h1>
	<form action="#" method="POST">
	<table class="table">
		<tr>
			<td>Sub Category Name</td>
			<td><input type="text" name="subcatname" id="subcatname" required></td>
		</tr>
<!-- 		<tr>
			<td>Category Description</td>
			<td><textarea rows="3" cols="50" id="subcatdesc" name="subcatdesc" placeholder="Enter Sub-Category Description" required></textarea></td>
		</tr>
 -->		<tr>
			<td>Select Category</td>
		<td>
			<?php
            	$qry1=("select * from category");
            	$result=$conn->query($qry1);
            	$rowcount=mysqli_num_rows($result);
    		?>
	    <select name="category" id="category" name="category" class="btn btn-info dropdown-toggle" >
    	    <option value="" disabled selected>Select above option</option>
        	<?php
                        
            for($i=1;$i<=$rowcount;$i++)
            {
                $row=mysqli_fetch_array($result)

        	?> 
                        <!-- It's display a option for dropdown and take a value-->
        	<option value="<?php echo $row["cat_id"]?>"><?php echo $row["cat_name"] ?></option>
                           
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
$name=$_POST['subcatname'];
$cat_id=$_POST['category'];
$stat=$_POST['status'];
$sql="INSERT INTO sub_cat (sub_cat_name,sub_cat_status,cat_id) values ('$name','$stat','$cat_id');";
$result=$conn->query($sql);
$result;
	echo '<script>window.location.href="subcategory.php";</script>';
}





if (isset($_GET['id']) && ($_GET != '')) 
{
	echo $edit_id=$_GET['id'];
	$sq_info="SELECT * FROM sub_cat where sub_cat_id='$edit_id';";
	$res=$conn->query($sq_info);
	$row=$res->fetch_assoc();
	$cat_name=$row['sub_cat_name'];
	$cat_desc=$row['cat_id'];
	
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
	<h1>Sub-Category</h1>
	<form action="#" method="POST">
	<table class="table">
		<tr>
			<td>Sub-Category Name</td>
			<td><input type="text" name="subcatname" id="subcatname" value="<?php echo $cat_name;?>"></td>
		</tr>
		<tr>
			<td>Category Name</td>
		<td>
			<?php
            	$qry1=("select * from category");
            	$result=$conn->query($qry1);
            	$rowcount=mysqli_num_rows($result);
    		?>
	    	<select name="category" id="category" name="category" class="btn btn-info dropdown-toggle" >
    	    <option value="" disabled selected>Select above option</option>
        	<?php
                        
            for($i=1;$i<=$rowcount;$i++)
            {
                $row=mysqli_fetch_array($result)

        	?> 
                        <!-- It's display a option for dropdown and take a value-->
        	<option value="<?php echo $row["cat_id"]?>"><?php echo $row["cat_name"] ?></option>
                           
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
	 $subcat_name_up=$_REQUEST['subcatname'];
	 $cat_name_up=$_REQUEST['category'];
	echo $sq_update="UPDATE sub_cat SET sub_cat_name='$subcat_name_up',cat_id='$cat_name_up' where sub_cat_id='$edit_id';";
	$res_up=$conn->query($sq_update);
	echo $res_up;
	echo '<script>window.location.href="subcategory.php";</script>';
}
?>
