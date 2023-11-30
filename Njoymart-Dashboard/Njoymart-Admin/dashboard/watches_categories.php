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

echo "<ul>";

$select_watches = "SELECT * FROM watches";
$res_select_watches = $conn->query($select_watches);

if ($res_select_watches->num_rows > 0) {
    while ($row = $res_select_watches->fetch_assoc()) {
        $id_w = $row['id'];
        $productType = $row['Product_Type'];
        $sellerSKU = $row['Seller_SKU'];
        // Add similar lines for other columns you want to retrieve

        // Display the data in an ordered list
        // echo "<li>ID: $id_w, Product Type: $productType, Seller SKU: $sellerSKU</li>";

        // Now you can use the variables as needed in the following table
        // ...
    }
} else {
    echo "No data found in the watches table";
}

echo "</ul>";

// Your HTML table code
echo "<tbody>";
for ($i = 1; $i <= 50; $i++) {
    echo "<tr>";
    echo "<td>";
    // ... rest of your table code using variables like $id_w, $productType, etc.
    echo "</td>";
    echo "</tr>";
}
echo "</tbody>";

?>


<?php

// // Start the session
// session_start();
// // Check if admin is logged in
// if($_SESSION['loggedin_admin'] != true) {
//     header('Location: Banner.php');
//     exit;
//   }


// Rest of the code

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Admin Dashboard</title>
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
    <style>
        td:nth-of-type(4),
        td:nth-of-type(5),
        td:nth-of-type(6) {

            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

<body>



    <div class="main-wrapper">
        <!-- navbar vertical -->

        <nav class="navbar-vertical-nav d-none d-xl-block ">
            <div class="navbar-vertical">
                <?php


                // Create connection
                $conn = new mysqli('localhost', 'root', '', 'demo_db');

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Assuming you have a table named 'YourTableName' with columns 'link' and 'imageSource'
                $sql = "SELECT link, image_source FROM logo";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $link = $row["link"];
                        $imageSource = $row["image_source"];
                        echo '<div class="logo logo-width-1">
<a href="' . $link . '"><img src="/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/theme/' . $imageSource . '" alt="logo"></a>
</div>';
                    }
                } else {
                    echo "0 results";
                }
                // $conn->close();
                ?>
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
                            <a class="nav-link active " href="../dashboard/watches_categories.php">
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
                            <a class="nav-link " href="../dashboard/about-content.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">About Content</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/privacy-policy.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Privacy Policy</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/term-service.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Terms of Service</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/all-categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">All Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../dashboard/main-menu.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Menu</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../dashboard/sub-menu.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Sub Menu</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../dashboard/featured-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Featured Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../dashboard/news-letter-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">News Letter Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/dbs-card-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">DBS Card Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/featured-categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Featured Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/featured-icon.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Featured Card</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../dashboard/footer-links.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Footer Pages</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../dashboard/social-media.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Social Media</span>
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
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/logo.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Logo</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/hotline-contact.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Hotline Contact</span>
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
                            <span class="nav-label">Store Managements</span>
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
                            <a class="nav-link   collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navOrders" aria-expanded="false" aria-controls="navOrders">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                                    <span class="nav-link-text">Orders</span>
                                </div>
                            </a>
                            <div id="navOrders" class="collapse " data-bs-parent="#sideNavbar">
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
                            <a class="nav-link " href="../dashboard/vendor-grid.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-shop"></i></span>
                                    <span class="nav-link-text">Sellers / Vendors</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link  active " href="../dashboard/customers.php">
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
                            <span class="nav-label">Site Settings</span> <span class="badge bg-light-info text-dark-info">Coming Soon</span>
                        </li>
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
                            <span class="nav-label">Support</span> <span class="badge bg-light-info text-dark-info">Coming Soon</span>
                        </li>
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
                            <span class="nav-label">Our Apps</span>
                        </li>
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
            <div class="container">
                <div class="row mb-8">
                    <div class="col-md-12">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div>
                                <h2>Watches</h2>
                                <!-- breacrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Watches</li>
                                    </ol>
                                    <ol>
                                        <a href="excel/excel_generated.php" class="btn btn-primary">Generate Report</a>

                                        <a href="add-product.php" class="btn btn-primary">Add Product</a>
                                        <a href="excel/index.php" class="btn btn-primary" id="importp" name="importp">Import Product</a>

                                    </ol>
                                </nav>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                //If search is happened
                if (isset($_GET['search'])) {
                ?>
                    <div class="row ">
                        <div class="col-xl-12 col-12 mb-5">
                            <div class="card h-100 card-lg">

                                <div class="p-6">
                                    <div class="row justify-content-between">
                                        <div class="col-md-4 col-12">
                                            <form class="d-flex" role="search" action="Banner.php?search" method="GET">
                                                <input class="form-control" type="search" placeholder="Search Customers" aria-label="Search" name="search" id="search">

                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body p-0 ">

                                    <div class="table-responsive">
                                        <table class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                            <label class="form-check-label" for="checkAll">

                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Loyalty Points</th>
                                                    <th>Phone</th>
                                                    <th>Spent</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="customerOne">
                                                            <label class="form-check-label" for="customerOne">

                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">

                                                            <div class="ms-2">
                                                                <a href="#" class="text-inherit"><?php echo $row['customer_name']; ?></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['customer_email']; ?></td>

                                                    <td>
                                                        <?php echo $row['customer_p'] ?>
                                                    </td>
                                                    <td><?php echo $row['customer_mobile']; ?></td>
                                                    <td>

                                                    </td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                            ?>

                                            </tbody>
                                        </table>


                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>

                    <?php
                    // }
                    // //Without search
                    // else {
                    ?>
                    <?php
                    // if (isset($_GET['delete'])) {
                    //     $delete_id = $_GET['delete'];
                    //     $delete_query = "DELETE FROM about_content WHERE id = $delete_id";
                    //     if ($conn->query($delete_query) === TRUE) {
                    //         echo "Record deleted successfully";
                    //     } else {
                    //         echo "Error deleting record: " . $conn->error;
                    //     }
                    // }
                    ?>


                    <div class="row" style="margin-left:20%;margin-right:10%;">
                        <div class="col-xl-12 col-12 mb-5">
                            <div class="card h-100 card-lg">
                                <div class="p-6">
                                    <div class="row justify-content-between">
                                        <div class="col-md-4 col-12">
                                            <!-- <form class="d-flex" role="search" action="Banner.php?search" method="GET">
                                                <input class="form-control" type="search" placeholder="Search Customers" aria-label="Search" name="search" id="search">
                                            </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0 ">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>No.</th>
                                                    <th>Product Id</th>
                                                    <th>Item Name</th>
                                                    <th>seller SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Spent</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $select_watches = "SELECT * FROM watches LIMIT 50";
                                                $res_select_watches = $conn->query($select_watches);

                                                if ($res_select_watches->num_rows > 0) {
                                                    $counter = 1;
                                                    while ($row = $res_select_watches->fetch_assoc()) {
                                                        $id_w = $row['id'];
                                                        $productId = $row['Product_ID'];
                                                        $itemName = $row['Item_Name'];
                                                        $seller_SKU = $row['Seller_SKU']; 
                                                        $quantity_w = $row['Quantity'];   
                                                        $price = $row['Your_Price'];                                                    // Add similar lines for other columns you want to retrieve

                                                        echo "<tr>";
                                                        echo "<td>";
                                                        echo "<div class='form-check'>";
                                                        echo "<input class='form-check-input' type='checkbox' value='' id='customer$counter'>";
                                                        echo "<label class='form-check-label' for='customer'></label>";
                                                        echo "</div>";
                                                        // echo "<span class='ms-2'>$id_w</span>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "<div class='d-flex align-items-center'>";
                                                        echo "<div class='ms-2'>";
                                                        echo "<span class='ms-2'>$id_w</span>";
                                                        echo "</div>";
                                                        echo "</div>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo "$productId";    

                                                        // echo "<img style='width:200px; height:100px' src='/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/about_assets/{$row['Product_Type']}' alt='img' class='icon-shape icon-md'>";
                                                        echo "</td>";

                                                        echo "<td>$itemName</td>";
                                                        echo "<td>$seller_SKU</td>";
                                                        echo "<td>$quantity_w</td>";
                                                        echo "<td>$price</td>";

                                                        echo "<td>";
                                                        echo "<div class='dropdown'>";
                                                        echo "<a href='#' class='text-reset' data-bs-toggle='dropdown' aria-expanded='false'>";
                                                        echo "<i class='feather-icon icon-more-vertical fs-5'></i>";
                                                        echo "</a>";
                                                        echo "<ul class='dropdown-menu'>";
                                                        // Add your dropdown menu items here
                                                        echo "</ul>";
                                                        echo "</div>";
                                                        echo "</td>";

                                                        echo "</tr>";
                                                        $counter++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7'>No data found in the watches table</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        <?php
                                        // // Connect to database 
                                        // $conn = mysqli_connect("localhost", "root", "", "demo_db");

                                        // // Get banner ID
                                        // $banner_id = $_GET['banner_id'];

                                        // // Fetch banner details
                                        // $sql = "SELECT * FROM banners WHERE id='$banner_id'";
                                        // $result = mysqli_query($conn, $sql);
                                        // $row = mysqli_fetch_assoc($result);

                                        // // Update banner if form submitted
                                        // if (isset($_POST['update'])) {

                                        //     $title = $_POST['title'];
                                        //     $image = $_FILES['image']['name'];

                                        //     // Update query
                                        //     $sql = "UPDATE banners SET title='$title', image='$image' WHERE id='$banner_id'";

                                        //     if (mysqli_query($conn, $sql)) {
                                        //         $message = "Banner updated successfully";
                                        //     }
                                        // }

                                        ?><!-- HTML form -->
                                        <!-- <form method="post" enctype="multipart/form-data">

                                            Title: <input type="text" name="title" value="<?php
                                                                                            // echo $row['title']; 
                                                                                            ?>">

                                            Image: <input type="file" name="image">

                                            <input type="hidden" name="banner_id" value="<?php
                                                                                            //  echo $banner_id; 
                                                                                            ?>">

                                            <input type="submit" name="update" value="Update">

                                        </form> -->

                                        <!-- Show status message -->
                                        <?php

                                        // if (isset($message)) {
                                        //     echo $message;
                                        // } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </main>

    </div>


    <!-- Libs JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>

</body>

</html>