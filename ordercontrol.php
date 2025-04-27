<?php 
    session_start();
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    include("database.php");
    $sqlorder="SELECT * FROM orderdetails";
    $result=mysqli_query($conn,$sqlorder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Panel</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <header>
        <h1 id="titlecard">CompariTech</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="admindash.php">Home</a></li>
            <li><a href="usercontrol.php">Users</a></li>
            <li><a href="admincontrol.php">Admins</a></li>
            <li><a href="productcontrol.php">Products</a></li>
            <li><a href="ordercontrol.php">Orders</a></li>
            <li><form action="admindash.php" method="post"><input type="submit" value="Logout" name="adminlogout"></form></li>
        </ul>
        
    </nav>

    <main>
        <div><h1>Order Panel</h1></div>


        <div class="compTable">
            <table>
                <tr>
                    <th>

                    </th>
                    <th>
                        Order ID
                    </th>
                    <th>
                        Cart ID
                    </th>
                    <th>
                        User ID
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Order placed
                    </th>
                    <th>
                        Expected Delivery
                    </th>
                    <th>
                        Notes
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Payment Type
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Cancellation Request
                    </th>
                    <th>
                        
                    </th>
                </tr>
                <?php 
                $i=0;
                while($row=mysqli_fetch_assoc($result))
                { 
                $i++;
                $ulink="updateorders.php?order_id={$row["order_id"]}"; 
                $dlink="delete.php?order_id={$row["order_id"]}";
                $clink="cartview.php?order_id={$row["order_id"]}&cart_id={$row["cart_id"]}&user_id={$row["user_id"]}";
                ?>
                <tr>
                    <td>
                        <?php echo $i;?>
                    </td>
                    <td>
                        <?php echo $row["order_id"];?>
                    </td>
                    <td>
                        <a href="<?php echo $clink;?>"><?php echo $row["cart_id"];?></a>
                    </td>
                    <td>
                        <?php echo $row["user_id"];?>
                    </td>
                    <td>
                        <?php echo $row["total_price"];?>
                    </td>
                    <td>
                        <?php echo $row["order_placement_date"];?>
                    </td>
                    <td>
                        <?php echo $row["expected_delivery_date"];?>
                    </td>
                    <td>
                        <?php echo $row["notes"];?>
                    </td>
                    <td>
                        <?php echo $row["shipping_address"];?>
                    </td>
                    <td>
                        <?php echo $row["payment_type"];?>
                    </td>
                    <td>
                        <?php echo $row["delivered_status"];?>
                    </td>
                    <td>
                        <?php echo $row["cancellation_request"];?>
                    </td>
                    <td>
                        <a href="<?php echo $dlink;?>">Delete</a>
                    </td>
                    <td>
                        <a href="<?php echo $ulink;?>">Update</a>
                    </td>
                </tr>
            <?php 
                }
                mysqli_close($conn);?>
            </table>
       </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>

