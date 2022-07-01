<?php

	class SendEmail {

		private $header;

		function __construct() {
			$this->header  = "From: noreply@notabiere.fr\r\n";
			$this->header .= "Reply-To: noreply@notabiere.fr\r\n";
			$this->header .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		}

		private function getRegisterValidationMessage($userPseudo, $link) {
			$message  = "<html>";
			$message .= 	"<p>Salut {$userPseudo},</p>";
			$message .=		"<p>Merci d'avoir rejoint Notabiere 🍻!</p><br>";
			$message .=		"<p>Pour activer votre compte, cliquez sur le lien ci-dessous.</p>";
			$message .=		"<p>{$link}</p><br>";
			$message .=		"<p>Si vous rencontrez des difficultés pour vous connecter à votre compte, contactez-nous à contact@notabiere.fr</p><br>";
			$message .=		"<p>Cordialement,</p>";
			$message .=		"<p>L'équipe de Notabiere</p>";
			$message .= "</html>";

			return $message;
		}

		public function sendRegisterValidation($to, $userPseudo, $link) {
			$subject = "Validation de votre adresse email";
			$message = $this->getRegisterValidationMessage($userPseudo, $link);

			mail($to, $subject, $message, $this->header);
		}

	}

	$sendEmail = new SendEmail();
?>