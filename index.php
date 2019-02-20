<?php
    // include_once 'config/connection.php';
    session_start();
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
         <div>
            <?php if(!isset($_SESSION['email'])): ?>
            <P style="font-size: 14px">You are currently not signed in <a href="login.php">Log in</a><br><br> Not yet a member? <a href="signup.php">Sign up</a><br><br> </P>
            <?php else: ?>  
            <p style="font-size: 14px">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> <a href="logout.php"><br><br>Logout</a> </p>
            <?php endif ?>
            <?php
    include 'footer.php';
?>
        </div>
