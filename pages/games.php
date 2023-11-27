<?php
  $genre_id = $_GET["genre_id"];
  $Game = new Game($Conn);
  $games = $Game->getAllGames($genre_id);
  $Genre = new Genre($Conn);
  $current_genre = $Genre->getGenre($genre_id);
?>


<div class="container">
  <h1><?php echo $current_genre["name"]?> Games</h1>

  <div class="row">
    <?php foreach($games as $game) { ?>
      <div class="col-md-12 card">
        <div class="row game-row">
        <div class="col-md-3">
          <img class="card-image" src="images/genre-images/fps_image.jpeg"/>
        </div>
        <div class="col-md-9">
          <div class="d-inline-block">
            <div class="card-body">
              <h3 class="card-title"><?php echo $game["title"] ?></h3>
              <p class="card-text"> <?php echo $game["description"] ?> </p>
            </div>
          </div>
        </div>
        </div>
      </div>
    <?php } ?>
</div>
