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
    $adminid=$_GET["admin_id"];
    $sqladmin="SELECT * FROM admins WHERE admin_id='{$adminid}'";
    $result=mysqli_query($conn,$sqladmin);
    $row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
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
        <div><h1>Update admin</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Update</h2>
                <form action="updateadmin.php?admin_id=<?php echo $adminid;?>" method="post">
                    <label for="Name">Name: </label><br>
                    <input type="text" id="Name" name="name" value="<?php echo $row["admin_name"];?>"><br>
                    <label for="Email">Email: </label><br>
                    <input type="email" id="Email" name="email" value="<?php echo $row["admin_mail"];?>"><br>
                    <label for="Phone">Phone: </label><br>
                    <input type="tel" id="Phone" name="phone" value="<?php echo $row["admin_phone"];?>"><br>
                    <label for="Password">Password: </label><br>
                    <input type="text" id="Password" name="password" value="<?php echo $row["admin_pass"];?>"><br>
                    <input type="submit" value="Update" name="adminupdate">
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
    if(isset($_POST["adminupdate"]))
    {
            $name=$_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];

        $sql="UPDATE admins 
              SET admin_mail='{$email}', admin_name='{$name}', admin_phone='{$phone}', admin_pass='{$password}' 
              WHERE admin_id='{$row["admin_id"]}'";
        $result2=mysqli_query($conn,$sql);

        if($row["admin_id"]==$_SESSION["admin_id"])
        {
            $_SESSION["admin_email"]=$email;
            $_SESSION["admin_password"]=$password;
            $_SESSION["admin_name"]=$name;
            $_SESSION["admin_phone"]=$phone;
        }

        header("Location: admincontrol.php");
    }

    mysqli_close($conn);

?>
