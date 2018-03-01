<?php
require_once './vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('Welcome to the cafe eighties');
$pause = $response->pause(['length' => 1]);
$gather = $response->gather(['action' => 'keypress-main.php','input' => 'dtmf', 'timeout' => 3, 'numDigits' => 1]);
$gather->say('For George Benson, press 1. For weather, press 2. For The Police, press 3');
$response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
