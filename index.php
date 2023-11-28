<?php
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 'On');

  session_start();
  $_SESSION['is_loggedin'] = false;

  require_once ('vendor/autoload.php');
  
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  
  require_once(__DIR__.'/includes/autoloader.php');
  require_once(__DIR__.'/includes/database.php');
  
  $existingUser = $_SESSION['user'];
  if($existingUser) {
    $User = new User($Conn);
    $user = $User->getUser($existingUser["id"]);
    $_SESSION['user'] = $user;
    $_SESSION['is_loggedin'] = true;
  }

  $page = $_GET['p'];

  if(!$page){
    $page = "home";
  }
  
  require_once(__DIR__.'/includes/header.php');
  require_once(__DIR__.'/pages/'.$page.'.php');
  require_once(__DIR__.'/includes/footer.php');
?>