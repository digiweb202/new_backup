<?php
// Include the database connection
include '../dbconnect.php';

// Start the session
session_start();

// // Display the vendor ID and username from the session
// echo "The vendor ID is: " . $_SESSION['vendor_id'];
// echo "The username is: " . $_SESSION['username'];
// Assign the username to a variable
if (!isset($_SESSION['vendor_id'])) {
    header("Location: /hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/index.php"); // Redirect to index.php if vendor_id is not set
    exit;
}

$vendor_id = $_SESSION['vendor_id']; // Example usage of vendor_id from session

// Query to retrieve the vendor_status based on the vendor_id
$sql = "SELECT vendor_status FROM vendor WHERE vendor_id = $vendor_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $vendor_status = $row['vendor_status'];
        $_SESSION['vendor_status'] = $vendor_status;
        // echo "Vendor Status: " . $vendor_status;
    }
} else {
    echo "0 results";
}


// if ($vendor_status === 'pending' || $vendor_status === 'rejected') {
//     // Redirect to the vendor panel and set the deactivate style
//     header('Location:  index.php');
//     exit;
// }
// // Assign the username to a variable
// $vendorName = $row['vendor_name'];
$vendor_ids = $_SESSION['vendor_id'];
$vendor_emails = $_SESSION['email'];
$vendor_status = $_SESSION['vendor_status'];
// echo $vendor_status."<br>";

?>
<?php
// Assuming getConnection() is defined in functions.php
// require 'functions.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $vendor_id is already defined or passed as a parameter
$vendor_id = $_SESSION['vendor_id']; // Example usage of vendor_id from session

// Query to retrieve the vendor_status based on the vendor_id
$sql = "SELECT vendor_status FROM vendor WHERE vendor_id = $vendor_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $vendor_status = $row['vendor_status'];
        $_SESSION['vendor_status'] = $vendor_status;
        // echo "Vendor Status: " . $vendor_status;
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
<?php
// Include the database connection
include '../dbconnect.php';

// // Start the session
// session_start();

// // Display the vendor ID and username from the session
// echo "The vendor ID is: " . $_SESSION['vendor_id'];
// echo "The username is: " . $_SESSION['username'];

// Assign the username to a variable

$vendor_ids = $_SESSION['vendor_id'];



// Your existing code
$select_customer = "SELECT * FROM vendor WHERE vendor_id = $vendor_ids";
$res_select_customer = $conn->query($select_customer);

if ($res_select_customer->num_rows > 0) {
    while ($row = $res_select_customer->fetch_assoc()) {
        $vendorName = $row['vendor_name'];
        $brandName = $row['brand_name'];
        $vendorEmail = $row['vendor_email'];
        $VendorBrand = $row['brand_name'];
        $VendorAddress = $row['vendor_address'];
        $vendorCity = $row['vendor_city'];
        $vendorState = $row['vendor_state'];
        $vendorStatus = $row['vendor_status'];
        $vendorPanNum = $row['vendor_pan_num'];
        // $vendorPanImg = $row['vendor_pan_img'];
        $vendorGstNum = $row['vendor_gst_num'];
        $vendorPanFront = $row['vendor_pan_front_img'];
        $vendorPanBack = $row['vendor_pan_back_img'];
    }
} else {
    $vendorName = "Vendor Not Found";
    $brandName = "Brand Not Found";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Dashboard - FreshCart (Vendor_panel)</title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="../../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="../../assets/css/theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!-- main -->

    <div>
        <?php include 'headtop.php'; ?>

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
                    // $vendor_id = $_GET['vendor_id'];

                    // Assuming you have a table named 'vendor' with a column 'vendor_Logo'
                    $sql = "SELECT vendor_Logo FROM vendor WHERE vendor_id = $vendor_ids";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $imageSource = $row["vendor_Logo"];
                            //     echo '<div class="logo logo-width-1 col-md-8 col-sm-6">
                            //     <a href="#"><img src="/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_logos/' . $imageSource . '" alt="logo" class="img-fluid"></a>
                            //   </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    // $conn->close();
                    ?>
                    <div class="logo logo-width-1 col-md-8 col-sm-6 text-center my-4">
                        <a href="#">
                            <!-- <img src="../../../../../hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_logos/logo.svg"/> -->
                            <img src="../../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_logos/<?php echo $imageSource; ?>" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; margin: 0 auto;">
                        </a>
                    </div>

                    <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                        <ul class="navbar-nav flex-column" id="sideNavbar">

                            <li class="nav-item ">
                                <a class="nav-link   " href="index.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-house"></i></span>
                                        <span class="nav-link-text">Dashboard</span>

                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mt-6 mb-3">
                                <span class="nav-label">Store Managements</span>
                            </li>
                            <?php
                            if ($vendor_status === 'pending' || $vendor_status === 'rejected') {
                                // Deactivate the options
                                $deactivate = 'style="pointer-events:none; opacity:0.5;"';
                            } else {
                                // Keep the options active
                                $deactivate = '';
                            }
                            ?>
                            <li class="nav-item" <?php echo $deactivate; ?>>
                                <a class="nav-link" href="products.php" <?php echo $deactivate; ?>>
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                        <span class="nav-link-text">Products</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item" <?php echo $deactivate; ?>>
                                <a class="nav-link" href="categories.php" <?php echo $deactivate; ?>>
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                        <span class="nav-link-text">Categories</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item" <?php echo $deactivate; ?>>
                                <a class="nav-link" href="order-list.php" <?php echo $deactivate; ?>>
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-bag"></i></span>
                                        <span class="nav-link-text">Orders</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="banner.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                        <span class="nav-link-text">Banner</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="logo.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                        <span class="nav-link-text">Logo</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="profile.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                        <span class="nav-link-text">Profile</span>
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
                                <a class="nav-link  active " href="index.php">
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
                                <a class="nav-link " href="products.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                        <span class="nav-link-text">Products</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="subcategories.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                        <span class="nav-link-text">Sub-Categories</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="categories.php?Status=active">
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
                                            <a class="nav-link " href="order-list.php">
                                                List
                                            </a>
                                        </li>
                                        <!-- Nav item -->
                                        <li class="nav-item ">
                                            <a class="nav-link " href="order-single.php">
                                                Single

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="vendor-grid.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-shop"></i></span>
                                        <span class="nav-link-text">Sellers / Vendors</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="customers.php">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                        <span class="nav-link-text">Customers</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="reviews.php">
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

            <?php
            // $admin_id=$_GET['id']; 
            // $get_admin_info="SELECT * FROM admin where admin_id = '$admin_id';";
            // $res_get_info=$conn->query($get_admin_info);
            // while($row=mysqli_fetch_assoc($res_get_info))
            // {
            //     $name=$row['admin_name'];
            // }

            ?>

            <!-- main wrapper -->
            <main class="main-content-wrapper">
                <section class="container">
                    <!-- row -->
                    <div class="row mb-8">
                        <div class="col-md-12">
                            <?php
                            $select_customer = "SELECT * FROM vendor WHERE vendor_id = $vendor_ids";
                            $res_select_customer = $conn->query($select_customer);

                            if ($res_select_customer->num_rows > 0) {
                                while ($row = $res_select_customer->fetch_assoc()) {
                            ?>
                                    <!-- card -->
                                    <div class="card bg-light border-0 rounded-4" style="background-image: url('../../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_banner/<?php echo $row['vendor_store_image']; ?>'); background-repeat: no-repeat; background-size: cover; background-position: right;">
                                        <div class="card-body p-lg-12">
                                            <h1>Welcome back! (vendor)</h1>
                                            <p><?php echo $vendorName; ?></p>
                                            <a href="logout.php" class="btn btn-primary">Logout</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No records found.";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="col-lg-10 col-12 mb-6">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card h-100 card-lg">
                                    <div class="card-body p-6">
                                        <div class="d-flex justify-content-between align-items-center mb-6">
                                            <div>
                                                <h4 class="mb-0 fs-5"><?php echo $vendorName; ?></h4>
                                            </div>
                                            <div class="icon-shape icon-md bg-light-primary text-dark-danger rounded-circle">
                                                <i class="bi bi-people fs-5"></i>
                                            </div>
                                        </div>
                                        <div class="lh-1">
                                            <h1 class="mb-2 fw-bold fs-2"><?php echo $vendor_ids; ?></h1>
                                            <span><?php echo $vendor_emails; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card card-lg">
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bell text-warning" viewBox="0 0 16 16">
                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                                </svg>
                                            </div>
                                            <div class="ms-4">
                                                <h5 class="mb-1"><?php echo $VendorBrand; ?></h5>
                                                <p class="mb-0"><?php echo $VendorAddress; ?> <a class="link-info"><?php echo $vendorState; ?>(<?php echo $vendorCity; ?>)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card card-lg">
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightbulb text-success" viewBox="0 0 16 16">
                                                    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z" />
                                                </svg>
                                            </div>
                                            <div class="ms-4">
                                                <h5 class="mb-1">Vendor PanCard Number</h5>
                                                <h2><?php echo $vendorPanNum; ?></h2>
                                                <!-- <p class="mb-0"> <a class="link-info" href="#!">View Performance</a></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card card-lg">
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightbulb text-success" viewBox="0 0 16 16">
                                                    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z" />
                                                </svg>
                                            </div>
                                            <div class="ms-4">
                                                <h5 class="mb-1">Vendor GST Number</h5>
                                                <h2><?php echo $vendorGstNum; ?></h2>
                                                <!-- <p class="mb-0"> <a class="link-info" href="#!">View Performance</a></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card card-lg">
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightbulb text-success" viewBox="0 0 16 16">
                                                    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z" />
                                                </svg>
                                            </div>
                                            <div class="ms-4">
                                                <h5 class="mb-1">Status</h5>
                                                <h2><?php echo $vendorStatus; ?></h2>
                                                <!-- <p class="mb-0"> <a class="link-info" href="#!">View Performance</a></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card card-lg">
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                         
                                            <div class="ms-4">
                                                <h5 class="mb-1">PanCard</h5>
                                                <div style="display: flex;">
                                                    <img src="../../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/pan_front_card/<?php echo $vendorPanFront; ?>" alt="PAN Front Image" style="max-width: 50%;" />
                                                    <img src="../../../../Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/pan_back_card/<?php echo $vendorPanBack; ?>" alt="PAN Back Image" style="max-width: 50%;" />
                                                    <!-- <p class="mb-0"> <a class="link-info" href="#!">View Performance</a></p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-4 col-12 mb-6">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <!-- card body -->
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                        <div>
                                            <h4 class="mb-0 fs-5">Earnings</h4>
                                        </div>
                                        <div class="icon-shape icon-md bg-light-danger text-dark-danger rounded-circle">
                                            <i class="bi bi-currency-dollar fs-5"></i>
                                        </div>
                                    </div>
                                    <!-- project number -->
                                    <div class="lh-1">
                                        <h1 class=" mb-2 fw-bold fs-2">$93,438.78</h1>
                                        <span>Monthly revenue</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-6">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <!-- card body -->
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                        <div>
                                            <h4 class="mb-0 fs-5">Orders</h4>
                                        </div>
                                        <div class="icon-shape icon-md bg-light-warning text-dark-warning rounded-circle">
                                            <i class="bi bi-cart fs-5"></i>
                                        </div>
                                    </div>
                                    <!-- project number -->
                                    <div class="lh-1">
                                        <h1 class=" mb-2 fw-bold fs-2">42,339</h1>
                                        <span><span class="text-dark me-1">35+</span>New Sales</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-6">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <!-- card body -->
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                        <div>
                                            <h4 class="mb-0 fs-5">Customer</h4>
                                        </div>
                                        <div class="icon-shape icon-md bg-light-info text-dark-info rounded-circle">
                                            <i class="bi bi-people fs-5"></i>
                                        </div>
                                    </div>
                                    <!-- project number -->
                                    <div class="lh-1">
                                        <h1 class=" mb-2 fw-bold fs-2">39,354</h1>
                                        <span><span class="text-dark me-1">30+</span>new in 2 days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row ">
                        <div class="col-xl-8 col-lg-6 col-md-12 col-12 mb-6">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3 class="mb-1 fs-5">Revenue </h3>
                                            <small>(+63%) than last year</small>
                                        </div>
                                        <div>
                                            <!-- select option -->
                                            <select class="form-select ">
                                                <option selected>2019</option>
                                                <option value="2023">2020</option>
                                                <option value="2024">2021</option>
                                                <option value="2025">2022</option>
                                                <option value="2025">2023</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- chart -->
                                    <div id="revenueChart" class="mt-6"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12 mb-6">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <!-- card body -->
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <h3 class="mb-0 fs-5">Total Sales </h3>
                                    <div id="totalSale" class="mt-6 d-flex justify-content-center"></div>
                                    <div class="mt-4">
                                        <!-- list -->
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill text-primary" viewBox="0 0 16 16">
                                                    <circle cx="8" cy="8" r="8" />
                                                </svg> <span class="ms-1"><span class="text-dark">Shippings
                                                        $32.98</span> (2%)</span>
                                            </li>
                                            <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill text-warning" viewBox="0 0 16 16">
                                                    <circle cx="8" cy="8" r="8" />
                                                </svg> <span class="ms-1"><span class="text-dark">Refunds $11</span> (11%)
                                                </span>
                                            </li>
                                            <li class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill text-danger" viewBox="0 0 16 16">
                                                    <circle cx="8" cy="8" r="8" />
                                                </svg> <span class="ms-1"><span class="text-dark">Order $14.87</span> (1%)
                                                </span>
                                            </li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill text-info" viewBox="0 0 16 16">
                                                    <circle cx="8" cy="8" r="8" />
                                                </svg> <span class="ms-1"><span class="text-dark">Income 3,271</span> (86%)
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row ">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mb-6">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <!-- card body -->
                                <div class="card-body p-6">
                                    <h3 class="mb-0 fs-5">Sales Overview </h3>
                                    <div class="mt-6">
                                        <!-- text -->
                                        <div class="mb-5">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="fs-6">Total Profit</h5>
                                                <span><span class="me-1 text-dark">$1,619</span> (8.6%)</span>
                                            </div>
                                            <!-- main wrapper -->
                                            <div>
                                                <!-- progressbar -->
                                                <div class="progress bg-light-primary" style="height: 6px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" aria-label="Example 1px high" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <!-- text -->
                                            <div class="d-flex align-items-center justify-content-between">x
                                                <h5 class="fs-6">Total Income</h5>
                                                <span><span class="me-1 text-dark">$3,571</span> (86.4%)</span>
                                            </div>
                                            <div>
                                                <!-- progressbar -->
                                                <div class="progress bg-info-soft" style="height: 6px;">
                                                    <div class="progress-bar bg-info" role="progressbar" aria-label="Example 1px high" style="width: 88%;" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- text -->
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="fs-6">Total Expenses</h5>
                                                <span><span class="me-1 text-dark">$3,430</span> (74.5%)</span>
                                            </div>
                                            <div>
                                                <!-- progressbar -->
                                                <div class="progress bg-light-danger" style="height: 6px;">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-label="Example 1px high" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mb-6">
                            <div class=" position-relative h-100">
                                <!-- card -->
                                <div class="card card-lg mb-6">
                                    <!-- card body -->
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <!-- svg -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bell text-warning" viewBox="0 0 16 16">
                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                                </svg>
                                            </div>
                                            <!-- text -->
                                            <div class="ms-4">
                                                <h5 class="mb-1">Start your day with New Notification.</h5>
                                                <p class="mb-0">You have <a class="link-info" href="#!">2 new
                                                        notification</a></p>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card card-lg">
                                    <!-- card body -->
                                    <div class="card-body px-6 py-8">
                                        <div class="d-flex align-items-center">
                                            <!-- svg -->
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lightbulb text-success" viewBox="0 0 16 16">
                                                    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z" />
                                                </svg>
                                            </div>
                                            <!-- text -->
                                            <div class="ms-4">
                                                <h5 class="mb-1">Monitor your Sales and Profitability</h5>
                                                <p class="mb-0"> <a class="link-info" href="#!">View Performance</a></p>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row ">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                            <div class="card h-100 card-lg">
                                <!-- heading -->
                                <div class="p-6">
                                    <h3 class="mb-0 fs-5">Recent Order</h3>
                                </div>
                                <div class="card-body p-0">
                                    <!-- table -->
                                    <div class="table-responsive">
                                        <table class="table table-centered table-borderless text-nowrap table-hover">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col">Order Number</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Order Date</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>#FC0005</td>
                                                    <td>Haldiram's Sev Bhujia</td>
                                                    <td>28 March 2023</td>
                                                    <td>$18.00</td>
                                                    <td>
                                                        <span class="badge bg-light-primary text-dark-primary">Shipped</span>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>#FC0004</td>
                                                    <td>NutriChoice Digestive</td>
                                                    <td>24 March 2023</td>
                                                    <td>$24.00</td>
                                                    <td>
                                                        <span class="badge bg-light-warning text-dark-warning">Pending</span>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>#FC0003</td>
                                                    <td>Onion Flavour Potato</td>
                                                    <td>8 Feb 2023</td>
                                                    <td>$9.00</td>
                                                    <td>
                                                        <span class="badge bg-light-danger text-dark-danger">Cancel</span>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>#FC0002</td>
                                                    <td>Blueberry Greek Yogurt</td>
                                                    <td>20 Jan 2023</td>
                                                    <td>$12.00</td>
                                                    <td>
                                                        <span class="badge bg-light-warning text-dark-warning">Pending</span>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>#FC0001</td>
                                                    <td>Slurrp Millet Chocolate</td>
                                                    <td>14 Jan 2023</td>
                                                    <td>$8.00</td>
                                                    <td>
                                                        <span class="badge bg-light-info text-dark-info">Processing</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Libs JS -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../../assets/js/theme.min.js"></script>
    <script src="../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../../assets/js/vendors/chart.js"></script>

</body>

</html>