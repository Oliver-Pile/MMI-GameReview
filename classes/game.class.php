<?php
  // Class responsible for managing state relating to Games
  class Game{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    // Function for getting all games for given genre.
    public function getAllGamesForGenre($genre_id){
      $query = "SELECT * FROM Game WHERE genre_id = :genre_id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "genre_id" => $genre_id
        ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function for getting all games as well as its corresponding genre.
    public function getAllGames() {
      $query = "SELECT ga.*, ge.name AS genre_name FROM Game AS ga JOIN Genre AS ge ON ga.genre_id = ge.id ORDER BY ga.title;";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function for getting a specific game.
    public function getGame($id) {
      $query = "SELECT * FROM Game WHERE id = :id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "id" => $id
        ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function for getting all games and corresponding genre given the search parameters.
    public function searchGames($user_query){
      $query = "SELECT ga.*, ge.name AS genre_name FROM Game AS ga JOIN Genre AS ge ON ga.genre_id = ge.id WHERE ga.title LIKE :query ORDER BY ga.title";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "query" => "%".$user_query."%"
        ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function that gets a random game.
    public function getRandomGame(){
      // Fetch the total number of games
      $query = "SELECT count(*) AS count FROM Game";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute();
      $total_games = $stmt->fetch(PDO::FETCH_ASSOC)["count"];
      // Select a random id corresponding to a created game.
      $rand_id = rand(1, $total_games);
      return $this->getGame($rand_id);
    }
  }

?>