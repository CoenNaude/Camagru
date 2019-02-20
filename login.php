<!Doctype html>
<html>

    <body>
    <h1>Camagru</h1>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <div class="signup">
        <form method="post" action="signin.php">
        <h2 style="color: #fff;">Login</h2>
        <div><input type="text" name="email" placeholder="Email" required><br><br></div>
         <div><input type="password" name="pass" placeholder="Password" required><br><br></div>
         <div><input class="input" type="submit" name="login" value="Sign in"><br><br></div>
        <div><a href="forgot2.php">&nbsp;Forgot Password</a></div>
        </div>
    </body>
    </html>

    <?php
        include 'footer.php';
    ?>
