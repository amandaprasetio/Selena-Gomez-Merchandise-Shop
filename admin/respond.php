<?php
session_start();
require "connect.php";

if (!isset ($_SESSION["username"])){
	header("location: login.php");
}

if (isset($_POST['save'])){
    if (!isset ($_SESSION["username"])){
        header("location: login.php");
    }
    $user_id = $_POST['user_id'];
    $desc = $_POST['deskripsi'];
    $barang_id = $_POST['barang_id'];
    $queryReview = mysqli_query($con, "SELECT * FROM review r JOIN barang b ON (r.barang_id = b.barang_id) WHERE r.barang_id=$barang_id AND r.user_id=$user_id;");
    while ($rowReview = mysqli_fetch_assoc($queryReview)) {
        $review_id = $rowReview['review_id'];
        $queryRespon = mysqli_query($con, "SELECT * FROM review r JOIN response re ON (r.review_id = re.review_id) WHERE re.review_id=$review_id");

        while ($rowRespon = mysqli_fetch_assoc($queryRespon)){
            $response_id = $rowRespon['response_id'];
            if (empty($desc)){
                mysqli_query($con, "DELETE FROM response WHERE response_id=$response_id;");
            }                
            else{
                mysqli_query($con, "UPDATE response SET response = '$desc' WHERE response_id=$response_id;");
            }
            break;
        }
        if (empty($rowRespon)){
            mysqli_query($con, "INSERT INTO response VALUES(null, $review_id,'".$desc."');");
        }
            
    }
}

if (isset($_POST['indroGlowing'])){
    $sql="SELECT * FROM review ORDER BY review_id DESC";
    $result=mysqli_query($con, $sql);
    while($row=mysqli_fetch_array($result)){    
        $query = mysqli_query($con, "SELECT * FROM user");
        while ($rowUser = mysqli_fetch_assoc($query)) {
            if ($rowUser['user_id'] == $row['user_id']){
                $namaUser = $rowUser['first_name'].' '.$rowUser['last_name'];
                $user_id=$rowUser['user_id'];
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
		<div class=' bg-light p-3 rounded-lg m-3' style='min-height: 250px; width: 98%;'>
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
            </div>
            ";
        $queryRespond = mysqli_query($con, "SELECT * FROM review r JOIN barang b ON (r.barang_id = b.barang_id) JOIN response re ON (r.review_id = re.review_id) WHERE r.barang_id=$barang_id AND r.user_id=$user_id;");
        $desc='';
        while (($rowRespond = mysqli_fetch_assoc($queryRespond))) {
            $desc = $rowRespond['response'];
        }
            echo "
            <p>
                <button class='btn btn-dark rounded-0' type='button' data-bs-toggle='collapse' data-bs-target='#collapseExample".$barang_id."' aria-expanded='false' aria-controls='collapseExample".$barang_id."'>
                    Response
                </button>
            </p>
            <div class='collapse bg-dark bg-opacity-25 p-2' id='collapseExample".$barang_id."'>
                <form action='respond.php' method='post' enctype='multipart/form-data'>
                    <p><b>Response</b></p>
                    <input name='barang_id' id='barang_id' value='".$barang_id."' hidden>
                    <input name='user_id' id='user_id' value='".$user_id."' hidden>

                    <textarea class='form-control' name='deskripsi' id='deskripsi' placeholder='Tulis tanggapan untuk ulasan ini.' onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>".$desc."</textarea>
                    <div style='padding-top: 10px'>
                        <button name='save' type='submit' class='btn btn-dark rounded-0'>SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>";
    }
    exit();
}
include "header.php";

?>
<!DOCTYPE html>
<html>

</html>
<body>
<br><br><br><br>
<div id="page-container">
    <div id="content-wrap">
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
    showdata();

    function showdata(){
    $.ajax({
        url     : "respond.php",
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