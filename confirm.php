<?php
    include_once 'config/session.php';
    include_once 'config/database.php';

    if (isset($_GET['email'])){
        $code = $_GET['code'];
        $stmt = $db->prepare("SELECT * FROM users WHERE code=:code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['email'] == $_GET['email']){
            $stmt = $conn->prepare('UPDATE users SET verified=1 WHERE code=:code');
            $stmt->bindParam(':code', $_GET['code']);
            $stmt->execute();
        }
    }
?>