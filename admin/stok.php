<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
</html>
<body>
	<script>
		$(document).ready(function(){
			start("index");
		});
	</script>
<br><br><br><br>
<div id="page-container">
    <div id="content-wrap">
		<div class="bg-light bg-opacity-75 p-5 rounded-lg m-3">
			<h3>List Barang</h3>
			<?php include "sort_stock_option.php"; ?><br>
			<section class="section contact-section" id="next"  style="overflow-x: scroll">
				<div class="row">
					<div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
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