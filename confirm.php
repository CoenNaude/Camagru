<?php
    session_start();
    if (isset($_GET['email']) == 1){
        $db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $email = $_GET['email'];
        $stmt = $db->prepare("UPDATE users SET verified=1 WHERE  email=$email");
        $stmt->execute();
        echo "Succesfully Activated";
    }
    header ('Refresh: 2; URL=http://localhost:8085/awe/index.php');
?>
