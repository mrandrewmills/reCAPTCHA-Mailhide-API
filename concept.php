<?php

function encryptEmailAddress($emailAddress, $secretKey){

			// pad email to 16-byte boundary
			$block_size = 16;
			$numpad = ( $block_size - ( strlen( $emailAddress ) % $block_size ) );
			$filler = chr( $numpad );
			$emailAddress = $emailAddress . str_repeat( $filler, $numpad );

			// encrypt email address with AES-128-CBC

			// convert to URl-safe base64
			$emailAddress = base64_encode($emailAddress);
			$emailAddress = strtr($emailAddress, '+/', '-_');
			
			return $emailAddress;
		}
		
$result = encryptEmailAddress("x@example.com", "deadbeefdeadbeefdeadbeefdeadbeef");

echo $result;
echo " bytes: ";
echo strlen($result);
		
?>