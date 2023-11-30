<?php
session_start();

// Assuming getconnection() is defined in functions.php
require 'functions.php';
$conn = getconnection();

// Assuming getconnection() is a function that returns the database connection

// Check if the keys exist in the $_SESSION array
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
$customerName = isset($_SESSION['usernames']) ? $_SESSION['usernames'] : null;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // ... (existing registration code)

    // Redirect to login page after successful registration
    header('Location: index.php');
    exit;
}

// Login Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $vendor_email = $_POST['email'] ?? null;
    $vendor_password = $_POST['password'] ?? null; 

    // Perform login validations and checks
    $check_query_login = "SELECT * FROM nw_customer WHERE email = '$vendor_email' AND password = '$vendor_password'";
    $result_login = $conn->query($check_query_login);

    if ($result_login->num_rows > 0) {
        // Fetch user details and set session variables
        $user_data = $result_login->fetch_assoc();
        $_SESSION['customer_id'] =  $user_data['id'];
        $_SESSION['usernames'] =  $user_data['username'];

        // Check if the keys exist in the $_SESSION array
        $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
        $customerName = isset($_SESSION['usernames']) ? $_SESSION['usernames'] : null;

        // // Redirect to the user's dashboard after successful login
        header('Location:index.php');
        exit;
    } else {
        echo "<script>alert('Invalid credentials. Please try again.');</script>";
    }
}

// Close the connection
$conn->close();
?>

<!-- Your HTML content here -->


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest - Multipurpose eCommerce HTML Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/main.css?v=5.6" />
</head>

<body>
    <!-- <h1><?php echo $customer_id; ?></h1> -->
    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.php"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option>All Categories</option>
                                    <option>Milks and Dairies</option>
                                    <option>Wines & Alcohol</option>
                                    <option>Clothing & Beauty</option>
                                    <option>Pet Foods & Toy</option>
                                    <option>Fast food</option>
                                    <option>Baking material</option>
                                    <option>Vegetables</option>
                                    <option>Fresh Seafood</option>
                                    <option>Noodles & Rice</option>
                                    <option>Ice cream</option>
                                </select>
                                <input type="text" placeholder="Search for items..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Alabama</option>
                                            <option>Alaska</option>
                                            <option>Arizona</option>
                                            <option>Delaware</option>
                                            <option>Florida</option>
                                            <option>Georgia</option>
                                            <option>Hawaii</option>
                                            <option>Indiana</option>
                                            <option>Maryland</option>
                                            <option>Nevada</option>
                                            <option>New Jersey</option>
                                            <option>New Mexico</option>
                                            <option>New York</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="shop-compare.php">
                                        <img class="svgInject" alt="Nest" src="assets/imgs/theme/icons/icon-compare.svg" />
                                        <span class="pro-count blue">3</span>
                                    </a>
                                    <a href="shop-compare.php"><span class="lable ml-0">Compare</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist.php">
                                        <img class="svgInject" alt="Nest" src="assets/imgs/theme/icons/icon-heart.svg" />
                                        <span class="pro-count blue">6</span>
                                    </a>
                                    <a href="shop-wishlist.php"><span class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="shop-cart.php">
                                        <img alt="Nest" src="assets/imgs/theme/icons/icon-cart.svg" />
                                        <span class="pro-count blue">2</span>
                                    </a>
                                    <a href="shop-cart.php"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.php"><img alt="Nest" src="assets/imgs/shop/thumbnail-3.jpg" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.php">Daisy Casual Bag</a></h4>
                                                    <h4><span>1 × </span>$800.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.php"><img alt="Nest" src="assets/imgs/shop/thumbnail-2.jpg" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.php">Corduroy Shirts</a></h4>
                                                    <h4><span>1 × </span>$3200.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$4000.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart.php" class="outline">View cart</a>
                                                <a href="shop-checkout.php">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                            
                                        <img class="svgInject" alt="Nest" src="assets/imgs/theme/icons/icon-user.svg" />
                             
                                 <span class="lable ml-0">Account</span>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <?php if (isset($customer_id)) { ?>
                                                <li>
                                                    <a href="page-account.php"><i class="fi fa fa-user mr-10"></i> <?php echo $customerName; ?>(<?php echo $customer_id; ?>)</a>
                                                </li>
                                                <li>
                                                    <a href="page-account.php"><i class="fi fa fa-location-alt mr-10"></i>Order Tracking</a>
                                                </li>
                                                <!-- <li>
                                                    <a href="page-account.php"><i class="fi fa fa-label mr-10"></i>My Voucher</a>
                                                </li>
                                                <li>
                                                    <a href="shop-wishlist.php"><i class="fi fa fa-heart mr-10"></i>My Wishlist</a>
                                                </li>
                                                <li> -->
                                                    <a href="page-account.php"><i class="fi fa fa-settings-sliders mr-10"></i>Setting</a>
                                                </li>
                                                <li>
                                                    <a href="logout.php"><i class="fi fa fa-sign-out mr-10"></i>Logout</a>
                                                </li>
                                            <?php } else { ?>
                                                <li>
                                                    <a href="page-login.php"><i class="fi fa fa-sign-out mr-10"></i>Login/Sign UP</a>
                                                </li>
                                                <li>
                                                    <a href="page-vendor-login.php"><i class="fi fa fa-sign-out mr-10"></i>Vendor Login/Signup</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.php"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <?php


                        // Create connection
                        $conn = new mysqli('localhost', 'root', '', 'demo_db');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM All_browse_categories"; // Replace 'All_browse_categories' with your actual table name
                        $result = $conn->query($sql);
                        ?>
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fa fa-apps"></span> <span class="et">Browse</span> All Categories
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<li><a href="' . $row["link"] . '"><img src="assets/imgs/theme/icons/' . $row["image"] . '" alt="">' . $row["name"] . '</a></li>';
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </ul>
                                    <ul class="end">
                                        <?php
                                       
                                        ?>
                                    </ul>
                                </div>
                                <!-- <div class="more_slide_open" style="display: none">
            <div class="d-flex categori-dropdown-inner">
                <?php
                // Fetch and display the more categories section from the database
                // Modify the SQL query and iteration according to your table structure
                // Example:
                // $sql = "SELECT * FROM All_browse_categories WHERE category_order > 10";
                // $result = $conn->query($sql);
                // while ($row = $result->fetch_assoc()) {
                //     echo '<li><a href="' . $row["link"] . '"><img src="' . $row["image"] . '" alt="">' . $row["name"] . '</a></li>';
                // }
                ?>
            </div>
        </div> -->

                            </div>
                        </div>
                        <?php
                        // Close the connection
                        $conn->close();
                        ?>
                        <?php


                        // Create connection
                        $conn = new mysqli('localhost', 'root', '', 'demo_db');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch main menu items from the database
                        $mainMenuSql = "SELECT * FROM main_menu";
                        $mainMenuResult = $conn->query($mainMenuSql);
                        ?>

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <?php
                                    if ($mainMenuResult->num_rows > 0) {
                                        // Output data of each main menu row
                                        while ($mainMenuRow = $mainMenuResult->fetch_assoc()) {
                                            if ($mainMenuRow['sub_menu'] == 0) {
                                                echo '<li><a href="' . $mainMenuRow["link"] . '">' . $mainMenuRow["name"] . '</a></li>';
                                            } else {
                                                echo '<li><a href="#">' . $mainMenuRow["name"] . ' <i class="fa fa-angle-down"></i></a>';
                                                echo '<ul class="sub-menu">';
                                                // Fetch sub-menu items based on main menu id
                                                $subMenuSql = "SELECT * FROM sub_menu WHERE main_menu_id = " . $mainMenuRow['id'];
                                                $subMenuResult = $conn->query($subMenuSql);
                                                if ($subMenuResult->num_rows > 0) {
                                                    while ($subMenuRow = $subMenuResult->fetch_assoc()) {
                                                        echo '<li><a href="' . $subMenuRow["link"] . '">' . $subMenuRow["name"] . '</a></li>';
                                                    }
                                                }
                                                echo '</ul></li>';
                                            }
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>

                        <?php
                        // Close the connection
                        $conn->close();
                        ?>
                    </div>
                    <?php

                    $conn = new mysqli('localhost', 'root', '', 'demo_db');

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $sql = "SELECT hotline_number, support_hours FROM hotline_table"; // Adjust the query to your table structure
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $hotlineNumber = $row["hotline_number"];
                            $supportHours = $row["support_hours"];
                        }
                    }
                    ?>

                    <div class="hotline d-none d-lg-flex">
                        <img src="assets/imgs/theme/icons/icon-headphone.svg" alt="hotline">
                        <p>
                            <?php
                            echo $hotlineNumber . "<span>" . $supportHours . "</span>";
                            ?>
                        </p>
                    </div>

                    <?php
                    // Close the connection
                    $conn->close();
                    ?>

                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Nest" src="assets/imgs/theme/icons/icon-heart.svg" />
                                    <!-- <span class="pro-count white">4</span> -->
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.php">
                                    <img alt="Nest" src="assets/imgs/theme/icons/icon-cart.svg" />
                                    <!-- <span class="pro-count white">2</span> -->
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.php"><img alt="Nest" src="assets/imgs/shop/thumbnail-3.jpg" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.php">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.php"><img alt="Nest" src="assets/imgs/shop/thumbnail-4.jpg" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.php">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.php">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.php"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="index.php">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.php">Home 1</a></li>
                                    <li><a href="index-2.php">Home 2</a></li>
                                    <li><a href="index-3.php">Home 3</a></li>
                                    <li><a href="index-4.php">Home 4</a></li>
                                    <li><a href="index-5.php">Home 5</a></li>
                                    <li><a href="index-6.php">Home 6</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop-grid-right.php">shop</a>
                                <ul class="dropdown">
                                    <li><a href="shop-grid-right.php">Shop Grid – Right Sidebar</a></li>
                                    <li><a href="shop-grid-left.php">Shop Grid – Left Sidebar</a></li>
                                    <li><a href="shop-list-right.php">Shop List – Right Sidebar</a></li>
                                    <li><a href="shop-list-left.php">Shop List – Left Sidebar</a></li>
                                    <li><a href="shop-fullwidth.php">Shop - Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.php">Product – Right Sidebar</a></li>
                                            <li><a href="shop-product-left.php">Product – Left Sidebar</a></li>
                                            <li><a href="shop-product-full.php">Product – No sidebar</a></li>
                                            <li><a href="shop-product-vendor.php">Product – Vendor Infor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-filter.php">Shop – Filter</a></li>
                                    <li><a href="shop-wishlist.php">Shop – Wishlist</a></li>
                                    <li><a href="shop-cart.php">Shop – Cart</a></li>
                                    <li><a href="shop-checkout.php">Shop – Checkout</a></li>
                                    <li><a href="shop-compare.php">Shop – Compare</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Invoice</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-invoice-1.php">Shop Invoice 1</a></li>
                                            <li><a href="shop-invoice-2.php">Shop Invoice 2</a></li>
                                            <li><a href="shop-invoice-3.php">Shop Invoice 3</a></li>
                                            <li><a href="shop-invoice-4.php">Shop Invoice 4</a></li>
                                            <li><a href="shop-invoice-5.php">Shop Invoice 5</a></li>
                                            <li><a href="shop-invoice-6.php">Shop Invoice 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Vendors</a>
                                <ul class="dropdown">
                                    <li><a href="vendors-grid.php">Vendors Grid</a></li>
                                    <li><a href="vendors-list.php">Vendors List</a></li>
                                    <li><a href="vendor-details-1.php">Vendor Details 01</a></li>
                                    <li><a href="vendor-details-2.php">Vendor Details 02</a></li>
                                    <li><a href="vendor-dashboard.php">Vendor Dashboard</a></li>
                                    <li><a href="vendor-guide.php">Vendor Guide</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.php">Dresses</a></li>
                                            <li><a href="shop-product-right.php">Blouses & Shirts</a></li>
                                            <li><a href="shop-product-right.php">Hoodies & Sweatshirts</a></li>
                                            <li><a href="shop-product-right.php">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.php">Jackets</a></li>
                                            <li><a href="shop-product-right.php">Casual Faux Leather</a></li>
                                            <li><a href="shop-product-right.php">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.php">Gaming Laptops</a></li>
                                            <li><a href="shop-product-right.php">Ultraslim Laptops</a></li>
                                            <li><a href="shop-product-right.php">Tablets</a></li>
                                            <li><a href="shop-product-right.php">Laptop Accessories</a></li>
                                            <li><a href="shop-product-right.php">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="blog-category-fullwidth.php">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-category-grid.php">Blog Category Grid</a></li>
                                    <li><a href="blog-category-list.php">Blog Category List</a></li>
                                    <li><a href="blog-category-big.php">Blog Category Big</a></li>
                                    <li><a href="blog-category-fullwidth.php">Blog Category Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-post-left.php">Left Sidebar</a></li>
                                            <li><a href="blog-post-right.php">Right Sidebar</a></li>
                                            <li><a href="blog-post-fullwidth.php">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.php">About Us</a></li>
                                    <li><a href="page-contact.php">Contact</a></li>
                                    <li><a href="page-account.php">My Account</a></li>
                                    <li><a href="page-login.php">Login</a></li>
                                    <li><a href="page-register.php">Register</a></li>
                                    <li><a href="page-forgot-password.php">Forgot password</a></li>
                                    <li><a href="page-reset-password.php">Reset password</a></li>
                                    <li><a href="page-purchase-guide.php">Purchase Guide</a></li>
                                    <li><a href="page-privacy-policy.php">Privacy Policy</a></li>
                                    <li><a href="page-terms.php">Terms of Service</a></li>
                                    <li><a href="page-404.php">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.php"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login.php"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.php" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="assets/imgs/page/login-1.png" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Login</h1>
                                            <p class="mb-30">Don't have an account? <a href="page-register.php">Create here</a></p>
                                        </div>
                                        <form method="post">
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Username or Email *" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Your password *" />
                                            </div>
                                            <div class="login_footer form-group">

                                                <span class="security-code">
                                                    <b class="text-new">8</b>
                                                    <b class="text-hot">6</b>
                                                    <b class="text-sale">7</b>
                                                    <b class="text-best">5</b>
                                                </span>
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="main">
        <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <?php

                                // Create connection
                                $connection = new mysqli('localhost', 'root', '', 'demo_db');

                                // Check connection
                                if ($connection->connect_error) {
                                    die("Connection failed: " . $connection->connect_error);
                                }

                                // Fetch content from the database
                                $sql = "SELECT heading, description, image_url FROM newsletter_content WHERE id = 1";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo '<h2 class="mb-20">' . $row["heading"] . '</h2>';
                                    echo '<p class="mb-45">' . $row["description"] . ' <span class="text-brand">Nest Mart</span></p>';
                                    echo '<form class="form-subscriber d-flex" action="your_php_script.php" method="post">';
                                    echo '<input type="email" name="email" placeholder="Your email address" />';
                                    echo '<button class="btn" type="submit" name="subscribe">Subscribe</button>';
                                    echo '</form>';
                                    echo '<img src="' . 'assets/imgs/banner/' . $row["image_url"] . '" alt="newsletter" />';
                                } else {
                                    echo "No results found";
                                }

                                // Close the database connection
                                $connection->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <?php

                    // Create connection
                    $connection = new mysqli('localhost', 'root', '', 'demo_db');

                    // Check connection
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    $sql = "SELECT * FROM featured_icons";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        // Loop through data and generate HTML dynamically
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">';
                            echo '<div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">';
                            echo '<div class="banner-icon">';
                            echo '<img src="' . 'assets/imgs/theme/icons/' . $row["icon_url"] . '" alt="" />';
                            echo '</div>';
                            echo '<div class="banner-text">';
                            echo '<h3 class="icon-box-title">' . $row["title"] . '</h3>';
                            echo '<p>' . $row["description"] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No results found";
                    }

                    $connection->close();
                    ?>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                            <div class="logo mb-30">
                                <a href="index.php" class="mb-15"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                                <p class="font-lg text-heading">Awesome grocery store website template</p>
                            </div>
                            <ul class="contact-infor">
                                <?php
                                // $servername = "your_servername";
                                // $username = "your_username";
                                // $password = "your_password";
                                // $dbname = "your_database";

                                // Create connection
                                $connection = new mysqli('localhost', 'root', '', 'demo_db');

                                // Check connection
                                if ($connection->connect_error) {
                                    die("Connection failed: " . $connection->connect_error);
                                }

                                $sql = "SELECT * FROM contact_information";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    // Loop through data and generate HTML dynamically
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<li><img src="' . 'assets/imgs/theme/icons/' . $row["icon"] . '" alt="" /><strong>' . $row["title"] . ': </strong> <span>' . $row["content"] . '</span></li>';
                                    }
                                } else {
                                    echo "No results found";
                                }

                                $connection->close();
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <?php

                            // Create connection
                            $connection = new mysqli('localhost', 'root', '', 'demo_db');

                            // Check connection
                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }

                            $sql = "SELECT link_name, link_url FROM footer_links_company WHERE title='Company'";
                            $result = $connection->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li><a href="' . $row["link_url"] . '">' . $row["link_name"] . '</a></li>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $connection->close();
                            ?>
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help Ticket</a></li>
                            <li><a href="#">Shipping Details</a></li>
                            <li><a href="#">Compare products</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Corporate</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Become a Vendor</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Farm Business</a></li>
                            <li><a href="#">Farm Careers</a></li>
                            <li><a href="#">Our Suppliers</a></li>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Promotions</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Popular</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Milk & Flavoured Milk</a></li>
                            <li><a href="#">Butter and Margarine</a></li>
                            <li><a href="#">Eggs Substitutes</a></li>
                            <li><a href="#">Marmalades</a></li>
                            <li><a href="#">Sour Cream and Dips</a></li>
                            <li><a href="#">Tea & Kombucha</a></li>
                            <li><a href="#">Cheese</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget widget-install-app col">
                        <h4 class="widget-title">Install App</h4>
                        <p class="wow fadeIn animated">From App Store or Google Play</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="assets/imgs/theme/app-store.jpg" alt="" /></a>
                            <a href="#" class="hover-up mb-sm-2"><img src="assets/imgs/theme/google-play.jpg" alt="" /></a>
                        </div>
                        <p class="mb-20">Secured Payment Gateways</p>
                        <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-30">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Nest</strong> - HTML Ecommerce Template <br />All rights reserved</p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <?php

                    $conn = new mysqli('localhost', 'root', '', 'demo_db');

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $sql = "SELECT hotline_number, support_hours FROM hotline_table"; // Adjust the query to your table structure
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $hotlineNumber = $row["hotline_number"];
                            $supportHours = $row["support_hours"];
                        }
                    }
                    ?>

                    <div class="hotline d-none d-lg-flex">
                        <img src="assets/imgs/theme/icons/icon-headphone.svg" alt="hotline">
                        <p>
                            <?php
                            echo $hotlineNumber . "<span>" . $supportHours . "</span>";
                            ?>
                        </p>
                    </div>

                    <?php
                    // Close the connection
                    $conn->close();
                    ?>

                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon mb-50">
                        <h6 class="mb-15">Follow Us</h6>
                        <?php


                        // Create connection
                        $connection = new mysqli('localhost', 'root', '', 'demo_db');

                        // Check connection
                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        $sql = "SELECT * FROM social_media_links";
                        $result = $connection->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<a href="' . $row["link"] . '"><img src="assets/imgs/theme/icons/icon-' . $row["platform"] . '-white.svg" alt="" /></a>';
                            }
                        } else {
                            echo "0 results";
                        }
                        $connection->close();
                        ?>
                    </div>
                    <p class="font-sm">Up to 15% discount on your first subscribe</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/select2.min.js"></script>
    <script src="assets/js/plugins/waypoints.js"></script>
    <script src="assets/js/plugins/counterup.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/images-loaded.js"></script>
    <script src="assets/js/plugins/isotope.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="./assets/js/main.js?v=5.6"></script>
    <script src="./assets/js/shop.js?v=5.6"></script>
</body>

</html>