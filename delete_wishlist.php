<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
	header("location: login.php");
}

$wishlist_id=$_GET['id'];
mysqli_query($con,"DELETE FROM wishlist WHERE wishlist_id=$wishlist_id");
header("location: wishlist.php");
?>