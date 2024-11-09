<?php
session_start();
require "connect.php";
$query = mysqli_query($con, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['email'] == $_SESSION['email']){
        $user_id=$row['user_id'];
    }
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
    mysqli_query($con, "delete from alamat where alamat_id = $id");
};
if(isset($_POST['save'])){
    
    $nama       = $_POST['nama'];
    $nomor      = $_POST['nomor'];
    $email      = $_POST['email'];
    $provinsi   = $_POST['provinsi'];
    $kota       = $_POST['kota'];
    $kecamatan  = $_POST['kecamatan'];
    $kelurahan  = $_POST['kelurahan'];
    $rt         = $_POST['rt'];
    $rw         = $_POST['rw'];
    $kode_pos   = $_POST['kode_pos'];
    $alamat     = $_POST['alamat'];
    
    mysqli_query($con,"insert into alamat values(null,$user_id,'$nama','$nomor','$email','$provinsi','$kota','$kecamatan','$kelurahan',$rt,$rw,$kode_pos,'$alamat')");
    header('Location: shipping.php');
}

if(isset($_POST['update'])){
    $id         = $_GET['id'];
    $nama       = $_POST['nama'];
    $nomor      = $_POST['nomor'];
    $email      = $_POST['email'];
    $provinsi   = $_POST['provinsi'];
    $kota       = $_POST['kota'];
    $kecamatan  = $_POST['kecamatan'];
    $kelurahan  = $_POST['kelurahan'];
    $rt         = $_POST['rt'];
    $rw         = $_POST['rw'];
    $kode_pos   = $_POST['kode_pos'];
    $alamat     = $_POST['alamat'];
    
    mysqli_query($con,"update alamat set nama = '$nama', nomor = '$nomor', email = '$email', provinsi = '$provinsi', kota = '$kota', kecamatan = '$kecamatan', kelurahan = '$kelurahan', rt =$rt, rw = $rw, kode_pos = $kode_pos, alamat ='$alamat' where alamat_id = $id");
    header('Location: shipping.php');
}
    
?>
