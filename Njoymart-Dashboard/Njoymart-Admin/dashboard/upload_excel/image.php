<!DOCTYPE html>
<html>
<head>
    <title>Add Image</title>
</head>
<body>
    <?php
    if(isset($_POST['imageUrl'])) {
        // Get image link from request
        $imageUrl = $_POST['imageUrl'];

        // Get filename
        $fileName = basename($imageUrl);
        $fileName = date('d-M-Y_H-i-s') . '_' . $fileName;

        // Download image
        $imageData = file_get_contents($imageUrl);

        // Save image to uploads folder
        $targetPath = __DIR__ . '/uploads/' . $fileName;
        file_put_contents($targetPath, $imageData);

        // Insert image info into database
        $db = new mysqli('localhost', 'root', '', 'testone');

        $stmt = $db->prepare("INSERT INTO images_test (name, path) VALUES (?, ?)");
        $stmt->bind_param('ss', $fileName, $targetPath);
        $stmt->execute();

        echo "<script>alert('Image downloaded and saved to database');</script>";
        echo "<script>window.location = 'image.php';</script>";
        echo "$fileName";
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="imageUrl">Image URL:</label><br>
        <input type="text" id="imageUrl" name="imageUrl"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
