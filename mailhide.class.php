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

		// Properties
		private $emailAddress;
		private $publicKey;
		private $secretKey;

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

		function setEmailAddress($emailAddress) {
			$this->emailAddress = $emailAddress;
		}

		function setPublicKey($publicKey) {
			$this->publicKey = $publicKey;
		}

		function setSecretKey($secretKey) {
			$this->secretKey = $secretKey;
		}

	}

?>