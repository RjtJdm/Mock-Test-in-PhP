<?php
    session_start();
    $qno=$_SESSION["noq"];
    $ques=$_SESSION["ques"];
    $servername="localhost";
	$username="id3057957_root";
	$password="admin";
	$dbname="id3057957_tabadmin";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if (!$conn) {
		die("Connection failed: ".$conn->connect_error);
	}
    $na=0;
    $c=0;
    echo "<table border='1'><tr><td>Attempted</td><td>Not Attempted</td><td>Correct</td><td>Percentage</td></tr>";
    for($i=1;$i<=$qno;$i++){
        $qtype=$ques["q".$i][0];
        if($qtype[0]=="M"){
            $pans=$ques["q".$i][1];
            if($pans=="0000"){
                $na++;
            }
            else{
                $qid=substr($qtype,1);
                $sql="select ans from tabobj where qid=".$qid;
                $result=$conn->query($sql);
        		if ($result->num_rows==1) {
        			while ($row=$result->fetch_assoc()) {
        				if($row["ans"]==$pans){
        				    $c++;
        				}
        			}
        		}
        		else
        		{
        			echo "error1";
        		}
            }
        }
        else if($qtype[0]=="T"){
            $pans=$ques["q".$i][1];
            if($pans=="2"){
                $na++;
            }
            else{
                $qid=substr($qtype,1);
                $sql="select ans from tabtaf where qid=".$qid;
                $result=$conn->query($sql);
        		if ($result->num_rows==1) {
        			while ($row=$result->fetch_assoc()) {
        				if($row["ans"]==$pans){
        				    $c++;
        				}
        			}
        		}
        		else
        		{
        			echo "error2";
        		}    
            }
        }
        $att=$qno-$na;

        
    }
    echo "<tr><td>".$att."</td><td>".$na."</td><td>".$c."</td><td>".(($c/$qno)*100)."</td></tr></table>";
    session_unset();  
     session_destroy();

    
?>