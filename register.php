<?php
    session_start();
try{
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['signup'])){



        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo("$email is a valid email address");
        } else {
            echo("$email is not a valid email address");
        }

        if (strlen($pass) < 6 || strlen($pass) > 12 || !preg_match("#[A-Z]+#", $pass))
        {
           echo ("password must be 6-12 characters and contain atleast 1 capital letter");
           header('Refresh: 5; URL=http://localhost:8085/awe/index.php');
        }

        $code = rand(100000, 999999);
        $pass_hash = hash('whirlpool', $pass);
        $insert = $con->prepare("INSERT INTO users (username,email,pass,code)
        values(:username,:email,:pass,:code)");
            $insert->bindParam(':username',$username);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':pass',$pass_hash);
            $insert->bindParam(':code',$code); 
            $insert->execute();
            $str = "Your verification link is http://localhost:8085/awe/confirm.php?user=".$email."&code=".$code;
            mail($email, "CAMAGRU Confirmation", $str);
            echo "Link sent: Redirecting";
            header('Refresh: 5; URL=http://localhost:8085/awe/index.php');
        }
    }

    catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
    
?>