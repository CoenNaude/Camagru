<!Doctype html>
<html>
<title>Login</title>
        <body>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="webcam.php">Webcam</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    <h1>Camagru</h1>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <div class="signup">
        <form method="post" action="signin.php">
        <h2 style="color: #fff;">Login</h2>
        <div><input type="text" name="email" placeholder="Email" required><br><br></div>
         <div><input type="password" name="pass" placeholder="Password" required><br><br></div>
         <div><input class="input" type="submit" name="login" value="Sign in"><br><br></div>
        <div><a href="forgot2.php">Forgot Password</a></div>
        </div>
    </body>
    </html>

    <?php
        include 'footer.php';
    ?>
