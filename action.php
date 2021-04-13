<?php
    $msg =$_REQUEST["q"];
    $ids=$_REQUEST["id"];
    $id=(int)$ids;

	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conns->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$fil_msg=mysqli_real_escape_string($conn,htmlspecialchars($msg));
	$sql = "INSERT INTO messages (message,senderid) VALUES ('".$fil_msg."',$id)";

	if ($conn->query($sql) === TRUE) 
	{
    	// echo "success";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	
	$sql = "SELECT id FROM users WHERE member='YES'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$i=1;
		$cur=rand()%2;
		$nex=rand()%2;
		$fir=$cur;
		while($row = $result->fetch_assoc()) 
		{
			if($i==$result->num_rows)
			{
				$nex=$fir;
			}

			$xo=$cur^$nex;
			$med=$row['id'];
			
			$int_id=(int)$med;
			$sql = "UPDATE users SET yourflip=$cur, leftflip=$nex ,flipxor=$xo WHERE id=$int_id";
			if ($conn->query($sql) === TRUE) 
			{
				// echo "seccess";
			} 
			else 
			{
				echo "Error updating record: " . $conn->error;
			}
			$cur=$nex;
			$nex=rand()%2;
			$i++;
		}
	} 
	else 
	{
		echo "0 results";
	}
	$conn->close();
    // echo $msg;
?>