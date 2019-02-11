<?php
//include_once './config/database.php';
session_start();

try {
	$db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  
catch(PDOException $error) {
	echo 'Connection Failed: ' . $error->getMessage();
	}
if(isset($_POST['confirm'])){
	$email = $_POST['email'];
	$password = hash('whirlpool',$_POST['password']);
	$cpassword = hash('whirlpool',$_POST['cpassword']);
	if($cpassword != $password){
		echo" <strong>Sorry!</strong>  Passwords do not match. ";
	}
	else {
		$stmt = $db->prepare("UPDATE users SET pass='$password' WHERE email='$email'");
		$stmt->execute();
		echo "Password Changed.";
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Reset Password</title>
	</head>
	<body>
		<form method="post" action="resetpassword.php">
		<h1>reset</h1>
			<div><input type="text" name="email" placeholder="Email" required><br><br></div>
			<div><input type="password" name="password" placeholder="Password" required><br><br></div>
			<div><input type="password" name="cpassword" placeholder="Confirm Password" required><br><br></div>
			<div><input class="input" type="submit" name="confirm" value="Submit"><br><br></div>
			<div><a href="login.php">&nbsp;Back to Login</a></div>
		</form>
	</body>
</html>

<?php
	include 'footer.php';
?>
