<?php 
include 'dbconnect.php';
$id=$_GET['id'];
?>

<!-- Content wrapper -->
<!-- Retrieve order report -->
<!-- 
SELECT
    o.order_id,
    o.order_date,
    c.customer_name,
    p.product_name,
    od.quantity,
    od.price,
    od.sub_total
FROM
    orders o
JOIN
    customer c ON o.customer_id = c.customer_id
JOIN
    order_item od ON o.order_id = od.order_item_id
JOIN
    product p ON od.product_id = p.product_id
WHERE
    o.order_date >= '' AND o.order_date <= ''
ORDER BY
    o.order_id;
 -->
          <?php
          $order="SELECT * from order_item ot
inner JOIN 
	order_new o on o.order_new_id=ot.order_id
INNER JOIN 
	customer c on c.customer_id=o.customer_id
INNER JOIN 
	product p on p.product_id=ot.product_id
where ot.order_id='$id';
";
          $result=$conn->query($order);
          // // echo $row['cat_id'];
          ?>
		<div class="table-responsive">
			<center>
  		<table border="dotted" class="table">
   	 	<thead>
      		<tr>
        	<th>#</th>
        	<th>Order ID</th>
        	<th>Product Name</th>
        	<!-- <th>Address</th> -->
        	<th>Order Amount</th>
        	<th>Quantity</th>
        	<th>price</th>
          <th>Customer Name</th>

        	</tr>
    	</thead>
	    <tbody class="table-border-bottom-0">
		<?php
		$i=1;
		$to=0;
		while($row=mysqli_fetch_assoc($result))
		{

		?> 
     	<tr>
        	<th scope="row"><?php echo $i?></th>

        	<td><?php echo $row['order_id'];?></td>
        	<td><?php echo $row['product_name'];?></td>
        	<!-- <td><?php #echo $row['billing_address'];?></td> -->
			<td><?php echo $row['price'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['sub_total'];?></td>
            <td><?php echo $row['customer_name']; ?></td>
          <!-- <td> -->

			<?php 
			$to +=$row['sub_total'];
			// if($row['status']=='pending')
	// 		{
	// 			echo "<a class='btn btn-success' href='?type=status&operation=pending&id=".$row['order_id']."'>Active  </a>";
	// 			// echo 'Active';
	// 		}
	// 		else if($row['status']=='approved')
	// 		{
	// 			echo "<a class='btn btn-danger' href='?type=status&operation=approved&id=".$row['order_id']."'>Deactive</a>";
	// 			// echo 'Deactive';
	// 		} 
      // else if($row['status']=='delivered'){
      //   echo "<a class='btn btn-danger' href='?type=status&operation=delivered&id=".$row['order_id']."'>Button</a>";
        
      // }
			?>
			<!-- </td> -->
			<!-- <td> -->
			<?php 
			#echo "<a class='btn btn-primary' href='manageproduct.php?id=".$row['order_id']."'>EDIT</a>";
 			?>
 			<!-- </td> -->
 			<!-- <td> --><?php  
 				#echo "<a class='btn btn-primary'  name='dele' href='?del=".$row['order_id']."'>DELETE</a>"; 
 				?>
 			<!-- </td> -->
      	</tr>

		<?php $i++; }?>
    </tbody>
</center>
  </table>
<?php echo $to; ?>
  <!-- <a href="orderreport.php" name='report' id='report' style="position: fixed; right: 980px; bottom: 20px; padding: 10px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;" >Order report</a> -->
</div>
  </body>
  </html>
