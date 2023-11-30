<?php
// Include the database connection
include 'dbconnect.php';

// Start the session
session_start();

// Assign the username to a variable
$adminName = $_SESSION['admin_name'] ?? null;
$adminId = $_SESSION['admin_id'] ?? null;

// Check if the admin_id is not present, redirect to login-admin.php
if (!$adminId) {
    header("Location: ../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/login-admin.php");
    exit;
}

// Your existing code
$select_customer = "SELECT * FROM admin WHERE admin_id = $adminId";
$res_select_customer = $conn->query($select_customer);

if ($res_select_customer->num_rows > 0) {
    while ($row = $res_select_customer->fetch_assoc()) {
        $adminName_at = $row['admin_name'];
        $adminEmail_at = $row['admin_email_id'];
    }
} else {
    $adminName_at = "Admin Not Found";
    $adminEmail_at = "Admin Not Found";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Order Single Dashboard - FreshCart </title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
    <!-- Google tag (gtag.js) -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- main -->
<?php
include 'dbconnect.php';
 include'headtop.php';?>
    <!-- main wrapper -->
    <div class="main-wrapper">
        <!-- navbar vertical -->

        <nav class="navbar-vertical-nav d-none d-xl-block ">
            <div class="navbar-vertical">
                <div class="px-4 py-5">
                    <a href="index.php" class="navbar-brand">
                                        <img src="../assets/images/logo/freshcart-logo.svg" alt="">
                                    </a>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column" id="sideNavbar">

                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/index.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-house"></i></span>
                                    <span class="nav-link-text">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Store Managements</span>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/watches_categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">Watches</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/products.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">Products</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                                <a class="nav-link " href="../dashboard/subcategories.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                        <span class="nav-link-text">Sub-Categories</span>
                                    </div>
                                </a>
                            </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                    <span class="nav-link-text">Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="#" data-bs-toggle="collapse" data-bs-target="#navCategoriesOrders" aria-expanded="false" aria-controls="navCategoriesOrders">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                                    <span class="nav-link-text">Orders</span>
                                </div>
                            </a>
                            <div id="navCategoriesOrders" class="collapse  show " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link " href="../dashboard/order-list.php">
                                                            List
                                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item ">
                                        <a class="nav-link  active " href="../dashboard/order-single.php">
                                                            Single

                                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/vendor.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-shop"></i></span>
                                    <span class="nav-link-text">Sellers / Vendors</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/customers.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Customers</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/reviews.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Reviews</span>
                                </div>
                            </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelFirst" aria-expanded="false" aria-controls="navMenuLevelFirst">
        <span class="nav-link-icon"><i class=" bi bi-arrow-90deg-down"></i></span>
        <span class="nav-link-text">Menu Level</span>
    </a>
                            <div id="navMenuLevelFirst" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelSecond1" aria-expanded="false" aria-controls="navMenuLevelSecond1">
                    Two Level
                </a>
                                        <div id="navMenuLevelSecond1" class="collapse" data-bs-parent="#navMenuLevel">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">NavItem 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">NavItem 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  collapsed  " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThreeOne1" aria-expanded="false" aria-controls="navMenuLevelThreeOne1">
                    Three Level
                </a>
                                        <div id="navMenuLevelThreeOne1" class="collapse " data-bs-parent="#navMenuLevel">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThreeTwo" aria-expanded="false" aria-controls="navMenuLevelThreeTwo">
                                NavItem 1
                            </a>
                                                    <div id="navMenuLevelThreeTwo" class="collapse collapse " data-bs-parent="#navMenuLevelThree">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link " href="#">
                                            NavChild Item 1
                                        </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">Nav
                                Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Site Settings</span> <span class="badge bg-light-info text-dark-info">Coming Soon</span></li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-newspaper"></i></span>
                                    <span class="nav-link-text">Blog</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-images"></i></span>
                                    <span class="nav-link-text">Media</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-gear"></i></span>
                                    <span class="nav-link-text">Store Settings</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Support</span> <span class="badge bg-light-info text-dark-info">Coming Soon</span></li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-headphones"></i></span>
                                    <span class="nav-link-text">Support Ticket</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-question-circle"></i></span>
                                    <span class="nav-link-text">Help Center</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-infinity"></i></span>
                                    <span class="nav-link-text">How FreshCart Works</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Our Apps</span></li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-apple"></i></span>
                                    <span class="nav-link-text">Apple Store</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-google-play"></i></span>
                                    <span class="nav-link-text">Google Play Store</span>
                                </div>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
            <div class="navbar-vertical">
                <div class="px-4 py-5 d-flex justify-content-between align-items-center">
                    <a href="index.php" class="navbar-brand">
                                                        <img src="../assets/images/logo/freshcart-logo.svg" alt="">
                                                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/index.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-house"></i></span>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Store Managements</span></li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/products.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">Products</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                                <a class="nav-link " href="../dashboard/subcategories.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                        <span class="nav-link-text">Sub-Categories</span>
                                    </div>
                                </a>
                            </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                    <span class="nav-link-text">Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="#" data-bs-toggle="collapse" data-bs-target="#navOrders" aria-expanded="false" aria-controls="navOrders">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                                    <span class="nav-link-text">Orders</span>
                                </div>
                            </a>
                            <div id="navOrders" class="collapse  show " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link " href="../dashboard/order-list.php">
                                                                            List
                                                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item ">
                                        <a class="nav-link  active " href="../dashboard/order-single.php">
                                                                            Single

                                                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/vendor-grid.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-shop"></i></span>
                                    <span class="nav-link-text">Sellers / Vendors</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/customers.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Customers</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/reviews.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Reviews</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Site Settings</span> <span class="badge bg-light-info text-dark-info">Coming Soon</span></li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-newspaper"></i></span>
                                    <span class="nav-link-text">Blog</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-images"></i></span>
                                    <span class="nav-link-text">Media</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-gear"></i></span>
                                    <span class="nav-link-text">Store Settings</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Support</span> <span class="badge bg-light-info text-dark-info">Coming Soon</span></li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-headphones"></i></span>
                                    <span class="nav-link-text">Support Ticket</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-question-circle"></i></span>
                                    <span class="nav-link-text">Help Center</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-infinity"></i></span>
                                    <span class="nav-link-text">How FreshCart Works</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Our Apps</span></li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-apple"></i></span>
                                    <span class="nav-link-text">Apple Store</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link disabled" href="#!">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-google-play"></i></span>
                                    <span class="nav-link-text">Google Play Store</span>
                                </div>
                            </a>
                        </li>
                        <li id="navMenuLevel" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelSecond2" aria-expanded="false" aria-controls="navMenuLevelSecond2">
                                                                    Two Level
                                                                </a>
                                    <div id="navMenuLevelSecond2" class="collapse" data-bs-parent="#navMenuLevel">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link " href="#">NavItem 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#">NavItem 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  collapsed  " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThree2" aria-expanded="false" aria-controls="navMenuLevelThree2">
                                                                    Three Level
                                                                </a>
                                    <div id="navMenuLevelThree2" class="collapse " data-bs-parent="#navMenuLevel">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThree3" aria-expanded="false" aria-controls="navMenuLevelThree3">
                                                                                NavItem 1
                                                                            </a>
                                                <div id="navMenuLevelThree3" class="collapse collapse " data-bs-parent="#navMenuLevelThree">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="#">
                                                                                            NavChild Item 1
                                                                                        </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#">Nav
                                                                                Item 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </div>

        </nav>


        <main class="main-content-wrapper">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row mb-8">
                    <div class="col-md-12">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div>
                                <!-- page header -->
                                <h2>Order Single</h2>
                                <!-- breacrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Order Single</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- button -->
                            <div>
                                <a href="order-list.php" class="btn btn-primary">Back to all orders</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- row -->
                <?php 
                if(isset($_GET['id']))
                {
                $id=$_GET['id'];
                $select_order_details="SELECT * from order_item ot 
inner JOIN 
    order_new o on o.order_new_id=ot.order_id
INNER JOIN 
    customer c on c.customer_id=o.customer_id
INNER JOIN 
    product p on p.product_id=ot.product_id
where ot.order_id='$id';
";
          $res_select_order_details=$conn->query($select_order_details);
          $row=mysqli_fetch_assoc($res_select_order_details);


                ?>
                <div class="row ">
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- card -->
                        <div class="card h-100 card-lg">
                            <div class="card-body p-6">
                                <div class="d-md-flex justify-content-between">
                                    <div class="d-flex align-items-center mb-2 mb-md-0">
                                        <h2 class="mb-0">Order ID: <?php echo $_GET['id'];?></h2>
                                        <span class="badge bg-light-warning text-dark-warning ms-2"><?php echo $row['status']; ?></span>
                                    </div>
                                    <!-- select option -->
                                    <div class="d-md-flex">
                                        <div class="mb-2 mb-md-0">
                                            <select class="form-select">
                        <option selected disabled>Status</option>
                        <option value="Success">Success</option>
                        <option value="Pending">Pending</option>
                        <option value="Cancel">Cancel</option>
                      </select>
                                        </div>
                                        <!-- button -->
                                        <div class="ms-md-3">
                                            <a href="#" class="btn btn-primary">Save</a>
                                            <a href="#" class="btn btn-secondary">Download Invoice</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <div class="row">
                                        <!-- address -->
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="mb-6">
                                                <h6>Customer Details</h6>
                                                <p class="mb-1 lh-lg"><?php echo $row['customer_name'];?><br> <?php echo $row['customer_email']; ?>
                                                    <br> +91 <?php echo $row['customer_mobile'];?></p>
                                                <a href="customers.php?search=<?php echo $row['customer_name']; ?>">View Profile</a>
                                            </div>
                                        </div>
                                        <!-- address -->
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="mb-6">
                                                <h6>Shipping Address</h6>
                                                <p class="mb-1 lh-lg"><?php echo $row['customer_name'];?><br><?php echo $row['shipping_address']; ?><br> <?php echo $row['state']."&nbsp;"."India"; ?><br> Contact No. +91 <?php echo $row['customer_mobile']; ?></p>

                                            </div>
                                        </div>
                                        <!-- address -->
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="mb-6">
                                                <h6>Order Details</h6>
                                                <?php $dateString = "$row[order_date]";

                                                // Create a DateTime object from the string
                                                $dateTime = new DateTime($dateString);

                                                // Format the date and time as desired
                                                $formattedDate = $dateTime->format('F j, Y \a\t g:i A');

                                                // echo $formattedDate;
                                                ?>
                                                <p class="mb-1 lh-lg">Order ID: <span class="text-dark"><?php echo $row['order_new_id'];?></span><br> Order Date: <span class="text-dark"><?php echo $formattedDate;?></span><br> Order Total: <span class="text-dark"><?php echo $row['total_price'];?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <!-- Table -->
                                        <table class="table mb-0 text-nowrap table-centered">
                                            <!-- Table Head -->
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Products</th>
                                                    <th>Unit price</th>
                                                    <th>Quantity</th>
                                                    <th>Net Amount</th>
                                                    <th>Tax Rate</th>
                                                    <th>Tax Type</th>
                                                    <th>Tax Amount</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <!-- tbody -->
                                            <tbody>
                                                <?php 
                                                $to=0;
                                                $c=0;
                                                $s=0;
                                                foreach ($res_select_order_details as $row1) 
                                                {
                                                // while($row1=mysqli_fetch_assoc($res_select_order_details))
                                                
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-inherit">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <img src="../assets/images/products/product-img-1.jpg" alt="" class="icon-shape icon-lg">
                                                                </div>
                                                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                                                    <h5 class="mb-0 h6">
                                                                        <?php echo $row1['product_name'];?>
                                                                    </h5>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <?php
                                                       $baseprice=$row1['price']-($row1['price']*$row1['tax']/100);
                                                    ?>
                                                    <td><span class="text-body"><?php echo "₹".$baseprice; ?></span></td>
                                                    <td><?php echo $row1['quantity'];?></td>
                                                    <td><?php $basetotal=$baseprice*$row1['quantity']; echo $basetotal;?></td>
                                                    <td><?php echo $row1['tax']?></td>
                                                    <td>
                                                    <?php
                                                       if($row['state']=='GUJARAT')
                                                       {
                                                        echo "CGST & SGST";
                                                       }
                                                       else{
                                                        echo "IGST";
                                                       }
                                                    ?>

                                                    </td>
                                                    <td><?php echo $row1['sub_total']*$row1['tax']/100 ?></td>
                                                    <td><?php echo "₹".$row1['sub_total'];?></td>
                                                    
                                                    <?php $to +=$row1['sub_total'];
                                                    $s+=($row1['price']*$row1['tax']/2)/100;
                                                    $c+=($row1['price']*$row1['tax']/2)/100;
                                                 ?>
                                                
                                                <?php $a=$row1['sub_total'];
                                                 }
                                                
                                                 ?>
                                               
                                                </tr>
                                                
                                               

                                                <tr>
                                                    <td class="border-bottom-0 pb-0"></td>
                                                    <td class="border-bottom-0 pb-0"></td>
                                                    <td colspan="1" class="fw-medium text-dark ">
                                                        <!-- text -->
                                                        Sub Total :
                                                    </td>
                                                    <td class="fw-medium text-dark ">
                                                        <!-- text -->
                                                        <?php echo "₹".$row['total_price'];?>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <?php 
                                                $f=500;
                                                if($row['total_price'] <= $f )
                                                {
                                                ?>
                                                <tr>
                                                    <td class="border-bottom-0 pb-0"></td>
                                                    <td class="border-bottom-0 pb-0"></td>
                                                    <td colspan="1" class="fw-medium text-dark ">
                                                        <!-- text -->
                                                        Shipping Cost
                                                    </td>
                                                    <td class="fw-medium text-dark  ">
                                                        <!-- text -->
                                                        <?php 
                                                        $shipping=50;
                                                        ?>
                                                        $10.00
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                else
                                                {
                                                    ?>
                                                    <tr>
                                                    <td class="border-bottom-0 pb-0"></td>
                                                    <td class="border-bottom-0 pb-0"></td>
                                                    <td colspan="1" class="fw-medium text-dark ">
                                                        <!-- text -->
                                                        Shipping Cost
                                                    </td>
                                                    <td class="fw-medium text-dark  ">
                                                        <!-- text -->
                                                        <?php 
                                                        $shipping=0;
                                                        ?>
                                                        Free 
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="1" class="fw-semi-bold text-dark ">
                                                        <!-- text -->
                                                        Grand Total
                                                    </td>
                                                    <td class="fw-semi-bold text-dark ">
                                                        <!-- text -->
                                                    <?php
                                                        $total=$row['total_price']+$shipping;
                                                        // deepcode ignore XSS: <please specify a reason of ignoring this>
                                                        echo "₹".$total;
                                                    ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-6">
                                <div class="row">
                                    <div class="col-md-6 mb-4 mb-lg-0">
                                        <h6>Payment Info</h6>
                                        <span>Cash on Delivery</span>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Notes</h5>
                                        <textarea class="form-control mb-3" rows="3" placeholder="Write note for order"></textarea>
                                        <a href="#" class="btn btn-primary">Save Notes</a>
                                    </div>
                                </div>
                            </div>




                        </div>

                    </div>

                </div>

            </div>

        </main>
<?php 
}
else
{
    echo "<script>window.location.href='order-list.php';</script>";
}
?>
    </div>


    <!-- Libs JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>

</body>

</html>