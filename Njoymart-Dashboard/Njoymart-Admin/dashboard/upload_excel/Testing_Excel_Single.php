<!DOCTYPE html>
<html>

<head>
    <title>Excel Import to MySQL</title>
</head>

<body>

    <?php
    // Change these values to your database credentials
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli('localhost', 'root', '', 'testone');

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

                // Load the spreadsheet
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);
                $worksheet = $spreadsheet->getActiveSheet();

                foreach ($worksheet->getRowIterator() as $row) {
                    if ($index == 2) {
                        continue;
                    }

                    $index++;

                    $rowData = $row->getCellIterator();
                    $values = [];
                    foreach ($rowData as $cell) {
                        $values[] = $cell->getValue();
                    }

                    // Process data for Table 1
                    $stmt1 = $conn->prepare("INSERT INTO watches (Product_Type, Seller_SKU, Brand_Name, Update_Delete, Item_Name, Manufacturer, Model_Number, Manufacturer_Part_Number, Product_ID, Product_ID_Type, Recommended_Browse_Nodes, Product_Description, Model_Name, Your_Price, Quantity, Age_Range_Description, Target_Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt1->bind_param("sssssssssssssdiss", $values[0], $values[1], $values[2], $values[3], $values[4], $values[5], $values[6], $values[7], $values[8], $values[9], $values[10], $values[11], $values[12], $values[13], $values[14], $values[15], $values[16]);
                    if (!$stmt1->execute()) {
                        echo "Error: " . $stmt1->error;
                    }
                    $stmt2 = $conn->prepare("INSERT INTO watches_img (Main_Image_URL, Other_Image_URL1, Other_Image_URL2, Other_Image_URL3, Other_Image_URL4, Other_Image_URL5, Other_Image_URL6, Other_Image_URL7, Other_Image_URL8, Swatch_Image_URL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt2->bind_param("ssssssssss", $values[16], $values[17], $values[18], $values[19], $values[20], $values[21], $values[22], $values[23], $values[24], $values[25]);
                    if (!$stmt2->execute()) {
                        echo "Error: " . $stmt2->error;
                    }
                    $stmt3 = $conn->prepare("INSERT INTO watches_variation (Parentage, Variation_Theme, Relationship_Type, Parent_SKU) VALUES (?, ?, ?, ?)");
                    $stmt3->bind_param("ssss", $values[26], $values[27], $values[28], $values[29]);
                    if (!$stmt3->execute()) {
                        echo "Error: " . $stmt3->error;
                    }
                    $stmt4 = $conn->prepare("INSERT INTO watches_discovery (Target_Audience1, Target_Audience2, Target_Audience3, Target_Audience4, Gender, Bullet_Point1, Bullet_Point2, Bullet_Point3, Bullet_Point4, Bullet_Point5, Search_Terms, Band_Material, Case_Thickness, Band_Colour, Clasp_Type, Case_Material1, Crystal_Material, Display_Type, Calendar_Type, Water_Resistance_Depth, Water_Resistance_Depth_Unit_of_Measure, Additional_Features1, Additional_Features2, Additional_Features3, Additional_Features4, Additional_Features5, `Character`, Sport1, Sport2, Sport3, `Collection`, Case_Thickness_Unit_of_Measure, Band_Length, Packer, Item_Type_Name, Operating_Systems, Supported_Application, Colour_Map, Importer, Fur_Description, Band_Length_Unit, Color, Water_Resistance_Level, `Size`, Directions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    if ($stmt4) {
                        $stmt4->bind_param("sssssssssssssssssssssssssssssssssssssssssssss", $values[30], $values[31], $values[32], $values[33], $values[34], $values[35], $values[36], $values[37], $values[38], $values[39], $values[40], $values[41], $values[42], $values[43], $values[44], $values[45], $values[46], $values[47], $values[48], $values[49], $values[50], $values[51], $values[52], $values[53], $values[54], $values[55], $values[56], $values[57], $values[58], $values[59], $values[60], $values[61], $values[62], $values[63], $values[64], $values[65], $values[66], $values[67], $values[68], $values[69], $values[70], $values[71], $values[72], $values[73], $values[74], $values[75]);

                        if (!$stmt4->execute()) {
                            echo "Error: " . $stmt4->error;
                        }
                    } else {
                        echo "Error in preparing the statement: " . $conn->error;
                    }


                    $stmt5 = $conn->prepare("INSERT INTO watches_product_enrichment (Dial_Colour, Bezel_Material, Bezel_Function, Movement_Type, Band_Size, Flash_Point_Unit_of_Measure) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt5->bind_param("ssssss", $values[76], $values[77], $values[78], $values[79], $values[80], $values[81]);
                    if (!$stmt5->execute()) {
                        echo "Error: " . $stmt5->error;
                    }

                    $stmt6 = $conn->prepare("INSERT INTO watches_dimensions (Band_Width, Band_Width_Unit_of_Measure, Case_Diameter, Case_Diameter_Unit_of_Measure, Case_Shape, Item_Weight, Item_Weight_Unit_of_Measure, Item_Width_Unit_Of_Measure, Item_Width, Item_Height, Unit_Count, Item_Height_Unit_of_Measure, Item_Length_Unit_of_Measure, Item_Length, Unit_Count_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt6->bind_param("sssssssssssssss", $values[82], $values[83], $values[84], $values[85], $values[86], $values[87], $values[88], $values[89], $values[90], $values[91], $values[92], $values[93], $values[94], $values[95], $values[96]);
                    if (!$stmt6->execute()) {
                        echo "Error: " . $stmt6->error;
                    }

                    $stmt7 = $conn->prepare("INSERT INTO watches_fulfillment (Fulfilment_Centre_ID, Package_Length, Item_Package_Length_Unit_of_Measure, Package_Height, Item_Package_Height_Unit_of_Measure, Package_Width, Item_Package_Width_Unit_of_Measure, Package_Weight, Item_Package_Weight_Unit_of_Measure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt7->bind_param("sssssssss", $values[97], $values[98], $values[99], $values[100], $values[101], $values[102], $values[103], $values[104], $values[105]);
                    if (!$stmt7->execute()) {
                        echo "Error: " . $stmt7->error;
                    }
                    $stmt = $conn->prepare("INSERT INTO watches_compliance 
                    (Warranty_Type,Warranty_Description,Safety_Warning,Legal_Disclaimer,Country_Region_Of_Origin,Battery_Composition,Is_Product_Battery,Batteries_Are_Included,Battery_Type_Size1,Battery_Type_Size2,Battery_Type_Size3,Number_Of_Batteries1,Number_Of_Batteries2,Number_Of_Batteries3,Battery_Weight,Battery_Weight_Unit_Of_Measure,Number_Of_Lithium_Metal_Cells,Number_Of_Lithium_Ion_Cells,Lithium_Battery_Packaging,Watt_Hours_Per_Battery,Lithium_Battery_Energy_Content_Unit_Of_Measure,Lithium_Content,Lithium_Battery_Weight_Unit_Of_Measure,Applicable_Dangerous_Goods_Regulations1,Applicable_Dangerous_Goods_Regulations2,
                    Applicable_Dangerous_Goods_Regulations3,Applicable_Dangerous_Goods_Regulations4,Applicable_Dangerous_Goods_Regulations5,UN_Number,Safety_Data_Sheet_URL,Flash_Point_Celsius,HSN_Code,Material_Fabric_Regulations1,Material_Fabric_Regulations2,Material_Fabric_Regulations3,Categorisation_GHS_Pictograms1,Categorisation_GHS_Pictograms2,Categorisation_GHS_Pictograms3) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                if ($stmt) {
                    $stmt->bind_param(
                        "sssssssssssssssssssssssssssssssssssssssss  ",
                        $values[106],$values[107],$values[108],$values[109],$values[110],$values[111],$values[112],$values[113],$values[114],$values[115],$values[116],$values[117],$values[118],$values[119], $values[120],$values[121],$values[122],$values[123],$values[124],$values[125],$values[126],$values[127],$values[128],$values[129],$values[130],$values[131],$values[132],$values[133],$values[134],$values[135],$values[136],$values[137],$values[138],$values[139],$values[140],$values[141],$values[142],$values[143]
                    );
                
                    if (!$stmt->execute()) {
                        echo "Error: " . $stmt->error;
                    }
                } else {
                    echo "Error in preparing the statement: " . $conn->error;
                }
                

                    $stmt9 = $conn->prepare("INSERT INTO watches_offer (Currency, `Condition`, Condition_Note, Launch_Date, Release_Date, Sale_Price, Product_Tax_Code, Sale_Start_Date, Sale_End_Date, List_Price, Restock_Date, Handling_Time, Can_Be_Gift_Messaged, Is_Gift_Wrap_Available, Is_Discontinued_By_Manufacturer, Number_Of_Items, Max_Order_Quantity, Shipping_Template, Minimum_Advertised_Price, Offer_End_Date, Offer_Start_Date, Maximum_Retail_Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    if ($stmt9) {
                        $stmt9->bind_param("ssssssssssssssssssssssss", $values[144], $values[145], $values[146], $values[147], $values[148], $values[149], $values[150], $values[151], $values[152], $values[153], $values[154], $values[155], $values[156], $values[157], $values[158], $values[159], $values[160], $values[161], $values[162], $values[163], $values[164], $values[165], $values[166]);

                        if (!$stmt9->execute()) {
                            echo "Error: " . $stmt9->error;
                        }
                    } else {
                        echo "Error in preparing the statement: " . $conn->error;
                    }
                }

                // // Print data from table1
                // $result1 = $conn->query("SELECT * FROM table1");
                // if ($result1->num_rows > 0) {
                //     echo "<h2>Data from Table 1:</h2>";
                //     echo "<table border='1'><tr><th>ID</th><th>Column1</th><th>Column2</th><th>Column3</th></tr>";
                //     while ($row = $result1->fetch_assoc()) {
                //         echo "<tr><td>" . $row["id"] . "</td><td>" . $row["column1"] . "</td><td>" . $row["column2"] . "</td><td>" . $row["column3"] . "</td></tr>";
                //     }
                //     echo "</table>";
                // } else {
                //     echo "No data found in Table 1.";
                // }

                // // Print data from table2
                // $result2 = $conn->query("SELECT * FROM table2");
                // if ($result2->num_rows > 0) {
                //     echo "<h2>Data from Table 2:</h2>";
                //     echo "<table border='1'><tr><th>ID</th><th>Column4</th><th>Column5</th><th>Column6</th></tr>";
                //     while ($row = $result2->fetch_assoc()) {
                //         echo "<tr><td>" . $row["id"] . "</td><td>" . $row["column4"] . "</td><td>" . $row["column5"] . "</td><td>" . $row["column6"] . "</td></tr>";
                //     }
                //     echo "</table>";
                // } else {
                //     echo "No data found in Table 2.";
                // }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $conn->close();
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Select Excel File to Upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>

</body>

</html>