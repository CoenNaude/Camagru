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
		header('Refresh: 2; URL=http://localhost:8085/camagru/index.php');
	}
}
?>