<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "shokisial@gmail.com";
    $to = "pechsizmir@hotmail.com";
    $subject = "File sended";
    $message = "New Verifiction File send";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message,$headers)) {
		echo "The email message was sent. $to";
    } else {
    	echo "The email message was not sent.";
    }
    ?>
    