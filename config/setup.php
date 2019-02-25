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
          verified INT(1) DEFAULT 0)"
  );
  $conn->exec("CREATE TABLE images (
          id INT PRIMARY KEY AUTO_INCREMENT,
          user_id INT(11) NULL,
          username VARCHAR(255) NOT NULL,
          photo LONGTEXT NOT NULL,
          title VARCHAR(255) NOT NULL,
          likes INT(11) DEFAULT NULL,
          stamp TIMESTAMP NOT NULL"
  );
  $conn->exec("CREATE TABLE IF NOT EXISTS comments (
          `id` INT PRIMARY KEY AUTO_INCREMENT,
          `pic_id` INT(11) NULL,
          `commnent` LONGTEXT NOT NULL)"
  );

  header('Location: ../index.php');
?>
