<?php

$no=100;
$to = "shokisial@gmail.com, shokisial@gmail.com";
$subject = "File Sended email";

$message = "
<html>
<head>
<title>File email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Shaukat</th>
<th>Sial</th>
</tr>
<tr>
<td>Madiha </td>
<td>Khan</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: <shokisial@gmail.com';
//$headers .= 'Cc: shaukatiqbalsial@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>