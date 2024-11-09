<?php
session_start();
require "connect.php";
if (!isset ($_SESSION["email"])){
    header("location: login.php");
}
include "header.php";

$query = mysqli_query($con, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['email'] == $_SESSION['email']){
        $user_id=$row['user_id'];
        echo'
        <div id="page-container" style="padding-top: 70px">
            <div id="content-wrap">
                <div class="bg-light bg-opacity-75 p-5 rounded m-3">
                
                    <div class="row text-center" style="color: dimgrey">
                        <div class="col-sm-3">
                            <i class="fa-solid fa-10x fa-user-large" style="width: 100px"></i></i>
                        </div>
                        <div class="col-sm-9">
                            <br><br><h1><b>Welcome,  </b><b style="color: thistle">'.$row['first_name'].' <i class="fa-solid fa-heart"></i></b></h1>
                        </div>
                    </div><br><br>
                    <div class="col-sm-12"><h6>
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2 flex-fill">
                                <h5><b>personal information</b></h5><br>
                                <table class="table bg-light bg-opacity-50">
            
                                    <tbody>
                                        <tr>
                                        <td><b>First Name:</b></td>
                                        <td>'.$row['first_name'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Last Name:</b></td>
                                        <td>'.$row['last_name'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Email:</b></td>
                                        <td>'.$row['email'].'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>';
        $queryAlamat = mysqli_query($con, "SELECT * FROM alamat WHERE alamat_id = (SELECT MAX(alamat_id) FROM alamat) AND user_id = $user_id;");
        if (!empty($queryAlamat)){
            while ($rowAlamat = mysqli_fetch_assoc($queryAlamat)) {
                if ($rowAlamat['user_id'] == $user_id){
                    echo '
                            <div class="p-2 flex-fill">
                                <h5><b>address information</b></h5><br>
                                <table class="table bg-light bg-opacity-50">
                                    <tbody>
                                        <tr>
                                        <td><b>Provinsi:</b></td>
                                        <td>'.$rowAlamat['provinsi'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Kota:</b></td>
                                        <td>'.$rowAlamat['kota'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Kecamatan:</b></td>
                                        <td>'.$rowAlamat['kecamatan'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Kelurahan:</b></td>
                                        <td>'.$rowAlamat['kelurahan'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>RT:</b></td>
                                        <td>'.$rowAlamat['rt'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>RW:</b></td>
                                        <td>'.$rowAlamat['rw'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Kode Pos:</b></td>
                                        <td>'.$rowAlamat['kode_pos'].'</td>
                                        </tr>
                                        <tr>
                                        <td><b>Detail Alamat:</b></td>
                                        <td>'.$rowAlamat['alamat'].'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';     
            include "footer.php";
            echo '
        </div>';
                }   
            }
            break;
        }
    }
}
?>