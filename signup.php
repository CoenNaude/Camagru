<html>
	<head>
		<title>Signup</title>
		<h1>Camagru</h1>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>
	<body>
		<form method="post" action="register.php">
			<div><input type="text" name="username" placeholder="Username" required><br><br></div>
			<div><input type="password" name="pass" placeholder="Password"><br><br></div>
			<div><input type="email" name="email" placeholder="Email Address" required><br><br></div>
			<div><input class="input" type="submit" name="signup" value="Sign Up"></div>
			<div><a href="index.php">Back to Login</a></div>
	</body>
</html>

	<?php
		include 'footer.php';
	?>