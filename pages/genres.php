<?php
  $Genre = new Genre($Conn);
  $genres = $Genre->getAllgenres();
?>

<div class="container" id="genres-page">
  <h1> Genres </h1>
  <div class="row">
  <?php foreach($genres as $genre) { ?>
    <div class="col-lg-6">
      <a class="card card-body" href="index.php?p=games&genre_id=<?php echo $genre["id"]; ?>" >
        <div class = "d-flex">
          <img class="card-image" src="images/genre-images/<?php echo $genre['image']; ?>"/>
          <div class="genre-title"><h3><?php echo $genre['name']; ?></h3></div>
        </div>
      </a>
    </div>
    <?php } ?>
  </div>
</div>
