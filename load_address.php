<?php
session_start();
require "connect.php";
                
if(!empty($_POST['id'])){

    $id = $_POST['id'];
    $queryAlamat = mysqli_query($con, "SELECT * FROM alamat WHERE alamat_id = $id");

    while($rowHasil = mysqli_fetch_assoc($queryAlamat)){
        
        echo '<form action="addressing.php?id='.$id.'" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-row mb-3">
        <div class="p-2 flex-fill">
        
            <h3><b>shipping address</b></h3><br>
            <div class="mb-3">
                <label class="form-label">Provinsi *</label>
                <input type="text" class="form-control" name="provinsi" required value="'.$rowHasil["provinsi"].'" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20 || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Kota *</label>
                <input type="text" class="form-control" name="kota" required value="'.$rowHasil["kota"].'" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Kecamatan *</label>
                <input type="text" class="form-control" name="kecamatan" required value="'.$rowHasil["kecamatan"].'" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Kelurahan *</label> 
                <input type="text" class="form-control" name="kelurahan" required value="'.$rowHasil["kelurahan"].'"onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="p-2 flex-fill">
                    <label class="form-label">RT *</label>
                    <input type="number" class="form-control" name="rt" min="1" max="999" required value="'.$rowHasil["rt"].'" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="p-2 flex-fill">
                    <label class="form-label">RW *</label>
                    <input type="number" class="form-control" name="rw" min="1" max="999" required value="'.$rowHasil["rw"].'" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="p-2 flex-fill">
                    <label class="form-label">Kode Pos *</label>
                    <input type="number" class="form-control" name="kode_pos" min="10000" max="99999" required value="'.$rowHasil["kode_pos"].'" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat *</label>
                <input type="text" class="form-control" name="alamat" placeholder="Nama Jalan, Gedung, No. Rumah" required value="'.$rowHasil["alamat"].'" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20 || event.charCode == 46 || event.charCode == 47) || (event.charCode >= 48 && event.charCode <= 57)"> 
                <div class="invalid-tooltip"></div>
            </div>
        </div> 

        <div class="p-2 flex-fill">
            <h3><b>contact information</b></h3><br>
            <div class="mb-3">
                <label class="form-label">Nama Penerima *</label>
                <input type="text" class="form-control" name="nama" required value="'.$rowHasil["nama"].'"onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor HP *</label>
                <input type="text" class="form-control" name="nomor" required value="'.$rowHasil["nomor"].'" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required value="'.$rowHasil["email"].'" onkeypress="return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)">
            </div>

            <div style="text-align: right">
                <p style="padding-right: 10px; color: crimson">* required</p>
                <button name="update" type="submit" class="btn btn-dark rounded-0" style="width: 150px">PROCEED</button><br>
                <div style="padding-top: 125px">
                    <a href="http://localhost/proyek/proyek/shipping.php" style="color: white; text-decoration: none;">
                    <button type="button" class="btn btn-dark rounded-0 opacity-75" style="width: 150px;">BACK TO Shipping</button>
                    </a>
                </div>
            </div>        
        </div>
        </form>         
    </div>';
    }
}
else{
    echo '<form action="addressing.php" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-row mb-3">
        <div class="p-2 flex-fill">
        
            <h3><b>shipping address</b></h3><br>
            <div class="mb-3">
                <label class="form-label">Provinsi *</label>
                <input type="text" class="form-control" name="provinsi" required value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Kota *</label>
                <input type="text" class="form-control" name="kota" required value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Kecamatan *</label>
                <input type="text" class="form-control" name="kecamatan" required value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Kelurahan *</label> 
                <input type="text" class="form-control" name="kelurahan" required value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20  || event.charCode == 32)">
            </div>
            <div class="d-flex flex-row mb-3">
                <div class="p-2 flex-fill">
                    <label class="form-label">RT *</label>
                    <input type="number" class="form-control" name="rt" min="1" max="999" required value="" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="p-2 flex-fill">
                    <label class="form-label">RW *</label>
                    <input type="number" class="form-control" name="rw" min="1" max="999" required value="" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="p-2 flex-fill">
                    <label class="form-label">Kode Pos *</label>
                    <input type="number" class="form-control" name="kode_pos" min="10000" max="99999" required value="" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat *</label>
                <input type="text" class="form-control" name="alamat" placeholder="Nama Jalan, Gedung, No. Rumah" required value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20 || event.charCode == 46 || event.charCode == 47  || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"> 
                <div class="invalid-tooltip"></div>
            </div>
        </div> 

        <div class="p-2 flex-fill">
            <h3><b>contact information</b></h3><br>
            <div class="mb-3">
                <label class="form-label">Nama Penerima *</label>
                <input type="text" class="form-control" name="nama" required value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20 || event.charCode == 32)">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor HP *</label>
                <input type="text" class="form-control" name="nomor" required value="" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 45)">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required value="" onkeypress="return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)">
            </div>

            <div style="text-align: right">
                <p style="padding-right: 10px; color: crimson">* required</p>
                <button name="save" type="submit" class="btn btn-dark rounded-0" style="width: 150px">PROCEED</button><br>
                <div style="padding-top: 125px">
                    <a href="http://localhost/proyek/proyek/shipping.php" style="color: white; text-decoration: none;">
                    <button type="button" class="btn btn-dark rounded-0 opacity-75" style="width: 150px;">BACK To Shipping</button>
                    </a>
                </div>
            </div>        
        </div>
        </form>         
    </div>';
}



?>
