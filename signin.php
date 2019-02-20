<?php
session_start();

try{
   // print_r ($_SESSION);
   //      echo 'awe';
    $con = new PDO ("mysql:host=localhost;dbname=camagru","root","123456");
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = hash('whirlpool',$_POST['pass']);
        
        $select = $con->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass' and verified='1'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data=$select->fetch();
           $_SESSION['email']=$data['email'];
           $_SESSION['username']=$data['username'];
           $_SESSION['id']=$data['id'];
   //         echo 'awe123';
   // print_r($_SESSION);

           header("location: index.php"); 
        }
    }

    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
    
?>