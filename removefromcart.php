<?php 
    include("database.php");
    $productid=$_GET["productid"];
    $cartid=$_GET["cartid"];
    $userid=$_GET["userid"];
    echo "{$productid}<br>{$cartid}<br>{$userid}";

    $sqldelete="DELETE FROM carts WHERE product_id='{$productid}' and cart_id='{$cartid}' and user_id='{$userid}'";
    mysqli_query($conn,$sqldelete);

    header("Location: cart.php");


    mysqli_close($conn);
?>