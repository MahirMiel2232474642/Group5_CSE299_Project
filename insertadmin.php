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
    <title>Insert Admin</title>
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
        <div><h1>Add new admin</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Sign Up</h2>
                <form action="insertadmin.php" method="post">
                    <label for="Name">Name: </label><br>
                    <input type="text" id="Name" name="name" required><br>
                    <label for="Email">Email: </label><br>
                    <input type="email" id="Email" name="email" required><br>
                    <label for="Phone">Phone: </label><br>
                    <input type="tel" id="Phone" name="phone" required><br>
                    <label for="Password">Password: </label><br>
                    <input type="password" id="Password" name="password" required><br>
                    <input type="submit" value="Register" name="admininsert">
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
    if(isset($_POST["admininsert"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        $sql="INSERT INTO admins (admin_mail, admin_name, admin_phone, admin_pass) VALUES ('{$email}','{$name}','{$phone}','{$password}')";
        mysqli_query($conn,$sql);

        header("Location: admincontrol.php");
    }

    mysqli_close($conn);

?>
