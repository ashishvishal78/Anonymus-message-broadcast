<?php
    $servername = "";
	$username = "";
	$password = "";
	$dbname = "";
    $lastsendid=0;
    $cnt=1;

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($cnt==$result->num_rows)
            {
                $lastsendid=$row['senderid'];
            }
            echo "<ul><li><p>" . $row["message"] . "</ul></li></p>";
            $cnt++;
        }
    } else {
        echo "<p>" . "Start Chatting" . "</p>";
    }



    $sql = "SELECT id,flipxor FROM users WHERE member='YES'";
    $result = $conn->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }

    // if($lastsendid!=0)
    // {
    //     echo "last sender id: ",$lastsendid ."<br>";
    // }
    echo "*"; 

    $cnt=1;
    if ($result->num_rows > 0) {
        $finxor=0;
        while($row = $result->fetch_assoc()) {

            $num=$row['flipxor'];
            if($row['id']==$lastsendid)
            {
                $finxor=$finxor^(($row['flipxor']+1)%2);
                $num=($num+1)%2;
            }
            else
            $finxor=$finxor^$row['flipxor'];

            echo "<p> USERID: " .$row['id'] ." Announced Xor: " . $num ."</p>";


            
            if($cnt==$result->num_rows)
            {
                echo "*";
                if($finxor==1)
                echo "<p> Last Message was send by member of this group:" .$finxor."</p>";
                else
                echo "<p> Last Message was send by NSA:" .$finxor. "</p>";
            }
            $cnt++;
        }
    }


    $conn->close();
?>