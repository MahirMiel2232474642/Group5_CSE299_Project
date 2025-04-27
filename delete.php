<?php 
include("database.php");
if(isset($_GET["user_id"]))
{
    $user_id=$_GET["user_id"];
    $sql="DELETE FROM users WHERE user_id={$user_id}";
    mysqli_query($conn,$sql);
    header("Location: usercontrol.php");
} 

if(isset($_GET["admin_id"]))
{
    $admin_id=$_GET["admin_id"];
    $sql="DELETE FROM admins WHERE admin_id={$admin_id}";
    mysqli_query($conn,$sql);
    header("Location: admincontrol.php");
}

if(isset($_GET["order_id"]))
{
    $order_id=$_GET["order_id"];
    $sql="DELETE FROM orderdetails WHERE order_id={$order_id}";
    mysqli_query($conn,$sql);
    header("Location: ordercontrol.php");
} 

if(isset($_GET["product_id"]))
{
    $product_id=$_GET["product_id"];
    $sql="DELETE FROM carts WHERE product_id={$product_id}";
    mysqli_query($conn,$sql);

    $sql2="DELETE FROM laptop WHERE product_id={$product_id}";
    mysqli_query($conn,$sql2);

    $sql3="DELETE FROM phone WHERE product_id={$product_id}";
    mysqli_query($conn,$sql3);

    $sql4="DELETE FROM television WHERE product_id={$product_id}";
    mysqli_query($conn,$sql3);

    $sql5="DELETE FROM product WHERE product_id={$product_id}";
    mysqli_query($conn,$sql5);

    header("Location: ordercontrol.php");
}

mysqli_close($conn);
?>