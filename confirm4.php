<?php

if(isset($_POST['update']))
{
    try{
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
    // get values from input text form and number
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];
    
    
    
    // mysql query to Update data
    
    $query = "UPDATE `users` SET `username`=:username, `password`=:password WHERE `id` = :id";
    
    $pdoResult = $connect->prepare($query);
    
    $pdoExec = $pdoResult->execute(array(":username"=>$username,":password"=>hash('whirlpool', $password),":id"=>$id));
    
    if($pdoExec)
    {
        echo "Successfully Updated!!!,you will be redirected in 3 seconds"; 
        header('Refresh: 3; URL=http://localhost:8081/camagru/login.php');
    }else{
        echo 'ERROR Data Not Updated';
    }

}