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
		private $mailhideURL;

		// Our Constructor function
		function Mailhide($email, $pubKey, $secKey){

			if ($email) { $this->setEmailAddress($email); }
			if ($pubKey) { $this->setPublicKey($pubKey); }
			if ($secKey) { $this->setSecretKey($secKey); }
		}

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
				//ToDo: throw an exception
				return "NO EMAIL ADDRESS!";
			}

			if (!$this->secretKey) {
				//ToDo: throw an exception
				return "NO SECRET KEY!";
			}

			// pad email to 16-byte boundary
			$block_size = 16;
			$numpad = ( $block_size - ( strlen( $this->emailAddress ) % $block_size ) );
			$filler = chr( $numpad );
			$this->emailAddress .= str_repeat( $filler, $numpad );

			// encrypt email address with AES-128-CBC
			$iv = "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0";
			$privateKey = pack('H*', $this->secretKey);
			$this->emailAddress = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $this->emailAddress, MCRYPT_MODE_CBC, $iv);

			// convert to URl-safe base64
			$emailBase64 = base64_encode($this->emailAddress);
			$this->encryptedEmail = strtr($emailBase64, '+/', '-_');
			
			return $this->encryptedEmail;
		}

		function buildURL(){
			if (!$this->publicKey) {
				//ToDo: throw an exception
				return "NO PUBLIC KEY!";
			}

			$this->mailhideURL = "http://www.google.com/recaptcha/mailhide/d";
			$this->mailhideURL .= "?k=" . $this->publicKey;
			$this->mailhideURL .= "&c=" . $this->encryptedEmail;
		
			return $this->mailhideURL;
		}
	}
?>