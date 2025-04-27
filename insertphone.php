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
    <title>Insert Phone</title>
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
        <div><h1>Add new Phone</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Info</h2>
                <form action="insertphone.php" method="post">
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
                    <label for="os_version">OS Version: </label><br>
                        <input type="text" id="os_version" name="os_version"><br>
                    <label for="brand">Brand: </label><br>
                        <input type="text" id="brand" name="brand"><br>
                    <label for="display">Display: </label><br>
                        <input type="text" id="display" name="display"><br>
                    <label for="resolution">Resolution: </label><br>
                        <input type="text" id="resolution" name="resolution"><br>
                    <label for="CPU">CPU: </label><br>
                        <input type="text" id="CPU" name="CPU"><br>
                    <label for="GPU">GPU: </label><br>
                        <input type="text" id="GPU" name="GPU"><br>
                    <label for="memory">Memory: </label><br>
                        <input type="text" id="memory" name="memory"><br>
                    <label for="battery">Battery: </label><br>
                        <input type="text" id="battery" name="battery"><br>
                    <label for="SIM">SIM: </label><br>
                        <input type="text" id="SIM" name="SIM"><br>
                    <label for="connections">Connections: </label><br>
                        <input type="text" id="connections" name="connections"><br>
                    <label for="front_camera">Front Camera: </label><br>
                        <input type="text" id="front_camera" name="front_camera"><br>
                    <label for="back_camera">Back Camera: </label><br>
                        <input type="text" id="back_camera" name="back_camera"><br>
                    <label for="warranty">Warranty: </label><br>
                        <input type="text" id="warranty" name="warranty"><br>
                    <input type="submit" value="Insert" name="phoneinsert">
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
    if(isset($_POST["phoneinsert"]))
    {
        $id=$_POST["product_id"];
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

        $sql="INSERT into products (product_id, category_id, product_name, price, rating)
              values ({$id},'Phone','{$name}',{$price},{$rating});";
        $sql2="INSERT into phone (product_id, category_id, product_name, price, rating,
                        dimensions, weight, os_version, brand, display, resolution, CPU,
                        GPU, memory, battery, SIM, connections, front_camera, back_camera, warranty)
               values ({$id},'Phone','{$name}',{$price},{$rating},
                        '{$dimensions}','{$weight}','{$os}','{$brand}','{$display}','{$resolution}','{$cpu}',
                        '{$gpu}','{$mem}','{$battery}','{$sim}','{$connections}','{$fc}','{$bc}','{$warranty}');";
       try
       {
            $result=mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2);
       }
       catch(Exception $e)
       {
        echo "Invalid product_id";
       }
        
            header("Location: phonecontrol.php");
    }

    mysqli_close($conn);

?>
