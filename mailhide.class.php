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

		const blah = "http://www.google.com/recaptcha/mailhide/d";

		// Setters & Getters
		function getEmailAddress(){
			return $this->emailAddress;
		}

		function getPublicKey(){
			return $this->emailAddress;
		}

		function getSecretKey(){
			return $this->emailAddress;
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

			// encrypt email address with AES-128-CBC

			// convert to URl-safe base64
		}

	}

?>