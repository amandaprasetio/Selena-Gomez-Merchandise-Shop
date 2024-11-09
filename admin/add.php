<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}
include "header.php";


if(isset($_POST['save'])){
	if (is_uploaded_file($_FILES['foto']['tmp_name'])) 
	{ 
		//First, Validate the file name
		if(empty($_FILES['foto']['name']))
		{
			echo " File name is empty! ";
			exit;
		}

		$upload_file_name = $_FILES['foto']['name'];
		//Too long file name?
		if(strlen ($upload_file_name)>100)
		{
			echo " too long file name ";
			exit;
		}

		//replace any non-alpha-numeric cracters in th file name
		$upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
		//set a limit to the file upload size
		if ($_FILES['foto']['size'] > 1000000) 
		{
			echo " too big file ";
			exit;        
		}

		//Save the file
		$dest=__DIR__.'/uploads/'.$upload_file_name;
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $dest)) 
		{
			echo 'File Has Been Uploaded !';

			$nama=$_POST['nama'];
			$harga=$_POST['harga'];
			$stok=$_POST['stok'];
			$deskripsi=$_POST['deskripsi'];
			$album=$_POST['album'];
			$jenis=$_POST['jenis'];
			$filename=$_FILES['foto']['name'];

			mysqli_query($con,"insert into barang values(null,'$nama',$harga,$stok,'$deskripsi','$album','$jenis','$filename')");
			header("location: add.php");
		}
  	}
	
}


?>
<!DOCTYPE html>
<html>
<script>
$(document).ready(function(){
	
});
    function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah')
					.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}

	}
</script>
<body>
<br><br><br>
<div id="page-container">
	<div id="content-wrap">
		<div class="container">
			<div class="bg-light bg-opacity-75 p-3 m-3">
				<h3> Add Merchandise</h3><br>
				<form action="add.php" method="post" enctype="multipart/form-data">
					<div class="mb-3 row">
						<label class="col-sm-2">Nama Barang</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nama" name="nama" required onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126))'>
						</div>
					</div>
			
					<div class="mb-3 row">
						<label class="col-sm-2">Harga</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="harga" name="harga" required onkeypress='return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode = 46)'>
							<!-- <div id="warning2" class="alert alert-danger alert-dismissible fade show" role="alert">
                            	Must be a number or a period (.).
                            	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        	</div> -->
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Stok</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="stok" name="stok" required onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'> 
							<!-- <div id="warning3" class="alert alert-danger alert-dismissible fade show" role="alert">
                            	Must be a number.
                            	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        	</div> -->
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Deskripsi</label>
						<div class="col-sm-6">
							<textarea class="form-control" id="deskripsi" name="deskripsi" required onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126))'></textarea>
							<!-- <div id="warning4" class="alert alert-danger alert-dismissible fade show" role="alert">
                            	Remove the apostrophe (').
                            	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        	</div> -->
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Album</label>
						<div class="col-sm-6">
						<select class="form-select" aria-label="Default select example" name="album" required>
							<option value="rare">Rare</option>
							<option value="revival">Revival</option>
							<option value="revelación">Revelación</option>
						</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Jenis Barang</label>
						<div class="col-sm-6">
							<select class="form-select" aria-label="Default select example" name="jenis" required>
								<option value="merch">Merch</option>
								<option value="all music">All Music</option>
								<option value="vinyl">Vinyl</option>
								<option value="cd">CD</option>
								<option value="cassette">Cassette</option>
								<option value="tees">Tees</option>
								<option value="longsleeves">Longsleeves</option>
								<option value="sweatshirts">Sweatshirts</option>
								<option value="sweats">Sweats</option>
								<option value="accessories">Accessories</option>
							</select>    			
						</div>
					</div>
					<div class="mb-3 row"><div class="col-sm-8">
						<div class="input-group">
							<input required type="file" onchange="readURL(this);" class="form-control" id="foto" name="foto" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/png, image/jpeg"/>
						</div>	
						<img id="blah" src="#" alt="your image" width="500px"/>
					</div></div>		
					<button name="save" type="submit" class="btn btn-transparent">Save <i class='fas fa-save' style='color:black'></i></button>
				</form>			
			</div>	
		</div>	
	<div><?php include "footer.php";?></div>
</div>
</body>
</html>