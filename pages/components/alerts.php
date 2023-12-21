<?php
  // Component responsible for displaying/handelling alerts on all pages.
  $success_message = $_SESSION["success_message"];
  $failure_message = $_SESSION["failure_message"];

  if($success_message) {
    require(__DIR__ . '/success_alert.php'); 
    $_SESSION["success_message"] = null;
  } else if ($failure_message) {
    require(__DIR__ . '/failure_alert.php'); 
    $_SESSION["failure_message"] = null;
  }
?>