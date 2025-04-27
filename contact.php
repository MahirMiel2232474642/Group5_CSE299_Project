<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 id="titlecard">CompariTech</h1>
    </header>

    <?php if($_SESSION==NULL)
    {
    ?>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="signup.php">Register</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="adminportal.php">Admin Portal</a></li>
        </ul>
    </nav>
    <?php 
    }
    else
    {
    ?>
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
    <?php    
    }
    ?>

    <main>
        <div class="stat">
            <pre>
                fake@fakemail.com
                +880123456789
                Plot X, Imaginary Road, Fictitous City,
                Dhaka, Bangladesh
            </pre>
            
        </div>
    </main>

    <footer>

    </footer>
    
</body>
</html>