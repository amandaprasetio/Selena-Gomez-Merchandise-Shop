<?php
require "connect.php";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql=mysqli_query($con,"SELECT * FROM user where email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Username Already Exists');
    window.location.href='register.php';
    </script>");
}
else if (isset($_POST['save']))
{
    $sql="insert into user values(null,'$fname','$lname','$email','$password')";
    $query=mysqli_query($con,$sql);
    header ("Location: login.php?status=success");
}
?>
