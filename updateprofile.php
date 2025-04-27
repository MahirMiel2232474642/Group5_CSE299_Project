<?php 
    session_start();
    if(isset($_POST["logout"]))
    {
        session_destroy();
        header("Location: index.php");
    }
    if($_SESSION["email"]==NULL)
    {
        header("Location: index.php");
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
            <li><a href="homepage.php">Home</a></li>
            <li><a href="compare.php">Compare</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="updateprofile.php">Update Profile</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><form action="homepage.php" method="post"><input type="submit" value="Logout" name="logout"></form></li>
        </ul>
    </nav>

    <main>   
        <div class="SearchBar">
            <form action="search.php" method="get">
                <input type="text" name="Searchterm" id="search" placeholder="Search....">
                <input type="submit" value="Go!" name="Search">
            </form>
        </div>

    <main>
        <div><h1>Update Profile Information</h1></div>
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Update</h2>
                <form action="updateprofile.php" method="post">
                    <label for="Name">Name: </label><br>
                    <input type="text" id="Name" name="name" value="<?php echo $_SESSION["name"];?>"><br>
                    <label for="Email">Email: </label><br>
                    <input type="email" id="Email" name="email" value="<?php echo $_SESSION["email"];?>"><br>
                    <label for="Password">Password: </label><br>
                    <input type="text" id="Password" name="password" value="<?php echo $_SESSION["password"];?>"><br>
                    <label for="Phone">Phone: </label><br>
                    <input type="tel" id="Phone" name="phone" value="<?php echo $_SESSION["phone_no"];?>"><br>
                    <label for="address">Address: </label><br>
                    <input type="text" id="address" name="address" value="<?php echo $_SESSION["address"];?>"><br>
                    <input type="submit" value="Confirm Changes" name="profileupdate">
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
    if(isset($_POST["profileupdate"]))
    {
            $name=$_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $address = $_POST["address"];

        $sql="UPDATE users 
              SET name='{$name}', email='{$email}', phone_no='{$phone}', userpassword='{$password}', address='{$address}' 
              WHERE user_id='{$_SESSION["user_id"]}'";
        $result2=mysqli_query($conn,$sql);

        {
            $_SESSION["email"]=$email;
            $_SESSION["password"]=$password;
            $_SESSION["name"]=$name;
            $_SESSION["phone_no"]=$phone;
            $_SESSION["address"]=$address;
        }

        header("Location: homepage.php");
    }

    mysqli_close($conn);

?>
