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

	
	include 'dbconnect.php';
	// include 'categories.php';
?>                <div class="row ">
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- card -->
                        <div class="card h-100 card-lg">
                            <div class=" px-6 py-6 ">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                        <!-- form -->
                                        <form class="d-flex" action="categories.php?search" method="POST" role="search">
                                            <input class="form-control" type="search" placeholder="Search Category" aria-label="Search" name="search_cat" id="search_cat">
                                        </form>
                                    </div>
                                    <!-- select option -->
                                    <div class="col-xl-2 col-md-4 col-12">

            <?php
              ?>
                    
                        </div>
                                </div>
                            </div>
                           
                            <!-- card body -->
                            <div class="card-body p-0">
                                <!-- table -->
                                <div class="table-responsive ">
                                    <table class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>Icon</th>
                                                <th> Name</th>
                                                <th>Proudct</th>
                                                <th>Status</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $select_category = "SELECT * FROM category WHERE cat_name LIKE '%" . $_REQUEST['search_cat'] . "%'";
                                            $res_select_category=$conn->query($select_category);
     
                                                while($row=mysqli_fetch_assoc($res_select_category))
                                                {
                ?>
                                            <tr>

                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="categoryOne">
                                                        <label class="form-check-label" for="categoryOne">

                            </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#!"> <img src="<?php echo $row['cat_img'];?>" alt="Pic"
                              class="icon-shape icon-sm"></a>
                                                </td>
                                                <td><a href="#" class="text-reset"><?php echo $row['cat_name'];?></a></td>
                                                <td>
                                                    <?php 
                                                    $count_product="select count(product_id) as t from product p inner join sub_cat sc on sc.sub_cat_id=p.sub_cat_id INNER join category c on c.cat_id=sc.cat_id where c.cat_id='$row[cat_id]';";
                                                    $res_count_product=$conn->query($count_product);
                                                   while($res=mysqli_fetch_assoc($res_count_product)) {
                                                    echo $res['t'];
                                                    }
                                                    ?>
                                                    
                                                </td>

                                                <td>
                                                    <span class="badge bg-light-primary text-dark-primary"><?php echo $row['cat_status'];?></span>
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="feather-icon icon-more-vertical fs-5"></i>
                            </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="categories.php"><i class="bi bi-trash me-3"></i>Delete</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                           <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php 

?>