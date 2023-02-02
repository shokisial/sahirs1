<?php
    $from = "shokisial@gmail.com";
    $to = "madiha.khan@sahirs.com";
    $subject = "Ready File 123/P, Commercial";
    $message = "Issue To Abid";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>