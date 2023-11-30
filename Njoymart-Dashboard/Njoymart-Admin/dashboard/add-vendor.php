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
<?php
// Create connection
$conn = new mysqli('localhost', 'root', '', 'demo_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vendor_name = $_POST['vendor_name'];
    $brand_name = $_POST['brand_name'];
    $vendor_pan = $_POST['vendor_pan'];
    $vendor_email = $_POST['vendor_email'];
    $vendor_mobile = $_POST['vendor_mobile'];
    $vendor_password = $_POST['vendor_password'];
    $vendor_address = $_POST['vendor_address'];
    $vendor_city = $_POST['vendor_city'];
    $vendor_state = $_POST['vendor_state'];
    $vendor_status = $_POST['vendor_status'];
    $vendor_Logo = $_POST['vendor_Logo'];
    $vendor_store_image = $_POST['vendor_store_image'];

    // Check if the email and username already exist
    $check_query_email = "SELECT * FROM vendor WHERE vendor_email = '$vendor_email'";
    $result_email = $conn->query($check_query_email);

    $check_query_username = "SELECT * FROM vendor WHERE vendor_name = '$vendor_name'";
    $result_username = $conn->query($check_query_username);

    if ($result_email->num_rows > 0) {
        echo "<script>alert('Error: Email already exists. Please use a different email address.');</script>";
    } elseif ($result_username->num_rows > 0) {
        echo "<script>alert('Error: Username already exists. Please use a different username.');</script>";
    } else {
        $sql = "INSERT INTO vendor (vendor_name, brand_name, vendor_pan, vendor_email, vendor_mobile, vendor_password, vendor_address, vendor_city, vendor_state, vendor_status, vendor_Logo, vendor_store_image)
        VALUES ('$vendor_name', '$brand_name', '$vendor_pan', '$vendor_email', '$vendor_mobile', '$vendor_password', '$vendor_address', '$vendor_city', '$vendor_state', '$vendor_status', '$vendor_Logo', '$vendor_store_image')";

        if ($conn->query($sql) === true) {
            echo "New record created successfully";
            header("Location: vendor.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Add Product Dashboard - FreshCart </title>
    <link href="../assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
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

    <!-- main wrapper -->

    <nav class="navbar navbar-expand-lg navbar-glass">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center">

                    <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-text-indent-right" viewBox="0 0 16 16">
                            <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>

                    <form role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                    </form>
                </div>
                <div>
                    <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">

                        <li class="dropdown-center ">
                            <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                    2
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0 border-0 ">
                                <div class="border-bottom p-5 d-flex
              justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">Notifications</h5>
                                        <p class="mb-0 small">You have 2 unread messages</p>
                                    </div>
                                    <a href="#!" class="text-muted">
                                        <a href="#" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Mark all as read">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check2-all text-success" viewBox="0 0 16 16">
                                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                                            </svg>
                                        </a>
                                    </a>
                                </div>
                                <div data-simplebar style="height: 250px;">
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush notification-list-scroll fs-6">
                                        <!-- List group item -->
                                        <li class="list-group-item px-5 py-4 list-group-item-action active">
                                            <a href="#!" class="text-muted">
                                                <div class="d-flex">
                                                    <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle ">
                                                    <div class="ms-4">
                                                        <p class="mb-1">
                                                            <span class="text-dark">Your order is placed</span> waiting for shipping
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">1 minute ago</small></span>
                                                    </div>
                                                </div>
                                            </a>



                                        </li>
                                        <li class="list-group-item  px-5 py-4 list-group-item-action">
                                            <a href="#!" class="text-muted">
                                                <div class="d-flex">
                                                    <img src="../assets/images/avatar/avatar-5.jpg" alt="" class="avatar avatar-md rounded-circle ">
                                                    <div class="ms-4">
                                                        <p class="mb-1">
                                                            <span class="text-dark">Jitu Chauhan </span> answered to your pending order list with notes
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">2 days ago</small></span>
                                                    </div>
                                                </div>
                                            </a>



                                        </li>
                                        <li class="list-group-item px-5 py-4 list-group-item-action">
                                            <a href="#!" class="text-muted">
                                                <div class="d-flex">
                                                    <img src="../assets/images/avatar/avatar-2.jpg" alt="" class="avatar avatar-md rounded-circle ">
                                                    <div class="ms-4">
                                                        <p class="mb-1">
                                                            <span class="text-dark">You have new messages</span> 2 unread messages
                                                        </p>
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-clock text-muted" viewBox="0 0 16 16">
                                                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                            </svg><small class="ms-2">3 days ago</small></span>
                                                    </div>
                                                </div>
                                            </a>



                                        </li>

                                    </ul>
                                </div>
                                <div class="border-top px-5 py-4 text-center">
                                    <a href="#!" class=" ">
                                        View All
                                    </a>
                                </div>
                            </div>

                        </li>
                        <li class="dropdown ms-4">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end p-0">



                                <div class="lh-1 px-5 py-4 border-bottom">
                                    <h5 class="mb-1 h6">FreshCart Admin</h5>
                                    <small>admindemo@email.com</small>
                                </div>



                                <ul class="list-unstyled px-2 py-3">

                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            Profile
                                        </a>


                                    </li>


                                    <li>
                                        <a class="dropdown-item" href="#!">

                                            Settings
                                        </a>
                                    </li>

                                </ul>
                                <div class="border-top px-5 py-3">

                                    <a href="#">Log Out</a>
                                </div>



                            </div>

                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </nav>
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
                            <a class="nav-link " href="../dashboard/categories.php?status=active">
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
                            <a class="nav-link  " href="../dashboard/Banner.php">
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
                            <a class="nav-link" href="../dashboard/dbs-card-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">DBS Card Banner</span>
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
                            <a class="nav-link " href="../dashboard/footer-links.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Footer Pages</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/social-media.php">
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
                        <li class="nav-item ">
                            <a class="nav-link " href="../dashboard/customer.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Customer</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="../dashboard/vendor.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Vendor</span>
                                </div>
                            </a>
                        </li>
                        <!-- Nav item -->
                        <!-- <li class="nav-item">
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
                            </li> -->
                        <!-- 
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
                            </li> -->


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
                            <a class="nav-link  active " href="../dashboard/products.php">
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


        <!-- main -->
        <?php

        if (isset($_GET['importp'])) {
        ?>
            <form action="multiprd.php" method="POST" enctype="multipart/form-data">
                <main class="main-content-wrapper">
                    <input type="file" name="excelFileToUpload" id="excelFileToUpload" accept=".xlsx" required>
                    <br><br>
                    <input type="submit" name="multiprd">
            </form>
            </main>
        <?php

        } else {

        ?>
            <main class="main-content-wrapper">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row mb-8">
                        <div class="col-md-12">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <!-- page header -->
                                <div>
                                    <h2>Add Vendor</h2>
                                    <!-- breacrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="index.php" class="text-inherit">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="customer.php" class="text-inherit">Vendor</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Vendor</li>
                                        </ol>
                                    </nav>
                                </div>
                                <!-- button -->
                                <div>
                                    <a href="vendor.php" class="btn btn-light">Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <!-- card -->
                            <div class="card mb-6 card-lg">
                                <!-- card body -->
                                <div class="card-body p-6 ">
                                    <h4 class="mb-4 h5">Vendor</h4>
                                    <div class="row">
                                        <!-- input -->
                                        <div class="mb-3 col-lg-6">

                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                                Vendor Name:<br>
                                                <input type="text" name="vendor_name" required><br><br>
                                                Brand Name:<br>
                                                <input type="text" name="brand_name" required><br><br>
                                                PAN:<br>
                                                <input type="text" name="vendor_pan" required><br><br>
                                                Email:<br>
                                                <input type="email" name="vendor_email" required><br><br>
                                                Mobile:<br>
                                                <input type="text" name="vendor_mobile" required><br><br>
                                                Password:<br>
                                                <input type="password" name="vendor_password" required><br><br>
                                                Address:<br>
                                                <input type="text" name="vendor_address" required><br><br>
                                                City:<br>
                                                <input type="text" name="vendor_city" required><br><br>
                                                State:<br>
                                                <input type="text" name="vendor_state" required><br><br>
                                                Status:<br>
                                                <input type="text" name="vendor_status" required><br><br>
                                                Logo:<br>
                                                <input type="text" name="vendor_Logo" required><br><br>
                                                Store Image:<br>
                                                <input type="text" name="vendor_store_image" required><br><br>
                                                <input type="submit" value="Submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <!-- card -->

                            <!-- card -->

                            <!-- card -->

                            <!-- button -->

                        </div>

                    </div>

                    <?php
                    // Replace these variables with your actual database credentials

                    // // Create connection
                    // $conn = new mysqli('localhost', 'root', '', 'demo_db');

                    // // Check connection
                    // if ($conn->connect_error) {
                    //     die("Connection failed: " . $conn->connect_error);
                    // }

                    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //     // Handle the form data and file upload here
                    //     // For example, you can access the form input using $_POST['input_name']
                    //     // For file upload, handle the file using $_FILES superglobal
                    //     if (isset($_POST['submit'])) {
                    //         // Process the form data
                    //         $bannerContent = $_POST['banner_content'];

                    //         // File upload handling
                    //         if (isset($_FILES['file'])) {
                    //             // Handle the file upload logic here
                    //             $file = $_FILES['file'];
                    //             $fileName = $file['name'];
                    //             $fileTmpName = $file['tmp_name'];
                    //             $fileSize = $file['size'];
                    //             $fileError = $file['error'];
                    //             $fileType = $file['type'];

                    //             // Example query to insert data into the database
                    //             // $sql = "INSERT INTO your_table_name (banner_content, file_name) VALUES ('$bannerContent', '$fileName')";
                    //             // Execute the query using $conn->query($sql)
                    //         }
                    //     }
                    // }
                    ?>

                    <!-- <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="card mb-6 card-lg">
                                <div class="card-body p-6">
                                    <h4 class="mb-4 h5">Banner</h4>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-label">Banner Content</label>
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <input type="text" name="banner_content" class="form-control" placeholder="Product Name" required>
                                        </div>
                                        <div class="mb-3 col-lg-12 mt-5">
                                            <h4 class="mb-3 h5">Banner Image</h4>
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="d-block dropzone border-dashed rounded-2" enctype="multipart/form-data">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-3" name="submit">Add Banner</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> -->

                </div>
            </main>

    </div>


    <!-- Libs JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../assets/js/vendors/editor.js"></script>
    <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>

</body>

</html>



<?php

        }


?>