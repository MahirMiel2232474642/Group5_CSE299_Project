<?php 
    session_start();
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    $productid=$_GET["productid"];
    include("database.php");
    $sqltv="SELECT * FROM television WHERE product_id={$productid}";
    $result=mysqli_query($conn,$sqltv);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Panel</title>
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
        <div><h1>TV Panel</h1></div>


        <?php 
            
                $row=mysqli_fetch_assoc($result);
                $image= "images/{$row["product_id"]}.png";
                ?> 
            <div class="prodTable">
            <table>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $image;?>" alt="Tis a PC" height=400px></td>
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
            <div class="Action">
                <?php $ulink="updatetv.php?product_id={$row["product_id"]}";
                $ilink="uploadtv.php?product_id={$row["product_id"]}";?>
                <a href="<?php echo $ilink;?>">Add Image</a>
                <a href="<?php echo $ulink;?>">Edit</a>
            </div>
        </div>
   
            
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php mysqli_close($conn);?>