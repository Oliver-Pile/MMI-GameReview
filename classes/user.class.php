<?php 
  class User{
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function createUser($email, $username, $password){
      $sec_password = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO User (email, username, password) VALUES (:email, :username, :password)";
      $stmt = $this->Conn->prepare($query);
      return $stmt->execute(array(
        'email' => $email,
        'username' => $username,
        'password' => $sec_password
      ));
    }

    public function loginUser($email, $password) {
      $query = "SELECT * FROM User WHERE email = :email";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute(array('email' => $email));
      $user = $stmt->fetch();
      if($user && password_verify($password, $user['password'])) {
        return $user;
      } else{
        return false;
      }
    }

    public function getUser($id) {
      $query = "SELECT * FROM User WHERE id = :id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute(array(':id' => $id));
      return $stmt->fetch();
    }

    public function updateUserProfile($user_id, $file_name) {
      $query = "UPDATE User SET image = :image WHERE id = :id";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute(array(
      'image' => $file_name,
      'id' => $user_id
      ));
      return true;
    }

    public function emailExists($email) {
      $query = "SELECT * FROM User WHERE email = :email";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute(array(':email' => $email));
      return $stmt->fetch();
    }
}
?>