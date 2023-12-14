<?php
  $game_id = $_GET["id"];
  $Game = new Game($Conn);
  $game = $Game->getGame($game_id);
  $Review = new Review($Conn);
  $reviews = $Review->getAllReviewsForGame($game_id);
  $average_raiting = round($Review->calculateRatingForGame($game_id)["avg_rating"], 1);
  $user_id = $_SESSION["user"]["id"];
  $Bookmark = new Bookmark($Conn);
?>

<div class="container" id="game-page">
  <?php 
    require_once(__DIR__ . '/add_review_modal.php'); 
    require_once(__DIR__ . '/helpers/review_helper.php'); 
    require_once(__DIR__ . '/helpers/game_bookmark_helper.php');
    require_once(__DIR__ . '/helpers/game_news_helper.php');

    if(!$game){
      header("HTTP/1.0 404 Not Found");
      echo '<h1 class="text-danger"> Warning: Game not found </h1>';
      die();
    }
  ?>
  <div>
    <h1><?php echo $game["title"];?><?php getBookmarkIcon($game_id, $user_id, $Bookmark) ?></h1>
  </div>
  <div class="row">
    <div class="col-md-4">
    <div class="game-image" style="background-image: url(images/game-images/<?php echo $game["image"]; ?>)"></div>
    </div>
    <div class="col-md-8">
      <p><?php echo $game["description"] ?></p>
      <h4> Average Raiting </h4>
      <p class="raiting-text"> <?php echo $average_raiting ?> <i class="fa-solid fa-star"></i></p>
      <button id="addReview" type="button" class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#addReviewModal"> Add Review </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h2> Reviews </h2> 
      <div class="d-flex flex-column">
        <?php foreach ($reviews as $review) { ?>
          <div class="card">
            <div class="card-title review-header">
              <h4 class="card-title"><?php echo $review["username"] ?></h4>
              <img class="review-user-image" src="images/user-images/<?php getProfilePic($review) ?>" >
            </div>
            <p><?php echo $review["content"]; ?></p>
            <div class="raiting-text">
              <p><?php echo $review["raiting"]; ?><i class="fa-solid fa-star"></i></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-md-6">
      <h2> News </h2>
      <?php 
      $articles = get_latest_news($game["steam_app_id"]);
      foreach ($articles as $article) { ?>
      <div class="card">
        <h3><a href="<?php echo $article["url"]?>"><?php echo $article["title"] ?></a></h3>
        <p><?php echo $article["contents"]?></p>
      </div>
      <?php } ?>
    </div>
  </div>
</div>