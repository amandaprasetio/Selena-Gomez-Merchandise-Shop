<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}


if(isset($_POST['save'])){
	$barang_id=$_POST['barang_id'];
	$nama=$_POST['nama'];
	$harga=$_POST['harga'];
	$stok=$_POST['stok'];
	$deskripsi=$_POST['deskripsi'];
	$album=$_POST['album'];
	$jenis=$_POST['jenis'];

	// echo '<br><br><br><br><br><br><br>update barang set nama_barang = '.$nama.', harga_barang = '.$harga.', stok_barang = '.$stok.', deskripsi = '.$deskripsi.', album = '.$album.', jenis_barang = '.$jenis.' where barang_id = '.$barang_id.'"';

	mysqli_query($con,"update barang set nama_barang = '$nama', harga_barang = $harga, stok_barang = $stok, deskripsi = '$deskripsi', album = '$album', jenis_barang = '$jenis' where barang_id = '$barang_id'");
	header("location: stok.php");
}
?>