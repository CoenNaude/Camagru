<?php
  include ('database.php');

  try {
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $error) {
    echo 'Connection Failed: ' . $error->getMessage();
  }

  $conn->exec("CREATE DATABASE camagru");
  $conn->exec("USE camagru");
  $conn->exec("CREATE TABLE users (
          id INT PRIMARY KEY AUTO_INCREMENT,
          username VARCHAR(225) UNIQUE,
          email VARCHAR(255) UNIQUE,
          pass VARCHAR(255) UNIQUE,
          code INT,
          reg_date TIMESTAMP NOT NULL,
          isVerified INT(1) DEFAULT 0)"
  );
  /*$conn->exec("CREATE TABLE images (
          id INT PRIMARY KEY AUTO_INCREMENT,
          photo LONGTEXT NOT NULL,
          pname VARCHAR(255) NOT NULL,
          likes INT DEFAULT 0)"
  );
  $conn->exec("CREATE TABLE IF NOT EXISTS password_reset (
          `id` INT PRIMARY KEY AUTO_INCREMENT,
          `email` INT(255) UNSIGNED NOT NULL,
          `selector` CHAR(16) NOT NULL,
          `token` VARCHAR(64) NOT NULL,
          `expires` BIGINT(20) 
  )"
  );*/

  header('Location: ../index.php');
?>
