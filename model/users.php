<?php
class Users {

  // Methods
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function store($fullname, $username, $password, $image) {

      $sql = "INSERT INTO users (fullname, username, password, image) VALUES('$fullname', '$username', '$password', '$image')";

      if ($this->conn->query($sql) === TRUE) {
      return true;
      } else {
          return false;
      }
    }
}
?>