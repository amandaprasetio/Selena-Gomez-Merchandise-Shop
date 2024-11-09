<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}
$sort = $_POST['sort'];
if($sort == 'dateUp')$sort = 'ORDER BY date DESC';
else $sort = 'ORDER BY date';

echo '<table id="myTable" class="table" width="100%">
<thead>
<th style="text-align: center">No:<th>
<th style="text-align: center">Name</th>
<th style="text-align: center">Date</th>
<th style="text-align: center">Address</th>
<th style="text-align: center">Action</th>
</thead>';
$query = mysqli_query($con, "SELECT item_bill_id, first_name, last_name, date, alamat, done FROM item_bill i JOIN user u ON i.user_id = u.user_id JOIN alamat a ON a.alamat_id = i.alamat_id GROUP BY date, i.user_id $sort");
$count = 0;
while($row = mysqli_fetch_assoc($query)) {
    $count ++;
    echo'<tr>';
    echo"<td style='text-align: center'>$count<td>";
    echo'<td>'.$row['first_name'].' '.$row['last_name'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['alamat'].'</td>
    <td><button class="btn rounded-0" onclick="detailBill('.$row['item_bill_id'].')"><i class="fas fa-folder-open"></i></button>';
    if ($row['done'] == 0){
        echo'        
        <button class="btn rounded-0" onclick="deleteBill('.$row['item_bill_id'].')"><i class="fa-solid fa-check"></i></button>';
    }
    echo '</td>
    <tr>';
} 

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $queryDelete = mysqli_query($con, "UPDATE item_bill SET done = 1 WHERE date = (SELECT date FROM item_bill where item_bill_id = $id)");

    // $queryDelete = mysqli_query($con, "DELETE FROM item_bill WHERE date = (SELECT date FROM item_bill where item_bill_id = $id)");
    header("Location: order.php");
}

?>

