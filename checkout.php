<?php 
    session_start();
    if($_SESSION["email"]==NULL)
    {
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
        <div class="GTB">
            
                <?php 
                $orderid=rand();
                $date=date("Y/m/d",time()+604800);
                include("database.php");
                $sqlcart = "SELECT c.product_id, p.product_name, c.product_quantity, p.price 
                            FROM products as p, carts as c
                            WHERE cart_id={$_SESSION["present_cart"]} and user_id={$_SESSION["user_id"]}
                            and p.product_id=c.product_id";
                $result = mysqli_query($conn,$sqlcart);
                $price=0;
                $quant=0;
                while($rows=mysqli_fetch_assoc($result))
                {
                    $price+=$rows["price"]*$rows["product_quantity"];
                    $quant+=$rows["product_quantity"];
                }
                ?>
            <pre>
                Number of items: <?php echo $quant;?><br>
                Estimated delivery: <?php echo $date;?><br>
                Price: Tk. <?php echo $price;?>
            </pre>
        </div>  
        <div class="LoginForm">
            <form action="checkout.php" method="post">
                <label for="billing_address">Address: </label><br>
                <input class="addressBox" type="text" name="billing_address" id="billing_address" required><br>
                <br>
                <label for="paymentType">Payment type: </label><br>
                <input type="radio" name="paymentType" id="paymentType" value="Cash on Delivery" required><label> Cash On Delivery</label><br>
                <input type="radio" name="paymentType" id="paymentType" value="BKash"><label> Bkash</label><br>
                <input type="radio" name="paymentType" id="paymentType" value="Card"><label> Credit Card</label><br>
                <br>
                <label for="notes">Notes: (Optional) </label><br>
                <input class="addressBox" type="text" name="notes" id="notes"><br>
                <br>
                <input type="submit" value="Place Order" name="order">
            </form>
        </div>      
    </main>
<?php
    if(isset($_POST["order"]))
    {
        $address = $_POST["billing_address"];
        $address = preg_replace("/[[:punct:]]/", "", $address);
        $payment = $_POST["paymentType"];
        $note = $_POST["notes"];
        $note = preg_replace("/[[:punct:]]/", "", $note);

        $sql="INSERT INTO orderdetails (order_id, user_id, cart_id, notes, shipping_address, payment_type, total_price, expected_delivery_date) VALUES ('{$orderid}',
        '{$_SESSION["user_id"]}', '{$_SESSION["present_cart"]}','{$note}','{$address}','{$payment}','{$price}','{$date}')";
        mysqli_query($conn,$sql);

        $sqlupdate="UPDATE users SET present_cart_id=NULL WHERE user_id='{$_SESSION["user_id"]}'";
        mysqli_query($conn,$sqlupdate);

        $_SESSION["present_cart"]=NULL;


        header("Location: orderconfirm.php");
    }

    mysqli_close($conn);

?>