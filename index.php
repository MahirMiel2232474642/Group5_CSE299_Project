<?php 
    session_start();
        if($_SESSION!=NULL)
        {
            header("Location: homepage.php");
        }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
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
                    <form action="index.php" method="post">
                        <label for="Email">Email: </label><br>
                        <input type="email" id="Email" name="email" required><br>
                        <label for="Password">Password: </label><br>
                        <input type="password" id="Password" name="password" required><br>
                        <input type="submit" value="Login" name="login">
                    </form>
                </div>
            </div>
            <div>Don't have an account? <a href="signup.php">Sign up</a> now!</div>
        </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php 
    include("database.php");

    if(isset($_POST["login"]))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="SELECT * FROM users WHERE email='{$email}' and userpassword='{$password}'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $rows=mysqli_fetch_assoc($result);
            if($rows["email"]==$email && $rows["userpassword"]==$password)
            {
                $_SESSION["user_id"]=$rows["user_id"];
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                $_SESSION["name"]=$rows["name"];
                $_SESSION["phone_no"]=$rows["phone_no"];
                $_SESSION["address"]=$rows["address"];
                $_SESSION["present_cart"]=$rows["present_cart_id"];

                header("Location: homepage.php");
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