<?php 
    session_start();
    if($_SESSION["email"]==NULL)
    {
        header("Location: index.php");
    }
    include("database.php");
    $sqlorder="SELECT * FROM orderdetails WHERE user_id={$_SESSION["user_id"]} ORDER BY order_placement_date DESC";
    $result=mysqli_query($conn,$sqlorder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
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
       <div class="compTable">
            <table>
                <tr>
                    <th>

                    </th>
                    <th>
                        Order ID
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Order placed
                    </th>
                    <th>
                        Expected Delivery
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        
                    </th>
                </tr>
                <?php 
                $i=0;
                while($row=mysqli_fetch_assoc($result))
                { 
                $i++;
                $link="orderdetail.php?orderid={$row["order_id"]}";    
                ?>
                <tr>
                    <td>
                        <?php echo $i;?>
                    </td>
                    <td>
                        <?php echo $row["order_id"];?>
                    </td>
                    <td>
                        <?php echo $row["total_price"];?>
                    </td>
                    <td>
                        <?php echo $row["order_placement_date"];?>
                    </td>
                    <td>
                        <?php echo $row["expected_delivery_date"];?>
                    </td>
                    <td>
                        <?php echo $row["delivered_status"];?>
                    </td>
                    <td>
                        <a href="<?php echo $link;?>">View Details</a>
                    </td>
                </tr>
            <?php 
                }
                mysqli_close($conn);?>
            </table>
       </div>
         
    </main>