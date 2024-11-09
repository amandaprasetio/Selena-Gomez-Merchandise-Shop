<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
	header("location: login.php");
}

$query = mysqli_query($con, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['email'] == $_SESSION['email']){
        $user_id=$row['user_id'];
    }
}
$barang_id=$_GET['id'];
mysqli_query($con,"insert into wishlist values(null,$user_id,$barang_id)");
header("location: product.php?id=$barang_id");
?>