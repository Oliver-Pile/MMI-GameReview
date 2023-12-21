<?php
  // Entry point page for all traffic
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 'Off');

  // Creating session and setting default values
  session_start();
  $_SESSION['is_loggedin'] = false;

  // Setting up the dotenv external dependancy
  require_once ('vendor/autoload.php');
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  
  require_once(__DIR__.'/includes/autoloader.php');
  require_once(__DIR__.'/includes/database.php');
  
  // Assigning user details to session variables
  $existingUser = $_SESSION['user'];
  if($existingUser) {
    $User = new User($Conn);
    $user = $User->getUser($existingUser["id"]);
    $_SESSION['user'] = $user;
    $_SESSION['is_loggedin'] = true;
  }

  $page = $_GET['p'];

  // Setting default page if not specified
  if(!$page){
    $page = "home";
  }
  
  // Displaying page content
  require_once(__DIR__.'/includes/header.php');
  require_once(__DIR__ . '/pages/components/alerts.php');
  require_once(__DIR__.'/pages/'.$page.'.php');
  require_once(__DIR__.'/includes/footer.php');
?>