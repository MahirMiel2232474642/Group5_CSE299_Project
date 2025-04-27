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
    $order=$_GET["order_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
        <div><h1>Order ID: <?php echo $order;?></h1></div>
        <div class="CartList">
            <UL>
        <?php
        $cart=$_GET["cart_id"];
        $user=$_GET["user_id"];
        include("database.php");
        $sqlcart = "SELECT c.product_id, p.product_name, c.product_quantity, p.price 
                    FROM products as p, carts as c
                    WHERE cart_id={$cart} and user_id={$user}
                          and p.product_id=c.product_id";
        $result = mysqli_query($conn,$sqlcart);
        $sum=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $image= "images/{$row["product_id"]}.png";
                $price= $row["product_quantity"]*$row["price"];

                $sum=$sum+$price;
        ?>
                <li>
                    <div class="CartItem">
                        <img src="<?php echo $image;?>" alt="Tis a PC" height="75px">
                        <p><?php echo $row["product_name"];?></p>
                        <p>, Qnt: <?php echo $row["product_quantity"]?></p>
                        <p>, Tk. <?php echo $price;?></p>
                    </div>
                </li>  
        <?php }?>     
            </UL>
        </div>
        
        <div class="Total">
            Total Price: TK. <?php echo $sum;?>
            <div class="Action">
                <a href="ordercontrol.php">Back</a>
            </div>
        </div>
        <?php
        mysqli_close($conn);
        ?>  
    </main>

    <footer>

    </footer>
    
</body>
</html>

