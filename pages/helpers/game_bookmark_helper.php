<?php
  function getBookmarkIcon($game_id, $user_id, $Bookmark){
    $isBookmarked = $Bookmark->isGameBookmarkedByUser($game_id, $user_id);
    if($user_id){
      if($isBookmarked){
        echo '<a id="removeBookmark" class="fa-solid fa-bookmark px-4" data-game_id='.$game_id.'> </a>';
      } else {
        echo '<a id="addBookmark" class="fa-regular fa-bookmark px-4" data-game_id='.$game_id.'></a>';
      }
    }
  }
?>