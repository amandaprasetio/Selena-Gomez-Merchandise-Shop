<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
	header("location: login.php");
}

$cart_id=$_GET['id'];
mysqli_query($con,"DELETE from cart WHERE cart_id=$cart_id");
header("location: cart.php");
?>