<p> you have successfully registered </p>
<a href="index.php">Log in</a>

<?php

echo 'Hello bra';
    if(isset($_GET['username']) && isset($_GET['code'])){
    
    
    try{
    $con = new PDO ("mysql:host=localhost;dbname=camagru","root","123456");
    {
        $email = $_GET['username'];
        $code = $_GET['code'];

        $select = $con->prepare("SELECT * FROM users WHERE email='$email' and code='$code'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data=$select->fetch();
        
        echo $data;
                }
    }

    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
    
    }

?>