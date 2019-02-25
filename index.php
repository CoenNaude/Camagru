<?php
	// include_once 'config/connection.php';
	session_start();
?>

<!DOCTYPE html>
<html>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<ul>
        <?php if(!isset($_SESSION['email'])): ?>
            <li><a href="webcam.php">Webcam</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <?php else: ?>
            <li><a href="webcam.php">Webcam</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li> 
            <?php endif ?>
        </ul>
		 <div>
			<?php
				if(!isset($_SESSION['email'])):
			?>
			<P style="font-size: 14px">You are currently not signed in <a href="login.php">Log in</a><br>
				<br> Not yet a member? <a href="signup.php">Sign up</a><br><br> </P>
			
			<?php
				else:
			?>

			<p style="font-size: 14px">Welcome <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?></p>
			
			<?php
				endif
			?>
			<?php
				include 'footer.php';
			?>
		</div>
