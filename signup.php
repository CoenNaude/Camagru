<!Doctype html>
<html>

    <body>
    <h1>Camagru</h1>
        <div class="signup">
        <form method="post" action="register.php">
             <h2 style="color: #fff;">Sign Up</h2>
                <div><input type="text" name="username" placeholder="Username" required><br><br></div>
                 <div><input type="password" name="pass" placeholder="Password" pattern=".{6,12}" required title="6 to 12 characters"><br><br></div>
                 <div><input type="email" name="email" placeholder="Email address" required><br><br></div>
                 <div><input class="input" type="submit" name="signup" value="Sign Up"></div>
                 <div><a href="index.php">&nbsp;Back to Login</a></div>
    </body>
    </html>

    <?php
        include 'footer.php';
    ?>


