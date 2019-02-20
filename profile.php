<?php
    include_once 'config/connection.php';
    include_once 'config/database.php';

session_start();
    if(empty($_SESSION['email'])){
        $msg =  "you need to be signed in to view this";
        echo "<script LANGUAGE='JavaScript'>
        window.alert('$msg');
        window.location.href='login.php'; </script>";
    }

   print_r($_SESSION);

    $id=$_SESSION['id'];
    if(isset($_POST['update'])){
        $newusername=$_POST['username'];
        $newemail=$_POST['email'];
        $password=$_POST['pass'];
        $cpassword=$_POST['cpass'];
        $sub=$_POST['sub'];
        $newemail=filter_var($newemail, FILTER_SANITIZE_EMAIL);
        if (!filter_var($newemail, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "$newemail is a valid email address";
        } else {
            $msg = "$newemail is not a valid email address";
            echo "<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='profile.php';
            </script>";
        } if($cpassword != $password){
            $msg = "oops! passwords do NOT match!";
            echo "<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='profile.php';
            </script>";
        } else if (strlen($password) < 6 || strlen($password) > 12 || !preg_match("#[A-Z]+#", $password)){
            $msg = "password must be 6-12 characters and contain atleast 1 capital letter";
            echo "<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='profile.php';
            </script>";
        } else {
            // $id=$_SESSION['id'];
            $pass_hash = hash('whirlpool', $cpassword);
            $stmt = $conn->prepare("UPDATE users SET email='$newemail', username='$newusername', pass='$pass_hash' , receive_notification = '$sub' WHERE id='$id'");
            $stmt->execute();
            session_destroy();
                
            $msg =  "awe";
            echo "<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='login.php';
            </script>";
            }
        }
    ?>

        <form method="post" action="profile.php">
             <h2 style="color: #fff;">Sign Up</h2>
                <div><input type="text" name="username" placeholder="Username" required><br><br></div>
                <div><input type="password" name="pass" placeholder="Password"><br><br></div>
                <div><input type="password" name="cpass" placeholder="Confirm Password"><br><br></div>
                <div><input type="email" name="email" placeholder="Email Address" required><br><br></div>
                <div width = 100px><input type="text" name="sub" placeholder="Type 1 for subscribe and 0 to unsubscribe" required><br><br></div>
                <div><input class="input" type="submit" name="update" value="Update"></div>
                <div><a href="index.php">&nbsp;Back to Login</a></div>
        </form>

        <div class="bottom">
            <?php if(!isset($_SESSION['email'])): ?>
            <P style="font-size: 14px">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 14px">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>