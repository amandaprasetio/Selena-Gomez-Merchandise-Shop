<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
};			
?>
<!DOCTYPE html>
<html >
<head>
     <script >
     	const id = new URLSearchParams(window.location.search).get('id');
     	$(document).ready(function(){
		
		$.ajax({
				type: "POST",
				url: "load_orderDetail.php",
				data :
				{
				id : id
				},
				success: function(result) {
					$('#page-wrap').append(result);
				}
			});
		});
     </script>
</head>
<body>
<br><br><br><br>
<div id="page-wrap">
</div>
</body>
</html>
<style>
    #cart{
        color: black; 
        text-decoration: none;
    }
</style>