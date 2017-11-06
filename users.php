<?php
	class user {
		private $first, $last, $email, $phone, $birth, $gender;
    	public function __construct(
    			$email, $first, $last, $phone, $birth, $gender, $password) {
        	$this->emailAddress = $email;
        	$this->firstName = $first;
        	$this->lastName = $last;
        	$this->phoneNumber = $phone;
        	$this->birthday = $birth;
        	$this->gender = $gender;
        	$this->password = $password
    	}
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

	    public function display($idNum) {
	        if ($conn->connect_error) {
		    	die("Connection failed: " . $conn->connect_error);
			} 

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
		public function update($idNum, $keyToUpdate, $newKey) {
			$sql = "UPDATE accounts SET $keyToUpdate=$newKey WHERE id=$idNum";

			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		$conn->close();
		}

		public function insert($email, $first, $last, $phone, $birth, $gender, $password) {
			$sql = "INSERT INTO `accounts` ('email', `fname`, `lname`, `phone`, `birthday`, `gender', 'password') 
				VALUES ( $email, $first, $last, $phone, $birth, $gender, $password)";

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
    		}
		$conn->close();
		}
		
		public function delete($idNum) {
			echo "here goes..."
			$sql = "DELETE FROM accounts WHERE id=$idNum";

			if ($conn->query($sql) === TRUE) {
    			echo "Record deleted successfully";
			} else {
    			echo "Error deleting record: " . $conn->error;
			}
		$conn->close();
		}
	}
?>