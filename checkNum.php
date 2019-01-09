<?php
                session_start();
                $servername="localhost";
	            $username="id3057957_root";
	            $password="admin";
	            $dbname="id3057957_tabadmin";
	            $conn=new mysqli($servername,$username,$password,$dbname);
	            $qno=$_SESSION["noq"];
	            if (!$conn) {
		            die("Connection failed: ".$conn->connect_error);
	            }
	            $sql="select max(qid) from tabobj";
	            $a;
	            $result=$conn->query($sql);
	            if ($result->num_rows==1) {
		            while ($row=$result->fetch_assoc()) {
			            $a=$row["max(qid)"];
		            }
	            }
	            else{
		            echo "error1";
	            }
	            $sql2="select max(qid) from tabtaf";
	            $b;
	            $result2=$conn->query($sql2);
	            if ($result2->num_rows==1) {
		            while ($row2=$result2->fetch_assoc()) {
			            $b=$row2["max(qid)"];
		            }
	            }
	            else{
		            echo "error2";
	            }
	            $a=(int)$a;
	            $b=(int)$b;
	            echo $a+$b;
?>