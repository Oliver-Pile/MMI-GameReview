<a href="index.php?p=game&id=<?php echo $game["id"]; ?>" class="card game-card">
  <div class="game-image" style="background-image: url(images/game-images/<?php echo $game["image"]; ?>)"></div>
  <div class="card-body">
    <h3 class="card-title"><?php echo $game["title"] ?></h3>
    <span class="badge genre-badge"><?php echo $game["genre_name"]; ?></span>
  </div>
</a>