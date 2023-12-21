<?php
  // Class responsible for managing state relating to Genres.
  class Genre{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    // Function to get all genres.
    public function getAllGenres(){
      $query = "SELECT * FROM Genre";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to get a specific genre
    public function getGenre($id) {
      $query = "SELECT * FROM Genre WHERE id = :id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "id" => $id
        ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
?>