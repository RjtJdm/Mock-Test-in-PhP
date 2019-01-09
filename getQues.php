<?php
	$a=$_REQUEST["qid"];
	$b= $a[0];
	$c= substr($a,1);
	$d;
	$arr=array();
	$servername="localhost";
	$username="id3057957_root";
	$password="admin";
	$dbname="id3057957_tabadmin";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if (!$conn) {
		die("Connection failed: ".$conn->connect_error);
	}	
	if($b=="T"){
		$sql="select ques from tabtaf where qid=".$c;
		$result=$conn->query($sql);
		if ($result->num_rows==1) {
			while ($row=$result->fetch_assoc()) {
				$d=$row["ques"];
				echo $d;
			}
		}
		else
		{
			echo "error1";
		}
	}
	else{
		$sql="select ques,o1,o2,o3,o4 from tabobj where qid=".$c;
		$result=$conn->query($sql);
		if ($result->num_rows==1) {
			while ($row=$result->fetch_assoc()) {
				$arr["ques"]=$row["ques"];
				$arr["o1"]=$row["o1"];
				$arr["o2"]=$row["o2"];
				$arr["o3"]=$row["o3"];
				$arr["o4"]=$row["o4"];
				$jobj=json_encode($arr);
				echo $jobj;

			}
		}
		else
		{
			echo "error2";
		}
	}
	
?>