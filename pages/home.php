<?php
  // Assign a random game which will be featured.
  $Game = new Game($Conn);
  $game = $Game->getRandomGame();
?>
<div class="container" id="home-page">
  <h1> Game Review </h1> 
  <div class="row">
  <div class="col-md-3"></div>
    <div class="card col-md-6">
      <p>
        Welcome to the game review site. You can view different genres and games or search to find a specific game.<br>
        For a specific game, you can view its raiting and any reviews created for it.<br>
        If you create an account you may bookmark games which will become visible from your account as well as create a new review.
      </p>
    </div>
    <div class="col-md-3"></div>
  </div>
    <div class="">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <h2> Featured Game </h2>
          <div class="game-image" style="background-image: url(images/game-images/<?php echo $game["image"]; ?>)"></div>
        </div>
        <a class="card featured-game-text col-md-6" href="index.php?p=game&id=<?php echo $game["id"]; ?>">
          <h3 class="card-title"><?php echo $game["title"] ?></h3>
          <p class="card-text">
            <?php echo $game["description"] ?>
          </p>
        </a>
        <div class="col-md-1"></div>
      </div>
    </div>
</div>
