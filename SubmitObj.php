<?php 
    $q=$_REQUEST["q"];
    $a=$_REQUEST["a"];
    $op1=$_REQUEST["op1"];
    $op2=$_REQUEST["op2"];
    $op3=$_REQUEST["op3"];
    $op4=$_REQUEST["op4"];
    $servername = "localhost";
	$username = "id3057957_root";
	$password = "admin";
	$dbname = "id3057957_tabadmin";
   	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
        $sql="select max(qid) from tabobj";         
        $result = $conn->query($sql);
	if ($result->num_rows >=0) {
              $row = $result->fetch_assoc();
              $qid=$row["max(qid)"]+1;           
        } else {
              echo "false";  
         }
	$sql = "INSERT INTO `tabobj` (`qid`, `ques`, `o1`, `o2`, `o3`, `o4`, `ans`) VALUES ('$qid', '$q', '$op1', '$op2', '$op3', '$op4', '$a');";
	 $conn->query($sql);
        echo "true";
	$conn->close();
?>