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

echo '<table id="myTable" class="table table-striped" width="100%">
<thead>
<th hidden>wishlist_id</th>
<th id="wishlist">IMAGE</th>
<th id="wishlist">PRODUCT NAME</th>
<th id="wishlist">PRICE</th>
<th id="wishlist">ADD TO CART</th>
<th id="delete"></th>
</thead><tbody>';

$query = mysqli_query($con, "SELECT * FROM wishlist w JOIN barang b ON (b.barang_id=w.barang_id) WHERE w.user_id = $user_id");
$test=0;
while ($row = mysqli_fetch_assoc($query)) {
    $path = 'admin/uploads/';
    $location = $path.$row['foto'];
    
    echo "<tr>";
    echo "<td hidden>".$row['barang_id']."</td>";
    echo '<td id="wishlist"><img class="img-hover-zoom" width="150" height="150" src= "'.$location.'"></td>';
    echo '<td id="wishlist"><a href="http://localhost/proyek/proyek/product.php?id='.$row['barang_id'].'" id="wishlist">
            <b style="padding-left:10px;">'.$row['nama_barang'].'</b></a>
        </td>';
    echo "<td id='wishlist'>$".$row['harga_barang']."</td>";
    echo '<td id="wishlist"><a href="http://localhost/proyek/proyek/product.php?id='.$row['barang_id'].'" style="color: black">
        <button type="button" class="btn btn-dark rounded-0">ADD</button></a>
        </td>';
    echo "<td id='wishlist'><a href='delete_wishlist.php?id=".$row['wishlist_id']."'>
            <i class='fa-solid fa-xmark' style='color:black'></i></a></td>";
    echo "</tr>";
    $test=1;
}        
if($test == 0){		
    echo '<tr><td colspan="4" style="text-align: center; color: dimgrey"><h6><b>Your wishlist is currently empty!</b></h6></td></tr>';
}
echo '</tbody></table>';

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
    #wishlist{
        vertical-align: middle;
        text-align: center;
        color: black; 
        text-decoration: none;
    }
    .transition {
        -ms-transform: scale(1.25);
        -webkit-transform: scale(1.25);
        transform: scale(1.25);
    }
    .img-hover-zoom img {
        transition: transform .5s ;
    }

</style>