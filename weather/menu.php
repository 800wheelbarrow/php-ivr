<?php
require_once '../vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('Welcome to the weather service.');
$gather = $response->gather(['action' => 'keypress.php','input' => 'dtmf', 'timeout' => 10, 'numDigits' => 5]);
$gather->say('Enter a five digit zip code now. ');
// $response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
