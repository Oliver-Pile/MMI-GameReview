<?php
  // Function to display user image if set or default if not.
  function getProfilePic($review){
    if ($review["image"]){
      echo $review["image"];
    } else {
      echo "default.jpeg";
    }
  }
?>