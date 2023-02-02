<?php
	$servername='localhost';
	$username='v0503sah';
	$password='rev$X,#zm9hlG1~;=P';
	$dbname = 'v0503sah_khyban';
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	  if(!$conn){
		  die('Could not Connect MySql Server:' .mysql_error());
		}else
		{
		    echo 'Connection Sucess';
		}
?>