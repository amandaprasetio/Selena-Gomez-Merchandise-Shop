<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel='icon' href='images/selgom.png' type='images/selgom.png'>
<script type="text/javascript" src="jquery-3.6.1.js"  rel="stylesheet" ></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{ 
			font: 14px sans-serif; 
			background-size: 100%;
			background-position: center;
      background-attachment: fixed;
			background-image: url("images/white2.jpg")
    }
    .wrapper{ width: 360px; padding: 20px; margin:0 auto;}
    #page-container {
      position: relative;
      min-height: 100vh;
    }
    #content-wrap {
    padding-bottom: 2.5rem;
    }
    .dropdown .dropbtn {
      font-size: 16px;  
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

</style>
<title>Selena Gomez Merchandise Shop</title>

</head>
<body onload="hideLoading()">
  <link rel="stylesheet" rel="stylesheet" href="loading/loading.css"/>
    <div class="overlay">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div style="color: white; top:55%;">Loading...</div>
    </div>
    <script src="loading/script.js"></script>
</body>
<nav class="navbar navbar-expand-lg fixed-top bg-light bg-opacity-50">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/proyek/proyek/index.php">
        <img src="images/logo.png" style="height: 30px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="http://localhost/proyek/proyek/index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Album
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/revelacion.php">Revelación</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/rare.php">Rare</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/revival.php">Revival</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Music
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/allmusic.php">All Music</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/vinyl.php">Vinyl</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/cd.php">CD</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/cassette.php">Cassette</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Collections
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/merch.php">All Merchandise</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/tees.php">Tees</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/longsleeves.php">Longsleeves</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/sweatshirts.php">Sweatshirts</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/sweats.php">Sweats</a></li>
            <li><a class="dropdown-item" href="http://localhost/proyek/proyek/accessories.php">Accessories</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyek/proyek/review.php">Review</a>
        </li>
        <li>
        <?php
        if (!isset ($_SESSION["email"])){
          echo '
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/proyek/proyek/login.php">Login</a>
            </li>
            ';
        }
        else{
          echo '
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/proyek/proyek/logout.php">Logout</a>
            </li>
            ';
        }
        ?>
      </ul>
        
      <ul class="navbar-nav  mb-2 mb-lg">

      <div style="padding-left: 10px; padding-top: 3px;">
      <a href='http://localhost/proyek/proyek/user.php'><button class="btn btn-dark bg-transparent" type="button">
        <i class="fa-solid fa-user" style='color: black;'></i></button></a>
      </div>
      <div style="padding-left: 10px; padding-top: 3px;">
      <a href='http://localhost/proyek/proyek/wishlist.php'><button class="btn btn-dark bg-transparent" type="button">
        <i class="fa-regular fa-heart" style="color: black;"></i></button></a>
      </div>
      <div style="padding-left: 10px; padding-top: 3px;">
        <div><a href='http://localhost/proyek/proyek/cart.php'>
          <!-- <button class="btn btn-sm bg-transparent" type="button"> -->
            <?php 
              if (isset ($_SESSION["email"])){
                $email = $_SESSION["email"];
                $query = mysqli_query($con, "SELECT * FROM user");
                while ($row = mysqli_fetch_assoc($query)) {
                  if ($row['email'] == $email){
                    $user_id = $row['user_id'];

                    $sum = mysqli_query($con, "SELECT SUM(kuantitas) FROM cart c JOIN barang b WHERE (user_id = $user_id) AND (b.stok_barang > 0) AND (c.barang_id = b.barang_id);");
                    while ($rowSum = mysqli_fetch_assoc($sum)) {
                      if ($rowSum['SUM(kuantitas)'] == 0){
                        echo "<button class='btn btn-dark bg-transparent' id='hadeh' name='hadeh' type='button'><i class='fa-solid fa-bag-shopping' style='color: black;'>";                      
                      }
                      else{
                        echo '<button class="btn btn-dark bg-transparent position-relative" type="button" id="hadeh" name="hadeh">
                        <i class="fa-solid fa-bag-shopping" style="color: black;">
                          <span class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem" id="badgeSum" name="badgeSum">'.$rowSum['SUM(kuantitas)'].'
                              <span class="visually-hidden">cart</span>
                            </span>';
                      }
                    }

                  }
                }
                
              }else{
                echo "<button class='btn btn-dark bg-transparent' id='hadeh' name='hadeh' type='button'><i class='fa-solid fa-bag-shopping' style='color: black;'>";
              }
            ?>
        <!-- </button> -->
        </i></button></a></div></div >
      </ul>

      </div>
  </div>
</nav>