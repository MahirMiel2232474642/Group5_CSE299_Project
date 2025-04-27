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
    $sqlphone="SELECT * FROM phone WHERE product_id='{$productid}'";
    $result=mysqli_query($conn,$sqlphone);
    $row=mysqli_fetch_assoc($result);

?>

<?php
    include("database.php");
    if(isset($_POST["phoneupdate"]))
    {
        
        $name = $_POST["product_name"];
        $price = $_POST["price"];
        $rating = $_POST["rating"];

        $dimensions = $_POST["dimensions"];
        $weight = $_POST["weight"];
        $os = $_POST["os_version"];
        $brand = $_POST["brand"];
        $display = $_POST["display"];
        $resolution = $_POST["resolution"];
        $cpu = $_POST["CPU"];
        $gpu = $_POST["GPU"];
        $mem = $_POST["memory"];
        $battery = $_POST["battery"];
        $sim = $_POST["SIM"];
        $connections = $_POST["connections"]; 
        $fc = $_POST["front_camera"];
        $bc = $_POST["back_camera"];
        $warranty = $_POST["warranty"];

        $sql="UPDATE products 
              SET product_name='{$name}', price={$price}, rating={$rating}
              WHERE product_id='{$row["product_id"]}'";
        $sql2="UPDATE phone 
               SET product_name='{$name}', price={$price}, rating={$rating},
                   dimensions='{$dimensions}', weight='{$weight}', os_version='{$os}', brand='{$brand}', 
                   display='{$display}', resolution='{$resolution}', CPU='{$cpu}', GPU='{$gpu}', memory='{$mem}',battery='{$battery}',
                   SIM='{$sim}', connections='{$connections}', front_camera='{$fc}', back_camera='{$bc}', warranty='{$warranty}'
               WHERE product_id='{$row["product_id"]}'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
        header("Location: phonecontrol.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Phone</title>
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
        <div><h1>Update Phone</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Info</h2>
                <form action="updatephone.php?product_id=<?php echo $productid;?>" method="post">
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
                    <label for="os_version">OS Version: </label><br>
                        <input type="text" id="os_version" name="os_version" value="<?php echo $row["os_version"];?>"><br>
                    <label for="brand">Brand: </label><br>
                        <input type="text" id="brand" name="brand" value="<?php echo $row["brand"];?>"><br>
                    <label for="display">Display: </label><br>
                        <input type="text" id="display" name="display" value="<?php echo $row["display"];?>"><br>
                    <label for="resolution">Resolution: </label><br>
                        <input type="text" id="resolution" name="resolution" value="<?php echo $row["resolution"];?>"><br>
                    <label for="CPU">CPU: </label><br>
                        <input type="text" id="CPU" name="CPU" value="<?php echo $row["CPU"];?>"><br>
                    <label for="GPU">GPU: </label><br>
                        <input type="text" id="GPU" name="GPU" value="<?php echo $row["GPU"];?>"><br>
                    <label for="memory">Memory: </label><br>
                        <input type="text" id="memory" name="memory" value="<?php echo $row["memory"];?>"><br>
                    <label for="battery">Battery: </label><br>
                        <input type="text" id="battery" name="battery" value="<?php echo $row["battery"];?>"><br>
                    <label for="SIM">SIM: </label><br>
                        <input type="text" id="SIM" name="SIM" value="<?php echo $row["SIM"];?>"><br>
                    <label for="connections">Connections: </label><br>
                        <input type="text" id="connections" name="connections" value="<?php echo $row["connections"];?>"><br>
                    <label for="front_camera">Front Camera: </label><br>
                        <input type="text" id="front_camera" name="front_camera" value="<?php echo $row["front_camera"];?>"><br>
                    <label for="back_camera">Back Camera: </label><br>
                        <input type="text" id="back_camera" name="back_camera" value="<?php echo $row["back_camera"];?>"><br>
                    <label for="warranty">Warranty: </label><br>
                        <input type="text" id="warranty" name="warranty" value="<?php echo $row["warranty"];?>"><br>
                    <input type="submit" value="Update" name="phoneupdate">
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>

<?php mysqli_close($conn);?>