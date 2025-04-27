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
    <title>Insert TV</title>
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
        <div><h1>Add new TV</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Info</h2>
                <form action="inserttv.php" method="post">
                    <label for="product_id">Product ID: </label><br>
                        <input type="number" id="product_id" name="product_id" required><br>
                    <label for="product_name">Product Name: </label><br>
                        <input type="text" id="product_name" name="product_name" required><br>
                    <label for="price">Price: </label><br>
                        <input type="number" id="price" name="price" required><br>
                    <label for="rating">Rating: </label><br>
                        <input type="number" id="rating" name="rating" required><br>
                    <label for="size">Size: </label><br>
                        <input type="text" id="size" name="size"><br>
                    <label for="display">Display: </label><br>
                        <input type="text" id="display" name="display"><br>
                    <label for="resolution">Resolution: </label><br>
                        <input type="text" id="resolution" name="resolution"><br>
                    <label for="color">Color: </label><br>
                        <input type="text" id="color" name="color"><br>
                    <label for="brand">Brand: </label><br>
                        <input type="text" id="brand" name="brand"><br>
                    <label for="sound_system">Sound System: </label><br>
                        <input type="text" id="sound_system" name="sound_system"><br>
                    <label for="operating_system">Operating System: </label><br>
                        <input type="text" id="operating_system" name="operating_system"><br>
                    <label for="voice_command">Voice Command: </label><br>
                        <input type="text" id="voice_command" name="voice_command"><br>
                    <label for="ports">Ports: </label><br>
                        <input type="text" id="ports" name="ports"><br>
                    <label for="warranty">Warranty: </label><br>
                        <input type="text" id="warranty" name="warranty"><br>
                    <label for="panel_warranty">Panel Warranty: </label><br>
                        <input type="text" id="panel_warranty" name="panel_warranty"><br>
                    <input type="submit" value="Insert" name="tvinsert">
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
    if(isset($_POST["tvinsert"]))
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

        $sql="INSERT into products (product_id, category_id, product_name, price, rating)
              values ({$id},'Television','{$name}',{$price},{$rating});";
        $sql2="INSERT into television (product_id, category_id, product_name, price, rating,
                        size, display, resolution, color, brand, sound_system, operating_system,
                        voice_command, ports, warranty, panel_warranty)
               values ({$id},'Television','{$name}',{$price},{$rating},
                       '{$size}','{$display}','{$resolution}','{$color}','{$brand}','{$ss}','{$os}',
                       '{$vc}','{$ports}','{$warranty}','{$panel_warranty}');";
       try
       {
            $result=mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2);
       }
       catch(Exception $e)
       {
        echo "Invalid product_id";
       }
        
            header("Location: tvcontrol.php");
    }

    mysqli_close($conn);

?>
