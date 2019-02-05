<!Doctype html>
<html>

    <body>
    <h1>Camagru</h1>
        <div class="signup">
        <form method="post" action="signin.php">
        <h2 style="color: #fff;">Login</h2>
        <div><input type="text" name="email" placeholder="Email" required><br><br></div>
         <div><input type="password" name="pass" placeholder="Password" required><br><br></div>
         <div><input class="input" type="submit" name="login" value="Sign in"><br><br></div>
                 
                 <div><a href="forgot.php">&nbsp;Forgot Password</a></div>
         <div><a href="index.php">&nbsp;Back to Login</a>
        </div>
    </body>
    </html>

    <?php
        include 'footer.php';
    ?>
