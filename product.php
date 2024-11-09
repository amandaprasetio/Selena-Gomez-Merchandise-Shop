<?php
session_start();
require "connect.php";


if(isset($_POST['save'])){
    if (!isset ($_SESSION["email"])){
        header("location: login.php");
    }
    
    $query = mysqli_query($con, "SELECT * FROM user");
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['email'] == $_SESSION['email']){
            $user_id=$row['user_id'];
        }
    }
    $barang_id=$_POST['id'];
    $qty=$_POST['typeNumber'];

    
    $query = "insert into cart values(null,$user_id,$barang_id,$qty)";
    
    echo $query;
    $res = mysqli_query($con, $query);
    header("location: product.php?id=$barang_id");
}
else{
    include "header.php";
}

$barang_id=$_GET['id'];
$sql="SELECT * FROM barang WHERE barang_id='$barang_id'";
$res=mysqli_query($con,$sql);
if(!empty($res)){		
    while($row=mysqli_fetch_array($res)){

        $path = 'admin/uploads/';
        $location = $path.$row['foto'];

        echo '
            <body>
            <br><br><br><br>
            <div id="page-container">
            <div id="content-wrap">
            <div class="bg-light bg-opacity-75 p-5 rounded-lg m-3">
                <form action="product.php" method="post">
                <input hidden type="text" value="'.$barang_id.'" name="id">
                <div class="row">
                    <div class="col-sm-6">
                        <img id="foto" width="80%" src= "'.$location.'"/>  
                    </div>
                
                <div class="col-sm-6" style="position: relative; top: 50%;">
                    <h3><i><b>'.$row['nama_barang'].'</b></i></h3><br>
                    <h3 style="color: black"><b>$'.sprintf("%.2f",$row['harga_barang']).'</b></h3><br>
                    <div class="row">
                        ';
        if ($row['stok_barang'] < 1){
            echo '
                <div class="col-auto" style="padding: 10px; padding-top: 13px;">    
                    <h3 style="color: gray"><b>SOLD OUT</b></h3>
                </div>
            ';
        }
        else {
            echo '
                    <div class="col-auto" style="width: 125px; padding: 10px;">
                        <div class="input-group">
                            <input type="number" id="typeNumber" name="typeNumber" class="form-control rounded-0" value="1" min="1" max="'.$row['stok_barang'].'" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"/>
                        </div>
                    </div><br><br>
                    <div class="col-auto" style="padding: 10px;">
                        <button name="save" type="submit" class="btn btn-dark rounded-0" style="width: 107px">Add to Cart</button>
                    </div>  
            ';
            // id='.$row['barang_id'].'?
        }
         
        echo '<div class="col-auto" style="padding: 10px;">';
        $adaGak = 0;
        if (isset($_SESSION["email"])){
            // echo "<script>console.log(".$_SESSION["email"]."); </script>";

            $queryCek = mysqli_query($con, "SELECT * FROM user");
            while ($rowCek = mysqli_fetch_assoc($query)) {
                if ($rowCek['email'] == $_SESSION['email']){
                    $user_id=$rowCek['user_id'];
                }
            }
            // echo "<script>console.log(".$user_id."); </script>";

            $query_wishlist=mysqli_query($con, "SELECT * FROM wishlist");
            while ($row_wishlist = mysqli_fetch_assoc($query_wishlist)) {
                if ($row_wishlist['barang_id'] == $barang_id){
                    if ($row_wishlist['user_id'] == $user_id){
                        echo '
                            <a href="delete_wishlist_2.php?id='.$row_wishlist['wishlist_id'].'" style="color: black">
                            <button type="button" class="btn btn-transparent rounded-0" id="hapusWishlist" name="hapusWishlist" style="width: 75px;">    
                            <i class="fa-solid fa-heart fa-lg" style="color: crimson; align: center;"></i></button></a>';
                        $adaGak = $adaGak + 1;
                    }
                }
            }
        
        }
        if ($adaGak == 0){
            echo '<a href="http://localhost/proyek/proyek/add_wishlist.php?id='.$row['barang_id'].'" style="color: black">
                    <button type="button" class="btn btn-transparent rounded-0" id="addWishlist" name="addWishlist" style="width: 75px;">
                        <i class="fa-regular fa-heart fa-lg" style="color: black; align: center;"></i></button></a>';
        }

        echo '
                </div>

                <div class="col-auto" style="padding: 10px;">
                    <button type="button" class="btn btn-transparent rounded-0" id="copylink" name="copylink" style="width: 75px;">
                    <i class="fa-solid fa-share fa-lg" style="color: black; align: center;"></i>
                    </button>
                </div>
                    <br><br><br><br>
                    <b><p style="white-space: pre-line">'.$row['deskripsi'].'</p></b>
                </div>
            </div>
            </div>
            </form>
            </div>
            </div>
            <div>';
            include "footer.php";
            echo '</div>
            </div>
            </body>
            ';
                                            
        }
    }
    
?>
<html>
<script>
$(document).ready(function(){
    $("#copylink").click(function(){

        navigator.clipboard.writeText
                ("http://localhost/proyek/proyek/product.php?id=<?php echo $barang_id; ?>");
        
        alert("Link Copied!");
    });  
    
    function getQty(){
        return;
    };

    $('#keCart').click(function(){
        var qty = document.querySelector("input[type='number']").value;
        var barang_id = $barang_id;

    })
    var quantitiy=0;
$('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#typeNumber').val());
        
        // If is not undefined
            
            $('#typeNumber').val(quantity + 1);


            // Increment
        
    });

$('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#typeNumber').val());
        
        // If is not undefined

            // Increment
            if(quantity>0){
            $('#typeNumber').val(quantity - 1);
            }
    });
    $("#foto").mouseenter(function(){
		$(this).addClass("transition");
	});
	$("#foto").mouseleave(function(){
		$(this).removeClass("transition");
	});
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
});
</script>
<style>
    .transition {
        -ms-transform: scale(1.75);
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
    }
    #foto {
        transition: transform .5s;
    }
    #goCenterBro{
        vertical-align: middle;
        text-align: center;
    }
</style>
</html>