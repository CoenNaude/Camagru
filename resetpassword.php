<!DOCTYPE html>
<html>
	<head>
		<title>Reset Password</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>
	<body>
		<h1>Reset Password</h1>
		<form method="post" action="resetpassword2.php">
			<div><input type="text" name="email" placeholder="Email" required><br><br></div>
			<div><input type="password" name="password" placeholder="Password" required><br><br></div>
			<div><input type="password" name="cpassword" placeholder="Confirm Password" required><br><br></div>
			<div><input class="input" type="submit" name="confirm" value="Submit"><br><br></div>
			<div><a href="login.php">;Back to Login</a></div>
		</form>
	</body>
</html>

<?php
	include 'footer.php';
?>
