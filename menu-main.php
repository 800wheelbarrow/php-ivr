<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
	$intro = $response->say('Welcome to the cafe eighties');
	$pause = $response->pause(['length' => 1]);
	$gather = $response->gather(['action' => 'keypress-main.php','input' => 'dtmf', 'timeout' => 5, 'numDigits' => 1]);
		$gather->say('For weather, press 1. For blackjack, press 2. For news, press 3. For George Benson, press 4. For The Police, press 5.');
	$response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
?>