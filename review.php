<?php
session_start();
require "connect.php";

if (isset($_POST['indroGlowing'])){
    $sql="SELECT * FROM review ORDER BY review_id DESC";
    $result=mysqli_query($con, $sql);
    while($row=mysqli_fetch_array($result)){    
        $query = mysqli_query($con, "SELECT * FROM user");
        while ($rowUser = mysqli_fetch_assoc($query)) {
            if ($rowUser['user_id'] == $row['user_id']){
                $namaUser = $rowUser['first_name'].' '.$rowUser['last_name'];
                $user_id = $rowUser['user_id'];
            }
        }
        if ($row['anonymous'] == 'N'){
            $namaUser = substr($namaUser,0,1).'*****';
        }

        $query = mysqli_query($con, "SELECT * FROM barang");
        while ($rowBarang = mysqli_fetch_assoc($query)) {
            if ($row['barang_id'] == $rowBarang['barang_id']){
                $namaBarang=$rowBarang['nama_barang'];
                $barang_id=$rowBarang['barang_id'];
            }
        }
        $starPenuh = str_repeat('<i class="fa-solid fa-star"></i>', $row['star']);
        $starKosong = str_repeat('<i class="fa-regular fa-star"></i>',(5-$row['star']));
        echo "
		<div class='bg-light p-3 rounded-lg m-3' style='min-height: 250px; width: 98%;'>
            <div class='d-flex justify-content-between'>
                <div class='p-2'><h6><b>".$namaUser."</b></h6></div>
                <div class='p-2'><p style='color: grey'>".$row['date']."</p></div>
            </div>        
            <div class='d-flex justify-content-between'>  
                <div class='p-2'>
                    <a href='http://localhost/proyek/proyek/product.php?id=".$barang_id."' style='color: black; text-decoration: none'>
                        <p>".$namaBarang."</p>
                    </a>
                </div>
                <div class='p-2'>".$starPenuh."".$starKosong."</div>
            </div>
            <div class='d-flex justify-content-start'>  
                <div class='p-2'>
                    <p><pre>".$row['deskripsi']."</pre></p>
                </div>
            </div>";
        $queryRespond = mysqli_query($con, "SELECT * FROM review r JOIN barang b ON (r.barang_id = b.barang_id) JOIN response re ON (r.review_id = re.review_id) WHERE r.barang_id=$barang_id AND r.user_id=$user_id;");
        if (!empty($queryRespond)){
            while (($rowRespond = mysqli_fetch_assoc($queryRespond))) {
                echo "
                    <div class='bg-dark bg-opacity-25 p-2'>
                        <p><b>Admin</b></p>
                        <div name='review_id' id='review_id' hidden>".$rowRespond['response_id']."</div>
                        <div name='deskripsi' id='deskripsi'>".$rowRespond['response']."</div>
                    </div>
                ";
            }
        }
        echo "
        </div>
        
        ";
    }
    exit();
}


if (isset($_POST['save'])){
    if (!isset ($_SESSION["email"])){
        header("location: login.php");
    }

    $namaBarang = $_POST['namaBarang'];
    $query = mysqli_query($con, "SELECT * FROM barang");
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['nama_barang'] == $namaBarang){
            $barang_id=$row['barang_id'];
        }
    }
    
    $query = mysqli_query($con, "SELECT * FROM user");
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['email'] == $_SESSION['email']){
            $user_id = $row['user_id'];
        }
    }

    $star       = $_POST['star'];
    $deskripsi  = $_POST['deskripsi'];
    if(!empty($_POST['boleh'])) $anon = 'Y';
    else                        $anon = 'N';
    
    // $boleh      = $_POST['boleh'];

    // if ($boleh == False){ $anon = 'N';}
    // else {}

    $queryCekBill = mysqli_query($con, "SELECT * FROM item_bill");
    while($rowBill=mysqli_fetch_array($queryCekBill)){
        if (($rowBill['user_id'] == $user_id) && ($rowBill['barang_id'] == $barang_id)) {
            mysqli_query($con, "INSERT INTO review VALUES(null,".$barang_id.",".$user_id.",".$star.",'".$deskripsi."',null,'".$anon."');");
            header("location: review.php");
            exit();
        }
    }
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Data pembelian Anda untuk produk ini tidak ada di database kami.');
    window.location.href='review.php';
    </script>";
    exit();
}
include "header.php";

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</html>
<body>
<br><br><br><br>
<div id="page-container">
    <div id="content-wrap">
		<div class="bg-light bg-opacity-75 p-5 rounded-lg m-3">
        <b><a href='http://localhost/proyek/proyek/' style='color: black; text-decoration:none;'>Home</a></b> / Review<br><br>

            <form action="review.php" method="post" enctype="multipart/form-data">
                <h3><b>Beri Ulasan</b></h3><br>

                <div class="mb-3">
                    <label class="form-label">Nama Produk *</label>
                    <select name="namaBarang" id="namaBarang" placeholder="Select an Item" required>
                        <option value="">Select an item</option>
                        <?php 
                            $sql=mysqli_query($con, "SELECT * FROM barang");
                            while ($data=mysqli_fetch_assoc($sql)) {
                        ?>
                        <option value="<?=$data["nama_barang"]?>"><?=$data["nama_barang"]?></option>
                        <?php
                        }
                        ?>
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bagaimana kualitas produk ini secara keseluruhan? *</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="star" id="star" value="1">
                        <label class="form-check-label" style="padding-top: 2.5px" >
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="star" id="star" value="2">
                        <label class="form-check-label"  style="padding-top: 2.5px">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="star" id="star" value="3">
                        <label class="form-check-label"  style="padding-top: 2.5px">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="star" id="star" value="4">
                        <label class="form-check-label"  style="padding-top: 2.5px">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="star" id="star" value="5">
                        <label class="form-check-label"  style="padding-top: 2.5px">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Berikan ulasan untuk produk ini *</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Tulis deskripsi Anda untuk produk ini." required  onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126))'></textarea>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="boleh" id="boleh">
                        <label class="form-check-label" for="flexCheckDefault" style="padding-top: 2.5px">
                            Tampilkan nama Anda
                        </label>
                    </div>
                </div>
                <button name="save" id="save" type="submit" class="btn btn-dark rounded-0" disabled>SUBMIT</button>
            </form>
		</div>	
        <section class="section contact-section" style="padding-top: 10px; width: 99%;">
            <div class="row bg-dark" data-aos="fade-up" data-aos-delay="100" id="result">
                <h3 style="color: white; text-align: center; padding-top: 10px;"><b >People's Review</b></h3><br>

            </div>
        </section>
	</div>
	<div><?php include "footer.php";?></div>
</div>

</body>
</html>
<script>
$(document).ready(function() {
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    const submitButton = document.getElementById('save');

    radioButtons.forEach(radioButton => {
      radioButton.addEventListener('change', () => {
        submitButton.disabled = false;
      });
    });

    $('#namaBarang').selectize({
          sortField: 'text'
      });

    showdata();

    function showdata(){
    $.ajax({
        url     : "review.php",
        type    : "POST",
        async   : true,
        data    : {
            indroGlowing: 1
        },
        success : function(res){
            $("#result").append(res);
        }
    });
}

});    

</script>
<style>
</style>