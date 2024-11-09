<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
	header("location: login.php");
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
		<div class="bg-light bg-opacity-75 p-5 rounded-lg m-3" style="overflow-x: scroll; min-height: 600px">
        <b><a href='http://localhost/proyek/proyek/' style='color: black; text-decoration:none;'>Home</a></b> / Cart<br><br>

			<section class="section contact-section" id="next">
				<div class="row">
					<div class="col-md-12" data-aos="fade-up" data-aos-delay="100" id="next">
						<div id="result">
						</div>
					</div>
				</div>
			</section>

		</div>	
	</div>
	<div><?php include "footer.php";?></div>
</div>

</body>
</html>
<script>
		$(document).ready(function() {
			load_data();
			function load_data() {
				// alert("load bung");
				$.ajax({
					url: "load_cart.php",
					type: "POST",
					success: function(result) {
						$("#result").append(result);

					}
				});
			}
			$("#myTable").width($(window).width());

		});
</script>
<style>
</style>