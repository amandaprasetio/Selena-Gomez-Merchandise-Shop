<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
    header("location: login.php");
}
include "header.php";

echo'
<div id="page-container" style="padding-top: 70px;">
    <div id="content-wrap">
        <div class="bg-light bg-opacity-75 p-5 rounded-lg m-3" style="min-height: 400px;overflow-x: scroll;">
            <h6>
            <div style="color: black; padding: 70px;  text-align: center; vertical-align: middle;">
                <b><i class="fa-solid fa-circle-info fa-2xl" style="padding-top: 30px"></i></p>
                <b><p>Pembayaran terverifikasi dan pesanan sedang kami proses.</p>
                <p>Mohon tunggu konfirmasi selanjutnya untuk proses pengiriman.</p></b>
                <p style="font-size: 14px">* Checkout Pesanan sudah kami kirimkan lewat email yang tertera.</p>
                
                <a href="http://localhost/proyek/proyek/index.php" style="color: white; text-decoration: none;">
                    <button type="button" class="btn btn-dark rounded-0" style="width: 55%;">CONTINUE SHOPPING</button>
                </a>
            </div>
            </h6>
        </div>';
        include "footer.php";
echo '
    </div>
</div>
';

?>