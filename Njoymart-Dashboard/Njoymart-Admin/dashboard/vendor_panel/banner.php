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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Customers Dashboard - FreshCart </title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="../../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="../../assets/css/theme.min.css">
    <!-- Google tag (gtag.js) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>


    <?php

    include 'headtop.php'; ?>
    <div class="main-wrapper">
        <!-- navbar vertical -->



        <nav class="navbar-vertical-nav d-none d-xl-block ">
            <div class="navbar-vertical">
                <?php
                // Create connection
                // $conn = new mysqli('localhost', 'root', '', 'demo_db');

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
                        <img src="/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_logos/<?php echo $imageSource; ?>" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; margin: 0 auto;">
                    </a>
                </div>

                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column" id="sideNavbar">

                        <li class="nav-item ">
                            <a class="nav-link  " href="index.php">
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
                                <a class="nav-link active" href="banner.php">
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
                                <a class="nav-link " href="profile.php">
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
                            <a class="nav-link " href="index.php">
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
                            <a class="nav-link " href="categories.php">
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
                            <a class="nav-link  active " href="customers.php">
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


        <main class="main-content-wrapper">
            <div class="container">
                <div class="row mb-8">
                    <div class="col-md-12">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div>
                                <h2>Vendor Banners</h2>
                                <!-- breacrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Vendor Banners</li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <!-- <a href="t??" class="btn btn-primary">Generate Report</a> -->
                                <!-- 
                                <a href="add-Banner.php" class="btn btn-primary">Add New Banner</a> -->
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
                                                <?php
                                                $select_customer = "SELECT * FROM customer WHERE customer_name LIKE '%" . $_GET['search'] . "%'";
                                                // $select_customer="Select * from customer where customer_name LIKE % '$_GET[search]' %";
                                                $res_select_customer = $conn->query($select_customer);
                                                while ($row = mysqli_fetch_assoc($res_select_customer)) {
                                                ?>
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
                                                            <?php
                                                            $spent = "select sum(total_price) as spent_amt from order_new o inner join customer c on c.customer_id=o.customer_id where o.customer_id='$row[customer_id]'";
                                                            $res_spent = $conn->query($spent);
                                                            while ($row_res_spent = mysqli_fetch_assoc($res_spent)) {
                                                                echo $row_res_spent['spent_amt'];;
                                                            }
                                                            ?>
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
                                                <?php }
                                                ?>

                                            </tbody>
                                        </table>
                                        <?php

                                        $conn = new mysqli('localhost', 'root', '', 'demo_db');

                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Fetch data from the 'banner' table
                                        $select_banner = "SELECT * FROM banner";
                                        $res_select_banner = $conn->query($select_banner);

                                        // Display the fetched data in a table
                                        echo '<table>';
                                        echo '<tr><th>banner_id</th><th>banner_title</th><th>banner_image</th></tr>';
                                        while ($row = $res_select_banner->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row['banner_id'] . '</td>';
                                            echo '<td>' . $row['banner_title'] . '</td>';
                                            echo '<td>' . $row['banner_image'] . '</td>';
                                            echo '</tr>';
                                        }
                                        echo '</table>';

                                        // Close the connection
                                        $conn->close();
                                        ?>


                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>

                <?php
                }
                //Without search
                else {
                ?>
                    <?php
                    if (isset($_GET['delete'])) {
                        $delete_id = $_GET['delete'];
                        $delete_query = "DELETE FROM banner WHERE banner_id = $delete_id";
                        if ($conn->query($delete_query) === TRUE) {
                            echo "Record deleted successfully";
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['edit'])) {
                        $delete_id = $_GET['delete'];
                        $delete_query = "DELETE FROM banner WHERE banner_id = $delete_id";
                        if ($conn->query($delete_query) === TRUE) {
                            echo "Record deleted successfully";
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    }
                    ?>

                    <div class="row">
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
                                                    <th>Logo</th>
                                                    <th>Spent</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $select_customer = "SELECT * FROM vendor WHERE vendor_id = $vendor_ids";
                                                $res_select_customer = $conn->query($select_customer);

                                                if ($res_select_customer->num_rows > 0) {
                                                    while ($row = $res_select_customer->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="customerOne">
                                                                    <label class="form-check-label" for="customerOne"></label>
                                                                </div>
                                                            </td>
                                                            <!-- <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="ms-2">
                                                                        <a href="#" class="text-inherit"><?php echo $row['vendor_id']; ?></a>
                                                                    </div>
                                                                </div>
                                                            </td> -->
                                                            <td>
                                                                <img style="width:200px; height:100px" src="/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_banner/<?php echo $row['vendor_store_image']; ?>" alt="img" class="icon-shape icon-md">
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <!-- <li><a class="dropdown-item" href="?vendor_id=<?php echo $row['vendor_id']; ?>"><i class="bi bi-trash me-3"></i>Delete</a></li> -->
                                                                        <li><a class="dropdown-item" href="edit-banner.php?id=<?php echo $row['vendor_id']; ?>"><i class="bi bi-pencil-square me-3 "></i>Edit</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    }
                                                } else {
                                                    echo "No records found.";
                                                }
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

                                            Title: <input type="text" name="title" value="<?php echo $row['title']; ?>">

                                            Image: <input type="file" name="image">

                                            <input type="hidden" name="banner_id" value="<?php echo $banner_id; ?>">

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
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../../assets/js/theme.min.js"></script>

</body>

</html>