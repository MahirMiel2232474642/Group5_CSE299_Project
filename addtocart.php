<?php 
    session_start();
    if($_SESSION["email"]==NULL)
    {
        header("Location: index.php");
    }
    include("database.php");
            $product = $_GET["productid"];
            $sql1= "SELECT product_name, category_id from products where product_id='{$product}'";
            $result1=mysqli_query($conn,$sql1);
            $row=mysqli_fetch_assoc($result1);
            echo $row["product_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Added to Cart!</title>
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
        
        <?php
            if($_SESSION["present_cart"]==NULL)
        {
            $newcart=rand();
            $sqlupdate="UPDATE users SET present_cart_id='{$newcart}' WHERE user_id='{$_SESSION["user_id"]}'";
            mysqli_query($conn,$sqlupdate);
            $_SESSION["present_cart"]=$newcart; 
            $sqlinsert="INSERT INTO carts(cart_id, user_id, product_id) VALUES ('{$newcart}','{$_SESSION["user_id"]}','{$product}')";
            mysqli_query($conn,$sqlinsert);
        }
        else
        {
            $sqlexisting="SELECT product_quantity FROM carts WHERE user_id='{$_SESSION["user_id"]}' AND cart_id='{$_SESSION["present_cart"]}' AND product_id='{$product}'";
            $result=mysqli_query($conn,$sqlexisting);
            $check=mysqli_fetch_assoc($result);
            if($check>0)
            {
                $present_quantity=$check["product_quantity"];
                $present_quantity++;
                $sqlinsert="UPDATE carts SET product_quantity='{$present_quantity}' WHERE user_id='{$_SESSION["user_id"]}' AND cart_id='{$_SESSION["present_cart"]}' AND product_id='{$product}'";
                mysqli_query($conn,$sqlinsert);
            }
            else
            {
                $sqlinsert="INSERT INTO carts(cart_id, user_id, product_id) VALUES ('{$_SESSION["present_cart"]}','{$_SESSION["user_id"]}','{$product}')";
                mysqli_query($conn,$sqlinsert); 
            }
        }

        header("Location: cart.php");
        
        ?>
        
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php 
    mysqli_close($conn);
            
?> 