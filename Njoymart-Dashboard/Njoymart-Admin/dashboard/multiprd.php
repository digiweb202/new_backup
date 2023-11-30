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
// if(isset($_POST['Excel']))
// {
include 'dbconnect.php';

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



// $db = new DataSource();
// $conn = $db->getConnection();
// require_once ('c:/xampp1/htdocs/phpspreadsheet/vendor/autoload.php');
// require_once ('C:/xampp1/htdocs/hit/Njoymart-Dashboard/Njoymart-Admin/dashboard/phpspreadsheet/vendor/autoload.php');
require_once('./phpspreadsheet/vendor/autoload.php');
      $targetPath = $_FILES['excelFileToUpload']['name'];
        move_uploaded_file($_FILES['excelFileToUpload']['tmp_name'], $targetPath);

     $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        $idd=0;

$processedProductIds = [];

for ($i = 4; $i < count($spreadSheetAry); $i++) {
    $row = $spreadSheetAry[$i];
    // $productId = $row['ID'];
    echo $id = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
    echo $product_name=mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
    echo $product_title=mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
    echo $product_desc=mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
    echo $product_tax=mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
    echo $product_size=mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
    echo $product_color=mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
    echo $product_price=mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
    echo $product_SKU=mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
    echo $product_sub_cat=mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
    echo $product_cat=mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
    echo $product_img=mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]);
    echo $product_vendor_id=mysqli_real_escape_string($conn, $spreadSheetAry[$i][11 ]);
    $query="select * from sub_cat where sub_cat_name='$product_sub_cat';";
              $res=$conn->query($query);
             $r=mysqli_fetch_assoc($res);
        echo $cat_id=$r['sub_cat_id'];  

    

    if (in_array($id, $processedProductIds)) {
         $query3="INSERT INTO product_attributes(product_try_id, size, color, price, sku,status,product_img) VALUES ('$id','$product_size','$product_color','$product_price','$product_SKU','active','$product_img')";
        $res_query3=$conn->query($query3);

    }
    else
    {
     $query1 = "insert into product(product_id,product_name,product_desc,product_price,tax,sub_cat_id,product_status,vendor_id) values('$id','$product_name','$product_desc','$product_price','$product_tax','$cat_id','active','$product_vendor_id')";
    $res_query1=$conn->query($query1);
    $query2 = "INSERT INTO product_attributes(product_try_id, size, color, price, sku, status, product_img) 
    VALUES ('$id', '$product_size', '$product_color', '$product_price', '$product_SKU', 'active', '$product_img')";



    
    $res_query2=$conn->query($query2);
    }

    $processedProductIds[] = $id;
            echo "<br>";
    }
    echo "<script>window.location.href='products.php';</script>";
// }
?>