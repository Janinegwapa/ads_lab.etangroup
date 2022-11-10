<?php
class User {
  
  // Methods
    public function __construct($conn){
        $this->conn = $conn;
    }

  	public function store($name, $type, $description) {

    	$sql = "INSERT INTO foods (name, type, description) VALUES('$name','$type', '$description')";

    	if ($this->conn->query($sql) === TRUE) {
			return true;
    	} else {
        	return false;
    	}
  	}
}
?>