<?php
    $sa=$_REQUEST['ans'];
    $cur=$_REQUEST['cur'];
    session_start();
    $jobj=$_SESSION['ques'];
    $jobj['q'.$cur][1]=$sa;
    $_SESSION['ques']=$jobj;
    $jobj=json_encode($jobj);
    echo $jobj;
?>