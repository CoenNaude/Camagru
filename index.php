<?php
    include_once 'config/connection.php';
    session_start();
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>index</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

         <div>
            <?php if(!isset($_SESSION['email'])): ?>
            <P style="font-size: 14px">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 14px">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; footer <?php echo date('Y') ?> </p>
        </div>