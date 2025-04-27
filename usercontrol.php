<?php 
    session_start();
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    include("database.php");
    $sqlusers="SELECT * FROM users";
    $result=mysqli_query($conn,$sqlusers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
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
        <div><h1>User Panel</h1></div>


    <div class="compTable">
            <table>
                <tr>
                    <th>
                        User ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Password
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Present Cart ID
                    </th>
                    <th>
                        
                    </th>
                </tr>
                <?php 
                
                while($row=mysqli_fetch_assoc($result))
                { 
                
                $link="delete.php?user_id={$row["user_id"]}";    
                ?>
                <tr>
        
                    <td>
                        <?php echo $row["user_id"];?>
                    </td>
                    <td>
                        <?php echo $row["name"];?>
                    </td>
                    <td>
                        <?php echo $row["email"];?>
                    </td>
                    <td>
                        <?php echo $row["userpassword"];?>
                    </td>
                    <td>
                        <?php echo $row["phone_no"];?>
                    </td>
                    <td>
                        <?php echo $row["address"];?>
                    </td>
                    <td>
                        <?php echo $row["present_cart_id"];?>
                    </td>
                    <td>
                        <a href="<?php echo $link;?>">Remove user</a>
                    </td>
                </tr>
            <?php 
                }
                mysqli_close($conn);?>
            </table>
       </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>

