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
      $query = "SELECT * FROM Game";
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
  }

?>