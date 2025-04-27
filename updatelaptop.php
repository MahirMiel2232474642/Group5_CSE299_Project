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
    $sqllaptop="SELECT * FROM laptop WHERE product_id='{$productid}'";
    $result=mysqli_query($conn,$sqllaptop);
    $row=mysqli_fetch_assoc($result);

?>

<?php
    include("database.php");
    if(isset($_POST["laptopupdate"]))
    {
        
        $name = $_POST["product_name"];
        $price = $_POST["price"];
        $rating = $_POST["rating"];

        $dimensions = $_POST["dimensions"];
        $weight = $_POST["weight"];
        $os = $_POST["operating_system"];
        $brand = $_POST["brand"];
        $display = $_POST["display"];
        $resolution = $_POST["resolution"];
        $cpu = $_POST["processor"];
        $gpu = $_POST["GPU"];
        $ram = $_POST["RAM"];
        $ssd = $_POST["SSD"];
        $battery = $_POST["battery"];
        $audio = $_POST["audio"];
        $connections = $_POST["connections"];
        $fc = $_POST["front_camera"];
        $warranty = $_POST["warranty"];

        $sql="UPDATE products 
              SET product_name='{$name}', price={$price}, rating={$rating}
              WHERE product_id='{$row["product_id"]}'";
        $sql2="UPDATE laptop 
               SET product_name='{$name}', price={$price}, rating={$rating},
                   dimensions='{$dimensions}', weight='{$weight}', operating_system='{$os}', brand='{$brand}', 
                   display='{$display}', resolution='{$resolution}', processor='{$cpu}', GPU='{$gpu}', RAM='{$ram}',SSD='{$ssd}',
                   battery='{$battery}', audio='{$audio}', connections='{$connections}', front_camera='{$fc}', warranty='{$warranty}'
               WHERE product_id='{$row["product_id"]}'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
        header("Location: laptopcontrol.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Laptop</title>
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
        <div><h1>Update Laptop</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Info</h2>
                <form action="updatelaptop.php?product_id=<?php echo $productid;?>" method="post">
                    <label for="product_name">Product Name: </label><br>
                        <input type="text" id="product_name" name="product_name" value="<?php echo $row["product_name"];?>"><br>
                    <label for="price">Price: </label><br>
                        <input type="number" id="price" name="price" value="<?php echo $row["price"];?>"><br>
                    <label for="rating">Rating: </label><br>
                        <input type="number" id="rating" name="rating" value="<?php echo $row["rating"];?>"><br>
                    <label for="dimensions">Dimensions: </label><br>
                        <input type="text" id="dimensions" name="dimensions" value="<?php echo $row["dimensions"];?>"><br>
                    <label for="weight">Weight: </label><br>
                        <input type="text" id="weight" name="weight" value="<?php echo $row["weight"];?>"><br>
                    <label for="operating_system">Operating System: </label><br>
                        <input type="text" id="operating_system" name="operating_system" value="<?php echo $row["operating_system"];?>"><br>
                    <label for="brand">Brand: </label><br>
                        <input type="text" id="brand" name="brand" value="<?php echo $row["brand"];?>"><br>
                    <label for="display">Display: </label><br>
                        <input type="text" id="display" name="display" value="<?php echo $row["display"];?>"><br>
                    <label for="resolution">Resolution: </label><br>
                        <input type="text" id="resolution" name="resolution" value="<?php echo $row["resolution"];?>"><br>
                    <label for="processor">Processor: </label><br>
                        <input type="text" id="processor" name="processor" value="<?php echo $row["processor"];?>"><br>
                    <label for="GPU">GPU: </label><br>
                        <input type="text" id="GPU" name="GPU" value="<?php echo $row["GPU"];?>"><br>
                    <label for="RAM">RAM: </label><br>
                        <input type="text" id="RAM" name="RAM" value="<?php echo $row["RAM"];?>"><br>
                    <label for="SSD">SSD: </label><br>
                        <input type="text" id="SSD" name="SSD" value="<?php echo $row["SSD"];?>"><br>
                    <label for="battery">Battery: </label><br>
                        <input type="text" id="battery" name="battery" value="<?php echo $row["battery"];?>"><br>
                    <label for="audio">Audio: </label><br>
                        <input type="text" id="audio" name="audio" value="<?php echo $row["audio"];?>"><br>
                    <label for="connections">Connections:</label><br>
                        <input type="text" id="connections" name="connections" value="<?php echo $row["connections"];?>"><br>
                    <label for="front_camera">Front Camera:</label><br>
                        <input type="text" id="front_camera" name="front_camera" value="<?php echo $row["front_camera"];?>"><br>
                    <label for="warranty">Warranty:</label><br>
                    <input type="text" id="warranty" name="warranty" value="<?php echo $row["warranty"];?>"><br>
                    <input type="submit" value="Update" name="laptopupdate">
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>

<?php mysqli_close($conn);?>