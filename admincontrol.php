<?php 
    session_start();
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    include("database.php");
    $sqladmins="SELECT * FROM admins";
    $result=mysqli_query($conn,$sqladmins);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
        <div><h1>Admin Panel</h1></div>


    <div class="compTable">
            <table>
                <tr>
                    <th>
                        Admin ID
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
                        
                    </th>
                    <th>
                        
                    </th>
                </tr>
                <?php 
                
                while($row=mysqli_fetch_assoc($result))
                { 
                
                $ulink="updateadmin.php?admin_id={$row["admin_id"]}";   
                $dlink="delete.php?admin_id={$row["admin_id"]}"; 
                ?>
                <tr>
        
                    <td>
                        <?php echo $row["admin_id"];?>
                    </td>
                    <td>
                        <?php echo $row["admin_name"];?>
                    </td>
                    <td>
                        <?php echo $row["admin_mail"];?>
                    </td>
                    <td>
                        <?php echo $row["admin_pass"];?>
                    </td>
                    <td>
                        <?php echo $row["admin_phone"];?>
                    </td>
                    <td>
                        <?php if($row["admin_id"]!=$_SESSION["admin_id"]){?><a href="<?php echo $dlink;?>">Remove admin</a><?php }
                        else{?><p>Current user</p><?php ;}?>
                    </td>
                    <td>
                        <a href="<?php echo $ulink;?>">Update admin</a>
                    </td>
                </tr>
            <?php 
                }
                mysqli_close($conn);?>
            </table>
       </div>
       <div class="Action">
            <a href="insertadmin.php">Insert</a>
        </div> 
    </main>

    <footer>

    </footer>
    
</body>
</html>

