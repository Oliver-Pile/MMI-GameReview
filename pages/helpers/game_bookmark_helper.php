<?php
  function getBookmarkIcon($isBookmarked, $user){
    if($user){
      if($isBookmarked){
        echo '<i class="fa-solid fa-bookmark"></i>';
      } else {
        echo '<i class="fa-regular fa-bookmark"></i>';
      }
    }
  }
?>