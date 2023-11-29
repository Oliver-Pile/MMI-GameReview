<?php
  function getProfilePic($review){
    // var_dump($review["image"]);
    if ($review["image"]){
      echo $review["image"];
    } else {
      echo "default.jpeg";
    }
  }
?>