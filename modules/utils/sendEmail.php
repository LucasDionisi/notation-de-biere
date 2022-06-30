<?php

	class SendEmail {

		private $subject;
		private $message;
		private $header;

		function __construct() {
			$this->header  = "From: noreply@notabiere.fr\r\n";
			$this->header .= "Reply-To: noreply@notabiere.fr\r\n";
			$this->header .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		}

		public function sendRegisterValidation($to) {
			$this->subject = "Validation de votre adresse email";

			mail($to, $this->subject, $this->message, $this->header);
		}

	}

	$sendEmail = new SendEmail();
?>