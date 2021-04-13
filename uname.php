<?php 
     $servername = "";
	 $username = "";
	 $password = "";
	 $dbname = "";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO users (member) VALUES ('NO')";

	if ($conn->query($sql) === TRUE) {
	$last_id = $conn->insert_id;
	echo $last_id;
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>