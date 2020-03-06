<?php
require_once 'swiftmailer/vendor/autoload.php';
	if(isset($_POST['send']) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['message']) && empty($_POST['email'])){
		if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
				->setUsername('caspersloof1@gmail.com')
				->setPassword('Totter12!');
			$mailer = new Swift_Mailer($transport);
			$message = (new Swift_Message('Swift Mailer'))
				->setSubject('Contact form')
				->setFrom([$_POST['mail']=>$_POST['name']])
				->setTo(['csloof@reacollege.eu'=>'Casper Sloof'])
				->setBody($_POST['message'].'<br>'.$_POST['mail'], 'text/html');
		$result = $mailer->send($message);
		}
	}