<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('You\'ve reached the George Benson hotline.');
$gather = $response->gather(['action' => 'keypress-gb.php','input' => 'dtmf', 'timeout' => 5, 'numDigits' => 1]);
$gather->say('For, give me the night, press 1. For, on broadway, press 2. For, turn your love around, press 3. ');
$response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
