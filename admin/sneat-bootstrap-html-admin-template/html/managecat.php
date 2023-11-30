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
	<h1>Category</h1>
	<form action="#" method="POST">
	<table class="table">
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="catname" id="catname" required></td>
		</tr>
		<tr>
			<td>Category Description</td>
			<td><textarea rows="3" cols="50" id="catdesc" name="catdesc" placeholder="Enter Category Description" required></textarea></td>
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
$name=$_POST['catname'];
$desc=$_POST['catdesc'];
$stat=$_POST['status'];
$sql="INSERT INTO category (cat_name,cat_desc,cat_status) values ('$name','$desc','$stat');";
$result=$conn->query($sql);
echo '<script>window.location.href="categories.php";</script>';
}


if (isset($_GET['id']) && ($_GET != '')) 
{
	echo $edit_id=$_GET['id'];
	$sq_info="SELECT * FROM category where cat_id='$edit_id';";
	$res=$conn->query($sq_info);
	$row=$res->fetch_assoc();
	$cat_name=$row['cat_name'];
	$cat_desc=$row['cat_desc'];
	
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
	<h1>Category</h1>
	<form action="#" method="POST">
	<table class="table">
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="catname" id="catname" value="<?php echo $cat_name;?>"></td>
		</tr>
		<tr>
			<td>Category Description</td>
			<td><textarea rows="3" cols="50" id="catdesc" name="catdesc" placeholder="Enter Category Description" required><?php echo $cat_desc;?></textarea></td>
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
	 $cat_name_up=$_REQUEST['catname'];
	 $cat_desc_up=$_REQUEST['catdesc'];
	echo $sq_update="UPDATE category SET cat_name='$cat_name_up',cat_desc='$cat_desc_up' where cat_id='$edit_id';";
	$res_up=$conn->query($sq_update);
	echo $res_up;
	echo '<script>window.location.href="categories.php";</script>';
}
?>