<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}

$barang_id=$_GET['barang_id'];
mysqli_query($con,"delete from barang where barang_id='$barang_id'");
echo ("<script LANGUAGE='JavaScript'>
        window.alert('Product Deleted!');
        window.location.href='stok.php';
        </script>");
		
	// header("location: stok.php");
?>