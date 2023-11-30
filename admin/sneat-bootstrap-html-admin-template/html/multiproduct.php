<?php

include 'dbconnect.php';
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// $db = new DataSource();
// $conn = $db->getConnection();
require_once ('c:/xampp/htdocs/phpspreadsheet/vendor/autoload.php');

if (isset($_POST["multipleprd"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["excelFileToUpload"]["type"], $allowedFileType)) {

        $targetPath = $_FILES['excelFileToUpload']['name'];
        move_uploaded_file($_FILES['excelFileToUpload']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        $idd=0;
        for ($i = 4; $i < $sheetCount; $i ++) {  //$i=1 if header is there
            $idd++;
            if (isset($spreadSheetAry[$i][0])) {
                $id = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $subcat = "";
            if (isset($spreadSheetAry[$i][10])) {
                $subcat = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]));
                $query="select * from sub_cat where sub_cat_name='$subcat';";
                $res=$conn->query($query);
                $r=mysqli_fetch_assoc($res);
                $cat_id=$r['sub_cat_id'];

            }
            $productname = "";
            if (isset($spreadSheetAry[$i][1])) {
                $productname = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]));
            }
            $productdesc = "";
            if (isset($spreadSheetAry[$i][4])) {
                $productdesc = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]));
            }
            $productprice = "";
            if (isset($spreadSheetAry[$i][8])) {
                $productprice = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]));
            }

            // if (!empty($name) && !empty($description) && !empty($description1)) {
                 // echo $id."<br>";
                 $subcat."<br>";
                 $productname."<br>";
                 $productdesc."<br>";
                // echo $query1 = "insert into product(product_id,product_name,product_desc,product_price,sub_cat_id,product_status) values('$idd','$productname','$productdesc','$productprice','$cat_id','active')";
                // $result=$conn->query($query1);
                // echo "<br>";
                // echo $insertId = $conn->query($query);

                if (!empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            // }
            // else
            // {
            //     echo "sorry";
            // }

        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }

}

if(isset($_POST['mul']))
{
    echo "ok";
    echo $targetPath=$_POST['fil'];

     $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        $idd=0;
        for ($i = 1; $i < $sheetCount; $i ++) {  //$i=1 if header is there
            $idd++;
            if (isset($spreadSheetAry[$i][0])) {
                 $id = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $subcat = "";
            if (isset($spreadSheetAry[$i][1])) {
                $subcat = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]));
                $query="select * from sub_cat where sub_cat_name='$subcat';";
                $res=$conn->query($query);
                $r=mysqli_fetch_assoc($res);
                // $cat_id=$r['sub_cat_id'];

            }
            $productname = "";
            if (isset($spreadSheetAry[$i][1])) {
                $productname = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]));
            }
            $productdesc = "";
            if (isset($spreadSheetAry[$i][2])) {
                 $productdesc = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]));
            }
            $productprice = "";
            if (isset($spreadSheetAry[$i][4])) {
                 $productprice = trim(mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]));
            }
            $cat_id='1';
 echo $query1 = "insert into product(product_id,product_name,product_desc,product_price,sub_cat_id,product_status) values('$idd','$productname','$productdesc','$productprice','$cat_id','active')";
    }
}






?>


















<?php  

// if(isset($_POST['multipleprd']))
// {

//     if($_FILES['excelFileToUpload']['name'] != '')
//     {
//         $allowed_extension = array('csv');
//         $file_array = explode(".", $_FILES["excelFileToUpload"]["name"]);
//         $extension = end($file_array);
//         if(in_array($extension, $allowed_extension))
//         {
//             $filename = $_FILES['excelFileToUpload']['tmp_name'];
//             if($filename==null)
//             {
//                 echo '2';
//             }
//             else
//             {
//                 if (file_exists($filename)) 
//                 {
//                     $file = fopen($filename, "r");

//                     require_once("dbconnect.php");
//                     while (($column = fgetcsv($file, 10000, ",")) !== FALSE) 
//                     {

//                         if($column['0']!='Name')
//                         {

//                             // $form_name = trim(mysqli_real_escape_string($conn,$column['0']));
//                             // $form_slug = trim(mysqli_real_escape_string($conn,$column['1']));
//                             // $form_description = trim(mysqli_real_escape_string($conn,$column['2']));
//                             // $form_short_description = trim(mysqli_real_escape_string($conn,$column['3']));
//                             // $form_listing_price = trim(mysqli_real_escape_string($conn,$column['4']));
//                             // $form_mrp = trim(mysqli_real_escape_string($conn,$column['5']));
//                             // $form_sku = trim(mysqli_real_escape_string($conn,$column['6']));
//                             // $form_stock = trim(mysqli_real_escape_string($conn,$column['7']));
//                             // $form_additional_information = trim(mysqli_real_escape_string($conn,$column['8']));
//                             // $form_product_code = trim(mysqli_real_escape_string($conn,$column['9']));
//                             // $form_pack_size = trim(mysqli_real_escape_string($conn,$column['10']));
//                             // $form_barcode = trim(mysqli_real_escape_string($conn,$column['11']));
//                             // $form_imageurl = $column['12'];

//                             $product_name=trim(mysqli_real_escape_string($conn,$column['0']));
//                             $product_desc=trim(mysqli_real_escape_string($conn,$column['1']));
//                             $product_price=trim(mysqli_real_escape_string($conn,$column['2']));
//                             $form_visibility = "active";
//                             $form_category = trim(mysqli_real_escape_string($conn,$_POST['subcategory']));

//                             if($product_desc=='shirt1'){
//                                 $form_category='11';
//                             }


//                             $primary_image="";
//                             echo $ins="INSERT INTO product(product_name,product_desc,product_price,sub_cat_id,product_status) VALUES ('$product_name','$product_desc','$product_price','$form_category','$form_visibility')";

//                             // echo $ins =("INSERT INTO product(p_name,p_slug,p_visibility,p_category,p_description,p_shor_description,p_listing_price,p_mrp,p_sku,p_stock,p_additional_information,p_primary_image,p_product_code,p_pack_size,p_barcode) VALUES('$form_name','$form_slug','$form_visibility','$form_category','$form_description','$form_short_description','$form_listing_price','$form_mrp','$form_sku','$form_stock','$form_additional_information','$primary_image','$form_product_code','$form_pack_size','$form_barcode')");
//                             // echo "<script>window.location.href='product.php';</script>";
//                         }
//                     }
//                     mysqli_close($conn);
//                 }
//             }


//             echo "done";
//         }
//         else
//         {
//             echo '3';
//         }
//     }
//     else
//     {
//         echo '4';
//     }



// // 	function insertCategoriesFromCSV($csv_file_path, $conn) {
// //     $categories = array();
// //     $prd=array();
// //     if (($handle = fopen($csv_file_path, "r")) !== FALSE) {
// //         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
// // 			$categories[] = $data[0];
// // 			$prd[]=$data[1];
// // 			$abc[]=$data[2];
// //         }
// //         echo "<br>";
// //         print_r($categories);
// //         echo "<br>";
// //         print_r($prd);
// //         echo "<br>";
// //         print_r($abc);
// //         fclose($handle);
// // $merge=array_merge($categories,$prd,$abc);
// // echo "<br>";
// // echo "<br>";

// // print_r($merge);
// // echo "<br>";
// // echo count($abc);
// // echo "<br>";

// //     $a=implode(', ', $abc); 
// //     echo $a;	
// //     $ab=explode(', ', $a); 
// //     $c=count($ab);
// //     for($i=0;$i<$c;$i++){
// //     // Insert categories into the database
// //     $insertedCategories = array();
// // 	echo $cat=$_POST['subcategory'];
// //     foreach ($categories as $prd) {

    
// // 	echo  $sql = "INSERT INTO product (product_name,product_price,sub_cat_id) VALUES ('$prd','$ab[$i]','$cat');";


// // 	}        // if ($conn->query($sql) == TRUE) {
// //             // $insertedCategories[] = $prd;
// //         // } else {
// //             // echo 'Error inserting category: ' . $prd. '<br>';
// //         // }
// //     }
// //     // header("Location:/hit/project/try/newnew.php?pname=$prd");
// // 	    // return $insertedCategories;
// // }
// // }

// // 	echo $_POST['subcategory'];

// //     $name=$_FILES['excelFileToUpload']['name'];
// // 	echo $csv_file_path = $name;

// // 	insertCategoriesFromCSV($csv_file_path, $conn);



// }
?>