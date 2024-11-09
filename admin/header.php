<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel='icon' href='images/selgom.png' type='images/selgom.png'>
<script type="text/javascript" src="jquery-3.6.1.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{ 
			font: 14px sans-serif; 
			background-size: 100%;
			background-position: center;
			background-repeat: no-repeat;
      background-attachment: fixed;
			background-image: url("images/cream.jpg")}
    .wrapper{ width: 360px; padding: 20px; margin:0 auto;}
    #page-container {
    position: relative;
    min-height: 100vh;
    }

    #content-wrap {
    padding-bottom: 2.5rem;
    }
    .navbar{
      background-image: url("images/navbar.jpg");
      background-position: center;
      background-size: 100%;
    }
</style>
<title>Selena Gomez Merchandise Shop</title>

</head>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/proyek/proyek/admin/index.php">
        <img src="images/logo.png" style="height: 30px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="http://localhost/proyek/proyek/admin/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyek/proyek/admin/add.php">Add</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyek/proyek/admin/stok.php">Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyek/proyek/admin/order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyek/proyek/admin/respond.php">Respond</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyek/proyek/admin/logout.php">Logout</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2 bg-light bg-opacity-50" type="text" placeholder="Search" aria-label="Search" id="search"/>
        <button class="btn bg-light bg-opacity-50" id="submit" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>