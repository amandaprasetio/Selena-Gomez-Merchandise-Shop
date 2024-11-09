<?php 
include "connect.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<div id="page-container">
    <div id="content-wrap">
        <div class="wrapper">
            <form action="loginprocess.php" method="post">
                <br><br><br><br>
                <h2>Login</h2>
                <p class="hint-text">Enter Login Details</p>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>
                    <div id="emailHelp" class="form-text" style="color:black">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" onkeypress='return ((event.charCode >= 33 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-dark btn-block">Login</button>
                </div><br>
                <p>Don't have an account? <a href="register.php">Register Here</a></p>
            </form>
        </div>
    </div>
    <div><?php include "footer.php";?></div>
</div>
</body>
</html>
