<?php 
    session_start();
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    include("database.php");
    $sqlphone="SELECT * FROM phone";
    $result=mysqli_query($conn,$sqlphone);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Panel</title>
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
        <div><h1>Phone Panel</h1></div>


    <div class="compTable">
            <table>
                <tr>
                    <th>
                        Product ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Rating
                    </th>
                    <th>
                        
                    </th>
                </tr>
                <?php 
                
                while($row=mysqli_fetch_assoc($result))
                { 
                
                    $link="phonedetails.php?productid={$row["product_id"]}";    
                ?>
                <tr>
        
                    <td>
                        <?php echo $row["product_id"];?>
                    </td>
                    <td>
                        <?php echo $row["product_name"];?>
                    </td>
                    <td>
                        <?php echo $row["price"];?>
                    </td>
                    <td>
                        <?php echo $row["rating"];?>
                    </td>
                    <td>
                        <a href="<?php echo $link;?>">Details</a>
                    </td>
                </tr>
            <?php 
                }
                mysqli_close($conn);?>
            </table>
       </div>
       <div class="Action">
            <a href="insertphone.php">Insert</a>
        </div> 
    </main>

    <footer>

    </footer>
    
</body>
</html>

