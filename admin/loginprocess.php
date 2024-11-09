<?php
session_start();
require "connect.php";
include "header.php";
if (!isset ($_SESSION["username"])){
	header("location: login.php");
}

if(isset($_POST['save']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql=mysqli_query($con,"SELECT * FROM admin where username='$username' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["password"]=$row['password'];      
        header("Location: index.php"); 
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Invalid Username/Password');
        window.location.href='login.php';
        </script>");
    }
}
?>