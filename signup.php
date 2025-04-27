<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        <div class="LoginForm">
            <div class="FormMargin">
                <h2>Sign Up</h2>
                <form action="signup.php" method="post">
                    <label for="Name">Name: </label><br>
                    <input type="text" id="Name" name="name" required><br>
                    <label for="Email">Email: </label><br>
                    <input type="email" id="Email" name="email" required><br>
                    <label for="Phone">Phone: </label><br>
                    <input type="tel" id="Phone" name="phone" required><br>
                    <label for="Password">Password: </label><br>
                    <input type="password" id="Password" name="password" required><br>
                    <label for="Address">Address: </label><br>
                    <input type="text" id="Address" name="address" required><br>
                    <input type="submit" value="Sign Up" name="signup">
                </form>
            </div>
        </div>
        <div>Already have an account? <a href="index.php">Log In</a> now!</div>
    </main>

    <footer>

    </footer>
    
</body>
</html>

<?php
    include("database.php");
    if(isset($_POST["signup"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $address = $_POST["address"];

        $sql="INSERT INTO users (name, email, phone_no, userpassword, address) VALUES ('{$name}','{$email}','{$phone}','{$password}','{$address}')";
        mysqli_query($conn,$sql);

        header("Location: index.php");
    }

    mysqli_close($conn);

?>