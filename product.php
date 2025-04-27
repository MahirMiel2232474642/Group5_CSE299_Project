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
            $category=mysqli_fetch_assoc($result1);
            $link = "addtocart.php?productid={$product}";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category["product_name"];?></title>
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
            
            if($category["category_id"]=="Laptop")
            {
                $sql2="SELECT * FROM laptop where product_id='{$product}'";
                $result2=mysqli_query($conn,$sql2);
                $row=mysqli_fetch_assoc($result2);
                $image= "images/{$row["product_id"]}.png";
                ?> 
            <div class="prodTable">
                <table>
                    <tr>
                        <td></td>
                        <td><img src="<?php echo $image;?>" alt="Tis a PC"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $row["product_name"];?></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>TK. <?php echo $row["price"];?></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td><?php echo $row["rating"];?> stars</td>
                    </tr>
                    <tr>
                        <td>Warranty</td>
                        <td><?php echo $row["warranty"];?></td>
                    </tr>
                    <tr>
                        <td>Dimensions</td>
                        <td><?php echo $row["dimensions"];?></td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td><?php echo $row["weight"];?></td>
                    </tr>
                    <tr>
                        <td>Brand</td>
                        <td><?php echo $row["brand"];?></td>
                    </tr>
                    <tr>
                        <td>Processor</td>
                        <td><?php echo $row["processor"];?></td>
                    </tr>
                    <tr>
                        <td>Battery</td>
                        <td><?php echo $row["battery"];?></td>
                    </tr>
                    <tr>
                        <td>GPU</td>
                        <td><?php echo $row["GPU"];?></td>
                    </tr>
                    <tr>
                        <td>OS</td>
                        <td><?php echo $row["operating_system"];?></td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td><?php echo $row["RAM"];?></td>
                    </tr>
                    <tr>
                        <td>SSD</td>
                        <td><?php echo $row["SSD"];?></td>
                    </tr>
                    <tr>
                        <td>Display</td>
                        <td><?php echo $row["display"];?></td>
                    </tr>
                    <tr>
                        <td>Resolution</td>
                        <td><?php echo $row["resolution"];?></td>
                    </tr>
                    <tr>
                        <td>Audio</td>
                        <td><?php echo $row["audio"];?></td>
                    </tr>
                    <tr>
                        <td>Front Camera</td>
                        <td><?php echo $row["front_camera"];?></td>
                    </tr>
                    <tr>
                        <td>Connectivity</td>
                        <td><?php echo $row["product_name"];?></td>
                    </tr>
                </table>
            </div>
            <div class="Action">
                <?php $clink="comparepc.php?product1={$row["product_id"]}";?>
                <a href="<?php echo $clink;?>">Compare</a>
                <a href="<?php echo $link;?>">Add to Cart</a>
            </div> 
            <div class="Reviews">

    </div>
    <?php   
            }
            else if($category["category_id"]=="Phone")
            {
                    $sql2="SELECT * FROM phone where product_id='{$product}'";
                    $result2=mysqli_query($conn,$sql2);
                    $row=mysqli_fetch_assoc($result2);
                    $image= "images/{$row["product_id"]}.png";
    ?>
            <div class="prodTable">
            <table>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $image;?>" alt="Tis a Phone"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $row["product_name"];?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>Tk. <?php echo $row["price"];?></td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td><?php echo $row["rating"];?> stars</td>
                </tr>
                <tr>
                    <td>Warranty</td>
                    <td><?php echo $row["warranty"];?></td>
                </tr>
                <tr>
                    <td>Dimensions</td>
                    <td><?php echo $row["dimensions"];?></td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><?php echo $row["weight"];?></td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><?php echo $row["brand"];?></td>
                </tr>
                <tr>
                    <td>Battery</td>
                    <td><?php echo $row["battery"];?></td>
                </tr>
                <tr>
                    <td>CPU</td>
                    <td><?php echo $row["CPU"];?></td>
                </tr>
                <tr>
                    <td>GPU</td>
                    <td><?php echo $row["GPU"];?></td>
                </tr>
                <tr>
                    <td>OS</td>
                    <td><?php echo $row["os_version"];?></td>
                </tr>
                <tr>
                    <td>Memory</td>
                    <td><?php echo $row["memory"];?></td>
                </tr>
                <tr>
                    <td>SIM</td>
                    <td><?php echo $row["SIM"];?></td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td><?php echo $row["display"];?></td>
                </tr>
                <tr>
                    <td>Resolution</td>
                    <td><?php echo $row["resolution"];?></td>
                </tr>
                <tr>
                    <td>Back Camera</td>
                    <td><?php echo $row["back_camera"];?></td>
                </tr>
                <tr>
                    <td>Front Camera</td>
                    <td><?php echo $row["front_camera"];?></td>
                </tr>
                <tr>
                    <td>Connectivity</td>
                    <td><?php echo $row["connections"];?></td>
                </tr>
            </table>
        </div>
        <div class="Action">
            <?php $clink="comparephone.php?product1={$row["product_id"]}";?>
            <a href="<?php echo $clink;?>">Compare</a>
            <a href="<?php echo $link;?>">Add to Cart</a>
        </div> 
        <div class="Reviews">

        </div>
    <?php  
            } 
           else if($category["category_id"]=="Television")
           {
                   $sql2="SELECT * FROM television where product_id='{$product}'";
                   $result2=mysqli_query($conn,$sql2);
                   $row=mysqli_fetch_assoc($result2);
                   $image= "images/{$row["product_id"]}.png";
   ?>
   <div class="prodTable">
            <table>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $image;?>" alt="Tis a PC"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $row["product_name"];?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>Tk. <?php echo $row["price"];?></td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td><?php echo $row["rating"];?> stars</td>
                </tr>
                <tr>
                    <td>Warranty</td>
                    <td><?php echo $row["warranty"];?></td>
                </tr>
                <tr>
                    <td>Panel Warranty</td>
                    <td><?php echo $row["panel_warranty"];?></td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><?php echo $row["brand"];?></td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td><?php echo $row["display"];?></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td><?php echo $row["size"];?></td>
                </tr>
                <tr>
                    <td>Resolution</td>
                    <td><?php echo $row["resolution"];?></td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td><?php echo $row["color"];?></td>
                </tr>
                <tr>
                    <td>OS</td>
                    <td><?php echo $row["operating_system"];?></td>
                </tr>
                <tr>
                    <td>Ports</td>
                    <td><?php echo $row["ports"];?></td>
                </tr>
                <tr>
                    <td>Sound System</td>
                    <td><?php echo $row["sound_system"];?></td>
                </tr>
                <tr>
                    <td>Voice Command</td>
                    <td><?php echo $row["voice_command"];?></td>
                </tr>
            </table>
        </div>
        <div class="Action">
            <?php $clink="comparetelevision.php?product1={$row["product_id"]}";?>
            <a href="<?php echo $clink;?>">Compare</a>
            <a href="<?php echo $link;?>">Add to Cart</a>
        </div> 
        <div class="Reviews">

        </div>
   <?php }?>
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php 
    mysqli_close($conn);
            
?> 