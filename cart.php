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
    <title>Your Cart</title>
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
        <h2>Your cart:</h2>  
        

        <div class="CartList">
            <UL>
        <?php
        if($_SESSION["present_cart"]!=NULL)
        {
        include("database.php");
        $sqlcart = "SELECT c.product_id, p.product_name, c.product_quantity, p.price 
                    FROM products as p, carts as c
                    WHERE cart_id={$_SESSION["present_cart"]} and user_id={$_SESSION["user_id"]}
                          and p.product_id=c.product_id";
        $result = mysqli_query($conn,$sqlcart);
        $sum=0;
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $image= "images/{$row["product_id"]}.png";
                $removelink= "removefromcart.php?productid={$row["product_id"]}&cartid={$_SESSION["present_cart"]}&userid={$_SESSION["user_id"]}";
                $price= $row["product_quantity"]*$row["price"];

                $sum=$sum+$price;
        ?>
                <li>
                    <div class="CartItem">
                        <img src="<?php echo $image;?>" alt="Tis a PC" height="75px">
                        <p><?php echo $row["product_name"];?></p>
                        <p>, Qnt: <?php echo $row["product_quantity"]?></p>
                        <p>, Tk. <?php echo $price;?></p>
                        <div class="RemoveAction">
                            <a href="<?php echo $removelink;?>">Remove</a>
                        </div>
                    </div>
                </li> 
        <?php
            }

        ?>      
            </UL>
        </div>
        
        <div class="Total">
            Total Price: TK. <?php echo $sum;?>
            <div class="Action">
                <a href="checkout.php">Proceed to Checkout</a>
            </div>
            <div class="Action">
                <a href="homepage.php">Continue Shopping</a>
            </div>
        </div>
        <?php
        }
        else
        {
        ?>  
        <h2>Your cart is Empty!</h2>
        <div class="Total">
            <div class="Action">
                <a href="homepage.php">Continue Shopping</a>
            </div>
        </div>  
        <?php            
        } 
        mysqli_close($conn);
        }
        else
        {
        ?>  
        <h2>Your cart is Empty!</h2>
        <div class="Total">
            <div class="Action">
                <a href="homepage.php">Continue Shopping</a>
            </div>
        </div>  
        <?php            
        } 
        ?>
         
    </main>

