<?php
require 'dbconnect.php'; // Include your database connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];

    // Fetch sub-categories based on the selected category
    $qry = "SELECT * FROM sub_cat WHERE cat_id = '$categoryId'";
    $result = $conn->query($qry);

    $subCategories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $subCategories[] = $row;
    }

    // Send sub-categories as JSON response
    echo json_encode($subCategories);
}
?>
