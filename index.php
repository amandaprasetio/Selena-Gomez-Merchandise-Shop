<?php
session_start();
require "connect.php";
include "header.php";
?>

<!DOCTYPE html>
<html>
<body>
    <script>
        $(document).ready(function() {
        start('index');
    });
    </script>
<br><br><br><br>
<div id="page-container">
    <div id="content-wrap">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <a href=""><img src="images/mymind&me.jpg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <a href="http://localhost/proyek/proyek/revelacion.php"><img src="images/revelacion.jpg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <a href="http://localhost/proyek/proyek/revelacion.php"><img src="images/deunavez.jpg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <a href="http://localhost/proyek/proyek/rare.php"><img src="images/rare.jpg" class="d-block w-100"></a>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <a href="http://localhost/proyek/proyek/rare.php"><img src="images/loseyoutoloveme.jpg" class="d-block w-100"></a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="bg-light bg-opacity-75 p-5 rounded m-3">
            <?php include "sort_option.php"; ?>
            <section class="section contact-section" id="next">
                <div class="row row-cols-2 row-cols-md-6 g-4" id="result">
                </div>        
            </section>
        </div>
    </div>
    <div><?php include "footer.php";?></div>
</div>
</body>
</html>