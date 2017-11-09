<?php
	class sign_up {
	    private $id, $email, $first, $last, $phone, $birth, $gender, $password;

	    public function __construct($email, $password, $first, $last, $phone, $birth, $gender, $id) {
	        $this->fname = $first;
	        $this->lname = $last;
	        $this->email = $email;
	        $this->password = $password;
	        $this->phone = $phone;
	        $this->birth = $birth;
	        $this->gender = $gender;
	        $this->id = $id;
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
			$dbname = "th227";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    echo "Connected successfully"; 
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			    }
			$conn = null;
		}

	    public function insert() {
	    	$servername = "sql.njit.edu";
			$username = "th227";
			$pw = "lottie62";
			$dbname = "th227";

			// Create connection
			$conn = new mysqli($servername, $username, $pw, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

	    	$sql = "INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) 
			VALUES ('$this->email', '$this->fname', '$this->lname', '$this->phone', '$this->birth', '$this->gender', '$this->password')";

			if ($conn->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
	    }

		public function register() {
	    	$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";
			$dbname = "th227";
			$emailToCheck = $this->email;


			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql1 = "SELECT email FROM th227.accounts WHERE email = '$this->email'";
			$result = $conn->query($sql1);
			$row = $result->fetch_assoc();


			if ($row['email'] == $this->email) {
				echo "The e-mail address you entered is already being used. Please use another e-mail address.";
			}else{
				$this->insert();
			}
		}

		public function login() {
	    	$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";
			$dbname = "th227";


			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT email, fname, lname FROM th227.accounts WHERE email = '$this->email'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$sql2 = "SELECT password FROM th227.accounts WHERE email = '$this->email'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch_assoc();


			if ($row['email'] != $this->email) {
				if($row2['password'] != $this->password) {
					return 1;
				}else{
					return 2;
				}
			}else if($row2['password'] != $this->password) {
				return 3;
			}else{
				$fname = $row['fname'];
				$this->setFName($fname);
				$lname = $row['lname'];
				$this->setLName($lname);
				return 4;
			}
		}

		public function signup() {
	    	$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";
			$dbname = "th227";


			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT email FROM th227.accounts WHERE id = 2";
			$result = $conn->query($sql);



			if ($result->num_rows > 0) {
			    //output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo $row["email"];
			    }
			} else {
			    echo "0 results";
			}
		}



	}
?>