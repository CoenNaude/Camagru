<!Doctype html>
<html>
	<head>
		<title>Login</title>
		<ul class="navbar-nav mr-auto">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
 			<a class="navbar-brand" href="index.php">Camagru</a>
				<li class="nav-item"><a class="nav-link" href="webcam.php">Webcam</a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery </a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="profile.php">Profile </a></li>&nbsp;
		</ul>
		<h1>Login</h1>
	</head>
	<body>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<form method="post" action="signin.php">
			<div><input type="text" name="email" placeholder="Email" required><br><br></div>
			<div><input type="password" name="pass" placeholder="Password" required><br><br></div>
			<div><input class="input" type="submit" name="login" value="Sign in"><br><br></div>
			<div><a href="forgot2.php">Forgot Password</a></div>
		</form>
	</body>
</html>

	<?php
		include 'footer.php';
	?>
