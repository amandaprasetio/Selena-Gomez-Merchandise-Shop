<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}


echo "
<div class='alert' style='text-align: center; padding-top: 150px'>
<strong>Hello, ".$_SESSION['username']." Have a great day!</strong><br>
<img src='images/selena.png' style='height: 50vh; width: 50vh;' class='card-img' id='foto'></div>
<div>";
include "footer.php";
echo "</div>";

;			
?>
<!DOCTYPE html>
<html>
<script src="search.js"></script>
<style>
.transition {
    -ms-transform: scale(1.25);
    -webkit-transform: scale(1.25);
    transform: scale(1.25);
}
.card-img {
    transition: transform .5s;
}
</style>

<script>
$(document).ready(function(){
	$("#foto").mouseenter(function(){
		$(this).addClass("transition");
	});
	$("#foto").mouseleave(function(){
		$(this).removeClass("transition");
	});
});
</script>
<body>
	
</body>
</html>