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
<script>
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
				<?php
					$barang_id=$_GET['barang_id'];
					$sql="SELECT * FROM barang WHERE barang_id='$barang_id'";
					$res=mysqli_query($con,$sql);
					if(!empty($res))
					{		
						while($row=mysqli_fetch_array($res))
						{
							$barang_id=$row[0];
							$nama_barang=$row[1];
							$harga_barang=$row[2];
							$stok_barang=$row[3];
							$deskripsi=$row[4];
							$album=$row[5];
							$jenis=$row[6];
							$foto=$row[7];
						}
					}
				?>
				<h3> Edit Merchandise</h3><br>
				<form action="update.php" method="post" enctype="multipart/form-data">
					<div class="mb-3 row">
						<label class="col-sm-2">ID Barang</label>
						<div class="col-sm-6">
							<input type="text" readonly="readonly" class="form-control" name="barang_id" value="<?php echo $barang_id; ?>">
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Nama Barang</label>
						<div class="col-sm-6">
						<input required type="text" class="form-control" name="nama" value="<?php echo $nama_barang; ?>"  onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126))'>
						</div>
					</div>
			
					<div class="mb-3 row">
						<label class="col-sm-2">Harga</label>
						<div class="col-sm-6">
						<input required type="text" class="form-control" name="harga" value="<?php echo $harga_barang; ?>"  onkeypress='return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode = 46)'>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Stok</label>
						<div class="col-sm-6">
						<input required type="text" class="form-control" name="stok" value="<?php echo $stok_barang; ?>" onkeypress='return (event.charCode >= 48 && event.charCode <= 57)'>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Deskripsi</label>
						<div class="col-sm-6">
						<textarea required class="form-control" name="deskripsi" onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126))'><?php echo $deskripsi; ?></textarea>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Album</label>
						<div class="col-sm-6">
							<select required class="form-select" aria-label="Default select example" name="album">
								<option value="rare" <?php if ($album == "rare"){ echo 'selected'; }?>>Rare</option>
								<option value="revival" <?php if ($album == "revival"){ echo 'selected'; }?>>Revival</option>
								<option value="revelación" <?php if ($album == "revelación"){ echo 'selected'; }?>>Revelación</option>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-sm-2">Jenis Barang</label>
						<div class="col-sm-6">
							<select required class="form-select" aria-label="Default select example" name="jenis" selected="<?php echo $jenis?>">
								<option value="merch" <?php if ($jenis == "merch"){ echo 'selected'; }?>>Merch</option>
								<option value="all music" <?php if ($jenis == "all music"){ echo 'selected'; }?>>All Music</option>
								<option value="vinyl" <?php if ($jenis == "vinyl"){ echo 'selected'; }?>>Vinyl</option>
								<option value="cd" <?php if ($jenis == "cd"){ echo 'selected'; }?>>CD</option>
								<option value="cassette" <?php if ($jenis == "cassette"){ echo 'selected'; }?>>Cassette</option>
								<option value="tees" <?php if ($jenis == "tees"){ echo 'selected'; }?>>Tees</option>
								<option value="longsleeves" <?php if ($jenis == "longsleeves"){ echo 'selected'; }?>>Longsleeves</option>
								<option value="sweatshirts" <?php if ($jenis == "sweatshirts"){ echo 'selected'; }?>>Sweatshirts</option>
								<option value="sweats" <?php if ($jenis == "sweats"){ echo 'selected'; }?>>Sweats</option>
								<option value="accessories" <?php if ($jenis == "accessories"){ echo 'selected'; }?>>Accessories</option>
							</select> 		
						</div>
					</div>
					<div class="mb-3 row"><div class="col-sm-8">
						<div class="input-group">
							<input type="file" onchange="readURL(this);" class="form-control" id="foto" name="foto" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/png, image/jpeg"/>
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