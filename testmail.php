<?php
include('PHPMailerAutoload.php');
$mailmatter="<p>this is a test mail by rohit</p>";
						
							$mailto="infodreamssolutions@gmail.com";
								$from="bettr@80startups.com";
								$mailsubject="A  proposal is updated on your gig.";
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
								$headers .= "From: Bettr<$from>" . "\r\n";
								$mail=mail($mailto,$mailsubject,$mailmatter,$headers);	
								
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}