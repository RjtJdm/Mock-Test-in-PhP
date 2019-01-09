<?php
$to = "yashika.verma156@gmail.com";
$subject = "HTML email";
$message = "
<html>
<head>
<title>Hello</title>
</head>
<body>
<p>You are restricated</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>kamal singh</td>
<td>ajmera</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <benjholla@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);
echo "Send Mail"
?>