<?php
session_start();
require "connect.php";
$id = $_POST['id'];
$total = 0;
$result=mysqli_query($con,"SELECT * FROM item_bill i JOIN barang b ON i.barang_id = b.barang_id WHERE i.date = (SELECT date FROM item_bill WHERE item_bill_id = '$id')");
echo '<div id="page-container" style="padding-top: 70px;">
        <div id="content-wrap">
        <div class="container">
            <div class="bg-light bg-opacity-75 p-5 rounded-lg m-3" style="overflow-x: scroll;">
                <h3><b style="padding: 7px;">Detail Order</b></h3><br>

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
while($row = mysqli_fetch_assoc($result)){
    $path = 'uploads/';
    $location = $path.$row['foto'];
    echo '<tr class="bg-light">';
    echo '<td><img class="img-hover-zoom" width="150" height="150" src= "'.$location.'"></td>';
    echo '<td><a href="http://localhost/proyek/product.php?id='.$row['barang_id'].'"  id="cart">
            <b style="padding-left:10px">'.$row['nama_barang'].'</b></a>
        </td>';
    echo "<td id='cart'>$".sprintf("%.2f",$row['harga_barang'])."</td>";
    echo '<td>'.$row['jumlah'].'</td>';
    echo '<td><b>$'.sprintf('%.2f',$row['jumlah']*$row['harga_barang']).'</b></td>';
    echo "</tr>";
    $total += $row['jumlah']*$row['harga_barang'];
}
echo '</tbody></table></div>';

$result=mysqli_query($con,"SELECT * FROM alamat NATURAL JOIN item_bill WHERE item_bill_id = '$id'");   
 while($row = mysqli_fetch_assoc($result)){  
    echo '<div class="p-2 bg-light"><b>
         <div class="border-bottom border-dark border-3"><h5><b>SHIPPING INFORMATION</b></h5></div>
         <div class="p-2">
             <div>'.$row['nama'].' | Phone Number: '.$row['nomor'].'</div><br>
             <div>Email: '.$row['email'].'</div><br>
             <div>'.$row['alamat'].'</div><br>
             <div style="padding-bottom: 20px">'.$row['kecamatan'].', Kota '.$row['kota'].', '.$row['provinsi'].', '.$row['kode_pos'].'</div>
         </div>
         ';
    $done = $row['done'];
    }
    
    $subtotal=$total;
    $tax=ROUND($subtotal*0.05, 2);
    $shipping=10;
    $total=$subtotal+$tax+$shipping;        
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

            <button class="btn btn-dark rounded-0" style="width: 100%;" onclick="back()">BACK</button>';
            if ($done == 0){
                echo '
                <div style="padding-top: 10px 
                    <button type="button" onclick="deleteBill()" class="btn btn-dark rounded-0 opacity-75" style="width: 100%;">FINISH</button>
                </div>';
            }
            else{
                echo '
                <div style="padding-top: 10px 
                    <button type="button" class="btn btn-dark rounded-0 opacity-75" style="width: 100%;" disable>FINISH</button>
                </div>';
            }
            echo'
        </div>
        </b>
    </div>
</div>
</div>
</div>	<div>';
include "footer.php";
echo '</div>
</div>';
?>
<script>
	function back(){
		window.location="order.php";
	}
	function deleteBill(){
		$(document).ready(function() {
		    $.ajax({
		        url: "load_order.php",
		        type: "POST",
		        data: {
		        	id: id
		        },
		        success: function(result) {
		        	window.location="order.php";
		        }
		    });
		}); 
	}
</script>


