<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
};			
?>
<!DOCTYPE html>
<html>
<script>
	$(document).ready(function() {
	    $.ajax({
	        url: "load_order.php",
	        type: "POST",
	        data: {
	        	sort: 'dateUp'
	        },
	        success: function(result) {
	            $("#item").append(result);

	        }
	    });
	}); 
</script>
<body>
<br><br><br><br>
	<div id="page-container">
    <div id="content-wrap">
		<div class="bg-light bg-opacity-75 p-5 rounded-lg m-3">
			<h3>List Order</h3>
			<div class="p-2" style="margin-right: -8px">
		        <select class="form-select" id="sort" onchange="sort()">
		            <option value="dateUp" selected>Date, new to old</option>
		            <option value="dateDown">Date, old to new</option>
		        </select>
		    </div><br>
			<section class="section contact-section" id="next">
				<div class="row">
					<div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
						<div id="item">
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
	function sort(){
		$(document).ready(function() {
			$("#item").remove();
		    $.ajax({
		        url: "load_order.php",
		        type: "POST",
		        data: {
		        	sort: document.getElementById('sort').value
		        },
		        success: function(result) {
		        	$(".col-md-12").append("<div id='item'></div>")
		            $("#item").append(result);


		        }
		    });
		}); 
	}

	function deleteBill(id) {

		$(document).ready(function() {
			$("#item").remove();
		    $.ajax({
		        url: "load_order.php",
		        type: "POST",
		        data: {
		        	id: id
		        },
		        success: function(result) {
		        	setTimeout(sort, 100);
		        }
		    });
		}); 
	}

	function detailBill(id){
		window.location = 'orderDetail.php?id='+id;
	}
</script>