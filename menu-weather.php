<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('Welcome to the weather service.');
$gather = $response->gather(['action' => 'keypress-weather.php','input' => 'dtmf', 'timeout' => 20, 'numDigits' => 5]);
$gather->say('Enter a zip code and press pound. ');
$response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
