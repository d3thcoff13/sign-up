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
			$dbname = "th227";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    echo "Connected successfully"; 
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			    }
			$conn = null;
		}
	    public function update($idNum) {

	    	$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";
			$dbname = "th227";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    $sql = "UPDATE accounts SET password= '".$this->password."' WHERE id= $idNum";

			    // Prepare statement
			    $stmt = $conn->prepare($sql);

			    // execute the query
			    $stmt->execute();

			    // echo a message to say the UPDATE succeeded
			    echo $stmt->rowCount() . " records UPDATED successfully";
			    }
			catch(PDOException $e)
			    {
			    echo $sql . "<br>" . $e->getMessage();
			    }

			$conn = null;
		}
	    	//$sql = "UPDATE accounts SET password= '".$this->password."' WHERE id= $idNum";
	    public function delete($idNum) {
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

	    	$sql = "DELETE FROM th227.accounts WHERE id= '$idNum'";

			if ($conn->query($sql) === TRUE) {
    			echo "Record deleted successfully";
			} else {
    			echo "Error deleting record: " . $conn->error;
			}
			$conn->close();
	    }
	    public function insert() {
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
	    	echo "<table style='border: solid 1px black;'>";
			echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

			class TableRows extends RecursiveIteratorIterator { 
			    function __construct($it) { 
			        parent::__construct($it, self::LEAVES_ONLY); 
			    }

			    function current() {
			        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
			    }

			    function beginChildren() { 
			        echo "<tr>"; 
			    } 

			    function endChildren() { 
			        echo "</tr>" . "<br>";
			    } 
			} 

			$servername = "sql.njit.edu";
			$username = "th227";
			$password = "lottie62";
			$dbname = "th227";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $stmt = $conn->prepare("SELECT id, firstname, lastname FROM accounts"); 
			    $stmt->execute();

			    // set the resulting array to associative
			    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
			        echo $v;
			    }
			}
			catch(PDOException $e) {
			    echo "Error: " . $e->getMessage();
			}
			$conn = null;
			echo "</table>";
		}
	}
?>