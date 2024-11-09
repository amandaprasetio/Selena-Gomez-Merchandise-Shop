<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}


$id=$_POST['id'];
$sort=$_POST['sort'];
$search=$_POST['search'];

if($sort == 'default') $sort = '';
else if ($sort == 'inStock'){
    if ($search != "")$sort = 'AND stok_barang > 0 ORDER BY stok_barang DESC';
    else 
        if($id == 'index') $sort = 'WHERE stok_barang > 0 ORDER BY stok_barang DESC'; 
        
        else $sort = 'AND stok_barang > 0 ORDER BY stok_barang DESC';
    
        
}
else if ($sort == 'outOfStock') {
    if ($search != "") $sort = 'AND stok_barang = 0';
    else 
        if($id == 'index')$sort = 'WHERE stok_barang = 0';
        else $sort = 'AND stok_barang = 0';
}
else if($sort == 'a-z') $sort = 'ORDER BY nama_barang';
else if ($sort == 'z-a') $sort = 'ORDER BY nama_barang DESC';
else if ($sort == 'priceUp') $sort = 'ORDER BY harga_barang';
else if ($sort == 'priceDown') $sort = 'ORDER BY harga_barang DESC';
else if ($sort == 'dateUp') $sort = 'ORDER BY barang_id DESC';
else if ($sort == 'dateDown') $sort = 'ORDER BY barang_id';

if($search != ""){
    if ($id == 'allmusic') $query = mysqli_query($con, "SELECT * FROM barang WHERE $search AND (jenis_barang='all music' OR jenis_barang='cd' OR jenis_barang='cassette' OR jenis_barang='vinyl') $sort");

    else if ($id == 'merch') $query = mysqli_query($con, "SELECT * FROM barang WHERE (jenis_barang!='all music' AND jenis_barang!='cd' AND jenis_barang!='cassette' AND jenis_barang!='vinyl') AND $search $sort");

    else if ($id == 'index') $query = mysqli_query($con, "SELECT * FROM barang WHERE $search $sort");

    else if ($id == 'revelación' OR $id == 'rare' OR $id == 'revival') $query = mysqli_query($con, "SELECT * FROM barang WHERE album = '$id'AND $search $sort"); 

    else $query = mysqli_query($con, "SELECT * FROM barang WHERE jenis_barang = '$id' AND $search $sort");
}
else{
    if ($id == 'allmusic') $query = mysqli_query($con, "SELECT * FROM barang WHERE (jenis_barang='all music' OR jenis_barang='cd' OR jenis_barang='cassette' OR jenis_barang='vinyl') $sort");

    else if ($id == 'merch') $query = mysqli_query($con, "SELECT * FROM barang WHERE jenis_barang!='all music' AND jenis_barang!='cd' AND jenis_barang!='cassette' AND jenis_barang!='vinyl' $sort");

    else if ($id == 'index') $query = mysqli_query($con, "SELECT * FROM barang $sort");

    else if ($id == 'revelación' OR $id == 'rare' OR $id == 'revival') $query = mysqli_query($con, "SELECT * FROM barang WHERE album = '$id' $sort"); 

    else $query = mysqli_query($con, "SELECT * FROM barang WHERE jenis_barang = '$id' $sort");
}
 

echo '<table id="myTable" class="table" width="100%">
<thead>
<th hidden>barang_id</th>
<th>foto</th>
<th>Nama Barang</th>
<th>Harga Barang</th>
<th>Stok Barang</th>
<th>Deskripsi</th>
<th>Album</th>
<th>Jenis Barang</th>
<th>Action</th>
</thead>';


while ($row = mysqli_fetch_assoc($query)) {
    
    $path = 'uploads/';
    $location = $path.$row['foto'];
    
    echo "<tr>";
    echo "<td hidden>".$row['barang_id']."</td>";
    echo '<td><div class="img-hover-zoom"><img id="foto" width="100" height="100" src= "'.$location.'"/></div></td>';
    // echo '<td><img id="foto" width="250" height="250" src= "'.$row['foto'].'"/></td>';
    echo "<td>".$row['nama_barang']."</td>";
    echo "<td>".$row['harga_barang']."</td>";
    echo "<td>".$row['stok_barang']."</td>";
    echo "<td><p style='white-space: pre-line'>".$row['deskripsi']."</p></td>";
    echo "<td>".$row['album']."</td>";
    echo "<td>".$row['jenis_barang']."</td>";
    echo "<td><a href='edit.php?barang_id=".$row['barang_id']."'><class='btn btn-outline-primary'>
    <i class='fa solid fa-edit' style='color:green'></i></a>&nbsp;
    <a onClick=\"javascript: return confirm('Are you sure ?');\"  href='delete.php?barang_id=".$row['barang_id']."'>
    <class='btn btn-outline-danger'><i class='fa solid fa-trash' style='color:red'></i></a></td>";
    echo "</tr>";
}
echo '</table>';
?>

<script>
$(document).ready(function(){
    $(".img-hover-zoom").mouseenter(function(){
		$(this).addClass("transition");
	});
	$(".img-hover-zoom").mouseleave(function(){
		$(this).removeClass("transition");
	});

});
</script>
<style>
    .transition {
        -ms-transform: scale(2);
        -webkit-transform: scale(2);
        transform: scale(2);
    }
    .img-hover-zoom img {
        transition: transform .5s ;
    }

</style>