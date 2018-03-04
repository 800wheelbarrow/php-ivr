<?php
require_once '../vendor/autoload.php';
use Twilio\Twiml;

$response = new Twiml();
$intro = $response->say('You\'ve reached the George Benson hotline.');
$gather = $response->gather(['action' => 'keypress.php','input' => 'dtmf', 'timeout' => 5, 'numDigits' => 1]);
$gather->say('For "Give Me The Night", press 1. For "On Broadway", press 2. For "Turn Your Love Around", press 3. ');
// $response->redirect('menu-main.php', ['method' => 'POST']);

echo $response;
