<?php
  try {
    // Attempt connection to the DB using credentials found in .env file.
    $Conn = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $Conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $Conn->setAttribute(PDO::ATTR_PERSISTENT, true);
    $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    // Displays error message if it cant connect to db
    echo $e->getMessage();
    exit();
  }
?>