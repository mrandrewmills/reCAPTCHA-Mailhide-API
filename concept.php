<?php

function encryptEmailAddress($emailAddress, $secretKey){

			// pad email to 16-byte boundary
			$block_size = 16;
			$numpad = ( $block_size - ( strlen( $emailAddress ) % $block_size ) );
			$filler = chr( $numpad );
			$emailAddress = $emailAddress . str_repeat( $filler, $numpad );

			// encrypt email address with AES-128-CBC
			$iv = "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0";
			$secretKey = pack('H*', $secretKey);
			$emailAddress = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $secretKey, $emailAddress, MCRYPT_MODE_CBC, $iv);

			// convert to URl-safe base64
			$emailBase64 = base64_encode($emailAddress);
			$emailAddress = strtr($emailBase64, '+/', '-_');
			
			return $emailAddress;
		}
		
$result = encryptEmailAddress("x@example.com", "deadbeefdeadbeefdeadbeefdeadbeef");

echo $result;
echo " bytes: ";
echo strlen($result);
		
?>