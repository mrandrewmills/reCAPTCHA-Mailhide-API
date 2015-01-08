<?php
	/*
	 * reCAPTCHA Mailhide API for PHP
	 *
	 * PHP class to help create URLs for Google reCAPTCHA Mailhide API
	 *
	 * https://github.com/mrandrewmills/reCAPTCHA-Mailhide-API
	 *
	 */

	class Mailhide {

		// Properties and constants
		private $emailAddress;
		private $publicKey;
		private $secretKey;
		private $encryptedEmail;

		const blah = "http://www.google.com/recaptcha/mailhide/d";

		// Setters & Getters
		function getEmailAddress(){
			return $this->emailAddress;
		}

		function getPublicKey(){
			return $this->publicKey;
		}

		function getSecretKey(){
			return $this->secretKey;
		}

		function setEmailAddress($emailAddress){
			$this->emailAddress = $emailAddress;
		}

		function setPublicKey($publicKey){
			$this->publicKey = $publicKey;
		}

		function setSecretKey($secretKey){
			$this->secretKey = $secretKey;
		}

		// utility functions
		function encryptEmailAddress(){

			if (!$this->emailAddress) {
				// throw an exception
			}

			if (!$this->secretKey) {
				// throw an exception
			}

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

		function buildURL(){
		}
	}
?>