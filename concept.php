<?php

function encryptEmailAddress($emailAddress, $secretKey){

			// pad email to 16-byte boundary
			
			// encrypt email address with AES-128-CBC

			// convert to URl-safe base64
			
			return $emailAddress;
		}
		
$result = encryptEmailAddress("x@example.com", "deadbeefdeadbeefdeadbeefdeadbeef");

echo $result;
echo " bytes: ";
echo strlen($result);
		
?>