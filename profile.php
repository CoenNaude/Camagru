<?php
	include_once 'config/connection.php';
	include_once 'config/database.php';

session_start();
	if(empty($_SESSION['email'])){
		$msg =  "Access Denied!!";
		echo "<script LANGUAGE='JavaScript'>
		window.alert('$msg');
		window.location.href='login.php'; </script>";
	}


	$id=$_SESSION['id'];
	if(isset($_POST['update'])){
		$newusername=$_POST['username'];
		$newemail=$_POST['email'];
		$password=$_POST['pass'];
		$cpassword=$_POST['cpass'];
		$newemail=filter_var($newemail, FILTER_SANITIZE_EMAIL);
		if (!filter_var($newemail, FILTER_VALIDATE_EMAIL) === false) {
			$msg = "$newemail is a valid email address";
		} else {
			$msg = "$newemail is not a valid email address";
			echo "<script LANGUAGE='JavaScript'>
			window.alert('$msg');
			window.location.href='profile.php';
			</script>";
		} if($cpassword != $password){
			$msg = "oops! passwords do NOT match!";
			echo "<script LANGUAGE='JavaScript'>
			window.alert('$msg');
			window.location.href='profile.php';
			</script>";
		} else if (strlen($password) < 6 || strlen($password) > 12 || !preg_match("#[A-Z]+#", $password)){
			$msg = "password must be 6-12 characters and contain atleast 1 capital letter";
			echo "<script LANGUAGE='JavaScript'>
			window.alert('$msg');
			window.location.href='profile.php';
			</script>";
		} else {
			// $id=$_SESSION['id'];
			$pass_hash = hash('whirlpool', $cpassword);
			$stmt = $conn->prepare("UPDATE users SET email='$newemail', username='$newusername', pass='$pass_hash' WHERE id='$id'");
			$stmt->execute();
			session_destroy();
				
			$msg =  "Information Updated";
			echo "<script LANGUAGE='JavaScript'>
			window.alert('$msg');
			window.location.href='login.php';
			</script>";
			}
		}
	?>

<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Profile</title>
	<body>
	<ul class="navbar-nav mr-auto">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
 		<a class="navbar-brand" href="index.php">Camagru</a>
			<li class="nav-item"><a class="nav-link" href="webcam.php">Webcam</a></li>&nbsp;
			<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>&nbsp;
			<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>&nbsp;
	</ul>
	<h3>Edit Profile</h3>
		<form method="post" action="editphoto.php">
				<div><input type="text" name="username" placeholder="Username" required><br><br></div>
				<div><input type="password" name="pass" placeholder="Password"><br><br></div>
				<div><input type="password" name="cpass" placeholder="Confirm Password"><br><br></div>
				<div><input type="email" name="email" placeholder="Email Address" required><br><br></div>
				<div><input type="text" name="subscribe" placeholder="Type 0 to Unsubscribe" required><br><br></div>
				<div><input class="input" type="submit" name="update" value="Update"></div>
		</form>

		<div>
			<form method="POST" action="editphoto.php" enctype="multipart/form-data">
				<input type="hidden" name="size" value="1000000">
				<div>
					<h3 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">Upload Photo</h3>
					<input type="file" name="profile" required="" accept="*/image"><br><br>
				</div>
				<div>
					<button type="submit" name="save">Save</button>
				</div>
			</form>
		</div>
	<?php
	$user_id=$_SESSION['id'];

	$display = $conn->prepare("SELECT * FROM images WHERE `user_id`='$user_id' ORDER BY id DESC");
	$display->setFetchMode(PDO::FETCH_ASSOC);
	$display->execute();
	$i = 0;
	// $j=0;
	while ($images = $display->fetch()) {
		$id=$images['id'];
		// $title=$images['title'];
		$username=$images['username'];
		$likes=$images['likes'];


		if ($i % 3 == 0) {
			?> <tr> <?php 
		} ?>
		<div>
		<form method="post" action="editphoto.php">
			<div>
				<div><?php echo "photo by: ".$username; ?></div>
				<td><img src="<?php echo $images['photo']; ?>" alt="<?php $images['title'];?>" width='500' height='400'></td>
			</div>
			<div>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input onclick="return confirm('delete?');" type="submit" name="delete" value="delete">
				<div><?php echo $likes." likes";?><hr></div>

			</div>

			<?php
		if($i % 3 == 0) {
			?></tr><?php
		}
	$i++; ?> 
		</form> 
		</div> <?php
	}
?>
	<?php include 'footer.php';?>
	</body>
</html>