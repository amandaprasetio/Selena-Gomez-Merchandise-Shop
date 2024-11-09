<?php
session_start();
require "connect.php";
$alamat_id=$_GET['id'];
if(isset($_POST['save'])){
    $alamat_id = $_POST['alamat'];
    $nama   = $_POST['nama'];
    $nomor  = $_POST['nomor'];
    $exp    = $_POST['exp'];
    $cvv    = $_POST['cvv'];
   
    $query = mysqli_query($con, "SELECT * FROM bank");
    while ($row = mysqli_fetch_assoc($query)) {
        if (($row['nomor_kartu'] != $nomor) || (strtoupper($row['nama']) || strtoupper($nama)) || ($row['tanggal_kadaluarsa'] == $exp) || ($row['cvv'] == $cvv)){
            echo "<script>
            window.location.href='payment.php?id=".$alamat_id."';
            window.alert('Data yang Anda inputkan salah. Silakan coba lagi.');
            </script>";
        }
        if (($row['nomor_kartu'] == $nomor) && (strtoupper($row['nama']) == strtoupper($nama)) && ($row['tanggal_kadaluarsa'] == $exp) && ($row['cvv'] == $cvv)){
            header("location: checkout.php?id=$alamat_id");
        }
    }
   
}
else{
    if (!isset ($_SESSION["email"])){
        header("location: login.php");
    }
    include "header.php";
}


?>
<!DOCTYPE html>
<html>
<style>

</style>
<script>
$(document).ready(function(){
    $(".alert").hide();

    $('input[type="text"]').blur(function(){
        
        if (($('#nomor').val().length != 16)){
            $("#warning1").fadeIn(1000);
        }
        else {
            $("#warning1").fadeOut(1000);
        }
        
        if (($('#cvv').val().length != 3)){
            $("#warning2").fadeIn(1000);
        }
        else {
            $("#warning2").fadeOut(1000);
        }
        
    });

});
</script>
<body>
<br><br><br>
<div id="page-container">
	<div id="content-wrap">
		<div class="container" style="padding-top: 20px; width: 500px">
			<div class="bg-light bg-opacity-75 p-3 m-3" style="overflow-x: scroll;">
				
				<form action="payment.php" method="post" enctype="multipart/form-data">
                    <h3><b>Payment</b></h3><br>

                    <div class="mb-3">
                        <label class="form-label">Name on Card *</label>
                        <input type="text" class="form-control" name="nama" placeholder="John Doe" required>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Credit Card Number *</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" placeholder="1111222233334444" minlength="16" min="0000000000000000" max="9999999999999999" required onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>
                        <div id="warning1" class="alert alert-danger alert-dismissible fade show" role="alert">
                            Must be 16 digit.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-row mb-3">
                        <div class="p-2 flex-fill">
                            <label class="form-label">Exp Month/Year *</label>
                            <input type="text" class="form-control" name="exp" placeholder="MM/YY" required onkeypress='return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 47)'>
                        </div>
                        <div class="p-2 flex-fill">
                            <label class="form-label">CVV *</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="000" min="000" max="999" minlength="3" required onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>
                            <div id="warning2" class="alert alert-danger alert-dismissible fade show" role="alert">
                                Must be 3 digit.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right">
                        <p style="padding-right: 10px; color: crimson">* required</p>
                    </div>
                    <div class="d-flex flex-row mb-3 justify-content-between">
                        <div class="p-2">
                            <a href="http://localhost/proyek/proyek/cart.php" style="color: white; text-decoration: none;">
                            <button type="button" class="btn btn-dark rounded-0 opacity-75">BACK TO CART</button>
                            </a>
                        </div>
                        <div class="p-2">
                            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat_id;?>" hidden>
                            <button name="save" type="submit" class="btn btn-dark rounded-0">PROCEED</button>
                        </div>
                    </div>
                    
                </form>			
			</div>	
		</div>	
    </div>
	<div><?php include "footer.php";?></div>
</div>
</body>
</html>