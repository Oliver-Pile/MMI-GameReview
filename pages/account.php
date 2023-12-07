<?php
    $Bookmark = new Bookmark($Conn);
    $user = $_SESSION['user'];
    $games = $Bookmark->getBookmarkedGamesForUser($user["id"]);
?>

<div class="container">
  <h1 class="mb-4 pb-2">View Account</h1>
  <p>Welcome to your account.</p>
  <?php
    if($user['image']) {
      echo '<div class="user-image" style="background-image: url(images/user-images/'.$user['image'].'"></div>';
    }
  ?>
  <p><a class="btn btn-blue" href="index.php?p=edit_profile_image">Edit Profile Image</a></p>

  <h2> Bookmarked Games </h2>
  <div class="row">
    <?php foreach($games as $game) { ?>
      <div class="col-6 col-lg-4">
        <?php require(__DIR__ . '/components/game_card.php'); ?>
      </div>
    <?php } ?>
  </div>
</div>