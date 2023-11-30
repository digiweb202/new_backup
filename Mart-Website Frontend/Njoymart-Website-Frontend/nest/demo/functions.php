<?php
function getConnection() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'demo_db';

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
function get_categoryname() {
    $conn = getConnection(); 



    $browse_cat="SELECT * from category where cat_status='active' ";
    $res_browse_cat=$conn->query($browse_cat);
    
   
    
    $category_names = array();
    if ($res_browse_cat->num_rows > 0) {
        while ($result = $res_browse_cat->fetch_assoc()) {
            $category_names[] = $result["cat_name"];
        }
    }
    
    $conn->close();
    
    return $category_names;
}

?>