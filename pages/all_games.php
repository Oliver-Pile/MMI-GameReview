<?php
  $Game = new Game($Conn);
  $games = $Game->getAllGames();
?>

<div class="container" id="all-games-page">
  <h1>Browse All Games</h1>

  <div class="row">
    <?php foreach($games as $game) { ?>
      <div class="col-6 col-md-4 col-lg-3">
        <a href="index.php?p=game&id=<?php echo $game["id"]; ?>" class="card">
        <!-- Fix images! -->
          <img class="card-image" src="images/game-images/<?php echo $game["image"]; ?>"/>
          <div class="card-body">
            <h3 class="card-title"><?php echo $game["title"] ?></h3>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>
