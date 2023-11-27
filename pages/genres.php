<?php
  $Genre = new Genre($Conn);
  $genres = $Genre->getAllgenres();
?>

<div class="container">
  <h1> Genres </h1>
  <div class="row">
  <?php foreach($genres as $genre) { ?>
    <div class="col-lg-6">
      <div class="card card-body">
          <h3><?php echo $genre['name']; ?></h3>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
