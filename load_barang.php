<?php
session_start();
include "connect.php";

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
    if ($id == 'allmusic') $query = mysqli_query($con, "SELECT * FROM barang WHERE jenis_barang='all music' OR jenis_barang='cd' OR jenis_barang='cassette' OR jenis_barang='vinyl'  $sort");

    else if ($id == 'merch') $query = mysqli_query($con, "SELECT * FROM barang WHERE jenis_barang!='all music' AND jenis_barang!='cd' AND jenis_barang!='cassette' AND jenis_barang!='vinyl' $sort");

    else if ($id == 'index') $query = mysqli_query($con, "SELECT * FROM barang $sort");

    else if ($id == 'revelación' OR $id == 'rare' OR $id == 'revival') $query = mysqli_query($con, "SELECT * FROM barang WHERE album = '$id' $sort"); 

    else $query = mysqli_query($con, "SELECT * FROM barang WHERE jenis_barang = '$id' $sort");
}

while ($row = mysqli_fetch_assoc($query)) {
    $path = 'admin/uploads/';
    $location = $path.$row['foto'];
    echo'
        <div class="col">
            <div class="card text-center">
            <a href="http://localhost/proyek/proyek/product.php?id='.$row['barang_id'].'" style="color: black; text-decoration: none">
            <img src="'.$location.'" class="card-img-top"></a>
                <div class="card-body">
                    <div style="height: 60px">
                    <a href="http://localhost/proyek/proyek/product.php?id='.$row['barang_id'].'" style="color: black; text-decoration: none">
                    <b class="card-title">'.$row['nama_barang'].'</b></a></div>';


    if ($row['stok_barang'] < 1){
        echo '<br><p class="card-text" style="color: grey">SOLD OUT</p>
                </div>
            </div>
            
        </div>
        ';
    }
    else {
        echo '<br><p class="card-text">$'.sprintf("%.2f",$row['harga_barang']).'
                </div>
            </div>
            
        </div>
        ';
    }                
}
?>