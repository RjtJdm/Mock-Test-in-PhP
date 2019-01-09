<?php
	date_default_timezone_set("Asia/Calcutta");
	session_start();
        if (isset($_SESSION['st']))
        {       $v=$_SESSION['st'];
                echo $v;
        }
        else
        {       $x=date("U");
        	$_SESSION['st']=$x;
                echo $x;
        }        
?>