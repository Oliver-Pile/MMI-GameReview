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

}
?>