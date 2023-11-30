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
$vendor_status = $_SESSION['vendor_status'];

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
<?php
// // Start the session
// session_start();
// $vendor_ids = $_SESSION['vendor_id'];
// Establish connection
$conn = new mysqli('localhost', 'root', '', 'demo_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the logo information in the database
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"], $_POST['id'])) {
    $id = $vendor_ids;

    // Handle file upload if available
    $fileName = '';
    if (!empty($_FILES["fileToUpload"]["name"])) {
        $targetDir = "D:/xampp/htdocs/hit/Mart-Website Frontend/Njoymart-Website-Frontend/nest/demo/assets/imgs/vendor/vendor_Logos/";
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($_FILES["fileToUpload"]["size"] <= 500000) {
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($imageFileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                    $fileName = basename($_FILES["fileToUpload"]["name"]);
                    echo "<script>alert('File uploaded successfully!');</script>";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            echo "Sorry, your file is too large.";
        }
    }

    // $link = $_POST['link'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE vendor SET vendor_Logo=? WHERE vendor_id=?");
    $stmt->bind_param("si", $fileName, $id);
    if ($stmt->execute()) {
        echo "Record updated successfully";
        header("Location: logo.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Retrieve the existing vendor details for pre-filling the form

if ($vendor_ids) {
    $sql = "SELECT * FROM vendor WHERE vendor_id = $vendor_ids";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existingImage = $row['vendor_Logo'];
    } else {
        echo "Vendor not found.";
        exit;
    }
}
// $conn->close();
?>

<?php

// // // Start the session
// session_start();
// $vendor_ids = $_SESSION['vendor_id'];
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
    <title>Add Product Dashboard - FreshCart </title>
    <link href="../../assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


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

    <!-- main wrapper -->

    <?php include 'headtop.php'; ?>
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
                            <a class="nav-link   " href="../dashboard/products.php">
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
                                    <h2>Update Logo</h2>
                                    <!-- breacrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="index.php" class="text-inherit">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="logo.php" class="text-inherit">Logo</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Update Logo</li>
                                        </ol>
                                    </nav>
                                </div>
                                <!-- button -->
                                <div>
                                    <a href="logo.php" class="btn btn-light">Back</a>
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
                                    <h4 class="mb-4 h5">Logo</h4>
                                    <div class="row">
                                        <!-- input -->
                                        <div class="mb-3 col-lg-6">

                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

                                                Select image to upload:<br>
                                                Current Image: <?php echo isset($existingImage) ? $existingImage : ''; ?>
                                                <input type="file" name="fileToUpload" id="fileToUpload">
                                                <br><br>
                                                <!-- Enter link:<br>
                                                <input type="text" name="link" value="<?php echo isset($existingLink) ? $existingLink : ''; ?>">
                                                <br><br> -->
                                                <input type="submit" value="Submit" name="submit">
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
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../../assets/js/theme.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../../assets/js/vendors/editor.js"></script>
    <script src="../../assets/libs/dropzone/dist/min/dropzone.min.js"></script>

</body>

</html>



<?php

        }


?>