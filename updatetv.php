<?php 
    session_start();
    if(isset($_POST["adminlogout"]))
    {
        session_destroy();
        header("Location: adminportal.php");
    }
    if($_SESSION["admin_email"]==NULL)
    {
        header("Location: adminportal.php");
    }
    include("database.php");
    $productid=$_GET["product_id"];
    $sqltv="SELECT * FROM television WHERE product_id='{$productid}'";
    $result=mysqli_query($conn,$sqltv);
    $row=mysqli_fetch_assoc($result);

?>

<?php
    include("database.php");
    if(isset($_POST["tvupdate"]))
    {
        
        $id=$_POST["product_id"];
        $name = $_POST["product_name"];
        $price = $_POST["price"];
        $rating = $_POST["rating"];

        $size = $_POST["size"];
        $display = $_POST["display"];
        $resolution = $_POST["resolution"];
        $color = $_POST["color"];
        $brand = $_POST["brand"];
        $ss = $_POST["sound_system"];
        $os = $_POST["operating_system"];
        $vc = $_POST["voice_command"];
        $ports = $_POST["ports"];
        $warranty = $_POST["warranty"];
        $panel_warranty = $_POST["panel_warranty"];

        $sql="UPDATE products 
              SET product_name='{$name}', price={$price}, rating={$rating}
              WHERE product_id='{$row["product_id"]}'";
        $sql2="UPDATE television 
               SET product_name='{$name}', price={$price}, rating={$rating},
                   size='{$size}', display='{$display}', resolution='{$resolution}', color='{$color}', brand='{$brand}',
                   sound_system='{$ss}', operating_system='{$os}', voice_command='{$vc}', ports='{$ports}',
                   warranty='{$warranty}', panel_warranty='{$panel_warranty}'
               WHERE product_id='{$row["product_id"]}'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
        header("Location: tvcontrol.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update TV</title>
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
        <div><h1>Update TV</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Info</h2>
                <form action="updatetv.php?product_id=<?php echo $productid;?>" method="post">
                    <label for="product_name">Product Name: </label><br>
                        <input type="text" id="product_name" name="product_name" value="<?php echo $row["product_name"];?>"><br>
                    <label for="price">Price: </label><br>
                        <input type="number" id="price" name="price" value="<?php echo $row["price"];?>"><br>
                    <label for="rating">Rating: </label><br>
                        <input type="number" id="rating" name="rating" value="<?php echo $row["rating"];?>"><br>
                    <label for="size">Size: </label><br>
                        <input type="text" id="size" name="size" value="<?php echo $row["size"];?>"><br>
                    <label for="display">Display: </label><br>
                        <input type="text" id="display" name="display" value="<?php echo $row["display"];?>"><br>
                    <label for="resolution">Resolution: </label><br>
                        <input type="text" id="resolution" name="resolution" value="<?php echo $row["resolution"];?>"><br>
                    <label for="color">Color: </label><br>
                        <input type="text" id="color" name="color" value="<?php echo $row["color"];?>"><br>
                    <label for="brand">Brand: </label><br>
                        <input type="text" id="brand" name="brand" value="<?php echo $row["brand"];?>"><br>
                    <label for="sound_system">Sound System: </label><br>
                        <input type="text" id="sound_system" name="sound_system" value="<?php echo $row["sound_system"];?>"><br>
                    <label for="operating_system">Operating System: </label><br>
                        <input type="text" id="operating_system" name="operating_system" value="<?php echo $row["operating_system"];?>"><br>
                    <label for="voice_command">Voice Command: </label><br>
                        <input type="text" id="voice_command" name="voice_command" value="<?php echo $row["voice_command"];?>"><br>
                    <label for="ports">Ports: </label><br>
                        <input type="text" id="ports" name="ports" value="<?php echo $row["ports"];?>"><br>
                    <label for="warranty">Warranty: </label><br>
                        <input type="text" id="warranty" name="warranty" value="<?php echo $row["warranty"];?>"><br>
                    <label for="panel_warranty">Panel Warranty: </label><br>
                        <input type="text" id="panel_warranty" name="panel_warranty" value="<?php echo $row["panel_warranty"];?>"><br>
                    <input type="submit" value="Update" name="tvupdate">
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>

<?php mysqli_close($conn);?>