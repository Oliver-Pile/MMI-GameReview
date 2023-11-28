<?php
  $_SESSION['user'] = null;
  $_SESSION['is_loggedin'] = false;
  session_destroy();
  header('Location: index.php?p=home');
?>