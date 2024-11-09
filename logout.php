<?php
    session_start();
    require "connect.php";

    $query = mysqli_query($con, "SELECT * FROM user");
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['email'] == $_SESSION['email']){
            $user_id=$row['user_id'];
        }
    }
    mysqli_query($con,"DELETE FROM cart WHERE user_id=$user_id;");

    session_destroy();
    unset($_SESSION["id"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location:login.php");
?>