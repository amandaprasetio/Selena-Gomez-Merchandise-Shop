<?php
session_start();
require 'connect.php';
if(isset($_POST['save']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql=mysqli_query($con,"SELECT * FROM user where email='$email' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["password"]=$row['password'];       
        header("Location: index.php"); 
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Invalid Email/Password');
        window.location.href='login.php';
        </script>");
    }
}
?>