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
    if(isset($_POST["tvupload"]))
    {
        $file = $_FILES['product_image'];

        $fileName = $_FILES['product_image']['name'];
        $fileTmpName = $_FILES['product_image']['tmp_name'];
        $fileSize = $_FILES['product_image']['size'];
        $fileError = $_FILES['product_image']['error'];
        $fileType = $_FILES['product_image']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('png');

        if(in_array($fileActualExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 1000000)
                {
                    $fileNameNew = "{$row["product_id"]}.png";
                    $fileDestination = "images/{$fileNameNew}";
                    move_uploaded_file($fileTmpName,$fileDestination);
                    header("Location: tvdetails.php?productid={$row["product_id"]}");
                }
                else
                {
                    echo "File too large";
                }    
            }
            else
            {
                echo "Error Uploading file";
            }
        }
        else
        {
            echo "Upload PNG file";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload TV Image</title>
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
        <div><h1>Upload TV Image</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Image</h2>
                <form action="uploadtv.php?product_id=<?php echo $productid;?>" method="post" enctype="multipart/form-data">
                    <label for="product_image">Image Upload: </label><br>
                        <input type="file" id="product_image" name="product_image"><br>
                    <input type="submit" value="Upload" name="tvupload">
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>

<?php mysqli_close($conn);?>