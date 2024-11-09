<?php 
include "header.php"
?>
<!DOCTYPE html>
<html>

<body>

	<div class="wrapper" >
		
		<h2 style="padding-top: 40px">Sign Up</h2>
		<p>Please fill this form to create an account.</p>
		<form action="register_a.php" method="post">
		<div class="mb-3">
			<label class="form-label">First Name</label>
			<input type="text" class="form-control form-icon-trailing" name="fname" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20 || event.charCode == 32)'> 
		</div>	
		<div class="mb-3">
			<label class="form-label">Last Name</label>
			<input type="text" class="form-control form-icon-trailing" name="lname" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 20 || event.charCode == 32)'>
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="text" class="form-control form-icon-trailing" name="email" onkeypress='return ((event.charCode >= 32 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>
			<div id="emailHelp" class="form-text" style="color:black">We'll never share your email with anyone else.</div>
		</div>
		
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control form-icon-trailing" name="password" onkeypress='return ((event.charCode >= 33 && event.charCode <= 38) || (event.charCode >= 40 && event.charCode <= 126)'>
		</div>
		<button type="submit" name="save" class="btn bg-transparent btn-block">Register Now</button>
		<br><br><p>Already have an account? <a href="login.php">Login here</a>.</p>
	</form>
	</div>

<?php
include "footer.php";
?>
</body>
</html>