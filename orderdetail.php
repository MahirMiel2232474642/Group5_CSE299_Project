<?php 
    session_start();
    if($_SESSION["email"]==NULL)
    {
        header("Location: index.php");
    }
    $orderid=$_GET["orderid"];
    include("database.php");
    $sqliorder="SELECT * FROM orderdetails where order_id={$orderid}";
    $resultorder=mysqli_query($conn,$sqliorder);
    $order=mysqli_fetch_assoc($resultorder);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 id="titlecard">CompariTech</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="compare.php">Compare</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="updateprofile.php">Update Profile</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><form action="homepage.php" method="post"><input type="submit" value="Logout" name="logout"></form></li>
        </ul>
    </nav>

    <main>   
        <div class="SearchBar">
            <form action="search.php" method="get">
                <input type="text" name="Searchterm" id="search" placeholder="Search....">
                <input type="submit" value="Go!" name="Search">
            </form>
        </div> 
        <h3>Your Order: </h3>
        <div class="GTB">
                <p>Order ID: <?php echo $order["order_id"];?></p><br>
                <p>Items: </p><br>
                <ol>
                <?php
                    $sqlcart="SELECT c.product_id, product_name, product_quantity FROM products as p, carts as c WHERE cart_id='{$order["cart_id"]}' and c.product_id=p.product_id";
                    $resultcart=mysqli_query($conn,$sqlcart);
                    while($row=mysqli_fetch_assoc($resultcart))
                    {
                    $link="product.php?productid={$row["product_id"]}";
                ?>
                    <li><a href="<?php echo $link;?>"><?php echo $row["product_name"];?></a> x<?php echo $row["product_quantity"];?></li>
                    <br>
                <?php        
                    }
                ?>
                </ol>
                <p>Total Price: <?php echo $order["total_price"];?></p><br>
                <p>Order Date: <?php echo $order["order_placement_date"];?></p><br>
                <p>Estimated Delivery Date: <?php echo $order["expected_delivery_date"];?></p><br>
                <p>Status: <?php echo $order["delivered_status"];?></p><br>
        </div>
        <div class="RemoveAction2">
            <?php $rlink="ordercancel.php?order_id={$orderid}";?>
                <a href="<?php echo $rlink;?>"> Request Cancel</a>
        </div>
        
         
    </main>
    <?php mysqli_close($conn);?>