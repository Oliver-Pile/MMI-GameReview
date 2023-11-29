<?php
  class Review{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function getAllReviewsForGame($game_id){
      $query = "SELECT r.*, u.username, u.image
        FROM Review AS r
        JOIN Review_Game_Join AS rg ON r.id = rg.review_id
        JOIN Game AS g ON rg.game_id = g.id
        JOIN Review_User_Join AS ru ON r.id = ru.review_id
        JOIN User AS u ON ru.user_id = u.id
        WHERE g.id = :game_id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "game_id" => $game_id
        ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateRatingForGame($game_id){
      $query = "SELECT AVG(raiting) AS avg_rating
      FROM Review AS r
      JOIN Review_Game_Join rg ON r.id = rg.review_id
      JOIN Game AS g ON rg.game_id = g.id
      WHERE g.id = :game_id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute(array(
        'game_id' => $game_id,
      ));
      return $stmt->fetch(PDO::FETCH_ASSOC);
      }
    
    public function addReviewForGame($content, $raiting, $game_id, $user_id){
      $query = "INSERT INTO Review (content, raiting) VALUES (:content, :raiting)";
      $stmt = $this->Conn->prepare($query);
      $review_exec = $stmt->execute(array(
        'content' => $content,
        'raiting' => $raiting
      ));

      $review_id = $this->Conn->lastInsertId();

      $query = "INSERT INTO Review_Game_Join (review_id, game_id) VALUES (:review_id, :game_id)";
      $stmt = $this->Conn->prepare($query);
      $game_join_exec = $stmt->execute(array(
        'review_id' => $review_id,
        'game_id' => $game_id
      ));

      $query = "INSERT INTO Review_User_Join (review_id, user_id) VALUES (:review_id, :user_id)";
      $stmt = $this->Conn->prepare($query);
      $user_join_exec = $stmt->execute(array(
        'review_id' => $review_id,
        'user_id' => $user_id
      ));

      return $review_exec && $game_join_exec && $user_join_exec;
    }
  }

?>