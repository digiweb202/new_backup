<!DOCTYPE html>
<html>
<body>
<?php
$targetDir = "C:/xampp1/htdocs/hit/Njoymart-Dashboard/Njoymart-Admin/dashboard/"; // specify the directory where you want to store the uploaded files


// Create connection
$conn = new mysqli('localhost', 'root', '', 'demo_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])) {
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if(!in_array($imageFileType, $allowedTypes)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            // Insert file details into the database
            $fileName = $_FILES["fileToUpload"]["name"];
            $title = $_POST['title'];

            $sql = "INSERT INTO banner (banner_title, banner_image) VALUES ('$title', '$fileName')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                echo "<script>alert('File uploaded successfully!');</script>"; // JavaScript alert after successful file upload
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><br>
  Enter title:
  <input type="text" name="title">
  <br><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
