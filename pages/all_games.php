<?php
  $Game = new Game($Conn);
  $games = $Game->getAllGames();
?>

<div class="container" id="all-games-page">
  <h1>Browse All Games</h1>

  <div class="row">
    <?php foreach($games as $game) { ?>
      <div class="col-6 col-lg-4">
        <?php require(__DIR__ . '/components/game_card.php'); ?>
      </div>
    <?php } ?>
  </div>
</div>
