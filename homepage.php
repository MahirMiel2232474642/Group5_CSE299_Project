<?php 
    session_start();
    if(isset($_POST["logout"]))
    {
        session_destroy();
        header("Location: index.php");
    }
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
    <title>Homepage</title>
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
        <h2>Our Products:</h2>  
        <div class="ProductList">
            <ul>
                <?php 


                include ("database.php");
                $sql="SELECT * FROM products";
                $result= mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {

                    while($row=mysqli_fetch_assoc($result))
                    {
                    $image= "images/{$row["product_id"]}.png";
                    $link= "product.php?productid={$row["product_id"]}";
                    ?>
                <li>
                    <a href="<?php echo $link;?>">
                        <div class="Product">
                            <img src="<?php echo $image;?>" alt="Tis a PC">
                            <p><?php echo $row["product_name"]?></p><br>
                            <p class="price">Tk. <?php echo $row["price"]?></p>
                        </div>
                    </a>
                </li>
                <?php 
                    }
                }    ?>
            </ul>
        </div>
        <?php echo"{$_SESSION["name"]}"; ?>
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php

    

    mysqli_close($conn);

?>
