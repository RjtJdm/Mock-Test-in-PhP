<?php
    session_start();
        if (isset($_SESSION['ques']))
        {       $v=$_SESSION['ques'];
                $v=json_encode($v);
                echo $v;
        }
        else
        {       $servername="localhost";
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
	            $arr= array();
	            $nowa=array();
	            $fr=rand(0,1);
	            if($fr==0){
	                $sr=rand(1,$a);
	                $nowa[0]="M".$sr;
	                $nowa[1]="0000";
	            }
	            else{
	                $sr=rand(1,$b);
	                $nowa[0]="T".$sr;
	                $nowa[1]="2";
	            }
	            $arr["q1"]=$nowa;
                for($i=2;$i<=$qno;){
                    $r=rand(0,1);
                    $t;
                    $qi;
                    $f="true";
                    if($r==0){
                       $qi=rand(1,$a);
                       $t="M".$qi;
                       
                    }
                    else{
                        $qi=rand(1,$b);
                        $t="T".$qi;
                    }
                    foreach($arr as $x=>$x_value){
                        if($t==$x_value[0]){
                            $f="false";
                        }
                    }
                    if($f=="true"){
                        $val=array();
                        $val[0]=$t;
                        if($r==0){
                            $val[1]="0000";
                        }
                        else{
                            $val[1]="2";
                        }
                        $arr['q'.$i]=$val;
                        $i++;
                    }
                        
                }
	            $_SESSION['ques']=$arr;
	            $jobj=json_encode($arr);
                echo $jobj;
        }        

?>