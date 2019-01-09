<?php 
    $q=$_REQUEST["q"];
    $a=$_REQUEST["a"];
    $servername = "localhost";
	$username = "id3057957_root";
	$password = "admin";
	$dbname = "id3057957_tabadmin";
   	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
        $sql="select max(qid) from tabtaf";         
        $result = $conn->query($sql);
	if ($result->num_rows >=0) {
              $row = $result->fetch_assoc();
              $qid=$row["max(qid)"]+1;           
        } else {
              echo "false";  
         }
	$sql = "INSERT INTO `tabtaf` (`qid`, `ques`, `ans`) VALUES ('$qid', '$q', '$a');";
	 $conn->query($sql);
        echo "true";
	$conn->close();
?>