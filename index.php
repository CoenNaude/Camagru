<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<ul class="navbar-nav mr-auto">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
 			<a class="navbar-brand" href="index.php">Camagru</a>
 			<li class="nav-item"><a class="nav-link" href="webcam.php">Webcam</a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery </a></li>&nbsp;
				<li class="nav-item"><a class="nav-link" href="profile.php">Profile </a></li>&nbsp;
 			<?php if(!isset($_SESSION['email'])): ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>&nbsp;
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>&nbsp;
            <?php endif ?>
		</ul>
		<h1>Welcome!Ω</h1>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div>
			<?php
				if(!isset($_SESSION['email'])):
			?>
			<P style="font-size: 14px">You are currently not signed in <a href="login.php">Log in</a><br>
				<br> Not yet a member? <a href="signup.php">Sign up</a><br><br> </P>
			<?php
				else:
			?>
			<p style="font-size: 14px">Logged in as: <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?></p>
			<?php
				endif
			?>
			<?php
				include 'footer.php';
			?>
		</div>
	</body>
</html>
