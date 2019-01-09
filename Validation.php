<?php
	$uid = $_REQUEST["id"];
	$pass = $_REQUEST["p"];
	$servername = "localhost";
	$username = "id3057957_root";
	$password = "admin";
	$dbname = "id3057957_tabadmin";
	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM tabusername where user='$uid' and password='$pass'";
        $result = $conn->query($sql);
	if ($result->num_rows ==1) {
        session_start();
        $_SESSION["usrnm"] = "admin";
        echo "true";
        	
    } 
    else {
        
    } 
	   $conn->close();
?>