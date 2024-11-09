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
	<script>
		const id = new URLSearchParams(window.location.search).get('id');
	    $(document).ready(function() {
			$.ajax({
			    url: "load_address.php",
			    type: "POST",
			    data: {
			        id: id,
			    },
			    success: function(result) {
			        
			        $("#address").append(result);
			    },
			});
		});	
    </script>
<body>

<br><br><br>
<div id="page-container">
	<div id="content-wrap">
		<div class="container" style="padding-top: 20px;">
			<div class="bg-light bg-opacity-75 p-3 m-3">
				<div id="address"></div>
			</div>	
		</div>	
	<div><?php include "footer.php";?></div>
</div>
</body>
</html>