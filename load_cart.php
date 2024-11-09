<?php
session_start();
require "connect.php";

if (isset($_POST['plus'])){
    $kuantitasbaru = $_POST['typeNumber'];
    $cart_id = $_POST['punyaCart'];
    if ($kuantitasbaru == ''){
        mysqli_query($con, 'DELETE FROM cart WHERE cart_id = '.$cart_id.'');
    }
    else{
        mysqli_query($con, 'UPDATE cart SET kuantitas = '.$kuantitasbaru.' WHERE cart_id = '.$cart_id.'');
    }
}

if (!isset ($_SESSION["email"])){
	header("location: login.php");
}

$query = mysqli_query($con, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['email'] == $_SESSION['email']){
        $user_id=$row['user_id'];
    }
}

$query = mysqli_query($con, "SELECT * FROM cart c JOIN barang b WHERE c.user_id = $user_id AND b.barang_id=c.barang_id AND b.stok_barang > 0");
$queryHabis = mysqli_query($con, "SELECT * FROM cart c JOIN barang b WHERE c.user_id = $user_id AND b.barang_id=c.barang_id AND b.stok_barang <= 0");
echo '<div class="d-flex">
<div class="p-2 flex-grow-1">
<table id="myTable" class="table table-striped" width="100%" style="vertical-align: middle; text-align: center;">
<thead class="bg-light bg-opacity-50 table-light">
<th hidden scope="col">cart_id</th>
<th scope="col">IMAGE</th>
<th scope="col">PRODUCT NAME</th>
<th scope="col">PRICE</th>
<th scope="col">QUANTITY</th>
<th scope="col">TOTAL</th>
<th scope="col">REMOVE</th>
</thead><tbody class="table-group-divider">';

if(!empty($query) || !empty($queryHabis)){		
    if(!empty($queryHabis)){
        while ($row = mysqli_fetch_assoc($query)) {
            $path = 'admin/uploads/';
            $location = $path.$row['foto'];
            if ($row['kuantitas'] <= $row['stok_barang']) { $qtyBro = $row['kuantitas'];}
            else { 
                mysqli_query($con, 'UPDATE cart SET kuantitas = '.$row["stok_barang"].' WHERE cart_id = '.$row["cart_id"].';');
                $qtyBro = $row['stok_barang'];
            }

            echo "<tr class='bg-light'><tr class='bg-light'>";
            echo '<td><img class="img-hover-zoom" width="150" height="150" src= "'.$location.'"></td>';
            echo '<td><a href="http://localhost/proyek/proyek/product.php?id='.$row['barang_id'].'"  id="cart">
                    <b style="padding-left:10px">'.$row['nama_barang'].'</b></a>
                </td>';
            echo "<td id='cart'>$".sprintf("%.2f",$row['harga_barang'])."</td>";
            echo '<td><div class="product-quantity input-group offset-lg-3" style="width:100px;">
                    <input type="number" id='.$row['cart_id'].' name="typeNumber" onchange="add_cart('.$row['cart_id'].')" class="form-control rounded-0 col-lg-3 center-block" value="'.$qtyBro.'" min="1" max="'.$row['stok_barang'].'" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div></td>';
            echo "<td><b>$".sprintf("%.2f",$row['kuantitas']*$row['harga_barang'])."</b></td>";
            echo "<td id='cart'><a href='delete_cart.php?id=".$row['cart_id']."'><class='btn btn-outline-primary'>
                    <i class='fa-solid fa-xmark' style='color:black'></i></a>";
            echo "</tr>";
        }
    }
    if(!empty($queryHabis)){		
        while ($rowHabis = mysqli_fetch_assoc($queryHabis)) {
            $path = 'admin/uploads/';
            $location = $path.$rowHabis['foto'];
            
            echo "<tr style='background-color:lightgrey; bg-opacity: 50%'>";
            echo "<td hidden>".$rowHabis['barang_id']."</td>";
            echo '<td><img class="img-hover-zoom" width="150" height="150" src= "'.$location.'" /></td>';
            echo '<td><a href="http://localhost/proyek/proyek/product.php?id='.$rowHabis['barang_id'].'" id="cart">
                    <b style="padding-left:10px">'.$rowHabis['nama_barang'].'</b></a>
                </td>';
            echo "<td id='cart'>$".sprintf("%.2f",$rowHabis['harga_barang'])."</td>";
            echo '<td><div style="color: crimson;"><h5><b>STOK</b></h5></div></td>';
            echo "<td><div style='color: crimson;'><h5><b>HABIS</b></h5></div></td>";
            echo "<td id='cart'><a href='delete_cart.php?id=".$rowHabis['cart_id']."'><class='btn btn-outline-primary'>
            <i class='fa-solid fa-xmark' style='color:black'></i></a>";
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
            echo '
            <div class="p-2 bg-light"><b>
                <div class="border-bottom border-dark border-3"><h5><b>ORDER SUMMARY</b></h5></div>
                <div class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary border-1" style="padding-top: 20px; --bs-border-opacity: .5;">
                    <div class="p-2">Subtotal</div>
                    <div class="p-2"><h6><b>$'.sprintf("%.2f",$subtotal).'</b></h6></div>
                </div>
                <div style="--bs-border-opacity: .5;" class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary border-1"">
                    <div class="p-2">Tax (5%)</div>
                    <div class="p-2"><h6><b>$'.sprintf("%.2f",$tax).'</b></h6></div>
                </div>
                <div style="--bs-border-opacity: .5;" class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary border-1"">
                    <div class="p-2">Shipping</div>
                    <div class="p-2"><h6><b>$'.sprintf("%.2f",$shipping).'</b></h6></div>
                </div>
                <div style="--bs-border-opacity: .5;" class="d-flex flex-row mb-3 justify-content-between border-bottom border-secondary  border-1"">
                    <div class="p-2">Total</div>
                    <div class="p-2"><h6><b>$'.sprintf("%.2f",$total).'</b></h6></div>
                </div>
                <div class="d-flex flex-column mb-3">';
            if ($rowSubTotal['ROUND(SUM(harga_barang*kuantitas), 2)'] == 0){
                echo '
                    <button type="button" class="btn btn-secondary rounded-0" style="width: 100%;">PROCEED TO CHECKOUT</button>';
            }
            else{
                echo ' <a href="http://localhost/proyek/proyek/shipping.php" style="padding-top: 10px; color: white; text-decoration: none;">
                <button type="button" class="btn btn-dark rounded-0" style="width: 100%;">PROCEED TO CHECKOUT</button>
            </a>';
            }   
            
        echo '<a href="http://localhost/proyek/proyek/index.php" style="padding-top: 10px; color: white; text-decoration: none;">
        <button type="button" class="btn btn-dark rounded-0" style="width: 100%;">CONTINUE SHOPPING</button>
    </a></div>
    </b>
</div>
</div>';
            
        }
    }
}


?>

<script>
function add_cart(id){
$(document).ready(function(){
        var quantity = document.getElementById(id).value;
        $.ajax({
            url: "load_cart.php",
            type: "POST",
            async: false,
            data: {
                plus        : 1,
                typeNumber  : quantity,
                punyaCart   : id
            },
            success: function(result) {
                $("#result").remove();
                $("#next").append('<div id="result"></div>');
                $("#result").append(result); 
            }
        });
    
});
}

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
    #cart{
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