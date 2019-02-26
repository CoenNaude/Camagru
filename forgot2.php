<!DOCTYPE html>
<html>
	<head>
		<title>Forgot Password</title>
		<li><a href="index.php">Home</a></li>
		<li><a href="gallery.php">Gallery</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="webcam.php">Webcam</a></li>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>
	<body>
		<h1>Forgot Password</h1>
		<form method="post" action="forgot.php">
			<div><input type="text" name="email" placeholder="Email" required><br><br></div>
			<div><input class="input" type="submit" name="forgot" value="Send Password"><br><br></div>
			<div><a href="login.php">Back to Login</a></div>
		</form>
	</body>
</html>

<?php
	include 'footer.php';
?>
