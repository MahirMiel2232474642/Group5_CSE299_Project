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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Laptop</title>
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
        <div><h1>Add new Laptop</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Info</h2>
                <form action="insertlaptop.php" method="post">
                    <label for="product_id">Product ID: </label><br>
                        <input type="number" id="product_id" name="product_id" required><br>
                    <label for="product_name">Product Name: </label><br>
                        <input type="text" id="product_name" name="product_name" required><br>
                    <label for="price">Price: </label><br>
                        <input type="number" id="price" name="price" required><br>
                    <label for="rating">Rating: </label><br>
                        <input type="number" id="rating" name="rating" required><br>
                    <label for="dimensions">Dimensions: </label><br>
                        <input type="text" id="dimensions" name="dimensions"><br>
                    <label for="weight">Weight: </label><br>
                        <input type="text" id="weight" name="weight"><br>
                    <label for="operating_system">Operating System: </label><br>
                        <input type="text" id="operating_system" name="operating_system"><br>
                    <label for="brand">Brand: </label><br>
                        <input type="text" id="brand" name="brand"><br>
                    <label for="display">Display: </label><br>
                        <input type="text" id="display" name="display"><br>
                    <label for="resolution">Resolution: </label><br>
                        <input type="text" id="resolution" name="resolution"><br>
                    <label for="processor">Processor: </label><br>
                        <input type="text" id="processor" name="processor"><br>
                    <label for="GPU">GPU: </label><br>
                        <input type="text" id="GPU" name="GPU"><br>
                    <label for="RAM">RAM: </label><br>
                        <input type="text" id="RAM" name="RAM"><br>
                    <label for="SSD">SSD: </label><br>
                        <input type="text" id="SSD" name="SSD"><br>
                    <label for="battery">Battery: </label><br>
                        <input type="text" id="battery" name="battery"><br>
                    <label for="audio">Audio: </label><br>
                        <input type="text" id="audio" name="audio"><br>
                    <label for="connections">Connections: </label><br>
                        <input type="text" id="connections" name="connections"><br>
                    <label for="front_camera">Front Camera: </label><br>
                        <input type="text" id="front_camera" name="front_camera"><br>
                    <label for="warranty">Warranty: </label><br>
                        <input type="text" id="warranty" name="warranty"><br>
                    <input type="submit" value="Insert" name="laptopinsert">
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php
    include("database.php");
    if(isset($_POST["laptopinsert"]))
    {
        $id=$_POST["product_id"];
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

        $sql="INSERT into products (product_id, category_id, product_name, price, rating)
              values ({$id},'Laptop','{$name}',{$price},{$rating});";
        $sql2="INSERT into laptop (product_id, category_id, product_name, price, rating,
                        dimensions, weight, operating_system, brand, display, resolution, processor,
                        GPU, RAM, SSD, battery, audio, connections, front_camera, warranty)
               values ({$id},'Laptop','{$name}',{$price},{$rating},
                        '{$dimensions}','{$weight}','{$os}','{$brand}','{$display}','{$resolution}','{$cpu}',
                        '{$gpu}','{$ram}','{$ssd}','{$battery}','{$audio}','{$connections}','{$fc}','{$warranty}');";
       try
       {
            $result=mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2);
       }
       catch(Exception $e)
       {
        echo "Invalid product_id";
       }
        
            header("Location: laptopcontrol.php");
    }

    mysqli_close($conn);

?>
