<?php 
     $servername = "";
	 $username = "";
	 $password = "";
	 $dbname = "";

    $q = ($_REQUEST["q"]);
    $int_cast = (int)$q;
	// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET member='YES' WHERE id=$int_cast";

    if ($conn->query($sql) === TRUE) {
    echo "You are a member of this group";
    } else {
    echo "Error updating record: " . $conn->error;
    }



    #play game
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
?>