<?php 
    session_start();
    if($_SESSION["email"]==NULL)
    {
        header("Location: index.php");
    }
    if(isset($_GET["product1"]))
        $prod1=$_GET["product1"];
    else
        $prod1=NULL;

    if(isset($_GET["product2"]))
        $prod2=$_GET["product2"];
    else
        $prod2=NULL;

    if(isset($_GET["product3"]))
        $prod3=$_GET["product3"];
    else
        $prod3=NULL;

    include("database.php");
    $sqlprod="SELECT * FROM phone";

    $sql1="SELECT * FROM phone WHERE product_id='{$prod1}'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $img1="images/{$prod1}.png";
    $link1="product.php?productid={$prod1}";

    $sql2="SELECT * FROM phone WHERE product_id='{$prod2}'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $img2="images/{$prod2}.png";
    $link2="product.php?productid={$prod2}";

    $sql3="SELECT * FROM phone WHERE product_id='{$prod3}'";
    $result3=mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_assoc($result3);
    $img3="images/{$prod3}.png";
    $link3="product.php?productid={$prod3}";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Comp</title>
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
        
        <div class="dropdown">
            <button><?php if($prod1==NULL) echo "Select Product 1"; else echo "{$row1["product_name"]}";?></button>
            <div class="content">
                <?php
                $result=mysqli_query($conn,$sqlprod);
                while($row=mysqli_fetch_assoc($result))
                {
                if($prod2==NULL && $prod3==NULL)
                    $link="comparephone.php?product1={$row["product_id"]}";
                else if($prod2!=NULL && $prod3==NULL)
                    $link="comparephone.php?product1={$row["product_id"]}&product2={$prod2}";
                else if($prod2==NULL && $prod3!=NULL)
                    $link="comparephone.php?product1={$row["product_id"]}&product3={$prod3}";
                else
                    $link="comparephone.php?product1={$row["product_id"]}&product2={$prod2}&product3={$prod3}";
                ?>
                    <a href=<?php echo $link;?>><?php echo $row["product_name"];?></a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <button><?php if($prod2==NULL) echo "Select Product 2"; else echo "{$row2["product_name"]}";?></button>
            <div class="content">
                <?php
                $result=mysqli_query($conn,$sqlprod);
                while($row=mysqli_fetch_assoc($result))
                {
                if($prod1==NULL && $prod3==NULL)
                    $link="comparephone.php?product2={$row["product_id"]}";
                else if($prod1!=NULL && $prod3==NULL)
                    $link="comparephone.php?product1={$prod1}&product2={$row["product_id"]}";
                else if($prod1==NULL && $prod3!=NULL)
                    $link="comparephone.php?product2={$row["product_id"]}&product3={$prod3}";
                else
                    $link="comparephone.php?product1={$prod1}&product2={$row["product_id"]}&product3={$prod3}";
                ?>
                    <a href=<?php echo $link;?>><?php echo $row["product_name"];?></a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <button><?php if($prod3==NULL) echo "Select Product 3"; else echo "{$row3["product_name"]}";?></button>
            <div class="content">
                <?php
                $result=mysqli_query($conn,$sqlprod);
                while($row=mysqli_fetch_assoc($result))
                {
                if($prod1==NULL && $prod2==NULL)
                    $link="comparephone.php?product3={$row["product_id"]}";
                else if($prod1!=NULL && $prod2==NULL)
                    $link="comparephone.php?product1={$prod1}&product3={$row["product_id"]}";
                else if($prod1==NULL && $prod2!=NULL)
                    $link="comparephone.php?product2={$prod2}&product3={$row["product_id"]}";
                else
                    $link="comparephone.php?product1={$prod1}&product2={$prod2}&product3={$row["product_id"]}";
                ?>
                    <a href=<?php echo $link;?>><?php echo $row["product_name"];?></a>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="compTable">
            <table>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $img1?>" alt=""></td>
                    <td><img src="<?php echo $img2?>" alt=""></td>
                    <td><img src="<?php echo $img3?>" alt=""></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["product_name"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["product_name"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["product_name"]}";?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "Tk. {$row1["price"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "Tk. {$row2["price"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "Tk. {$row3["price"]}";?></td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["rating"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["rating"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["rating"]}";?></td>
                </tr>
                <tr>
                    <td>Warranty</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["warranty"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["warranty"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["warranty"]}";?></td>
                </tr>
                <tr>
                    <td>Dimensions</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["dimensions"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["dimensions"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["dimensions"]}";?></td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["weight"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["weight"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["weight"]}";?></td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["brand"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["brand"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["brand"]}";?></td>
                </tr>
                <tr>
                    <td>Battery</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["battery"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["battery"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["battery"]}";?></td>
                </tr>
                <tr>
                    <td>CPU</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["CPU"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["CPU"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["CPU"]}";?></td>
                </tr>
                <tr>
                    <td>GPU</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["GPU"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["GPU"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["GPU"]}";?></td>
                </tr>
                <tr>
                    <td>OS</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["os_version"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["os_version"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["os_version"]}";?></td>
                </tr>
                <tr>
                    <td>Memory</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["memory"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["memory"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["memory"]}";?></td>
                </tr>
                <tr>
                    <td>SIM</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["SIM"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["SIM"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["SIM"]}";?></td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["display"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["display"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["display"]}";?></td>
                </tr>
                <tr>
                    <td>Resolution</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["resolution"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["resolution"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["resolution"]}";?></td>
                </tr>
                <tr>
                    <td>Back Camera</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["back_camera"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["back_camera"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["back_camera"]}";?></td>
                </tr>
                <tr>
                    <td>Front Camera</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["front_camera"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["front_camera"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["front_camera"]}";?></td>
                </tr>
                <tr>
                    <td>Connectivity</td>
                    <td><?php if($prod1==NULL) echo "--"; else echo "{$row1["connections"]}";?></td>
                    <td><?php if($prod2==NULL) echo "--"; else echo "{$row2["connections"]}";?></td>
                    <td><?php if($prod3==NULL) echo "--"; else echo "{$row3["connections"]}";?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php if($prod1==NULL) echo "--"; else{?><a href="<?php echo $link1;?>">Link</a><?php }?></td>
                    <td><?php if($prod2==NULL) echo "--"; else{?><a href="<?php echo $link2;?>">Link</a><?php }?></td>
                    <td><?php if($prod3==NULL) echo "--"; else{?><a href="<?php echo $link3;?>">Link</a><?php }?></td>
                </tr>
            </table>
        </div>
        
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php mysqli_close($conn);?>