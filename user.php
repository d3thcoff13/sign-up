<?php
	class User {
	    private $id, $email, $first, $last, $phone, $birth, $gender, $password;

	    public function __construct($id, $email, $first, $last, $phone, $birth, $gender, $password) {
	        $this->id = $id;
	        $this->email = $email;
	        $this->fname = $first;
	        $this->lname = $last;
	        $this->phone = $phone;
	        $this->birth = $birth;
	        $this->gender = $gender;
	        $this->password = $password;
	    }
	    public function getID() {
	        return $this->id;
	    }
	    public function setID($value) {
	        $this->id = $value;
	    }
	    public function getEmail() {
	        return $this->email;
	    }
	    public function setEmail($value) {
	        $this->email = $value;
	    }
	    public function getFName() {
	        return $this->fname;
	    }
	    public function setFName($value) {
	        $this->fname = $value;
	    }
	    public function getLName() {
	        return $this->lname;
	    }
	    public function setLName($value) {
	        $this->lname = $value;
	    }
	    public function getPhone() {
	        return $this->phone;
	    }
	    public function setPhone($value) {
	        $this->phone = $value;
	    }
	    public function getBirth() {
	        return $this->birth;
	    }
	    public function setBirth($value) {
	        $this->birth = $value;
	    }
	    public function getGender() {
	        return $this->gender;
	    }
	    public function setGender($value) {
	        $this->gender = $value;
	    }
	    public function getPassword() {
	        return $this->password;
	    }
	    public function setPassword($value) {
	        $this->password = $value;
	    }
	    public function connCheck() {
	    	$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";

			$conn = new mysqli($servername, $username, $password);

			if ($conn->connect_error) {
		    	die("Connection failed: " . $conn->connect_error);
			}
			echo "Connected successfully";
			$conn->close(); 
	    }
	    public function update($idNum) {
	    	$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";

			$conn = new mysqli($servername, $username, $password);

			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 


	    	$sql = "UPDATE accounts SET password= '".$this->password."' WHERE id= $idNum";

	    	$conn->query($sql);

			if ($conn->query($sql) === TRUE) {
				echo "New record updated successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
	    }
	    public function delete($idNum) {
	    	$sql = "DELETE FROM th227.accounts WHERE id= '$idNum'";

			if ($conn->query($sql) === TRUE) {
    			echo "Record deleted successfully";
			} else {
    			echo "Error deleting record: " . $conn->error;
			}
			$conn->close();
	    }
	    public function insert() {
	    	$sql = "INSERT INTO accounts ('email', 'fname', 'lname', 'phone', 'birthday', 'gender', 'password') 
			VALUES ( $this->email, $this->fname, $this->lname, $this->phone, $this->birth, $this->gender, $this->password)";

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
	    }
	    public function display() {
	    	$sql = "SELECT * FROM th227.users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    echo "<table><tr><th>ID</th><th>Name</th></tr>";
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
			    }
			    echo "</table>";
			} else {
			    echo "0 results";
			}
			$conn->close();
	    }
	}
?>