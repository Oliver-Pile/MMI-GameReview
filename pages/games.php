<?php
  $genre_id = $_GET["genre_id"];
  $Game = new Game($Conn);
  $games = $Game->getAllGames($genre_id);
  $Genre = new Genre($Conn);
  $current_genre = $Genre->getGenre($genre_id);
?>


<div class="container">
  <h1><?php echo $current_genre["name"]?> Games</h1>

</div>
