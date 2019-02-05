<p> you have successfully registered </p>
<a href="index.php">Log in</a>

<?php

echo 'Hello bra wasup';
    if(isset($_GET['email']) && isset($_GET['code'])){  //verify data
    
    
        try{
            $con = new PDO ("mysql:host=localhost;dbname=camagru","root","123456");
            {
                $email = $_GET['email'];
                $code = $_GET['code'];
        
                $select = mysql_query("SELECT email, code, verified FROM users WHERE email='$email' and code='$code' and verified='0'");
                $match = mysql_num_rows($select);
        
                if($match > 0){
                    mysql_query("UPDATE users SET='1' WHERE email='$email' AND code='$code' AND verified='0'")
                    echo 'Activated';
                }
                else{
                    echo 'Invalid'
                }
            }
        }
        catch(PDOException $e){
            echo "error".$e->getMessage();
        }
        
    }
    else{
        echo 'MSP';
    }

?>


<p> you have successfully registered </p>
<a href="index.php">Log in</a>

<?php

echo 'Hello bra wasup';
    if(isset($_GET['email']) && isset($_GET['code'])){  //verify data
    
    
    try{
    $con = new PDO ("mysql:host=localhost;dbname=camagru","root","123456");
    {
        $email = $_GET['email'];
        $code = $_GET['code'];

        $select = $con->prepare("SELECT email, code, verified FROM users WHERE email='$email' and code='$code' and verified='0'");
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
    else{
        echo 'MSP';
    }

?>