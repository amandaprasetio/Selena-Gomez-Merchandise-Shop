<?php
session_start();
require "connect.php";
$query = mysqli_query($con, "SELECT * FROM user");

while ($row = mysqli_fetch_assoc($query)) {
    if ($row['email'] == $_SESSION['email']){
        $user_id=$row['user_id'];
    }
}
if (!isset ($_SESSION["email"])){
        header("location: login.php");
    }
    include "header.php";
?>

<!DOCTYPE html>
<html>
<style>
</style>
<script>
</script>
<body>
<br><br><br>
<div id="page-container">
	<div id="content-wrap">
		<div class="container" style="padding-top: 20px;">
			<div class="bg-light bg-opacity-75 p-3 m-3">
				
            <?php
                $queryAlamat = mysqli_query($con, "SELECT * FROM alamat WHERE user_id = $user_id;");
                while($row =mysqli_fetch_assoc($queryAlamat)){
                    echo'
                <div class="d-flex flex-row mb-3 justify-content-between">
                    <input class="form-check-input" style="margin-right:10px;" type="radio" name="selected" id="alamat_id" value="'.$row['alamat_id'].'"></input>
                    <div class="p-2 flex-fill">
                        <div> '.$row['nama'].' | Phone Number: '.$row['nomor'].'</div><br>
                        <div>'.$row['alamat'].'</div><br>
                        <div>'.$row['kecamatan'].', Kota '.$row['kota'].', '.$row['provinsi'].', '.$row['kode_pos'].'</div>
                    </div>
                    <div class="p-2">
                        <div class="d-flex>
                            <button class="btn p-2 rounded-0" id="editAlamat" onclick="editAddress('.$row['alamat_id'].');"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="btn p-2 rounded-0" onclick="deleteAddress('.$row['alamat_id'].')"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </div>
                </div>

                <hr style="background-color: black">                      		
                ';

                };
                echo'
                <div class="d-flex flex-row mb-3 justify-content-between">
                    <button class="p-2 btn rounded-0 btn-dark" onclick="addAddress()">ADD ADDRESS</button>
                    <a href="http://localhost/proyek/proyek/cart.php" style="color: white; text-decoration: none;">
                    <button class="p-2 btn rounded-0 btn-dark">BACK TO CART</button>
                    </a>
                    <button class="p-2 btn rounded-0 btn-dark" id="payment" onclick="goToPayment()" disabled>Payment</button>
                </div>';
            ?>
			</div>	
		</div>	
	<div><?php include "footer.php";?></div>
</div>
</body>
</html>
<script type="text/javascript">
    const submitButton = document.getElementById('payment');
    const radioButtons = document.querySelectorAll('input[type="radio"]');


    radioButtons.forEach(radioButton => {
      radioButton.addEventListener('change', () => {
        submitButton.disabled = false;
      });
    });


    function goToPayment(){
        id = $(".form-check-input:checked").val();

        window.location= "http://localhost/proyek/proyek/payment.php?id="+id;
    }
    function editAddress(id){        
        window.location = "http://localhost/proyek/proyek/add_address.php?id="+id;
    }
    function addAddress(){
        window.location = "http://localhost/proyek/proyek/add_address.php?";
    }
    function deleteAddress($id){
        $(document).ready(function() {
           $.ajax({
               url: 'addressing.php',
               type: "POST",
               data: { id: $id },
               success: function(response) {
                    window.location = "shipping.php";
               }
           });
        });  
    }              
</script>
