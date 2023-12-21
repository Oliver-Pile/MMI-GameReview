<?php
  // Script to respond to bookmark AJAX requests
  // Setup session
  session_start();
  
  // Requre DotEnv dependancy and setup
  require_once ('../vendor/autoload.php');
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
  $dotenv->load();

  // Setup database and classes
  require_once(__DIR__.'/../includes/autoloader.php');
  require_once(__DIR__.'/../includes/database.php');

  $user = $_SESSION['user'];
  if($user){
    // If user is logged in
    $game_id = (int) $_POST['game_id'];
    if($game_id) {
      // If game_id is set
      $Bookmark = new Bookmark($Conn);
      $toggle = $Bookmark->toggleBookmark($game_id, $user["id"]);
      if($toggle) {
        // Display and return success that bookmark is created.
        $_SESSION["success_message"] = "Game sucessfully bookmarked";
        echo json_encode(array(
          "success" => true,
          "reason" => "Game sucessfully bookmarked."
          ));
      } else {
        // Display and return success that bookmark is removed.
        $_SESSION["success_message"] = "Game successfuly un-bookmarked";
        echo json_encode(array(
          "success" => true,
          "reason" => "Game successfuly un-bookmarked"
          ));
      }
    } else {
      // Display and return failure if the game specified is invalid
      $_SESSION["failure_message"] = "Error: Invalid game id provided";
      echo json_encode(array(
        "success" => false,
        "reason" => "Error: Invalid game id provided"
        ));
    }
  } else {
    // Display and return failure if user is not logged in.
    $_SESSION["failure_message"] = "User not logged in. Please login before trying again";
    echo json_encode(array(
      "success" => false,
      "reason" => "User not logged in. Please login before trying again"
      ));
  }
?>