<?php
  class Bookmark{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
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

    public function toggleBookmark($game_id, $user_id){
      $is_bookmarked = $this->isGameBookmarkedByUser($game_id, $user_id);
      if($is_bookmarked) {
        $query = "DELETE FROM User_Game_Bookmark WHERE game_id = :game_id AND user_id = :user_id";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
        "game_id" => $game_id,
        "user_id" => $user_id
        ]);
        return false; // Return false for "removed"
      } else {
        $query = "INSERT INTO User_Game_Bookmark (game_id, user_id) VALUES (:game_id, :user_id)";
        $stmt = $this->Conn->prepare($query);
        return $stmt->execute(array(
          "game_id" => $game_id,
          "user_id" => $user_id
        ));
        return true; // Return false for "added"
      }
    }

    public function getBookmarkedGamesForUser($user_id){
      $query = "SELECT ga.id, ga.title, ga.image, ge.name AS genre_name 
                FROM User_Game_Bookmark AS ub JOIN Game AS ga ON ub.game_id = ga.id 
                JOIN Genre AS ge ON ga.genre_id = ge.id 
                WHERE ub.user_id = :user_id ORDER BY ga.title;";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "user_id" => $user_id
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>