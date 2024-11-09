<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel='icon' href='images/selgom.png' type='images/selgom.png'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
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
    .wrapper{ width: 360px; padding: 20px; margin:0 auto; }

    #page-container {
      position: relative;
      min-height: 90vh;
    }

    #content-wrap {
      padding-bottom: 2.5rem;
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
            <a class="nav-link" href="http://localhost/proyek/proyek/admin/login.php">Login</a>
        </li>
      </ul>
    
      </div>
  </div>
</nav>
<body>
<div id="page-container" style="margin-top: 100px">
  <div id="content-wrap">
    <div class="wrapper">    
    <form action="loginprocess.php" method="post">
        <h2>Admin Login</h2>
        <p class="hint-text">Enter Login Details</p>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" onkeypress='return ((event.charCode >= 33 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" onkeypress='return ((event.charCode >= 33 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>
        </div>
        <div class="form-group"> 
            <button type="submit" name="save" class="btn bg-transparent btn-block">Login</button>
        </div>
    </form>
  </div>
<div><?php include "footer.php";?></div>
</body>