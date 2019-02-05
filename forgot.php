<?php

    include_once 'config/database.php';

if(isset($_POST['confirm']))
{
    $email = $_POST['email'];
    $stmt = $db->prepare("SELECT id FROM users WHERE email=?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    if($stmt->rowCount() == 1)
    {
        $id = $row['id'];
  
        $message= "
            Hello , $email
            <br /><br />
            Click Following Link To Reset Your Password 
            <br /><br />
            <a href='http://localhost:8085/camagru/resetpassword.php?userid=$id&email=$email'>
        click here to reset your password</a>
            <br /><br />
            thank you :)
            ";
        $headers = "Content-Type: text/html";
        $subject = "Password Reset";
        mail($email,$subject, $message, $headers);
        $msg = " We have sent an email to $email.Please click on the password reset link in the email to generate new password.";
 }
 else
 {
  $msg = "<strong>Sorry!</strong>  this email not found. ";
 }
}
?>
