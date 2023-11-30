<!-- <!DOCTYPE html>
<html>
<head>
<title>Product Listing</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid black;
  padding: 8px;
}

th {
  text-align: left;
}
</style>
</head>
<body>
<h1>Product Listing</h1>
<table>
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Size</th>
    <th>Color</th>
  </tr>
 -->
  <?php
  // // Connect to the database
  // $db = new PDO('mysql:host=localhost;dbname=demo_db', 'root', '');

  // // Get the products from the database
  // $sql = 'SELECT *
  //         FROM product_try pt
  //         JOIN product_attributes pa ON pt.id = pa.product_try_id
  //         ORDER BY pa.product_try_id;';
  // $results = $db->query($sql);

  // // Loop through the products and display them on the page
  // foreach ($results as $product) {
  //   echo '<tr>';
  //   echo '<td>' . $product['product_try_id'] . '</td>';
  //   echo '<td>' . $product['name'] . '</td>';
  //   echo '<td>' . $product['description'] . '</td>';
  //   echo '<td>' . $product['price'] . '</td>';
  //   echo '<td>' . $product['size'] . '</td>';
  //   echo '<td>' . $product['color'] . '</td>';
  //   echo '</tr>';
  // }
  ?>
<!-- </table>
</body>
</html> -->




<!DOCTYPE html>
<html>
<head>
<title>Product Listing</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid black;
  padding: 8px;
}

th {
  text-align: left;
}
</style>
</head>
<body>
<h1>Product Listing</h1>
<table>
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Size</th>
    <th>Color</th>
  </tr>

  <?php
  // Connect to the database
include 'dbconnect.php';
  // Get the product from the database
  $prd_id = 1;
  $sql = "SELECT *
          FROM product_try pt
          JOIN product_attributes pa ON pt.id = pa.product_try_id
          WHERE pt.id = '$prd_id'
          ORDER BY product_try_id;";
  $results = $conn->query($sql);
$product=$results->fetch_assoc();
    
  // Get the product details

  // If the product is not found, redirect to the home page
  if ($product === false) {
    header('Location: index.php');
  }

  // Display the product details
  echo '<tr>';
  echo '<td>' . $product['product_try_id'] . '</td>';
  echo '<td>' . $product['name'] . '</td>';
  echo '<td>' . $product['description'] . '</td>';
  echo '<td>' . $product['price'] . '</td>';
  echo '<td>' . $product['size'] . '</td>';
  echo '<td>' . $product['color'] . '</td>';
  echo '</tr>';
  ?>

  <form action="#" method="post">
    <label for="size">Size:</label>
    <select name="size" id="size">
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
    </select>

    <label for="color">Color:</label>
    <select name="color" id="color">
      <option value="White">White</option>
      <option value="Blue">Blue</option>
      <option value="Black">Black</option>
      <option value="Red">Red</option>
    </select>

    <input type="submit" value="Change">
  </form>
</table>
</body>
</html>