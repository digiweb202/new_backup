
<?php
include 'dbconnect.php';
session_start();


function isProductExists($productId,$customer_id) {
    include 'dbconnect.php';
    $productId = $conn->real_escape_string($productId); // Sanitize input
    $customer_id = $conn->real_escape_string($customer_id); // Sanitize input
    // $productId='336';
    $sql = "SELECT * FROM cart WHERE product_id = '$productId' AND customer_id='$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         $row['quantity'];
            return $row['quantity'];
    }

    // Close connection
    $conn->close();

    return false; // Product does not exist
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(isset($_POST['atc']))
    {
        if($_SESSION['customer_loggedin'])
        {
           include 'dbconnect.php';

            $cid=$_SESSION['customer_id']."<br>";
            $SKU=$_POST['sku'];
            $sk_pid="Select * from product_attributes where sku='$SKU';";
            $res_sk_pid=$conn->query($sk_pid);
            while($ro=mysqli_fetch_assoc($res_sk_pid))
            {
                $item_id=$ro['attribute_id'];
                $item_price=$ro['price'];
            }
            $productExists = isProductExists($item_id,$cid); // Replace with the desired product ID
            $i=1;
            if ($productExists >= 1) 
            {
                $productExists++;
                $productExists;    
                // echo "Product exists in the table.";
                $qty=$productExists;
                $subtotal=$qty*$item_price;
                //UPDATE QUANTITY IN TABLE
                // $upd="UPDATE cart set quantity='$qty',sub_total='$subtotal' where customer_id='$cid' AND product_id='$item_id';";
                $result_upd=$conn->query($upd);
                echo "<script>window.location.href='cart2.php';</script>";
                if($result_upd)
                {
                 // echo "product updated";
                    echo "<script>window.location.href='shop-cart.php';</script>";
                }
                else
                {
                    // echo "Error updating product";
                    echo "<script>window.location.href='index.php';</script>";

                }
        
            } 
            else 
            {
                //product does not exist
                //Insert query
                $i=1;
                // echo "Product does not exist in the table.";
                $subtotal=$i*$item_price;
                echo $ins="INSERT INTO cart_new (customer_id, pa_id, quantity,sub_total) VALUES ('$cid','$item_id','$i','$subtotal')";
                // echo $ins="INSERT INTO cart (customer_id, product_id , price, quantity, sub_total) VALUES ('$cid', '$item_id', '$item_price', '$i', '$subtotal');";
                $result_insert=$conn->query($ins);
        
                if($result_insert)
                {
                    // echo "product added";
                    echo "<script>window.location.href='shop-cart.php';</script>";
                }
                else
                {
                    // echo "Error adding product";
                    // echo "<script>window.location.href='main.php';</script>";
                }
            }

        }
        else
        {
            echo "<script>alert('Please login in');
            window.location.href='page-login.php';</script>";
        }
    }

    if(isset($_POST['remove_item']))
    {
        $pid=$_POST['p_id'];
        $cid=$_POST['c_id'];

        echo $del_prd="DELETE from cart WHERE customer_id='$cid' AND product_id='$pid';";
        $del_res=$conn->query($del_prd);
        if($del_res)
        {
            // echo "Removed";
                echo "
                alert('Item deleted');
                <script>
                window.location.href='cart2.php';
                </script>
                ";

        }
        else
        {
            echo "Not removed";
        }
            // if($value['item_name']==$_POST['item_name'])
            // {
            //     unset($_SESSION['cart'][$key]);         //unset to remove product that is having same name from button 
            //     $_SESSION['cart']=array_values($_SESSION['cart']);      //array_values to rearrange the product key in cart
            //     echo "
            //     alert('Item deleted');
            //     <script>
            //     window.location.href='cart.php';
            //     </script>
            //     ";
            // }
        
    }


}


?>