<?php
$conn = new mysqli('localhost', 'root', '', 'demo_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require 'vendor/autoload.php'; // Include the autoloader provided by Composer


if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//ID through fetch inserting entirow willbe inserting 
    // Check if the file is an actual spreadsheet
    if ($fileType != "xlsx" && $fileType != "xls") {
        echo "Only XLSX and XLS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded successfully.";
            $index = 0; // Define the index variable

            echo "<script>alert('File uploaded successfully!');</script>";

            // Load the spreadsheet
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);
            $worksheet = $spreadsheet->getActiveSheet();

            foreach ($worksheet->getRowIterator() as $row) {
                if ($index == 0) {
                    $index++;
                    continue;
                }

                $rowData = $row->getCellIterator();
                $values = [];
                foreach ($rowData as $cell) {
                    $values[] = $cell->getValue();
                }


                // Process data for Table 1
                // Assuming $values is an array containing your data
                // Ensure $values array has the necessary values before proceeding
                if (!empty($values[0]) && !empty($values[1]) && !empty($values[2]) && !empty($values[3]) && !empty($values[4]) && !empty($values[5]) && !empty($values[6]) && !empty($values[7]) && !empty($values[8]) && !empty($values[9]) && !empty($values[10]) && !empty($values[11]) && !empty($values[12]) && isset($values[13]) && isset($values[14]) && !empty($values[15]) && !empty($values[16])) {
                    $stmt1 = $conn->prepare("INSERT INTO watches (Product_Type, Seller_SKU, Brand_Name, Update_Delete, Item_Name, Manufacturer, Model_Number, Manufacturer_Part_Number, Product_ID, Product_ID_Type, Recommended_Browse_Nodes, Product_Description, Model_Name, Your_Price, Quantity, Age_Range_Description, Target_Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt1->bind_param("sssssssssssssdiss", $values[0], $values[1], $values[2], $values[3], $values[4], $values[5], $values[6], $values[7], $values[8], $values[9], $values[10], $values[11], $values[12], $values[13], $values[14], $values[15], $values[16]);

                    if (!$stmt1->execute()) {
                        echo "Error: " . $stmt1->error;
                    } else {
                        echo "Data inserted successfully!";
                    }
                } else {
                    echo "Error: All values are required and must not be null.";
                }

                // Checking if all required image URLs are not empty
                if (
                    !empty($values[17]) && !empty($values[18]) && !empty($values[19]) &&
                    !empty($values[20]) && !empty($values[21]) && !empty($values[22]) &&
                    !empty($values[23]) && !empty($values[24]) && !empty($values[25]) &&
                    !empty($values[26])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt2 = $conn->prepare("INSERT INTO watches_img (Main_Image_URL, Other_Image_URL1, Other_Image_URL2, Other_Image_URL3, Other_Image_URL4, Other_Image_URL5, Other_Image_URL6, Other_Image_URL7, Other_Image_URL8, Swatch_Image_URL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    // Binding parameters to the prepared statement
                    $stmt2->bind_param("ssssssssss", $values[17], $values[18], $values[19], $values[20], $values[21], $values[22], $values[23], $values[24], $values[25], $values[26]);

                    // Executing the statement and checking for errors
                    if (!$stmt2->execute()) {
                        echo "Error: " . $stmt2->error;
                    } else {
                        echo "Image URLs inserted successfully!";
                    }
                } else {
                    // If any required image URL is empty, display an error message
                    echo "Error: All image URLs are required and must not be null.";
                }

                // Checking if all required values for watches_variation are not empty
                if (
                    !empty($values[27]) && !empty($values[28]) &&
                    !empty($values[29]) && !empty($values[30])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt3 = $conn->prepare("INSERT INTO watches_variation (Parentage, Variation_Theme, Relationship_Type, Parent_SKU) VALUES (?, ?, ?, ?)");

                    // Binding parameters to the prepared statement
                    $stmt3->bind_param("ssss", $values[27], $values[28], $values[29], $values[30]);

                    // Executing the statement and checking for errors
                    if (!$stmt3->execute()) {
                        echo "Error: " . $stmt3->error;
                    } else {
                        echo "Variation information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_variation is empty, display an error message
                    echo "Error: All values for watches_variation are required and must not be null.";
                }


                // Checking if all required values for watches_discovery are not empty
                if (
                    !empty($values[31]) && !empty($values[32]) &&
                    !empty($values[33]) && !empty($values[34]) &&
                    !empty($values[35]) && !empty($values[36]) &&
                    !empty($values[37]) && !empty($values[38]) &&
                    !empty($values[39]) && !empty($values[40]) &&
                    !empty($values[41]) && !empty($values[42]) &&
                    !empty($values[43]) && !empty($values[44]) &&
                    !empty($values[45]) && !empty($values[46]) &&
                    !empty($values[47]) && !empty($values[48]) &&
                    !empty($values[49]) && !empty($values[50]) &&
                    !empty($values[51]) && !empty($values[52]) &&
                    !empty($values[53]) && !empty($values[54]) &&
                    !empty($values[55]) && !empty($values[56]) &&
                    !empty($values[57]) && !empty($values[58]) &&
                    !empty($values[59]) && !empty($values[60]) &&
                    !empty($values[61]) && !empty($values[62]) &&
                    !empty($values[63]) && !empty($values[64]) &&
                    !empty($values[65]) && !empty($values[66]) &&
                    !empty($values[67]) && !empty($values[68]) &&
                    !empty($values[69]) && !empty($values[70]) &&
                    !empty($values[71]) && !empty($values[72]) &&
                    !empty($values[73]) && !empty($values[74]) &&
                    !empty($values[75])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt4 = $conn->prepare("INSERT INTO watches_discovery (Target_Audience1, Target_Audience2, Target_Audience3, Target_Audience4, Gender, Bullet_Point1, Bullet_Point2, Bullet_Point3, Bullet_Point4, Bullet_Point5, Search_Terms, Band_Material, Case_Thickness, Band_Colour,Clasp_Type,Case_Material1,Crystal_Material,Display_Type,Calendar_Type,Water_Resistance_Depth,Water_Resistance_Depth_Unit_of_Measure,Additional_Features1,Additional_Features2, Additional_Features3, Additional_Features4, Additional_Features5,`Character`, Sport1, Sport2, Sport3, `Collection`, Case_Thickness_Unit_of_Measure, Band_Length, Packer, Item_Type_Name, Operating_Systems, Supported_Application, Colour_Map, Importer, Fur_Description, Band_Length_Unit, Color, Water_Resistance_Level, `Size`, Directions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                    // Binding parameters to the prepared statement
                    $stmt4->bind_param(
                        "sssssssssssssssssssssssssssssssssssssssssssss",
                        $values[31],
                        $values[32],
                        $values[33],
                        $values[34],
                        $values[35],
                        $values[36],
                        $values[37],
                        $values[38],
                        $values[39],
                        $values[40],
                        $values[41],
                        $values[42],
                        $values[43],
                        $values[44],
                        $values[45],
                        $values[46],
                        $values[47],
                        $values[48],
                        $values[49],
                        $values[50],
                        $values[51],
                        $values[52],
                        $values[53],
                        $values[54],
                        $values[55],
                        $values[56],
                        $values[57],
                        $values[58],
                        $values[59],
                        $values[60],
                        $values[61],
                        $values[62],
                        $values[63],
                        $values[64],
                        $values[65],
                        $values[66],
                        $values[67],
                        $values[68],
                        $values[69],
                        $values[70],
                        $values[71],
                        $values[72],
                        $values[73],
                        $values[74],
                        $values[75]
                    );

                    // Executing the statement and checking for errors
                    if (!$stmt4->execute()) {
                        echo "Error: " . $stmt4->error;
                    } else {
                        echo "Discovery information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_discovery is empty, display an error message
                    echo "Error: All values for watches_discovery are required and must not be null.";
                }

                // Checking if all required values for watches_product_enrichment are not empty
                if (
                    !empty($values[76]) && !empty($values[77]) &&
                    !empty($values[78]) && !empty($values[79]) &&
                    !empty($values[80]) && !empty($values[81])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt5 = $conn->prepare("INSERT INTO watches_product_enrichment (Dial_Colour, Bezel_Material, Bezel_Function, Movement_Type, Band_Size, Flash_Point_Unit_of_Measure) VALUES (?, ?, ?, ?,?,?)");

                    // Binding parameters to the prepared statement
                    $stmt5->bind_param("ssssss", $values[76], $values[77], $values[78], $values[79], $values[80], $values[81]);

                    // Executing the statement and checking for errors
                    if (!$stmt5->execute()) {
                        echo "Error: " . $stmt5->error;
                    } else {
                        echo "Product enrichment information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_product_enrichment is empty, display an error message
                    echo "Error: All values for watches_product_enrichment are required and must not be null.";
                }

                // Checking if all required values for watches_dimensions are not empty
                if (
                    !empty($values[82]) && !empty($values[83]) &&
                    !empty($values[84]) && !empty($values[85]) &&
                    !empty($values[86]) && !empty($values[87]) &&
                    !empty($values[88]) && !empty($values[89]) &&
                    !empty($values[90]) && !empty($values[91]) &&
                    !empty($values[92]) && !empty($values[93]) &&
                    !empty($values[94]) && !empty($values[95]) &&
                    !empty($values[96])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt6 = $conn->prepare("INSERT INTO watches_dimensions (Band_Width, Band_Width_Unit_of_Measure, Case_Diameter, Case_Diameter_Unit_of_Measure, Case_Shape, Item_Weight, Item_Weight_Unit_of_Measure, Item_Width_Unit_Of_Measure, Item_Width, Item_Height, Unit_Count, Item_Height_Unit_of_Measure, Item_Length_Unit_of_Measure, Item_Length, Unit_Count_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    // Binding parameters to the prepared statement
                    $stmt6->bind_param(
                        "sssssssssssssss",
                        $values[82],
                        $values[83],
                        $values[84],
                        $values[85],
                        $values[86],
                        $values[87],
                        $values[88],
                        $values[89],
                        $values[90],
                        $values[91],
                        $values[92],
                        $values[93],
                        $values[94],
                        $values[95],
                        $values[96]
                    );

                    // Executing the statement and checking for errors
                    if (!$stmt6->execute()) {
                        echo "Error: " . $stmt6->error;
                    } else {
                        echo "Dimensions information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_dimensions is empty, display an error message
                    echo "Error: All values for watches_dimensions are required and must not be null.";
                }

                // Checking if all required values for watches_fulfillment are not empty
                if (
                    !empty($values[97]) && !empty($values[98]) &&
                    !empty($values[99]) && !empty($values[100]) &&
                    !empty($values[101]) && !empty($values[102]) &&
                    !empty($values[103]) && !empty($values[104]) &&
                    !empty($values[105])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt7 = $conn->prepare("INSERT INTO watches_fulfillment (Fulfilment_Centre_ID, Package_Length, Item_Package_Length_Unit_of_Measure, Package_Height, Item_Package_Height_Unit_of_Measure, Package_Width, Item_Package_Width_Unit_of_Measure, Package_Weight, Item_Package_Weight_Unit_of_Measure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    // Binding parameters to the prepared statement
                    $stmt7->bind_param(
                        "sssssssss",
                        $values[97],
                        $values[98],
                        $values[99],
                        $values[100],
                        $values[101],
                        $values[102],
                        $values[103],
                        $values[104],
                        $values[105]
                    );

                    // Executing the statement and checking for errors
                    if (!$stmt7->execute()) {
                        echo "Error: " . $stmt7->error;
                    } else {
                        echo "Fulfillment information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_fulfillment is empty, display an error message
                    echo "Error: All values for watches_fulfillment are required and must not be null.";
                }

                // Checking if all required values for watches_compliance are not empty
                if (
                    !empty($values[106]) && !empty($values[107]) &&
                    !empty($values[108]) && !empty($values[109]) &&
                    !empty($values[110]) && !empty($values[111]) &&
                    !empty($values[112]) && !empty($values[113]) &&
                    !empty($values[114]) && !empty($values[115]) &&
                    !empty($values[116]) && !empty($values[117]) &&
                    !empty($values[118]) && !empty($values[119]) &&
                    !empty($values[120]) && !empty($values[121]) &&
                    !empty($values[122]) && !empty($values[123]) &&
                    !empty($values[124]) && !empty($values[125]) &&
                    !empty($values[126]) && !empty($values[127]) &&
                    !empty($values[128]) && !empty($values[129]) &&
                    !empty($values[130]) && !empty($values[131]) &&
                    !empty($values[132]) && !empty($values[133]) &&
                    !empty($values[134]) && !empty($values[135]) &&
                    !empty($values[136]) && !empty($values[137]) &&
                    !empty($values[138]) && !empty($values[139]) &&
                    !empty($values[140]) && !empty($values[141]) &&
                    !empty($values[142]) && !empty($values[143])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt8 = $conn->prepare("INSERT INTO watches_compliance (Warranty_Type, Warranty_Description, Safety_Warning, Legal_Disclaimer, Country_Region_Of_Origin, Battery_Composition, Is_Product_Battery, Batteries_Are_Included, Battery_Type_Size1, Battery_Type_Size2, Battery_Type_Size3, Number_Of_Batteries1, Number_Of_Batteries2, Number_Of_Batteries3, Battery_Weight, Battery_Weight_Unit_Of_Measure,Number_Of_Lithium_Metal_Cells,Number_Of_Lithium_Ion_Cells,Lithium_Battery_Packaging,Watt_Hours_Per_Battery,Lithium_Battery_Energy_Content_Unit_Of_Measure,Lithium_Content,Lithium_Battery_Weight_Unit_Of_Measure,Applicable_Dangerous_Goods_Regulations1,Applicable_Dangerous_Goods_Regulations2,Applicable_Dangerous_Goods_Regulations3,Applicable_Dangerous_Goods_Regulations4,Applicable_Dangerous_Goods_Regulations5,UN_Number,Safety_Data_Sheet_URL,Flash_Point_Celsius,HSN_Code,Material_Fabric_Regulations1,Material_Fabric_Regulations2,Material_Fabric_Regulations3,Categorisation_GHS_Pictograms1,Categorisation_GHS_Pictograms2,Categorisation_GHS_Pictograms3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                    // Binding parameters to the prepared statement
                    $stmt8->bind_param(
                        "ssssssssssssssssssssssssssssssssssssss",
                        $values[106],
                        $values[107],
                        $values[108],
                        $values[109],
                        $values[110],
                        $values[111],
                        $values[112],
                        $values[113],
                        $values[114],
                        $values[115],
                        $values[116],
                        $values[117],
                        $values[118],
                        $values[119],
                        $values[120],
                        $values[121],
                        $values[122],
                        $values[123],
                        $values[124],
                        $values[125],
                        $values[126],
                        $values[127],
                        $values[128],
                        $values[129],
                        $values[130],
                        $values[131],
                        $values[132],
                        $values[133],
                        $values[134],
                        $values[135],
                        $values[136],
                        $values[137],
                        $values[138],
                        $values[139],
                        $values[140],
                        $values[141],
                        $values[142],
                        $values[143]
                    );

                    // Executing the statement and checking for errors
                    if (!$stmt8->execute()) {
                        echo "Error: " . $stmt8->error;
                    } else {
                        echo "Compliance information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_compliance is empty, display an error message
                    echo "Error: All values for watches_compliance are required and must not be null.";
                }

                // Checking if all required values for watches_offer are not empty
                if (
                    !empty($values[144]) && !empty($values[145]) &&
                    !empty($values[146]) && !empty($values[147]) &&
                    !empty($values[148]) && !empty($values[149]) &&
                    !empty($values[150]) && !empty($values[151]) &&
                    !empty($values[152]) && !empty($values[153]) &&
                    !empty($values[154]) && !empty($values[155]) &&
                    !empty($values[156]) && !empty($values[157]) &&
                    !empty($values[158]) && !empty($values[159]) &&
                    !empty($values[160]) && !empty($values[161]) &&
                    !empty($values[162]) && !empty($values[163]) &&
                    !empty($values[164]) && !empty($values[165])
                ) {
                    // If all values are present, prepare an SQL statement for insertion
                    $stmt9 = $conn->prepare("INSERT INTO watches_offer (Currency,`Condition`,Condition_Note,Launch_Date,Release_Date,Sale_Price,Product_Tax_Code,Sale_Start_Date,Sale_End_Date,List_Price,Restock_Date,Handling_Time,Can_Be_Gift_Messaged,Is_Gift_Wrap_Available,Is_Discontinued_By_Manufacturer,Number_Of_Items,Max_Order_Quantity,Shipping_Template,Minimum_Advertised_Price,Offer_End_Date,Offer_Start_Date,Maximum_Retail_Price) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                    // Binding parameters to the prepared statement
                    $stmt9->bind_param(
                        "ssssssssssssssssssssss",
                        $values[144],
                        $values[145],
                        $values[146],
                        $values[147],
                        $values[148],
                        $values[149],
                        $values[150],
                        $values[151],
                        $values[152],
                        $values[153],
                        $values[154],
                        $values[155],
                        $values[156],
                        $values[157],
                        $values[158],
                        $values[159],
                        $values[160],
                        $values[161],
                        $values[162],
                        $values[163],
                        $values[164],
                        $values[165]
                    );

                    // Executing the statement and checking for errors
                    if (!$stmt9->execute()) {
                        echo "Error: " . $stmt9->error;
                    } else {
                        echo "Offer information inserted successfully!";
                    }
                } else {
                    // If any required value for watches_offer is empty, display an error message
                    echo "Error: All values for watches_offer are required and must not be null.";
                }

                // header("Location: ../watches_categories.php");
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $conn->close();
}
?>
<?php
// Include the database connection
include '../dbconnect.php';

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
    <title>Add Product Dashboard - FreshCart </title>
    <link href="../../assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
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
                <div class="px-4 py-5">
                    <a href="index.php" class="navbar-brand">
                        <img src="../../assets/images/logo/logo (1).png" alt="">
                    </a>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column" id="sideNavbar">

                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/index.php">
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
                            <a class="nav-link active " href="../../dashboard/watches_categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">watches</span>
                                </div>
                            </a>
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
                            <a class="nav-link " href="../../dashboard/categories.php?status=active">
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
                            <a class="nav-link " href="../../dashboard/about-content.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">About Content</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/privacy-policy.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Privacy Policy</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/term-service.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Terms of Service</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/all-categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">All Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../dashboard/main-menu.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Menu</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../dashboard/sub-menu.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Sub Menu</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link  " href="../../dashboard/Banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../dashboard/featured-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Featured Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../dashboard/dbs-card-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">DBS Card Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../../dashboard/news-letter-banner.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">News Letter Banner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/featured-categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Featured Categories</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/featured-icon.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Featured Card</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/footer-links.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Footer Pages</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/social-media.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Social Media</span>
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
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/logo.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">logo</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../dashboard/hotline-contact.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"> <i class="bi bi-star"></i></span>
                                    <span class="nav-link-text">Hotline Contact</span>
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
                        <img src="../../assets/images/logo/logo (1).png" alt="">
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
                                    <h2>Upload Product List </h2>
                                    <!-- breacrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="index.php" class="text-inherit">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="excel/index.php" class="text-inherit">Upload Product List </a></li>
                                        </ol>
                                    </nav>
                                </div>
                                <!-- button -->
                                <div>
                                    <a href="../index.php" class="btn btn-light">Back</a>
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
                                    <h4 class="mb-4 h5">Select File</h4>
                                    <div class="row">
                                        <!-- input -->
                                        <div class="mb-3 col-lg-6">

                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                                Select File:<br>
                                                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                                                <br><br>

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