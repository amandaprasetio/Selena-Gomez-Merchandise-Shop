<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
	header("location: login.php");
}
include "header.php";

echo '
<div id="page-container" style="padding-top: 75px">
    <div id="content-wrap">
		<div class="bg-light bg-opacity-75 p-5 rounded-lg m-3" style="overflow-x: scroll;">
        <b><a href="http://localhost/proyek/proyek/" style="color: black; text-decoration:none;">Home</a></b> / Wishlist<br><br>

			<section class="section contact-section" id="next">
				<div class="row">
					<div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
						<div id="result">
						</div>
					</div>
				</div>
			</section>

		</div>	
	</div>
	<div>';
include "footer.php";
echo '</div>
</div>
';
?>
<script>
$(document).ready(function() {
	load_data();
	function load_data() {
		// alert("load bung");
		$.ajax({
			url		: "load_wishlist.php",
			type	: "POST",
			data	:{
				yey		: 1
			},
			success: function(result) {
				$("#result").append(result);
			}
		});
	}

});
</script>