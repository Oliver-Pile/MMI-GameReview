<?php
  session_start();
  
  require_once ('../vendor/autoload.php');
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
  $dotenv->load();

  require_once(__DIR__.'/../includes/autoloader.php');
  require_once(__DIR__.'/../includes/database.php');

  $user = $_SESSION['user'];
  if($user){
    $game_id = (int) $_POST['game_id'];
    if($game_id) {
      $Bookmark = new Bookmark($Conn);
      $toggle = $Bookmark->toggleBookmark($game_id, $user["id"]);
      if($toggle) {
        $_SESSION["success_message"] = "Game sucessfully bookmarked";
        echo json_encode(array(
          "success" => true,
          "reason" => "Game sucessfully bookmarked."
          ));
      } else {
        $_SESSION["success_message"] = "Game successfuly un-bookmarked";
        echo json_encode(array(
          "success" => true,
          "reason" => "Game successfuly un-bookmarked"
          ));
      }
    } else {
      $_SESSION["failure_message"] = "Error: Invalid game id provided";
      echo json_encode(array(
        "success" => false,
        "reason" => "Error: Invalid game id provided"
        ));
    }
  } else {
    $_SESSION["failure_message"] = "User not logged in. Please login before trying again";
    echo json_encode(array(
      "success" => false,
      "reason" => "User not logged in. Please login before trying again"
      ));
  }
?>