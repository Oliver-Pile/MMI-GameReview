<?PHP
  $query = htmlspecialchars($_POST['query']);
  $Game = new Game($Conn);
  $games = $Game->searchGames($query);
?>
<div class="container">
  <h1 class="mb-4 pb-2">Search results for "<?php echo $query; ?>"</h1>
  <div class="row">
    <?php 
    // Display all games that matched the given search
      foreach($games as $game) { 
    ?>
      <div class="col-6 col-lg-4">
        <?php require(__DIR__ . '/components/game_card.php'); ?>
      </div>
    <?php } ?>
  </div>
</div>