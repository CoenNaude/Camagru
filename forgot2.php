<!DOCTYPE html>
<html>
	<head>
		<title>Forgot Password</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<ul class="navbar-nav mr-auto">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
 			<a class="navbar-brand" href="index.php">Camagru</a>
				<li class="nav-item"><a class="nav-link" href="webcam.php">Webcam</a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>&nbsp;
		</ul>
	</head>
	<body>
		<h1>Forgot Password</h1>
		<form method="post" action="forgot.php">
			<div><input type="text" name="email" placeholder="Email" required><br><br></div>
			<div><input class="input" type="submit" name="forgot" value="Send Password"><br><br></div>
		</form>
	</body>
</html>

<?php
	include 'footer.php';
?>
