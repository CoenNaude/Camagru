<?php
 
//Make sure that our query string parameters exist.
if(isset($_GET['code']) && isset($_GET['email'])){

     echo 'aw2e2';
    $code = trim($_GET['code']);
    $email = trim($_GET['email']);

     echo 'aw22e';
    
    $sql = "SELECT COUNT(*) AS num FROM users WHERE email = '$email' AND code = '$code'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':code', $code);
    $stmt->execute();

    echo 'aw2e';
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['num'] == 1){
       echo 'awe'; //code is valid. Verify the email address
    } else{
        echo 'bra'; //code is not valid.
    }
    
}