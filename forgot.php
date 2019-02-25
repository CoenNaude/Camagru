<?php

	include_once 'config/database.php';
if(isset($_POST['email']))
{
	$db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$email = $_POST['email'];
	$stmt = $db->prepare("SELECT pass FROM users WHERE email=$email");
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
			<a href='http://localhost:8085/awe/resetpassword.php?email=$email'>
		click here to reset your password</a>
			<br /><br />
			thank you :)
			";
		$headers = "Content-Type: text/html";
		$subject = "Password Reset";
		mail($email,$subject, $str, $headers);
		echo 'We have sent an email to $email.Please click on the password reset link in the email to generate new password.';
	}
	else
	{
		echo 'Sorry! Email not found.';
	}
}
?>
