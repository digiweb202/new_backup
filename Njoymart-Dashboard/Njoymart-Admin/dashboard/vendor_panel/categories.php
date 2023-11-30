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
if ($vendor_status === 'pending' || $vendor_status === 'rejected') {
    // Redirect to the vendor panel and set the deactivate style
    header('Location:  index.php');
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
    <title>Categories Dashboard - FreshCart </title>
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


</head>

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
                                        <!-- <h1><?php echo $vendor_ids; ?></h1> -->

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
                        <img src="../../assets/images/logo/freshcart-logo.svg" alt="">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/index.php">
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
                            <a class="nav-link " href="../../dashboard/products.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">Products</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/subcategories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-list-task"></i></span>
                                    <span class="nav-link-text">Sub-Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link  active " href="../../dashboard/categories.php">
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
                                        <a class="nav-link " href="../../dashboard/order-list.php">
                                            List
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item ">
                                        <a class="nav-link " href="../../dashboard/order-single.php">
                                            Single

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/vendor-grid.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-shop"></i></span>
                                    <span class="nav-link-text">Sellers / Vendors</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/customers.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Customers</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/reviews.php">
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
        <main class="main-content-wrapper">
            <div class="container">
                <!-- row -->
                <div class="row mb-8">
                    <div class="col-md-12">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <!-- pageheader -->
                            <div>
                                <h2>Categories</h2>
                                <!-- breacrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="index.php" class="text-inherit">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- button -->
                            <div>
                                <?php if (isset($_GET['status'])) { ?>
                                    <a href="t.php?status=<?php echo $_GET['status']; ?>&name=category" class="btn btn-primary">Generate Report</a>

                                    <a href="add-category.php" class="btn btn-primary">Add New Category</a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['status'])) {
                ?>
                    <div class="row ">
                        <div class="col-xl-12 col-12 mb-5">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <div class=" px-6 py-6 ">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                            <!-- form -->
                                            <form class="d-flex" action="categories.php?search" method="POST" role="search">
                                                <input class="form-control" type="search" placeholder="Search Category" aria-label="Search" name="search_cat" id="search_cat">
                                            </form>
                                        </div>
                                        <!-- select option -->
                                        <div class="col-xl-2 col-md-4 col-12">

                                            <?php
                                            if ($_GET['status'] == 'active') {
                                            ?>
                                                <select class="form-select" id="mySelect">
                                                    <option value="active" selected>Active</option>
                                                    <option value="deactive">Deactive</option>
                                                </select>
                                            <?php

                                            } else if ($_GET['status'] == 'deactive') {
                                            ?>
                                                <select class="form-select" id="mySelect">

                                                    <option value="active">Active</option>
                                                    <option value="deactive" selected>Deactive</option>
                                                </select>
                                            <?php
                                            }
                                            ?>
                                            <script>
                                                const selectElement = document.getElementById('mySelect');

                                                selectElement.addEventListener('change', function() {
                                                    const selectedValue = this.value;
                                                    // Pass the selected value as a query parameter when redirecting

                                                    window.location.href = `categories.php?status=${selectedValue}`;
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <!-- card body -->
                                <div class="card-body p-0">
                                    <!-- table -->
                                    <div class="table-responsive ">
                                        <table class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>Image</th>
                                                    <th> Name</th>
                                                    <th>Product</th>
                                                    <th>Status</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select_category = "Select * from category where cat_status='$_GET[status]'";
                                                $res_select_category = $conn->query($select_category);

                                                while ($row = mysqli_fetch_assoc($res_select_category)) {
                                                ?>
                                                    <tr>

                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="categoryOne">
                                                                <label class="form-check-label" for="categoryOne">

                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#!"> <img src="<?php echo $row['cat_img']; ?>" alt="Pic" class="icon-shape icon-sm"></a>
                                                        </td>
                                                        <td><a href="#" class="text-reset"><?php echo $row['cat_name']; ?></a></td>
                                                        <td>
                                                            <?php
                                                            $count_product = "select count(product_id) as t from product p inner join sub_cat sc on sc.sub_cat_id=p.sub_cat_id INNER join category c on c.cat_id=sc.cat_id where c.cat_id='$row[cat_id]';";
                                                            $res_count_product = $conn->query($count_product);
                                                            while ($res = mysqli_fetch_assoc($res_count_product)) {
                                                                echo $res['t'];
                                                            }
                                                            ?>

                                                        </td>

                                                        <td>
                                                            <span class="badge bg-light-primary text-dark-primary"><?php echo $row['cat_status']; ?></span>
                                                        </td>

                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="feather-icon icon-more-vertical fs-5"></i>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    <?php if ($_GET['status'] == 'active') {
                                                                        echo "<li><a class='dropdown-item' href='categories.php?type=status&operation=deactive&id=" . $row['cat_id'] . "'<i class='bi bi-trash me-3'></i>Deactive</a></li>"; ?>
                                                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>

                                                                        <?php } else {

                                                                        echo "<li><a class='dropdown-item' href='categories.php?type=status&operation=active&id=" . $row['cat_id'] . "'<i class='bi bi-trash me-3'></i>Activate</a></li>";
                                                                        ?>
                                                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>

                                                                        <?php } ?>
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </main>
    </div>
<?php
                } elseif (isset($_GET['search'])) {
                    include 'search.php';
                } elseif (isset($_GET['type'])) {
                    if (isset($_GET['type']) && $_GET['type'] != ' ') {

                        $type = $_GET['type'];

                        if ($type == 'status') {
                            $opration = $_GET['operation'];

                            $id = $_GET['id'];

                            if ($opration == 'active') {
                                $status = 'active';
                            } else {
                                $status = 'deactive';
                            }
                            $update_cat = "update category set cat_status='$status' where cat_id='$id'";
                            $res = $conn->query($update_cat);
                        }
                    }
                    echo "<script> window.location.href='categories.php?status=active';</script>";
                } else {
                    echo "<script> window.location.href='categories.php?status=active';</script>";
                }
?>

<!-- Libs JS -->
<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="../../assets/js/theme.min.js"></script>

</body>

</html>