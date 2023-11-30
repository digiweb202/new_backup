<!DOCTYPE html>
<html>
<head>
    <title>Upload Excel File</title>
</head>
<body>
    <h2>Upload Excel File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".xls,.xlsx"><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Database connection variables
        $servername = "your_servername";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        // Create connection
        $conn = new mysqli('localhost', 'root', '', 'testone');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if a file was uploaded without errors
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");

            // Skip the first row (header)
            fgetcsv($handle);

            // Prepare the insert statement
            $stmt = $conn->prepare("INSERT INTO `watches` (`Product_Type`, `Seller_SKU`, `Brand_Name`, `Update_Delete`, `Item_Name`, `Manufacturer`, `Model_Number`, `Manufacturer_Part_Number`, `Product_ID`, `Product_ID_Type`, `Recommended_Browse_Nodes`, `Product_Description`, `Your_Price`, `Quantity`, `Age_Range_Description`, `Target_Gender`, `ID`, `Model_Name`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                // Bind parameters to the statement
                $stmt->bind_param("ssssssssssssdissis", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13], $data[14], $data[15], $data[16], $data[17]);

                // Execute the statement
                $stmt->execute();
            }

            // Close the statement and the file handle
            $stmt->close();
            fclose($handle);
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>
