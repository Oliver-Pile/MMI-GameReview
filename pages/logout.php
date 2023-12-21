<?php
  // Destroy the session and redirect to home when the user logsout
  $_SESSION['user'] = null;
  $_SESSION['is_loggedin'] = false;
  session_destroy();
  header('Location: index.php?p=home');
?>