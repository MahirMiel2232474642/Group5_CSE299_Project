<?php 
    session_start();
    if(isset($_POST["adminlogout"]))
    {
        session_destroy();
        header("Location: adminportal.php");
    }
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    include("database.php");
    $orderid=$_GET["order_id"];
    $sqlorder="SELECT * FROM orderdetails WHERE order_id='{$orderid}'";
    $result=mysqli_query($conn,$sqlorder);
    $row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Admin</title>
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
        <div><h1>Update order</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Update</h2>
                <form action="updateorders.php?order_id=<?php echo $orderid;?>" method="post">
                    <label for="Status">Delivery Status: </label><br>
                    <input type="radio" name="Status" id="Status" value="Undelivered" required <?php if($row["delivered_status"]=="Undelivered"){?> checked="checked"<?php }?>>
                                    <label> Undelivered</label><br>
                    <input type="radio" name="Status" id="Status" value="Delivered" <?php if($row["delivered_status"]=="Delivered"){?> checked="checked"<?php }?>>
                                    <label> Delivered</label><br>
                    <br>
                    <label for="Delivery_date">Expected delivery: </label><br>
                    <input type="date" id="Delivery_date" name="Delivery_date" value="<?php echo $row["expected_delivery_date"];?>"><br>
                    <input type="submit" value="Update" name="orderupdate">
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php
    include("database.php");
    if(isset($_POST["orderupdate"]))
    {
            $delivered_status=$_POST["Status"];
            $expected_delivery_date=$_POST["Delivery_date"];

        $sql="UPDATE orderdetails 
              SET delivered_status='{$delivered_status}', expected_delivery_date='{$expected_delivery_date}'
              WHERE order_id='{$orderid}'";
        $result2=mysqli_query($conn,$sql);

        header("Location: ordercontrol.php");
    }

    mysqli_close($conn);

?>
