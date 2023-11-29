<?PHP
  $query = htmlspecialchars($_POST['query']);
  $Game = new Game($Conn);
  $games = $Game->searchGames($query);
?>
<div class="container">
  <h1 class="mb-4 pb-2">Search results for "<?php echo $query; ?>"</h1>
  <div class="row">
    <?php foreach($games as $game) { ?>
      <div class="col-6 col-lg-4">
        <a href="index.php?p=game&id=<?php echo $game["id"]; ?>" class="card game-card">
          <div class="game-image" style="background-image: url(images/game-images/<?php echo $game["image"]; ?>)"></div>
          <div class="card-body">
            <h3 class="card-title"><?php echo $game["title"] ?></h3>
            <span class="badge genre-badge"><?php echo $game["genre_name"]; ?></span>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>