<?php
require 'vendor/autoload.php'; // Adjust the path based on your project structure

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create connection
$conn = new mysqli('localhost', 'root', '', 'testone');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch specific fields from the watches table
$sql = "SELECT Product_Type, Seller_SKU, Brand_Name, Update_Delete, Item_Name, Manufacturer, Model_Number, Manufacturer_Part_Number, Product_ID, Product_ID_Type, Recommended_Browse_Nodes, Product_Description,Model_Name, Your_Price, Quantity, Age_Range_Description, Target_Gender FROM watches";
$result = $conn->query($sql);

// Fetch specific fields from the watches_img table
$sql2 = "SELECT Main_Image_URL, Other_Image_URL1, Other_Image_URL2, Other_Image_URL3, Other_Image_URL4, Other_Image_URL5, Other_Image_URL6, Other_Image_URL7, Other_Image_URL8, Swatch_Image_URL FROM watches_img";
$result2 = $conn->query($sql2);

// Fetch specific fields from the watches_variation table
$sql3 = "SELECT Parentage, Variation_Theme, Relationship_Type, Parent_SKU FROM watches_variation";
$result3 = $conn->query($sql3);


$sql4 = "SELECT Target_Audience1, Target_Audience2, Target_Audience3, Target_Audience4, Gender, Bullet_Point1, Bullet_Point2, Bullet_Point3, Bullet_Point4, Bullet_Point5, Search_Terms, Band_Material, Case_Thickness, Band_Colour, Clasp_Type, Case_Material1, Crystal_Material, Display_Type, Calendar_Type, Water_Resistance_Depth, Water_Resistance_Depth_Unit_of_Measure, Additional_Features1, Additional_Features2, Additional_Features3, Additional_Features4, Additional_Features5, `Character`, Sport1, Sport2, Sport3, `Collection`, Case_Thickness_Unit_of_Measure, Band_Length, Packer, Item_Type_Name, Operating_Systems, Supported_Application, Colour_Map, Importer, Fur_Description, Band_Length_Unit, Color, Water_Resistance_Level, `Size`, Directions FROM watches_discovery";
$result4 = $conn->query($sql4);


// Fetch specific fields from the watches_product_enrichment table
$sql5 = "SELECT Dial_Colour, Bezel_Material, Bezel_Function, Movement_Type, Band_Size, Flash_Point_Unit_of_Measure FROM watches_product_enrichment";
$result5 = $conn->query($sql5);


// Fetch specific fields from the watches_product_enrichment table
$sql6 = "SELECT Band_Width, Band_Width_Unit_of_Measure, Case_Diameter, Case_Diameter_Unit_of_Measure, Case_Shape, Item_Weight, Item_Weight_Unit_of_Measure, Item_Width_Unit_Of_Measure, Item_Width, Item_Height, Unit_Count, Item_Height_Unit_of_Measure, Item_Length_Unit_of_Measure, Item_Length, Unit_Count_Type FROM watches_dimensions";
$result6 = $conn->query($sql6);

// Fetch specific fields from the watches_product_enrichment table
$sql7 = "SELECT Fulfilment_Centre_ID, Package_Length, Item_Package_Length_Unit_of_Measure, Package_Height, Item_Package_Height_Unit_of_Measure, Package_Width, Item_Package_Width_Unit_of_Measure, Package_Weight, Item_Package_Weight_Unit_of_Measure FROM watches_fulfillment";
$result7 = $conn->query($sql7);

// Fetch specific fields from the watches_product_enrichment table
$sql8 = "SELECT Warranty_Type,Warranty_Description,Safety_Warning,Legal_Disclaimer,Country_Region_Of_Origin,Battery_Composition,Is_Product_Battery,Batteries_Are_Included,Battery_Type_Size1,Battery_Type_Size2,Battery_Type_Size3,Number_Of_Batteries1,Number_Of_Batteries2,Number_Of_Batteries3,Battery_Weight,Battery_Weight_Unit_Of_Measure,Number_Of_Lithium_Metal_Cells,Number_Of_Lithium_Ion_Cells,Lithium_Battery_Packaging,Watt_Hours_Per_Battery,Lithium_Battery_Energy_Content_Unit_Of_Measure,Lithium_Content,Lithium_Battery_Weight_Unit_Of_Measure,Applicable_Dangerous_Goods_Regulations1,Applicable_Dangerous_Goods_Regulations2,Applicable_Dangerous_Goods_Regulations3,Applicable_Dangerous_Goods_Regulations4,Applicable_Dangerous_Goods_Regulations5,UN_Number,Safety_Data_Sheet_URL,Flash_Point_Celsius,HSN_Code,Material_Fabric_Regulations1,Material_Fabric_Regulations2,Material_Fabric_Regulations3,Categorisation_GHS_Pictograms1,Categorisation_GHS_Pictograms2,Categorisation_GHS_Pictograms3 FROM watches_compliance";

$result8 = $conn->query($sql8);

// Fetch specific fields from the watches_offer table
$sql9 = "SELECT Currency, `Condition`, Condition_Note, Launch_Date, Release_Date, Sale_Price, Product_Tax_Code, Sale_Start_Date, Sale_End_Date, List_Price, Restock_Date, Handling_Time, Can_Be_Gift_Messaged, Is_Gift_Wrap_Available, Is_Discontinued_By_Manufacturer, Number_Of_Items, Max_Order_Quantity, Shipping_Template, Minimum_Advertised_Price, Offer_End_Date, Offer_Start_Date, Maximum_Retail_Price FROM watches_offer";
$result9 = $conn->query($sql9);


// Check for errors in the query execution
if (!$result9) {
    printf("Error: %s\n", $conn->error);
    exit();
}

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headings to the Excel file for watches table
$headingNames = ['Product_Type', 'Seller_SKU', 'Brand_Name', 'Update_Delete', 'Item_Name', 'Manufacturer', 'Model_Number', 'Manufacturer_Part_Number', 'Product_ID', 'Product_ID_Type', 'Recommended_Browse_Nodes', 'Product_Description','Model_Name', 'Your_Price', 'Quantity', 'Age_Range_Description', 'Target_Gender'];
$columnIndex = 1;
foreach ($headingNames as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}

// Add more headings for the watches_img table
$extraHeadingNames = ['Main_Image_URL', 'Other_Image_URL1', 'Other_Image_URL2', 'Other_Image_URL3', 'Other_Image_URL4', 'Other_Image_URL5', 'Other_Image_URL6', 'Other_Image_URL7', 'Other_Image_URL8', 'Swatch_Image_URL'];
foreach ($extraHeadingNames as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}

// Add more headings for the watches_variation table
$extraHeadingNames2 = ['Parentage', 'Variation_Theme', 'Relationship_Type', 'Parent_SKU'];
foreach ($extraHeadingNames2 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}
// Add more headings for the watches_variation table
$extraHeadingNames4 = ['Target_Audience1', 'Target_Audience2', 'Target_Audience3', 'Target_Audience4', 'Gender', 'Bullet_Point1', 'Bullet_Point2', 'Bullet_Point3', 'Bullet_Point4', 'Bullet_Point5', 'Search_Terms', 'Band_Material', 'Case_Thickness', 'Band_Colour', 'Clasp_Type', 'Case_Material1', 'Crystal_Material', 'Display_Type', 'Calendar_Type', 'Water_Resistance_Depth', 'Water_Resistance_Depth_Unit_of_Measure', 'Additional_Features1', 'Additional_Features2', 'Additional_Features3', 'Additional_Features4', 'Additional_Features5', 'Character', 'Sport1', 'Sport2', 'Sport3', 'Collection', 'Case_Thickness_Unit_of_Measure', 'Band_Length', 'Packer', 'Item_Type_Name', 'Operating_Systems', 'Supported_Application', 'Colour_Map', 'Importer', 'Fur_Description', 'Band_Length_Unit', 'Color', 'Water_Resistance_Level', 'Size', 'Directions'];
foreach ($extraHeadingNames4 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}

// Add more headings for the watches_product_enrichment table
$extraHeadingNames5 = ['Dial_Colour', 'Bezel_Material', 'Bezel_Function', 'Movement_Type', 'Band_Size', 'Flash_Point_Unit_of_Measure'];
foreach ($extraHeadingNames5 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}


// Add more headings for the watches_product_enrichment table
$extraHeadingNames6 = ['Band_Width', 'Band_Width_Unit_of_Measure', 'Case_Diameter', 'Case_Diameter_Unit_of_Measure', 'Case_Shape', 'Item_Weight', 'Item_Weight_Unit_of_Measure', 'Item_Width_Unit_Of_Measure', 'Item_Width', 'Item_Height', 'Unit_Count', 'Item_Height_Unit_of_Measure', 'Item_Length_Unit_of_Measure', 'Item_Length', 'Unit_Count_Type'];
foreach ($extraHeadingNames6 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}

// Add more headings for the watches_package_info table
$extraHeadingNames7 = ['Fulfilment_Centre_ID', 'Package_Length', 'Item_Package_Length_Unit_of_Measure', 'Package_Height', 'Item_Package_Height_Unit_of_Measure', 'Package_Width', 'Item_Package_Width_Unit_of_Measure', 'Package_Weight', 'Item_Package_Weight_Unit_of_Measure'];
foreach ($extraHeadingNames7 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}


// Add more headings for the watches_discovery table
$extraHeadingNames8 = ['Warranty_Type', 'Warranty_Description', 'Safety_Warning', 'Legal_Disclaimer', 'Country_Region_Of_Origin', 'Battery_Composition', 'Is_Product_Battery', 'Batteries_Are_Included', 'Battery_Type_Size1', 'Battery_Type_Size2', 'Battery_Type_Size3', 'Number_Of_Batteries1', 'Number_Of_Batteries2', 'Number_Of_Batteries3', 'Battery_Weight', 'Battery_Weight_Unit_Of_Measure', 'Number_Of_Lithium_Metal_Cells', 'Number_Of_Lithium_Ion_Cells', 'Lithium_Battery_Packaging', 'Watt_Hours_Per_Battery', 'Lithium_Battery_Energy_Content_Unit_Of_Measure', 'Lithium_Content', 'Lithium_Battery_Weight_Unit_Of_Measure', 'Applicable_Dangerous_Goods_Regulations1', 'Applicable_Dangerous_Goods_Regulations2', 'Applicable_Dangerous_Goods_Regulations3', 'Applicable_Dangerous_Goods_Regulations4', 'Applicable_Dangerous_Goods_Regulations5', 'UN_Number', 'Safety_Data_Sheet_URL', 'Flash_Point_Celsius', 'HSN_Code', 'Material_Fabric_Regulations1', 'Material_Fabric_Regulations2', 'Material_Fabric_Regulations3', 'Categorisation_GHS_Pictograms1', 'Categorisation_GHS_Pictograms2', 'Categorisation_GHS_Pictograms3'];

foreach ($extraHeadingNames8 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}


// Add more headings for the watches_package_info table
$extraHeadingNames9 = ['Currency', 'Condition', 'Condition_Note', 'Launch_Date', 'Release_Date', 'Sale_Price', 'Product_Tax_Code', 'Sale_Start_Date', 'Sale_End_Date', 'List_Price', 'Restock_Date', 'Handling_Time', 'Can_Be_Gift_Messaged', 'Is_Gift_Wrap_Available', 'Is_Discontinued_By_Manufacturer', 'Number_Of_Items', 'Max_Order_Quantity', 'Shipping_Template', 'Minimum_Advertised_Price', 'Offer_End_Date', 'Offer_Start_Date', 'Maximum_Retail_Price'];
foreach ($extraHeadingNames9 as $heading) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $heading);
    $columnIndex++;
}


// Add data from the watches table to the Excel file
$rowIndex = 2;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $columnIndex = 1;
        foreach ($row as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}

// Add data from the watches_img table to the Excel file starting from cell R2
if ($result2->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the second table
    while ($row2 = $result2->fetch_assoc()) {
        $columnIndex = count($headingNames) + 1;
        foreach ($row2 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}

// Add data from the watches_variation table to the Excel file starting from cell R2
if ($result3->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the third table
    while ($row3 = $result3->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + 1;
        foreach ($row3 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}

// Add data from the watches_discovery table to the Excel file starting from cell R2
if ($result4->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the fourth table
    while ($row4 = $result4->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + count($extraHeadingNames2) + 1;
        foreach ($row4 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}


// Add data from the watches_product_enrichment table to the Excel file starting from cell R2
if ($result5->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the fifth table
    while ($row5 = $result5->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + count($extraHeadingNames2) + count($extraHeadingNames4) + 1;
        foreach ($row5 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}

// Add data from the watches_dimensions table to the Excel file
if ($result6->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the sixth table
    while ($row6 = $result6->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + count($extraHeadingNames2) + count($extraHeadingNames4) + count($extraHeadingNames5) + 1;
        foreach ($row6 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}

// Add data from the watches_fulfillment table to the Excel file

if ($result7->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the seventh table
    while ($row7 = $result7->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + count($extraHeadingNames2) + count($extraHeadingNames4) + count($extraHeadingNames5) + count($extraHeadingNames6) + 1;
        foreach ($row7 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}

// Add data from the watches_discovery table to the Excel file starting from cell R2
if ($result8->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the eighth table
    while ($row8 = $result8->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + count($extraHeadingNames2) + count($extraHeadingNames4) + count($extraHeadingNames5) + count($extraHeadingNames6) + count($extraHeadingNames7) + 1;
        foreach ($row8 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}
// Add data from the watches_offer table to the Excel file starting from cell R2
if ($result9->num_rows > 0) {
    $rowIndex = 2; // Reset the row index to 2 for the ninth table
    while ($row9 = $result9->fetch_assoc()) {
        $columnIndex = count($headingNames) + count($extraHeadingNames) + count($extraHeadingNames2) + count($extraHeadingNames4) + count($extraHeadingNames5) + count($extraHeadingNames6) + count($extraHeadingNames7) + count($extraHeadingNames8) + 1;
        foreach ($row9 as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
}
// Set the red background color for the headings
for ($i = 1; $i <= $columnIndex; $i++) {
    $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i) . '1';
    $sheet->getStyle($cellCoordinate)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f25a5a');
}


$date = date('Y-m-d H-i-s');
$excelFileName = 'watches_data_' . $date . '.xlsx';
$tempFilePath = sys_get_temp_dir() . '/' . $excelFileName;
$writer = new Xlsx($spreadsheet);
$writer->save($tempFilePath);

// Set the appropriate headers for file download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($tempFilePath) . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($tempFilePath));

// Clear output buffer
ob_clean();
flush();

// Read the file and output to the user
readfile($tempFilePath);

// Delete the temporary file
unlink($tempFilePath);

// Close the connection
$conn->close();
?>
