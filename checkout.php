<?php
session_start();
require "connect.php";
$alamat_id=$_GET['id'];
if(isset($_POST['pay'])){
    
    $alamat_id=$_POST['alamat_id'];

    $query = mysqli_query($con, "SELECT * FROM user");
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['email'] == $_SESSION['email']){
            $user_id=$row['user_id'];
        }
    }
    $query = mysqli_query($con, "SELECT * FROM cart c JOIN barang b WHERE c.user_id = $user_id AND b.barang_id=c.barang_id AND b.stok_barang > 0");
    if(!empty($query)){
        while ($row = mysqli_fetch_assoc($query)) {
            $cart_id=$row['cart_id'];
            $barang_id=$row['barang_id'];
            $jumlah=$row['kuantitas'];
            $subtotal=ROUND($row['kuantitas']*$row['harga_barang'],2);
            $stok_baru=$row['stok_barang']-1;
           
            mysqli_query($con,"INSERT INTO item_bill VALUES(null,$barang_id,$jumlah,$subtotal,$user_id,$alamat_id,null,0)");
            mysqli_query($con,"UPDATE barang SET stok_barang=$stok_baru WHERE barang_id=$barang_id");
            mysqli_query($con,"DELETE FROM cart WHERE cart_id = $cart_id");
        }

    }        
}
else{
    if (!isset ($_SESSION["email"])){
        header("location: login.php");
    }
    include "header.php";
}

$query = mysqli_query($con, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['email'] == $_SESSION['email']){
        $user_id=$row['user_id'];
    }
}

$query = mysqli_query($con, "SELECT * FROM cart c JOIN barang b WHERE c.user_id = $user_id AND b.barang_id=c.barang_id AND b.stok_barang > 0");
echo '<div id="page-container" style="padding-top: 70px;">
        <div id="content-wrap">
        <div class="container">
            <input type="text" id="user_id" name="user_id" value="'.$user_id.'" hidden>
            <div class="bg-light bg-opacity-75 p-5 rounded-lg m-3" style="overflow-x: scroll;">
                <h3><b style="padding: 7px;">Checkout</b></h3><br>

                <div class="d-flex">
                    <div class="p-2 flex-fill">
                        <table id="myTable" class="table table-striped" width="100%" style="vertical-align: middle; text-align: center;">
                        <thead class="bg-light bg-opacity-50 table-light">
                        <th hidden scope="col">cart_id</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">TOTAL</th>
                        </thead><tbody class="table-group-divider">';

if(!empty($query)){		
    if(!empty($query)){
        while ($row = mysqli_fetch_assoc($query)) {
            $path = 'admin/uploads/';
            $location = $path.$row['foto'];
            $cart_id = $row['cart_id'];
            echo "<tr class='bg-light'>";
            echo "<td hidden>".$row['barang_id']."</td>";
            echo '<td><img class="img-hover-zoom" width="150" height="150" src= "'.$location.'"></td>';
            echo '<td><a href="http://localhost/proyek/proyek/product.php?id='.$row['barang_id'].'"  id="cart">
                    <b style="padding-left:10px">'.$row['nama_barang'].'</b></a>
                </td>';
            echo "<td id='cart'>$".sprintf("%.2f",$row['harga_barang'])."</td>";
            echo '<td>'.$row['kuantitas'].'</td>';
            echo "<td><b>$".sprintf("%.2f",$row['kuantitas']*$row['harga_barang'])."</b></td>";
            echo "</tr>";
        }
    }
    echo '</tbody></table></div>';
    $querySubTotal = mysqli_query($con, "SELECT ROUND(SUM(harga_barang*kuantitas), 2) FROM cart c JOIN barang b WHERE (c.user_id = $user_id) AND (b.barang_id = c.barang_id) AND (b.stok_barang > 0);");
    if(!empty($querySubTotal)){		
        while ($rowSubTotal = mysqli_fetch_assoc($querySubTotal)) {
            $subtotal=$rowSubTotal['ROUND(SUM(harga_barang*kuantitas), 2)'];
            $tax=ROUND($rowSubTotal['ROUND(SUM(harga_barang*kuantitas), 2)']*0.05, 2);
            $shipping=10;
            $total=$subtotal+$tax+$shipping;
            $queryAlamat = mysqli_query($con, "SELECT * FROM alamat WHERE alamat_id = $alamat_id");
            if(!empty($queryAlamat)){		
                while ($rowAlamat = mysqli_fetch_assoc($queryAlamat)) {
                    echo '<div class="p-2 bg-light"><b>
                        <div class="border-bottom border-dark border-3"><h5><b>SHIPPING INFORMATION</b></h5></div>
                        <div class="p-2">
                            <div id="alamat_id" name="alamat_id" hidden>'.$rowAlamat['alamat_id'].'</div>
                            <div>'.$rowAlamat['nama'].' | Phone Number: '.$rowAlamat['nomor'].'</div><br>
                            <div>Email: '.$rowAlamat['email'].'</div><br>
                            <div>'.$rowAlamat['alamat'].'</div><br>
                            <div style="padding-bottom: 20px">'.$rowAlamat['kecamatan'].', Kota '.$rowAlamat['kota'].', '.$rowAlamat['provinsi'].', '.$rowAlamat['kode_pos'].'</div>
                        </div>
                        ';
                }
            }
            echo '
                <div class="border-bottom border-dark border-3"><h5><b>ORDER SUMMARY</b></h5></div>
                <div class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary border-1" style="padding-top: 20px; --bs-border-opacity: .5;">
                    <div class="p-2">Subtotal</div>
                    <div class="p-2" name="subtotal"><h6><b>$'.sprintf("%.2f",$subtotal).'</b></h6></div>
                </div>
                <div style="--bs-border-opacity: .5;" class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary border-1"">
                    <div class="p-2">Tax (5%)</div>
                    <div class="p-2" name="tax"><h6><b>$'.sprintf("%.2f",$tax).'</b></h6></div>
                </div>
                <div style="--bs-border-opacity: .5;" class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary border-1"">
                    <div class="p-2">Shipping</div>
                    <div class="p-2" name="shipping"><h6><b>$'.sprintf("%.2f",$shipping).'</b></h6></div>
                </div>
                <div style="--bs-border-opacity: .5;" class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary  border-1"">
                    <div class="p-2">Total</div>
                    <div class="p-2" name="total"><h6><b>$'.sprintf("%.2f",$total).'</b></h6></div>
                </div>
                <div class="d-flex flex-column mb-3" id="div1">

                    <button name="pay" id="pay" type="submit" class="btn btn-dark rounded-0" style="width: 100%;">PAY</button>

                    <div style="padding-top: 10px">
                    <a href="http://localhost/proyek/proyek/cart.php" style="color: white; text-decoration: none;">
                        <button type="button"  class="btn btn-dark rounded-0 opacity-75" style="width: 100%;">BACK TO CART</button>
                    </a>
                    </div>
                
                </div>
                </b>
            </div>
        </div>
    </div>
</div>	<div>';
include "footer.php";
echo '</div>
</div>';
        }
    }
}

?>


<script>
$(document).ready(function(){
    $(".img-hover-zoom").mouseenter(function(){
		$(this).addClass("transition");
	});
	$(".img-hover-zoom").mouseleave(function(){
		$(this).removeClass("transition");
	});
    $("#foto").mouseenter(function(){
		$(this).addClass("transition");
	});
	$("#foto").mouseleave(function(){
		$(this).removeClass("transition");
	});
    $("#pay").click(function(){
        var v_alamat_id=<?php echo $alamat_id;?>;
        var v_user_id=<?php echo $user_id;?>;
        $.ajax({
            url     : "checkout.php",
            type    : "POST",
            async   : true,
            data    : {
                pay       : 1,
                alamat_id : v_alamat_id,
                user_id   : v_user_id
            },
            success: function(res){
                // alert(v_alamat_id);
                // alert(v_user_id);
                // alert(res);
                window.location.href= "done.php";

            }

        });    
    });
});



</script>
<style>
    #cart{
        /* vertical-align: middle;
        text-align: center; */
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
    #goCenterBro{
        vertical-align: middle;
        text-align: center;
    }
</style>