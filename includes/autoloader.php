<?php
  // Fuction to autoload classes so they are avaliable for use throughout application.
  function autoload($classname) {
    if (file_exists(__DIR__.'/../classes/'.strtolower($classname).'.class.php')) {
      require_once(__DIR__.'/../classes/'.strtolower($classname).'.class.php');
    }
  }
  spl_autoload_register('autoload');


?>