<?php
  class Game{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function getAllGamesForGenre($genre_id){
      $query = "SELECT * FROM Game WHERE genre_id = :genre_id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "genre_id" => $genre_id
        ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllGames() {
      $query = "SELECT ga.*, ge.name AS genre_name FROM Game AS ga JOIN Genre AS ge ON ga.genre_id = ge.id ORDER BY ga.title;";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGame($id) {
      $query = "SELECT * FROM Game WHERE id = :id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "id" => $id
        ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchGames($user_query){
      $query = "SELECT ga.*, ge.name AS genre_name FROM Game AS ga JOIN Genre AS ge ON ga.genre_id = ge.id WHERE ga.title LIKE :query ORDER BY ga.title";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "query" => "%".$user_query."%"
        ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isGameBookmarkedByUser($game_id, $user_id){
      $query = "SELECT * FROM User_Game_Bookmark WHERE game_id = :game_id AND user_id = :user_id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "game_id" => $game_id,
        "user_id" => $user_id
        ]);
      return $stmt->fetch();
    }
  }

?>