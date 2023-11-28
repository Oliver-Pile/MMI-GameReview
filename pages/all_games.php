<?php
  $Game = new Game($Conn);
  $games = $Game->getAllGames();
?>

<div class="container" id="all-games-page">
  <h1>Browse All Games</h1>

  <div class="row">
    <?php foreach($games as $game) { ?>
      <div class="col-6 col-lg-4">
        <a href="index.php?p=game&id=<?php echo $game["id"]; ?>" class="card">
          <div class="game-image" style="background-image: url(images/game-images/<?php echo $game["image"]; ?>)"></div>
          <div class="card-body">
            <h3 class="card-title"><?php echo $game["title"] ?></h3>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>
