<?php
  class Review{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function getAllReviewsForGame($game_id){
      $query = "SELECT r.*
        FROM Review AS r
        JOIN Review_Game_Join rg ON r.id = rg.review_id
        JOIN Game AS g ON rg.game_id = g.id
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
    
  }

?>