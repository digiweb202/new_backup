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


<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Dashboard - FreshCart </title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
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
                                <a class="nav-link  active " href="../dashboard/index.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-house"></i></span>
                                        <span class="nav-link-text">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mt-6 mb-3">
                                <span class="nav-label">Store Managements</span></li>
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
                                <a class="nav-link " href="../dashboard/categories.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                        <span class="nav-link-text">Categories</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link   collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navCategoriesOrders" aria-expanded="false" aria-controls="navCategoriesOrders">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                                        <span class="nav-link-text">Orders</span>
                                    </div>
                                </a>
                                <div id="navCategoriesOrders" class="collapse " data-bs-parent="#sideNavbar">
                                    <ul class="nav flex-column">
                                        <li class="nav-item ">
                                            <a class="nav-link " href="../dashboard/order-list.php">
                                                            List
                                                        </a>
                                        </li>
                                        <!-- Nav item -->
                                        <li class="nav-item ">
                                            <a class="nav-link " href="../dashboard/order-single.php">
                                                            Single

                                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="../dashboard/vendor-grid.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-shop"></i></span>
                                        <span class="nav-link-text">Sellers / Vendors</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../dashboard/customers.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                        <span class="nav-link-text">Customers</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="../dashboard/reviews.html">
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
</body>
</html>