<?php

include_once 'config/database.php';

if(isset($_POST['email']))
{
	$conn= new PDO("mysql:host=localhost;dbname=camagru","root","123456");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$email = $_POST['email'];
	$stmt = $conn->prepare("SELECT pass FROM users WHERE email=$email");
	$row = $stmt->fetch(PDO::FETCH_ASSOC); 
	$stmt->execute($row);
	if($stmt->rowCount() != 1)
	{
		$id = $row['id'];
		$str= "
			Hello , $email
			<br /><br />
			Click Following Link To Reset Your Password 
			<br /><br />
			<a href='http://localhost:8085/camagru/resetpassword.php?email=$email'>
		click here to reset your password</a>
			<br /><br />
			thank you :)
			";
		$headers = "Content-Type: text/html";
		$subject = "Password Reset";
		mail($email, $subject, $str, $headers);
		echo 'Email sent to '.$email.'. Please click on the link to generate a new password.';
		header('Refresh: 2; URL=http://localhost:8085/camagru/index.php');
	}
	else
	{
		echo 'Sorry! Email not found.';
	}
}
?>
