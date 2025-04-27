<?php 
    session_start();
    echo "Ignore the admin_email error";
    if($_SESSION["admin_email"]!=NULL)
    {
        header("Location: admindash.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <header>
        <h1 id="titlecard">CompariTech</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="signup.php">Register</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="adminportal.php">Admin Portal</a></li>
        </ul>
        
    </nav>

    <main>
        <div><h1>Welcome!</h1></div>
        <div class="Container">
            <div class="LoginForm">
                <div class="FormMargin">
                    <h2>Login</h2>
                    <form action="adminportal.php" method="post">
                        <label for="Email">Email: </label><br>
                        <input type="email" id="Email" name="email" required><br>
                        <label for="Password">Password: </label><br>
                        <input type="password" id="Password" name="password" required><br>
                        <input type="submit" value="Login" name="adminlogin">
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

    if(isset($_POST["adminlogin"]))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="SELECT * FROM admins WHERE admin_mail='{$email}' and admin_pass='{$password}'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $rows=mysqli_fetch_assoc($result);
            if($rows["admin_mail"]==$email && $rows["admin_pass"]==$password)
            {
                $_SESSION["admin_id"]=$rows["admin_id"];
                $_SESSION["admin_email"]=$email;
                $_SESSION["admin_password"]=$password;
                $_SESSION["admin_name"]=$rows["admin_name"];
                $_SESSION["admin_phone"]=$rows["admin_phone"];

                header("Location: admindash.php");
            }
            else
            {
            	echo"Incorrect Username or Password 2";
            }
        }
        else
        {
            echo"Incorrect Username or Password";
        }
    }

    mysqli_close($conn);
?>
